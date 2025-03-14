<?php

namespace App\Livewire\Dashbord;

use App\Models\EstadoDetalle;
use App\Models\Orp;
use App\Models\SolicitudAnalisisLinea;
use Livewire\Component;

class OrpReporteCronologico extends Component
{
    public $orpId;
    public $reporte;
    public $analisis;
    public $resultados_agrupados;
    public $cantidad;
    public $usuariosInvolucrados;
    public $solicitudes;


    public function mount($orpId)
    {
        $this->orpId = $orpId;
        $this->reporte = Orp::where('id', $this->orpId)->first();





            $this->solicitudes = SolicitudAnalisisLinea::whereHas('estadoPlanta.estadoDetalle', function ($query)  {
                $query->where('orp_id', $this->orpId);

            })

            ->orderBy('tiempo', 'asc') // Ordenar por tiempo descendente
            ->get();





    }

    public function render()
    {

        return view('livewire.dashbord.orp-reporte-cronologico');
    }
}
