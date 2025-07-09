<?php

namespace App\Livewire\Liberacion;

use App\Models\Liberacion;
use App\Models\LiberacionDetalle;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Tabla extends Component
{
    use WithPagination;




    #[On('actualizar_tabla_liberacion')]
    public function render()
    {
        $liberaciones = Liberacion::with([
            'orp:id,id,codigo,producto_id,fecha_vencimiento1,tiempo_elaboracion',
            'orp.producto:id,id,nombre',
            'detalles',
            'detalles.origen:id,id,alias',
            'detalles.user:id,id,nombre',
        ])
            ->orderByDesc('id')
            ->paginate(9);

        return view('livewire.liberacion.tabla', compact('liberaciones'));
    }



    public function eliminar($id)
    {
        $microbiologia = LiberacionDetalle::findOrFail($id);
        $microbiologia->delete();
    }
}
