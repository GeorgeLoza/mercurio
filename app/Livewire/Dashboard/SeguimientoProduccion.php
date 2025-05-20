<?php

namespace App\Livewire\Dashboard;

use App\Models\EstadoDetalle;
use App\Models\Orp;
use App\Models\SolicitudAnalisisLinea;
use Livewire\Component;

class SeguimientoProduccion extends Component
{
    public $orps;
    public $reporte;
    public $preparaciones;
    public $solicitudesAgrupadas;


    public function render()
    {



        $this->solicitudesAgrupadas = [];



        $this->orps = Orp::where('estado', 'En Proceso')->get();

        foreach ($this->orps as $orp) {



            // Obtener todas las preparaciones únicas
            $preparacionesCrudas = EstadoDetalle::where('orp_id', $orp->id)

                ->distinct()
                ->pluck('preparacion');



            foreach ($preparacionesCrudas as $preparacion) {
                $this->solicitudesAgrupadas[$preparacion] = SolicitudAnalisisLinea::whereHas('estadoPlanta.estadoDetalle', function ($query) use ($orp, $preparacion) {
                    $query->where('orp_id', $orp->id)
                        ->where('preparacion', $preparacion);
                })
                    ->orderBy('tiempo', 'asc') // Ordenar por tiempo descendente
                    ->get();
            }
        }
        return view('livewire.dashboard.seguimiento-produccion');
    }
}
