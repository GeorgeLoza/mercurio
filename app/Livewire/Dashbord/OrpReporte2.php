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


class OrpReporte2 extends Component
{

    public $orpId;
    public $reporte;
    public $analisis;
    public $solicitudesAgrupadas;
    public $cantidad;
    public $usuariosInvolucrados;




    public function mount($orpId)
{
    $this->orpId = $orpId;
    $this->reporte = Orp::where('id', $this->orpId)->first();

    // Obtener todas las preparaciones únicas
    $preparacionesCrudas = EstadoDetalle::where('orp_id', $this->orpId)

        ->distinct()
        ->pluck('preparacion');

    $this->solicitudesAgrupadas = [];

    foreach ($preparacionesCrudas as $preparacion) {
        $this->solicitudesAgrupadas[$preparacion] = SolicitudAnalisisLinea::whereHas('estadoPlanta.estadoDetalle', function ($query) use ($preparacion) {
            $query->where('orp_id', $this->orpId)
                  ->where('preparacion', $preparacion);
        })
        ->orderBy('tiempo', 'asc') // Ordenar por tiempo descendente
        ->get();
    }
}

    public function render()
    {

        return view('livewire.dashbord.orp-reporte2');
    }





    public function generatePDF()
    {

        return response()->streamDownload(
            function () {


                $informacion = $this->reporte;
                $usuariosInvolucrados = $this->usuariosInvolucrados;

                $pdf = App::make('dompdf.wrapper');
                $pdf = Pdf::loadView('pdf.reportes.orpReport', compact([ 'informacion', 'usuariosInvolucrados']));
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


                $informacion = $this->reporte;
                $usuariosInvolucrados = $this->usuariosInvolucrados;
                $pdf = App::make('dompdf.wrapper');
                $pdf = Pdf::loadView('pdf.reportes.orpReport2', compact([ 'informacion', 'usuariosInvolucrados']));
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
                $orpId = $this->orpId;



                $userIdsFromSolicitudAnalisisM = AnalisisLinea::whereHas('solicitudAnalisisLinea.estadoPlanta.estadoDetalle', function ($query) {
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
                    ->values() // Reindexa la colección para eliminar claves asociativas
                    ->pluck('solicitudAnalisisLinea.user_id')
                    ->unique();


                $userIdsFromAnalisisLineaM = AnalisisLinea::whereHas('solicitudAnalisisLinea.estadoPlanta.estadoDetalle', function ($query) {
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
                    ->values() // Reindexa la colección para eliminar claves asociativas
                    ->pluck('user_id')
                    ->unique();



                $userIdsFromSolicitudAnalisis = SolicitudAnalisisLinea::whereHas('estadoPlanta.estadoDetalle', function ($query) {
                    $query->where('etapa_id', 8); // Filtra registros con etapa_id = 1
                })
                    ->whereHas('estadoPlanta.estadoDetalle', function ($query) use ($orpId) {
                        $query->where('orp_id', $orpId); // Filtra siempre por orp_id
                    })
                    ->pluck('user_id')
                    ->unique();



                // Recolectar IDs de usuarios desde AnalisisLinea a través de SolicitudAnalisisLinea
                $userIdsFromAnalisisLinea = SolicitudAnalisisLinea::whereHas('estadoPlanta.estadoDetalle', function ($query) {
                    $query->where('etapa_id', 8); // Filtra registros con etapa_id = 1
                })
                    ->whereHas('estadoPlanta.estadoDetalle', function ($query) use ($orpId) {
                        $query->where('orp_id', $orpId); // Filtra siempre por orp_id
                    })
                    ->with('analisisLinea')
                    ->get()
                    ->pluck('analisisLinea.user_id')
                    ->unique();

                //         dd($userIdsFromSolicitudAnalisis);
                // Combinar todos los IDs recolectados y eliminar duplicados

                // $allUserIds = $userIdsFromEstadoDetalle
                // ->merge($userIdsFromEstadoPlanta)

                $allUserIds = $userIdsFromSolicitudAnalisisM

                    ->merge($userIdsFromAnalisisLineaM)
                    ->merge($userIdsFromSolicitudAnalisis)
                    ->merge($userIdsFromAnalisisLinea)
                    ->unique();

                // Recuperar los detalles de los usuarios
                $this->usuariosInvolucrados = User::whereIn('id', $allUserIds)->get();


                // Consulta con filtros
                $orpId = $this->orpId;

                // Consulta con filtro de orp_id y etapa_id = 1
                $mezclas = AnalisisLinea::whereHas('solicitudAnalisisLinea.estadoPlanta', function ($query) {
                    $query->where('etapa_id', 1); // Filtra registros con etapa_id = 1
                })
                    ->whereHas('solicitudAnalisisLinea.estadoPlanta.estadoDetalle', function ($query) use ($orpId) {
                        $query->where('orp_id', $orpId); // Filtra siempre por orp_id
                    })


                    ->get();

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






                $informacion = $this->reporte;
                $usuariosInvolucrados = $this->usuariosInvolucrados;

                $pdf = App::make('dompdf.wrapper');
                $pdf = Pdf::loadView('pdf.reportes.orpUHT', compact([ 'informacion', 'usuariosInvolucrados', 'mezclas', 'envasados', 'obs', 'orpId']));
                $pdf->setPaper('letter', 'portrait');
                echo $pdf->stream();
            },
            str_replace(['/', '\\'], '-', "{$this->reporte->codigo} {$this->reporte->producto->nombre}.pdf")
        );
    }




    public function generatePDF4()
    {

        return response()->streamDownload(
            function () {

                // Consulta con filtros
                $orpId = $this->orpId;

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







                $informacion = $this->reporte;
                $usuariosInvolucrados = $this->usuariosInvolucrados;
                $pdf = App::make('dompdf.wrapper');
                $pdf = Pdf::loadView('pdf.reportes.orpHTST', compact([ 'informacion', 'usuariosInvolucrados', 'mezclas', 'inoculaciones', 'Acortes', 'Dcortes', 'envasados', 'obs', 'orpId']));
                $pdf->setPaper('letter', 'portrait');
                echo $pdf->stream();
            },
            str_replace(['/', '\\'], '-', "{$this->reporte->codigo} {$this->reporte->producto->nombre}.pdf")
        );
    }


    public function generatePDF5()
    {

        return response()->streamDownload(
            function () {

                // Consulta con filtros
                $orpId = $this->orpId;

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







                $informacion = $this->reporte;
                $usuariosInvolucrados = $this->usuariosInvolucrados;
                $pdf = App::make('dompdf.wrapper');
                $pdf = Pdf::loadView('pdf.reportes.orpHTSTjugos', compact([ 'informacion', 'usuariosInvolucrados', 'mezclas', 'saborizaciones', 'envasados', 'obs', 'orpId']));
                $pdf->setPaper('letter', 'portrait');
                echo $pdf->stream();
            },
            str_replace(['/', '\\'], '-', "{$this->reporte->codigo} {$this->reporte->producto->nombre}.pdf")
        );
    }

    public function generatePDF6()
    {

        return response()->streamDownload(
            function () {

                // Consulta con filtros
                $orpId = $this->orpId;

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







                $informacion = $this->reporte;
                $usuariosInvolucrados = $this->usuariosInvolucrados;
                $pdf = App::make('dompdf.wrapper');
                $pdf = Pdf::loadView('pdf.reportes.orpHTSTlac', compact([ 'informacion', 'usuariosInvolucrados', 'mezclas', 'saborizaciones', 'envasados', 'obs', 'orpId']));
                $pdf->setPaper('letter', 'portrait');
                echo $pdf->stream();
            },
            str_replace(['/', '\\'], '-', "{$this->reporte->codigo} {$this->reporte->producto->nombre}.pdf")
        );
    }
}
