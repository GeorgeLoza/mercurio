<?php

namespace App\Livewire\Higiene\Hisopado;

use App\Models\Personal;
use Livewire\Component;

class Tabla extends Component
{
    public function render()
    {
         $personales = Personal::orderBy('id', 'desc') // Ordenar por fecha de creación descendente
            ->paginate(100);

        return view('livewire.higiene.hisopado.tabla', [
            'movimientos' => $personales,
        ]);


    }
}
