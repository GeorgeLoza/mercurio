<?php

namespace App\Livewire\EstadoPlanta;

use App\Models\Orp;
use Livewire\Component;
use App\Models\EstadoPlanta;
use App\Models\EstadoDetalle;
use LivewireUI\Modal\ModalComponent;

class Vaciar extends ModalComponent
{
    public $HTST_A1 = 1;
    public $HTST_B1 = 1;
    public $HTST_C1 = 1;

    public $HTST_A2 = 1;
    public $HTST_B2 = 1;
    public $HTST_C2 = 1;

    public $HTST_A3 = 1;
    public $HTST_B3 = 1;
    public $HTST_C3 = 1;

    public $HTST_A4 = 1;
    public $HTST_B4 = 1;
    public $HTST_C4 = 1;

    public $HTST_A5 = 1;
    public $HTST_B5 = 1;
    public $HTST_C5 = 1;

    public $UHT_A1 = 1;
    public $UHT_B1 = 1;
    public $UHT_C1 = 1;

    public $UHT_A2 = 1;
    public $UHT_B2 = 1;

    public $UHT_A3 = 1;
    public $UHT_B3 = 1;

    public $V1 = 1;
    public $V2 = 1;
    public $V3 = 1;

    public $L1 = 1;
    public $L2 = 1;
    public $L3 = 1;

    public $araña = 1;
    public $id;
    public function mount($id)
    {
        $this->id = $id;
    }

    public function render()

    {

       
        return view('livewire.estado-planta.vaciar');
    }

    
}
