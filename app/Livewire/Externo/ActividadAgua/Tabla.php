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
        $actividadAgua = ActividadAgua::orderBy('created_at', 'desc')->paginate(15);
        return view('livewire.externo.actividad-agua.tabla', compact(['actividadAgua']));
    }


    public function eliminar($id){
        $actividadAgua = ActividadAgua::findOrFail($id);
        $actividadAgua->delete();
    }

}
