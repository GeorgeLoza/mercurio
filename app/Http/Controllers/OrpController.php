<?php

namespace App\Http\Controllers;

use App\Models\AnalisisLinea;
use App\Models\Origen;
use App\Models\Orp;
use App\Models\SolicitudAnalisisLinea;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;

class OrpController extends Controller
{
    public $orpId;
    public $reporte;
    public $analisis;
    public $resultados_agrupados;
    public $cantidad;
    public $usuariosInvolucrados;

    public function index()
    {

        return view('orp.index');
    }
    public function report($id)
    {
        $reporte = Orp::find($id); // Mejor usar find() si solo necesitas un registro

        return view('orp.reporte', [
            'reporte' => $reporte,
            'id' => $id
        ]);
    }

    public function kanban()
    {
        return view('orp.kanban');
    }



    public function revisar($id)
{
    $registro = Orp::find($id);
    $registro->revisado = true;
    $registro->revisor_id = auth()->user()->id;
    $registro->fechaRevision = now();
    $registro->save();

    return redirect()->back()->with('mensaje', 'ORP revisado correctamente');
}

    public function generateUHT($id)
    {

        // Obtener los datos necesarios para el reporte
        $orpId = $id;
        $reporte = Orp::find($orpId);


        $origens = Origen::whereBetween('id', [27, 33])
            ->whereHas('estadoPlanta.estadoDetalle', function ($query) use ($id) {
                $query->where('orp_id', $id);
            })->get();


        $userIdsFromSolicitudAnalisis = AnalisisLinea::whereHas('solicitudAnalisisLinea.estadoPlanta.estadoDetalle', function ($query) use ($orpId) {
            $query->where('orp_id', $orpId);
        })



            ->with(['solicitudAnalisisLinea.estadoPlanta.estadoDetalle']) // Trae la relación para acceder a 'preparacion'
            ->get()

            ->values() // Reindexa la colección para eliminar claves asociativas
            ->pluck('solicitudAnalisisLinea.user_id');





        $userIdsFromAnalisisLinea = AnalisisLinea::whereHas('solicitudAnalisisLinea.estadoPlanta.estadoDetalle', function ($query) use ($orpId) {
            $query->where('orp_id', $orpId);
        })

            ->with(['solicitudAnalisisLinea.estadoPlanta.estadoDetalle']) // Trae la relación para acceder a 'preparacion'
            ->get()
            ->groupBy(function ($item) {
                // Agrupa por el campo 'preparacion' de la tabla 'estadoDetalle'
                return $item->solicitudAnalisisLinea->estadoPlanta->estadoDetalle;
            })

            ->map(function ($group) {
                // Ordena por 'tiempo' y toma el último registro
                return $group->sortByDesc('tiempo')->first();
            })
            ->values() // Reindexa la colección para eliminar claves asociativas
            ->pluck('user_id')

            ->unique();







        $allUserIds = $userIdsFromSolicitudAnalisis

            ->merge($userIdsFromAnalisisLinea)
            ->unique();

        // Recuperar los detalles de los usuarios
        $usuariosInvolucrados = User::whereIn('id', $allUserIds)->get();


        // Consultas para obtener los datos de cada etapa
        $mezclas = AnalisisLinea::whereHas('solicitudAnalisisLinea.estadoPlanta', function ($query) {
            $query->where('etapa_id', 1); // Etapa 1: Mezcla
        })
            ->whereHas('solicitudAnalisisLinea.estadoPlanta.estadoDetalle', function ($query) use ($orpId) {
                $query->where('orp_id', $orpId); // Filtro por orp_id
            })
            ->get();

        $envasados = AnalisisLinea::whereHas('solicitudAnalisisLinea.estadoPlanta', function ($query) {
            $query->where('etapa_id', 8); // Etapa 8: Envasado
        })
            ->whereHas('solicitudAnalisisLinea.estadoPlanta.estadoDetalle', function ($query) use ($orpId) {
                $query->where('orp_id', $orpId); // Filtro por orp_id
            })
            ->join('solicitud_analisis_lineas', 'analisis_lineas.solicitud_analisis_linea_id', '=', 'solicitud_analisis_lineas.id')
            ->orderBy('solicitud_analisis_lineas.tiempo') // Ordena por tiempo
            ->select('analisis_lineas.*')
            ->get();

        $obs = AnalisisLinea::whereHas('solicitudAnalisisLinea.estadoPlanta', function ($query) use ($orpId) {
            $query->whereHas('estadoDetalle', function ($query) use ($orpId) {
                $query->where('orp_id', $orpId);
            });
        })->get();

        // Definir los datos para la vista del PDF


        $data = $this->resultados_agrupados;
        $informacion = $reporte;

        // Crear el PDF
        $pdf = Pdf::loadView('pdf.reportes.orpUHT', compact(['data', 'informacion', 'usuariosInvolucrados', 'mezclas', 'envasados', 'obs', 'orpId', 'origens']));
        $pdf->setPaper('letter', 'portrait');

        // Descargar el PDF con un nombre basado en el reporte

        return $pdf->stream(str_replace(['/', '\\'], '-', "{$reporte->codigo} {$reporte->producto->nombre}.pdf"));
    }





    public function generateYog($id)
    {
        $orpId = $id;


        $reporte = Orp::find($orpId);



        // Consulta con filtro de orp_id y etapa_id = 1
        $mezclas = AnalisisLinea::whereHas('solicitudAnalisisLinea.estadoPlanta', function ($query) {
            $query->where('etapa_id', 1); // Filtra registros con etapa_id = 1
        })
            ->whereHas('solicitudAnalisisLinea.estadoPlanta.estadoDetalle', function ($query) use ($orpId) {
                $query->where('orp_id', $orpId); // Filtra siempre por orp_id
            })

            ->with(['solicitudAnalisisLinea.estadoPlanta.estadoDetalle']) // Trae la relación para acceder a 'preparacion'
            ->get()
            ->groupBy(function ($item) {
                // Agrupa por el campo 'preparacion' de la tabla 'estadoDetalle'
                return $item->solicitudAnalisisLinea->estadoPlanta->estadoDetalle;
            })
            ->map(function ($group) {
                // Ordena por 'tiempo' y toma el último registro
                return $group->sortByDesc('tiempo')->first();
            })
            ->values(); // Reindexa la colección para eliminar claves asociativas


        // ->get();


        $inoculaciones = AnalisisLinea::whereHas('solicitudAnalisisLinea.estadoPlanta', function ($query) {
            $query->where('etapa_id', 3); // Filtra registros con etapa_id = 1
        })
            ->whereHas('solicitudAnalisisLinea.estadoPlanta.estadoDetalle', function ($query) use ($orpId) {
                $query->where('orp_id', $orpId); // Filtra siempre por orp_id
            })
            ->with(['solicitudAnalisisLinea.estadoPlanta.estadoDetalle']) // Trae la relación para acceder a 'preparacion'
            ->get()
            ->groupBy(function ($item) {
                // Agrupa por el campo 'preparacion' de la tabla 'estadoDetalle'
                return $item->solicitudAnalisisLinea->estadoPlanta->estadoDetalle;
            })
            ->map(function ($group) {
                // Ordena por 'tiempo' y toma el último registro
                return $group->sortByDesc('tiempo')->first();
            })
            ->values(); // Reindexa la colección para eliminar claves asociativas



        // ->get();

        $Acortes = AnalisisLinea::whereHas('solicitudAnalisisLinea.estadoPlanta', function ($query) {
            $query->where('etapa_id', 4); // Filtra registros con etapa_id = 4
        })
            ->whereHas('solicitudAnalisisLinea.estadoPlanta.estadoDetalle', function ($query) use ($orpId) {
                $query->where('orp_id', $orpId); // Filtra siempre por orp_id
            })
            ->with(['solicitudAnalisisLinea.estadoPlanta.estadoDetalle']) // Trae la relación para acceder a 'preparacion'
            ->get()
            ->groupBy(function ($item) {
                // Agrupa por el campo 'preparacion' de la tabla 'estadoDetalle'
                return $item->solicitudAnalisisLinea->estadoPlanta->estadoDetalle;
            })
            ->map(function ($group) {
                // Ordena por 'tiempo' y toma el último registro
                return $group->sortByDesc('tiempo')->first();
            })
            ->values(); // Reindexa la colección para eliminar claves asociativas


        $Dcortes = AnalisisLinea::whereHas('solicitudAnalisisLinea.estadoPlanta', function ($query) {
            $query->where('etapa_id', 5); // Filtra registros con etapa_id = 1
        })
            ->whereHas('solicitudAnalisisLinea.estadoPlanta.estadoDetalle', function ($query) use ($orpId) {
                $query->where('orp_id', $orpId); // Filtra siempre por orp_id
            })

            ->with(['solicitudAnalisisLinea.estadoPlanta.estadoDetalle']) // Trae la relación para acceder a 'preparacion'
            ->get()
            ->groupBy(function ($item) {
                // Agrupa por el campo 'preparacion' de la tabla 'estadoDetalle'
                return $item->solicitudAnalisisLinea->estadoPlanta->estadoDetalle;
            })
            ->map(function ($group) {
                // Ordena por 'tiempo' y toma el último registro
                return $group->sortByDesc('tiempo')->first();
            })
            ->values(); // Reindexa la colección para eliminar claves asociativas



        // ->get();

        $saborizaciones = AnalisisLinea::whereHas('solicitudAnalisisLinea.estadoPlanta', function ($query) {
            $query->where('etapa_id', 6); // Filtra registros con etapa_id = 1
        })
            ->whereHas('solicitudAnalisisLinea.estadoPlanta.estadoDetalle', function ($query) use ($orpId) {
                $query->where('orp_id', $orpId); // Filtra siempre por orp_id
            })

            ->with(['solicitudAnalisisLinea.estadoPlanta.estadoDetalle']) // Trae la relación para acceder a 'preparacion'
            ->get()
            ->groupBy(function ($item) {
                // Agrupa por el campo 'preparacion' de la tabla 'estadoDetalle'
                return $item->solicitudAnalisisLinea->estadoPlanta->estadoDetalle;
            })
            ->map(function ($group) {
                // Ordena por 'tiempo' y toma el último registro
                return $group->sortByDesc('tiempo')->first();
            })
            ->values(); // Reindexa la colección para eliminar claves asociativas



        // ->get();



        $envasados = AnalisisLinea::whereHas('solicitudAnalisisLinea.estadoPlanta', function ($query) {
            $query->where('etapa_id', 8); // Filtra registros con etapa_id = 8
        })
            ->whereHas('solicitudAnalisisLinea.estadoPlanta.estadoDetalle', function ($query) use ($orpId) {
                $query->where('orp_id', $orpId); // Filtra siempre por orp_id
            })
            ->join('solicitud_analisis_lineas', 'analisis_lineas.solicitud_analisis_linea_id', '=', 'solicitud_analisis_lineas.id')
            ->orderBy('solicitud_analisis_lineas.tiempo') // Ordena por tiempo en SolicitudAnalisisLinea
            ->select('analisis_lineas.*') // Ensure only AnalisisLinea columns are selected
            ->get();





        $obs = AnalisisLinea::whereHas('solicitudAnalisisLinea.estadoPlanta', function ($query) use ($orpId) {
            $query->whereHas('estadoDetalle', function ($query) use ($orpId) {
                $query->where('orp_id', $orpId);
            });
        })->get();



        $userIdsFromSolicitudAnalisis = AnalisisLinea::whereHas('solicitudAnalisisLinea.estadoPlanta.estadoDetalle', function ($query) use ($orpId) {
            $query->where('orp_id', $orpId);
        })



            ->with(['solicitudAnalisisLinea.estadoPlanta.estadoDetalle']) // Trae la relación para acceder a 'preparacion'
            ->get()

            ->values() // Reindexa la colección para eliminar claves asociativas
            ->pluck('solicitudAnalisisLinea.user_id');





        $userIdsFromAnalisisLinea = AnalisisLinea::whereHas('solicitudAnalisisLinea.estadoPlanta.estadoDetalle', function ($query) use ($orpId) {
            $query->where('orp_id', $orpId);
        })

            ->with(['solicitudAnalisisLinea.estadoPlanta.estadoDetalle']) // Trae la relación para acceder a 'preparacion'
            ->get()
            ->groupBy(function ($item) {
                // Agrupa por el campo 'preparacion' de la tabla 'estadoDetalle'
                return $item->solicitudAnalisisLinea->estadoPlanta->estadoDetalle;
            })

            ->map(function ($group) {
                // Ordena por 'tiempo' y toma el último registro
                return $group->sortByDesc('tiempo')->first();
            })
            ->values() // Reindexa la colección para eliminar claves asociativas
            ->pluck('user_id')

            ->unique();







        $allUserIds = $userIdsFromSolicitudAnalisis

            ->merge($userIdsFromAnalisisLinea)
            ->unique();

        // Recuperar los detalles de los usuarios
        $usuariosInvolucrados = User::whereIn('id', $allUserIds)->get();






        $data = $this->resultados_agrupados;
        $informacion = $reporte;





        $pdf = Pdf::loadView('pdf.reportes.orpHTST', compact(['data', 'informacion', 'usuariosInvolucrados', 'mezclas', 'inoculaciones', 'Acortes', 'Dcortes', 'envasados', 'obs', 'orpId']));
        $pdf->setPaper('letter', 'portrait');

        return $pdf->stream(str_replace(['/', '\\'], '-', "{$reporte->codigo} {$reporte->producto->nombre}.pdf"));
    }


    public function generateJugo($id)
    {

        $orpId = $id;
        $reporte = Orp::find($orpId);





        $userIdsFromSolicitudAnalisis = AnalisisLinea::whereHas('solicitudAnalisisLinea.estadoPlanta.estadoDetalle', function ($query) use ($orpId) {
            $query->where('orp_id', $orpId);
        })



            ->with(['solicitudAnalisisLinea.estadoPlanta.estadoDetalle']) // Trae la relación para acceder a 'preparacion'
            ->get()

            ->values() // Reindexa la colección para eliminar claves asociativas
            ->pluck('solicitudAnalisisLinea.user_id');





        $userIdsFromAnalisisLinea = AnalisisLinea::whereHas('solicitudAnalisisLinea.estadoPlanta.estadoDetalle', function ($query) use ($orpId) {
            $query->where('orp_id', $orpId);
        })

            ->with(['solicitudAnalisisLinea.estadoPlanta.estadoDetalle']) // Trae la relación para acceder a 'preparacion'
            ->get()
            ->groupBy(function ($item) {
                // Agrupa por el campo 'preparacion' de la tabla 'estadoDetalle'
                return $item->solicitudAnalisisLinea->estadoPlanta->estadoDetalle;
            })

            ->map(function ($group) {
                // Ordena por 'tiempo' y toma el último registro
                return $group->sortByDesc('tiempo')->first();
            })
            ->values() // Reindexa la colección para eliminar claves asociativas
            ->pluck('user_id')

            ->unique();







        $allUserIds = $userIdsFromSolicitudAnalisis

            ->merge($userIdsFromAnalisisLinea)
            ->unique();

        // Recuperar los detalles de los usuarios
        $usuariosInvolucrados = User::whereIn('id', $allUserIds)->get();




        // Consulta con filtro de orp_id y etapa_id = 1
        $mezclas = AnalisisLinea::whereHas('solicitudAnalisisLinea.estadoPlanta', function ($query) {
            $query->where('etapa_id', 1); // Filtra registros con etapa_id = 1
        })
            ->whereHas('solicitudAnalisisLinea.estadoPlanta.estadoDetalle', function ($query) use ($orpId) {
                $query->where('orp_id', $orpId); // Filtra siempre por orp_id
            })

            ->with(['solicitudAnalisisLinea.estadoPlanta.estadoDetalle']) // Trae la relación para acceder a 'preparacion'
            ->get()
            ->groupBy(function ($item) {
                // Agrupa por el campo 'preparacion' de la tabla 'estadoDetalle'
                return $item->solicitudAnalisisLinea->estadoPlanta->estadoDetalle;
            })
            ->map(function ($group) {
                // Ordena por 'tiempo' y toma el último registro
                return $group->sortByDesc('tiempo')->first();
            })
            ->values(); // Reindexa la colección para eliminar claves asociativas


        // ->get();






        $Acortes = AnalisisLinea::whereHas('solicitudAnalisisLinea.estadoPlanta', function ($query) {
            $query->where('etapa_id', 4); // Filtra registros con etapa_id = 4
        })
            ->whereHas('solicitudAnalisisLinea.estadoPlanta.estadoDetalle', function ($query) use ($orpId) {
                $query->where('orp_id', $orpId); // Filtra siempre por orp_id
            })
            ->with(['solicitudAnalisisLinea.estadoPlanta.estadoDetalle']) // Trae la relación para acceder a 'preparacion'
            ->get()
            ->groupBy(function ($item) {
                // Agrupa por el campo 'preparacion' de la tabla 'estadoDetalle'
                return $item->solicitudAnalisisLinea->estadoPlanta->estadoDetalle;
            })
            ->map(function ($group) {
                // Ordena por 'tiempo' y toma el último registro
                return $group->sortByDesc('tiempo')->first();
            })
            ->values(); // Reindexa la colección para eliminar claves asociativas


        $Dcortes = AnalisisLinea::whereHas('solicitudAnalisisLinea.estadoPlanta', function ($query) {
            $query->where('etapa_id', 5); // Filtra registros con etapa_id = 1
        })
            ->whereHas('solicitudAnalisisLinea.estadoPlanta.estadoDetalle', function ($query) use ($orpId) {
                $query->where('orp_id', $orpId); // Filtra siempre por orp_id
            })

            ->with(['solicitudAnalisisLinea.estadoPlanta.estadoDetalle']) // Trae la relación para acceder a 'preparacion'
            ->get()
            ->groupBy(function ($item) {
                // Agrupa por el campo 'preparacion' de la tabla 'estadoDetalle'
                return $item->solicitudAnalisisLinea->estadoPlanta->estadoDetalle;
            })
            ->map(function ($group) {
                // Ordena por 'tiempo' y toma el último registro
                return $group->sortByDesc('tiempo')->first();
            })
            ->values(); // Reindexa la colección para eliminar claves asociativas



        // ->get();

        $saborizaciones = AnalisisLinea::whereHas('solicitudAnalisisLinea.estadoPlanta', function ($query) {
            $query->where('etapa_id', 6); // Filtra registros con etapa_id = 1
        })
            ->whereHas('solicitudAnalisisLinea.estadoPlanta.estadoDetalle', function ($query) use ($orpId) {
                $query->where('orp_id', $orpId); // Filtra siempre por orp_id
            })

            ->with(['solicitudAnalisisLinea.estadoPlanta.estadoDetalle']) // Trae la relación para acceder a 'preparacion'
            ->get()
            ->groupBy(function ($item) {
                // Agrupa por el campo 'preparacion' de la tabla 'estadoDetalle'
                return $item->solicitudAnalisisLinea->estadoPlanta->estadoDetalle;
            })
            ->map(function ($group) {
                // Ordena por 'tiempo' y toma el último registro
                return $group->sortByDesc('tiempo')->first();
            })
            ->values(); // Reindexa la colección para eliminar claves asociativas



        // ->get();



        $envasados = AnalisisLinea::whereHas('solicitudAnalisisLinea.estadoPlanta', function ($query) {
            $query->where('etapa_id', 8); // Filtra registros con etapa_id = 8
        })
            ->whereHas('solicitudAnalisisLinea.estadoPlanta.estadoDetalle', function ($query) use ($orpId) {
                $query->where('orp_id', $orpId); // Filtra siempre por orp_id
            })
            ->join('solicitud_analisis_lineas', 'analisis_lineas.solicitud_analisis_linea_id', '=', 'solicitud_analisis_lineas.id')
            ->orderBy('solicitud_analisis_lineas.tiempo') // Ordena por tiempo en SolicitudAnalisisLinea
            ->select('analisis_lineas.*') // Ensure only AnalisisLinea columns are selected
            ->get();






        $obs = AnalisisLinea::whereHas('solicitudAnalisisLinea.estadoPlanta', function ($query) use ($orpId) {
            $query->whereHas('estadoDetalle', function ($query) use ($orpId) {
                $query->where('orp_id', $orpId);
            });
        })->get();





        $data = $this->resultados_agrupados;
        $informacion = $reporte;


        $pdf = Pdf::loadView('pdf.reportes.orpHTSTjugos', compact(['data', 'informacion', 'usuariosInvolucrados', 'mezclas', 'saborizaciones', 'envasados', 'obs', 'orpId']));
        $pdf->setPaper('letter', 'portrait');

        // Descargar el PDF con un nombre basado en el reporte
        return $pdf->stream(str_replace(['/', '\\'], '-', "{$reporte->codigo} {$reporte->producto->nombre}.pdf"));
    }

    public function generateLac($id)
    {
        // Obtén los datos de la consulta con filtros
        $orpId = $id;


        $reporte = Orp::find($orpId);


        // Consulta con filtro de orp_id y etapa_id = 1
        $mezclas = AnalisisLinea::whereHas('solicitudAnalisisLinea.estadoPlanta', function ($query) {
            $query->where('etapa_id', 1); // Filtra registros con etapa_id = 1
        })
            ->whereHas('solicitudAnalisisLinea.estadoPlanta.estadoDetalle', function ($query) use ($orpId) {
                $query->where('orp_id', $orpId); // Filtra siempre por orp_id
            })

            ->with(['solicitudAnalisisLinea.estadoPlanta.estadoDetalle']) // Trae la relación para acceder a 'preparacion'
            ->get()
            ->groupBy(function ($item) {
                // Agrupa por el campo 'preparacion' de la tabla 'estadoDetalle'
                return $item->solicitudAnalisisLinea->estadoPlanta->estadoDetalle;
            })
            ->map(function ($group) {
                // Ordena por 'tiempo' y toma el último registro
                return $group->sortByDesc('tiempo')->first();
            })
            ->values(); // Reindexa la colección para eliminar claves asociativas


        // ->get();






        $Acortes = AnalisisLinea::whereHas('solicitudAnalisisLinea.estadoPlanta', function ($query) {
            $query->where('etapa_id', 4); // Filtra registros con etapa_id = 4
        })
            ->whereHas('solicitudAnalisisLinea.estadoPlanta.estadoDetalle', function ($query) use ($orpId) {
                $query->where('orp_id', $orpId); // Filtra siempre por orp_id
            })
            ->with(['solicitudAnalisisLinea.estadoPlanta.estadoDetalle']) // Trae la relación para acceder a 'preparacion'
            ->get()
            ->groupBy(function ($item) {
                // Agrupa por el campo 'preparacion' de la tabla 'estadoDetalle'
                return $item->solicitudAnalisisLinea->estadoPlanta->estadoDetalle;
            })
            ->map(function ($group) {
                // Ordena por 'tiempo' y toma el último registro
                return $group->sortByDesc('tiempo')->first();
            })
            ->values(); // Reindexa la colección para eliminar claves asociativas


        $Dcortes = AnalisisLinea::whereHas('solicitudAnalisisLinea.estadoPlanta', function ($query) {
            $query->where('etapa_id', 5); // Filtra registros con etapa_id = 1
        })
            ->whereHas('solicitudAnalisisLinea.estadoPlanta.estadoDetalle', function ($query) use ($orpId) {
                $query->where('orp_id', $orpId); // Filtra siempre por orp_id
            })

            ->with(['solicitudAnalisisLinea.estadoPlanta.estadoDetalle']) // Trae la relación para acceder a 'preparacion'
            ->get()
            ->groupBy(function ($item) {
                // Agrupa por el campo 'preparacion' de la tabla 'estadoDetalle'
                return $item->solicitudAnalisisLinea->estadoPlanta->estadoDetalle;
            })
            ->map(function ($group) {
                // Ordena por 'tiempo' y toma el último registro
                return $group->sortByDesc('tiempo')->first();
            })
            ->values(); // Reindexa la colección para eliminar claves asociativas



        // ->get();

        $saborizaciones = AnalisisLinea::whereHas('solicitudAnalisisLinea.estadoPlanta', function ($query) {
            $query->where('etapa_id', 6); // Filtra registros con etapa_id = 1
        })
            ->whereHas('solicitudAnalisisLinea.estadoPlanta.estadoDetalle', function ($query) use ($orpId) {
                $query->where('orp_id', $orpId); // Filtra siempre por orp_id
            })

            ->with(['solicitudAnalisisLinea.estadoPlanta.estadoDetalle']) // Trae la relación para acceder a 'preparacion'
            ->get()
            ->groupBy(function ($item) {
                // Agrupa por el campo 'preparacion' de la tabla 'estadoDetalle'
                return $item->solicitudAnalisisLinea->estadoPlanta->estadoDetalle;
            })
            ->map(function ($group) {
                // Ordena por 'tiempo' y toma el último registro
                return $group->sortByDesc('tiempo')->first();
            })
            ->values(); // Reindexa la colección para eliminar claves asociativas



        // ->get();



        $envasados = AnalisisLinea::whereHas('solicitudAnalisisLinea.estadoPlanta', function ($query) {
            $query->where('etapa_id', 8); // Filtra registros con etapa_id = 8
        })
            ->whereHas('solicitudAnalisisLinea.estadoPlanta.estadoDetalle', function ($query) use ($orpId) {
                $query->where('orp_id', $orpId); // Filtra siempre por orp_id
            })
            ->join('solicitud_analisis_lineas', 'analisis_lineas.solicitud_analisis_linea_id', '=', 'solicitud_analisis_lineas.id')
            ->orderBy('solicitud_analisis_lineas.tiempo') // Ordena por tiempo en SolicitudAnalisisLinea
            ->select('analisis_lineas.*') // Ensure only AnalisisLinea columns are selected
            ->get();






        $obs = AnalisisLinea::whereHas('solicitudAnalisisLinea.estadoPlanta', function ($query) use ($orpId) {
            $query->whereHas('estadoDetalle', function ($query) use ($orpId) {
                $query->where('orp_id', $orpId);
            });
        })->get();




        $userIdsFromSolicitudAnalisis = AnalisisLinea::whereHas('solicitudAnalisisLinea.estadoPlanta.estadoDetalle', function ($query) use ($orpId) {
            $query->where('orp_id', $orpId);
        })



            ->with(['solicitudAnalisisLinea.estadoPlanta.estadoDetalle']) // Trae la relación para acceder a 'preparacion'
            ->get()

            ->values() // Reindexa la colección para eliminar claves asociativas
            ->pluck('solicitudAnalisisLinea.user_id');





        $userIdsFromAnalisisLinea = AnalisisLinea::whereHas('solicitudAnalisisLinea.estadoPlanta.estadoDetalle', function ($query) use ($orpId) {
            $query->where('orp_id', $orpId);
        })

            ->with(['solicitudAnalisisLinea.estadoPlanta.estadoDetalle']) // Trae la relación para acceder a 'preparacion'
            ->get()
            ->groupBy(function ($item) {
                // Agrupa por el campo 'preparacion' de la tabla 'estadoDetalle'
                return $item->solicitudAnalisisLinea->estadoPlanta->estadoDetalle;
            })

            ->map(function ($group) {
                // Ordena por 'tiempo' y toma el último registro
                return $group->sortByDesc('tiempo')->first();
            })
            ->values() // Reindexa la colección para eliminar claves asociativas
            ->pluck('user_id')

            ->unique();







        $allUserIds = $userIdsFromSolicitudAnalisis

            ->merge($userIdsFromAnalisisLinea)
            ->unique();

        // Recuperar los detalles de los usuarios
        $usuariosInvolucrados = User::whereIn('id', $allUserIds)->get();

        // Obtener los datos para el PDF
        $data = $this->resultados_agrupados;
        $informacion = $reporte;


        // Generar el PDF
        $pdf = Pdf::loadView('pdf.reportes.orpHTSTlac', compact(['data', 'informacion', 'usuariosInvolucrados', 'mezclas', 'saborizaciones', 'envasados', 'obs', 'orpId']));

        // Configuración de la página del PDF
        $pdf->setPaper('letter', 'portrait'); // Tamaño carta y orientación vertical

        // Descargar el PDF con un nombre basado en el reporte
        return $pdf->stream(str_replace(['/', '\\'], '-', "{$reporte->codigo} {$reporte->producto->nombre}.pdf"));
    }
}
