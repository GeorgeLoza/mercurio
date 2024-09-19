<?php

namespace App\Livewire\Producto;

use Livewire\Component;
use App\Models\Producto;
use LivewireUI\Modal\ModalComponent;

class Eliminar extends ModalComponent
{
    public $id;
    public function render()
    {
        return view('livewire.producto.eliminar');
    }
    public function delete()
    {
        try {
            
            Producto::find($this->id)->delete();
            $this->dispatch('actualizar_tabla_productos');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'Se Elimino el producto exitosamente');
        } catch (\Throwable $th) {
            $this->dispatch('error_mensaje', mensaje: 'Error'. $th);
        }
    }
}
