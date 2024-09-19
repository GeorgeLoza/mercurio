<?php

namespace App\Livewire\Externo\ActividadAgua;

use App\Models\ActividadAgua;
use Livewire\Attributes\On;
use Livewire\Component;

class Tabla extends Component
{

    #[On('actualizar_tabla_ActividadAgua')]
    public function render()
    {
        $actividadAgua = ActividadAgua::orderBy('created_at', 'desc')->get();
        return view('livewire.externo.actividad-agua.tabla', compact(['actividadAgua']));
    }

    
}
