<?php

namespace App\Livewire\Almacen\ProductoTerminado;

use App\Models\almacenProductoTerminado;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Eliminar extends ModalComponent
{
    public $id;
    public function render()
    {
        return view('livewire.almacen.producto-terminado.eliminar');
    }
    public function delete()
    {
        try {
            almacenProductoTerminado::find($this->id)->delete();
            $this->dispatch('actualizar_tabla_almacen_PT');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'Se Elimino el Almacen Exitosamente');
        } catch (\Throwable $th) {
            $this->dispatch('error', mensaje: 'Error'. $th);
        }
    }
}
