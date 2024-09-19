<?php

namespace App\Livewire\Parametro\ParametroLeche;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\ParametroLeche;

class Tabla extends Component
{

    #[On('actualizar_tabla_parametroLeche')]
    public function render()
    {
        $parametroLeche = ParametroLeche::all();
        return view('livewire.parametro.parametro-leche.tabla',['parametroLeche' => $parametroLeche
    ]);
    }
}
