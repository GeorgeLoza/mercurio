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

    // guarda qué fila está expandida
    public $expanded = [];

    #[On('actualizar_tabla_liberacion')]
    public function render()
    {
        $liberaciones = Liberacion::with([

            'detalles',
            'detalles.origen:id,id,alias',
            'detalles.user:id,id,nombre,codigo',
        ])
        ->orderByDesc('id')
        ->paginate(9);

        return view('livewire.liberacion.tabla', compact('liberaciones'));
    }

    public function eliminar($id)
    {
        $detalle = LiberacionDetalle::findOrFail($id);
        $detalle->delete();
    }

    // abrir/cerrar fila al hacer clic
    public function toggleExpand($id)
    {
        if (isset($this->expanded[$id])) {
            unset($this->expanded[$id]); // si ya estaba abierta → cerrar
        } else {
            $this->expanded = []; // solo una fila abierta a la vez (quita esta línea si quieres varias)
            $this->expanded[$id] = true; // abrir fila
        }
    }

    public function liberar($id)
    {
        $liberacion = Liberacion::findOrFail($id);
        $liberacion->estado = 'Por Liberar';
        $liberacion->save();

        $this->dispatch('success', mensaje: 'Liberación actualizada a "Liberado".');
        $this->dispatch('actualizar_tabla_liberacion');
    }

    public function autorizar($id)
    {
        $liberacion = Liberacion::findOrFail($id);
        $liberacion->estado = 'Liberado';

         $liberacion->fecha_liberacion = now();
        $liberacion->autorizador_id = auth()->id();

        $liberacion->save();

        $this->dispatch('success', mensaje: 'Liberación actualizada a "Autorizado".');
        $this->dispatch('actualizar_tabla_liberacion');
    }

    public function deleteDetalle($detalleId)
{
    $detalle = LiberacionDetalle::find($detalleId);

    if ($detalle) {
        $detalle->delete();
    }

    // volver a cargar datos para refrescar la tabla
    // $this->loadData();

    // opcional: lanzar evento JS o cerrar modal
    $this->dispatch('deleted');
}


    public function delete($id)
    {

        $liberacion = Liberacion::find($id);
        if ($liberacion) {
            // Eliminar todos los detalles asociados
            $liberacion->detalles()->delete();
            // Luego eliminar la liberación
            $liberacion->delete();
        }

        $this->dispatch('actualizar_tabla_liberacion');

        session()->flash('success', 'Liberación eliminada correctamente.');
        $this->reset();
    }
}








