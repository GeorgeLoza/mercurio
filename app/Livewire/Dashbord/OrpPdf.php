<?php

namespace App\Livewire\Dashbord;

use App\Models\AnalisisLinea;
use App\Models\Orp;
use App\Models\User;
use Livewire\Component;

class OrpPdf extends Component
{
    public $orpId;
    public $id;
    public $mezclas;
    public $inoculaciones;
    public $Acortes;
    public $Dcortes;
    public $saborizaciones;
    public $envasados;
    public $obs;
    public $usuariosInvolucrados;
    public $reporte;



    public function mount($orpId)
    {
        $this->orpId = $orpId;





    }
    public function render()
    {





        $orpId = $this->orpId;



        $this->reporte = Orp::find($this->orpId);



        // Consulta con filtro de orp_id y etapa_id = 1
        $this->mezclas = AnalisisLinea::whereHas('solicitudAnalisisLinea.estadoPlanta', function ($query) {
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


        $this->inoculaciones = AnalisisLinea::whereHas('solicitudAnalisisLinea.estadoPlanta', function ($query) {
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

        $this->Acortes = AnalisisLinea::whereHas('solicitudAnalisisLinea.estadoPlanta', function ($query) {
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


        $this->Dcortes = AnalisisLinea::whereHas('solicitudAnalisisLinea.estadoPlanta', function ($query) {
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

        $this->saborizaciones = AnalisisLinea::whereHas('solicitudAnalisisLinea.estadoPlanta', function ($query) {
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



        $this->envasados = AnalisisLinea::whereHas('solicitudAnalisisLinea.estadoPlanta', function ($query) {
            $query->where('etapa_id', 8); // Filtra registros con etapa_id = 8
        })
            ->whereHas('solicitudAnalisisLinea.estadoPlanta.estadoDetalle', function ($query) use ($orpId) {
                $query->where('orp_id', $orpId); // Filtra siempre por orp_id
            })
            ->join('solicitud_analisis_lineas', 'analisis_lineas.solicitud_analisis_linea_id', '=', 'solicitud_analisis_lineas.id')
            ->orderBy('solicitud_analisis_lineas.tiempo') // Ordena por tiempo en SolicitudAnalisisLinea
            ->select('analisis_lineas.*') // Ensure only AnalisisLinea columns are selected
            ->get();





        $this->obs = AnalisisLinea::whereHas('solicitudAnalisisLinea.estadoPlanta', function ($query) use ($orpId) {
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
        $this->usuariosInvolucrados = User::whereIn('id', $allUserIds)->get();

































        return view('livewire.dashbord.orp-pdf');
    }
}
