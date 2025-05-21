<?php

namespace App\Livewire\Dashboard;

use App\Models\EstadoDetalle;
use App\Models\Orp;
use App\Models\SolicitudAnalisisLinea;
use Livewire\Component;

class SeguimientoProduccion extends Component
{


    public $orps;

    public function mount()
    {
        $this->orps = Orp::where('estado', 'En Proceso')->whereNot('codigo',0)->get();


    }
    public function render()
    {



        return view('livewire.dashboard.seguimiento-produccion');
    }
}
