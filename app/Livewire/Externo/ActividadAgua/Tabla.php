<?php

namespace App\Livewire\Externo\ActividadAgua;

use App\Models\ActividadAgua;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Tabla extends Component
{
    use WithPagination;
    #[On('actualizar_tabla_ActividadAgua')]
    public function render()
    {
        $actividadAgua = ActividadAgua::orderBy('created_at', 'desc')->paginate(50)->withQueryString();
        return view('livewire.externo.actividad-agua.tabla', compact(['actividadAgua']));
    }


    public function eliminar($id){
        $actividadAgua = ActividadAgua::findOrFail($id);
        $actividadAgua->delete();
    }

}
