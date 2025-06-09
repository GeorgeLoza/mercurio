<?php

namespace App\Livewire\MateriaPrima\RecepcionMateriaPrima;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Crear extends ModalComponent
{
    public function render()
    {
        return view('livewire.materia-prima.recepcion-materia-prima.crear');
    }
}
