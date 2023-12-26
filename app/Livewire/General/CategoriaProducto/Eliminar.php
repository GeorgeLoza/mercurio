<?php

namespace App\Livewire\General\CategoriaProducto;

use App\Models\CategoriaProducto;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Eliminar extends ModalComponent
{
    public $id;
    public function render()
    {
        return view('livewire.general.categoria-producto.eliminar');
    }
    public function delete()
    {
        try {
            CategoriaProducto::find($this->id)->delete();
            $this->dispatch('actualizar_tabla_categoria');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'Se Elimino la categoria exitosamente');
        } catch (\Throwable $th) {
            $this->dispatch('error', mensaje: 'Error'. $th);
        }
    }
}
