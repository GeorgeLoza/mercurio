<?php

namespace App\Livewire\DispositivosMedicion;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Info extends ModalComponent
{
    public function render()
    {
        return view('livewire.dispositivos-medicion.info');
    }
}
