<?php

namespace App\Livewire\Dashbord;

use App\Models\AnalisisLinea;
use App\Models\Orp;
use App\Models\User;
use Livewire\Component;
use App\Models\Contador;
use App\Models\EstadoPlanta;
use App\Models\EstadoDetalle;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use App\Models\SolicitudAnalisisLinea;

class OrpReporte extends Component
{

    public $orpId;
    public $reporte;
    public $analisis;
    public $resultados_agrupados;
    public $cantidad;
    public $usuariosInvolucrados;


    public function mount($orpId)
    {
        $this->orpId = $orpId;
        $this->cantidad = Contador::select('contadors.orp_id', DB::raw('SUM(cantidad) as cantidad_total'))
            ->where('tipo', 'Total')
            ->where('orp_id', $this->orpId)
            ->groupBy('contadors.orp_id')
            ->join('orps', 'contadors.orp_id', '=', 'orps.id')
            ->get();
        $this->reporte = Orp::where('id', $this->orpId)->first();

        $preparacionesCrudas = EstadoDetalle::where('orp_id', $this->orpId)
            ->whereHas('estadoPlanta', function ($query) {
                $query->where('etapa_id', 1);
            })
            ->distinct()
            ->pluck('preparacion');
        $preparacionesProcesadas = [];

        foreach ($preparacionesCrudas as $prep) {
            $preparacionesProcesadas = array_merge($preparacionesProcesadas, $this->agruparPreparaciones($prep));
        }

        $preparacionesProcesadas = array_unique($preparacionesProcesadas);

        $this->resultados_agrupados = [];

        foreach ($preparacionesProcesadas as $preparacion) {
            $this->resultados_agrupados[$preparacion] = EstadoDetalle::where('preparacion', 'LIKE', "%$preparacion%")
                ->where('orp_id', $this->orpId)
                ->whereHas('estadoPlanta.solicitudAnalisisLinea') // Asegura que exista una solicitud de análisis relacionada
                ->get();
        }

        // Recolectar IDs de usuarios directamente involucrados en EstadoDetalle para el Orp dado
        $userIdsFromEstadoDetalle = EstadoDetalle::where('orp_id', $this->orpId)
            ->pluck('user_id')
            ->unique();

        // Recolectar IDs de usuarios desde EstadoPlanta a través de EstadoDetalle
        $userIdsFromEstadoPlanta = EstadoDetalle::where('orp_id', $this->orpId)
            ->with('estadoPlanta')
            ->get()
            ->pluck('estadoPlanta.user_id')
            ->unique();

            // Recolectar IDs de usuarios desde SolicitudAnalisisLinea a través de EstadoPlanta
           // Recolectar IDs de usuarios relacionados con una ORP específica desde SolicitudAnalisisLinea
$userIdsFromSolicitudAnalisis = SolicitudAnalisisLinea::whereHas('estadoPlanta.estadoDetalle', function ($query) {
    $query->where('orp_id', $this->orpId);
})
    ->pluck('user_id')
    ->unique();



        // Recolectar IDs de usuarios desde AnalisisLinea a través de SolicitudAnalisisLinea
        $userIdsFromAnalisisLinea = SolicitudAnalisisLinea::whereHas('estadoPlanta.estadoDetalle', function ($query) {
            $query->where('orp_id', $this->orpId);
        })
            ->with('analisisLinea')
            ->get()
            ->pluck('analisisLinea.user_id')
            ->unique();

        // Combinar todos los IDs recolectados y eliminar duplicados
        $allUserIds = $userIdsFromEstadoDetalle
            ->merge($userIdsFromEstadoPlanta)
            ->merge($userIdsFromSolicitudAnalisis)
            ->merge($userIdsFromAnalisisLinea)
            ->unique();

        // Recuperar los detalles de los usuarios
        $this->usuariosInvolucrados = User::whereIn('id', $allUserIds)->get();


    }

    public function render()
    {
        return view('livewire.dashbord.orp-reporte');
    }
    public function agruparPreparaciones($preparacion)
    {
        // Dividir la cadena de preparación en partes usando "-"
        $partes = explode('-', $preparacion);
        $nuevaAgrupacion = [];

        // Agrupar las partes de dos en dos, incluso para cadenas largas
        for ($i = 0; $i < count($partes); $i += 2) {
            if (isset($partes[$i + 1])) {
                // Si hay una pareja disponible, agrupar juntos
                $nuevaAgrupacion[] = $partes[$i] . '-' . $partes[$i + 1];
            } else {
                // Si es el último elemento sin pareja, agregarlo solo
                $nuevaAgrupacion[] = $partes[$i];
            }
        }

        return $nuevaAgrupacion;
    }

    public function generatePDF()
    {

        return response()->streamDownload(
            function () {

                $data = $this->resultados_agrupados;
                $informacion = $this->reporte;
                $usuariosInvolucrados = $this->usuariosInvolucrados;

                $pdf = App::make('dompdf.wrapper');
                $pdf = Pdf::loadView('pdf.reportes.orpReport', compact(['data', 'informacion', 'usuariosInvolucrados']));
                $pdf->setPaper('letter', 'portrait');
                echo $pdf->stream();
            },
            "{$this->reporte->codigo} {$this->reporte->producto->nombre}.pdf"
        );
    }

    public function generatePDF2()
    {

        return response()->streamDownload(
            function () {

                $data = $this->resultados_agrupados;
                $informacion = $this->reporte;
                $usuariosInvolucrados = $this->usuariosInvolucrados;
                $pdf = App::make('dompdf.wrapper');
                $pdf = Pdf::loadView('pdf.reportes.orpReport2', compact(['data', 'informacion', 'usuariosInvolucrados']));
                $pdf->setPaper('letter', 'portrait');
                echo $pdf->stream();
            },
            "{$this->reporte->codigo} {$this->reporte->producto->nombre}.pdf"
        );
    }

    public function generatePDF3()
    {

        return response()->streamDownload(
            function () {

                // Consulta con filtros
                $orpId = $this->orpId;

                // Consulta con filtro de orp_id y etapa_id = 1
                $mezclas = AnalisisLinea::whereHas('solicitudAnalisisLinea.estadoPlanta', function($query) {
                    $query->where('etapa_id', 1); // Filtra registros con etapa_id = 1
                })
                ->whereHas('solicitudAnalisisLinea.estadoPlanta.estadoDetalle', function($query) use ($orpId) {
                    $query->where('orp_id', $orpId); // Filtra siempre por orp_id
                })


                ->get();




                $envasados = AnalisisLinea::whereHas('solicitudAnalisisLinea.estadoPlanta', function($query) {
                    $query->where('etapa_id', 8); // Filtra registros con etapa_id = 8
                })
                ->whereHas('solicitudAnalisisLinea.estadoPlanta.estadoDetalle', function($query) use ($orpId) {
                    $query->where('orp_id', $orpId); // Filtra siempre por orp_id
                })
                ->join('solicitud_analisis_lineas', 'analisis_lineas.solicitud_analisis_linea_id', '=', 'solicitud_analisis_lineas.id')
                ->orderBy('solicitud_analisis_lineas.tiempo') // Ordena por tiempo en SolicitudAnalisisLinea
                ->select('analisis_lineas.*') // Ensure only AnalisisLinea columns are selected
                ->get();






                $obs = AnalisisLinea::whereHas('solicitudAnalisisLinea.estadoPlanta', function($query) use ($orpId) {
                    $query->whereHas('estadoDetalle', function($query) use ($orpId) {
                        $query->where('orp_id', $orpId);
                    });
                })->get();






                $data = $this->resultados_agrupados;
                $informacion = $this->reporte;
                $usuariosInvolucrados = $this->usuariosInvolucrados;

                $pdf = App::make('dompdf.wrapper');
                $pdf = Pdf::loadView('pdf.reportes.orpUHT', compact(['data', 'informacion', 'usuariosInvolucrados','mezclas','envasados', 'obs', 'orpId']));
                $pdf->setPaper('letter', 'portrait');
                echo $pdf->stream();
            },
           "{$this->reporte->codigo} {$this->reporte->producto->nombre}.pdf"
        );
    }




    public function generatePDF4()
    {

        return response()->streamDownload(
            function () {

                // Consulta con filtros
                $orpId = $this->orpId;

                // Consulta con filtro de orp_id y etapa_id = 1
                $mezclas = AnalisisLinea::whereHas('solicitudAnalisisLinea.estadoPlanta', function($query) {
                    $query->where('etapa_id', 1); // Filtra registros con etapa_id = 1
                })
                ->whereHas('solicitudAnalisisLinea.estadoPlanta.estadoDetalle', function($query) use ($orpId) {
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


                $inoculaciones = AnalisisLinea::whereHas('solicitudAnalisisLinea.estadoPlanta', function($query) {
                    $query->where('etapa_id', 3); // Filtra registros con etapa_id = 1
                })
                ->whereHas('solicitudAnalisisLinea.estadoPlanta.estadoDetalle', function($query) use ($orpId) {
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


                $Dcortes = AnalisisLinea::whereHas('solicitudAnalisisLinea.estadoPlanta', function($query) {
                    $query->where('etapa_id', 5); // Filtra registros con etapa_id = 1
                })
                ->whereHas('solicitudAnalisisLinea.estadoPlanta.estadoDetalle', function($query) use ($orpId) {
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

                $saborizaciones = AnalisisLinea::whereHas('solicitudAnalisisLinea.estadoPlanta', function($query) {
                    $query->where('etapa_id', 6); // Filtra registros con etapa_id = 1
                })
                ->whereHas('solicitudAnalisisLinea.estadoPlanta.estadoDetalle', function($query) use ($orpId) {
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



                $envasados = AnalisisLinea::whereHas('solicitudAnalisisLinea.estadoPlanta', function($query) {
                    $query->where('etapa_id', 8); // Filtra registros con etapa_id = 8
                })
                ->whereHas('solicitudAnalisisLinea.estadoPlanta.estadoDetalle', function($query) use ($orpId) {
                    $query->where('orp_id', $orpId); // Filtra siempre por orp_id
                })
                ->join('solicitud_analisis_lineas', 'analisis_lineas.solicitud_analisis_linea_id', '=', 'solicitud_analisis_lineas.id')
                ->orderBy('solicitud_analisis_lineas.tiempo') // Ordena por tiempo en SolicitudAnalisisLinea
                ->select('analisis_lineas.*') // Ensure only AnalisisLinea columns are selected
                ->get();






                $obs = AnalisisLinea::whereHas('solicitudAnalisisLinea.estadoPlanta', function($query) use ($orpId) {
                    $query->whereHas('estadoDetalle', function($query) use ($orpId) {
                        $query->where('orp_id', $orpId);
                    });
                })->get();






                $data = $this->resultados_agrupados;
                $informacion = $this->reporte;
                $usuariosInvolucrados = $this->usuariosInvolucrados;
                $pdf = App::make('dompdf.wrapper');
                $pdf = Pdf::loadView('pdf.reportes.orpHTST', compact(['data', 'informacion', 'usuariosInvolucrados','mezclas','inoculaciones','Acortes','Dcortes','envasados', 'obs', 'orpId']));
                $pdf->setPaper('letter', 'portrait');
                echo $pdf->stream();
            },
           "{$this->reporte->codigo} {$this->reporte->producto->nombre}.pdf"
        );
    }


    public function generatePDF5()
    {

        return response()->streamDownload(
            function () {

                // Consulta con filtros
                $orpId = $this->orpId;

                // Consulta con filtro de orp_id y etapa_id = 1
                $mezclas = AnalisisLinea::whereHas('solicitudAnalisisLinea.estadoPlanta', function($query) {
                    $query->where('etapa_id', 1); // Filtra registros con etapa_id = 1
                })
                ->whereHas('solicitudAnalisisLinea.estadoPlanta.estadoDetalle', function($query) use ($orpId) {
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


                $Dcortes = AnalisisLinea::whereHas('solicitudAnalisisLinea.estadoPlanta', function($query) {
                    $query->where('etapa_id', 5); // Filtra registros con etapa_id = 1
                })
                ->whereHas('solicitudAnalisisLinea.estadoPlanta.estadoDetalle', function($query) use ($orpId) {
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

                $saborizaciones = AnalisisLinea::whereHas('solicitudAnalisisLinea.estadoPlanta', function($query) {
                    $query->where('etapa_id', 6); // Filtra registros con etapa_id = 1
                })
                ->whereHas('solicitudAnalisisLinea.estadoPlanta.estadoDetalle', function($query) use ($orpId) {
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



                $envasados = AnalisisLinea::whereHas('solicitudAnalisisLinea.estadoPlanta', function($query) {
                    $query->where('etapa_id', 8); // Filtra registros con etapa_id = 8
                })
                ->whereHas('solicitudAnalisisLinea.estadoPlanta.estadoDetalle', function($query) use ($orpId) {
                    $query->where('orp_id', $orpId); // Filtra siempre por orp_id
                })
                ->join('solicitud_analisis_lineas', 'analisis_lineas.solicitud_analisis_linea_id', '=', 'solicitud_analisis_lineas.id')
                ->orderBy('solicitud_analisis_lineas.tiempo') // Ordena por tiempo en SolicitudAnalisisLinea
                ->select('analisis_lineas.*') // Ensure only AnalisisLinea columns are selected
                ->get();






                $obs = AnalisisLinea::whereHas('solicitudAnalisisLinea.estadoPlanta', function($query) use ($orpId) {
                    $query->whereHas('estadoDetalle', function($query) use ($orpId) {
                        $query->where('orp_id', $orpId);
                    });
                })->get();






                $data = $this->resultados_agrupados;
                $informacion = $this->reporte;
                $usuariosInvolucrados = $this->usuariosInvolucrados;
                $pdf = App::make('dompdf.wrapper');
                $pdf = Pdf::loadView('pdf.reportes.orpHTSTjugos', compact(['data', 'informacion', 'usuariosInvolucrados','mezclas','saborizaciones','envasados', 'obs', 'orpId']));
                $pdf->setPaper('letter', 'portrait');
                echo $pdf->stream();
            },
           "{$this->reporte->codigo} {$this->reporte->producto->nombre}.pdf"
        );
    }

    public function generatePDF6()
    {

        return response()->streamDownload(
            function () {

                // Consulta con filtros
                $orpId = $this->orpId;

                // Consulta con filtro de orp_id y etapa_id = 1
                $mezclas = AnalisisLinea::whereHas('solicitudAnalisisLinea.estadoPlanta', function($query) {
                    $query->where('etapa_id', 1); // Filtra registros con etapa_id = 1
                })
                ->whereHas('solicitudAnalisisLinea.estadoPlanta.estadoDetalle', function($query) use ($orpId) {
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


                $Dcortes = AnalisisLinea::whereHas('solicitudAnalisisLinea.estadoPlanta', function($query) {
                    $query->where('etapa_id', 5); // Filtra registros con etapa_id = 1
                })
                ->whereHas('solicitudAnalisisLinea.estadoPlanta.estadoDetalle', function($query) use ($orpId) {
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

                $saborizaciones = AnalisisLinea::whereHas('solicitudAnalisisLinea.estadoPlanta', function($query) {
                    $query->where('etapa_id', 6); // Filtra registros con etapa_id = 1
                })
                ->whereHas('solicitudAnalisisLinea.estadoPlanta.estadoDetalle', function($query) use ($orpId) {
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



                $envasados = AnalisisLinea::whereHas('solicitudAnalisisLinea.estadoPlanta', function($query) {
                    $query->where('etapa_id', 8); // Filtra registros con etapa_id = 8
                })
                ->whereHas('solicitudAnalisisLinea.estadoPlanta.estadoDetalle', function($query) use ($orpId) {
                    $query->where('orp_id', $orpId); // Filtra siempre por orp_id
                })
                ->join('solicitud_analisis_lineas', 'analisis_lineas.solicitud_analisis_linea_id', '=', 'solicitud_analisis_lineas.id')
                ->orderBy('solicitud_analisis_lineas.tiempo') // Ordena por tiempo en SolicitudAnalisisLinea
                ->select('analisis_lineas.*') // Ensure only AnalisisLinea columns are selected
                ->get();






                $obs = AnalisisLinea::whereHas('solicitudAnalisisLinea.estadoPlanta', function($query) use ($orpId) {
                    $query->whereHas('estadoDetalle', function($query) use ($orpId) {
                        $query->where('orp_id', $orpId);
                    });
                })->get();






                $data = $this->resultados_agrupados;
                $informacion = $this->reporte;
                $usuariosInvolucrados = $this->usuariosInvolucrados;
                $pdf = App::make('dompdf.wrapper');
                $pdf = Pdf::loadView('pdf.reportes.orpHTSTlac', compact(['data', 'informacion', 'usuariosInvolucrados','mezclas','saborizaciones','envasados', 'obs', 'orpId']));
                $pdf->setPaper('letter', 'portrait');
                echo $pdf->stream();
            },
           "{$this->reporte->codigo} {$this->reporte->producto->nombre}.pdf"
        );
    }

}
