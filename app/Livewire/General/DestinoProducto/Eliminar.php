<?php

namespace App\Livewire\General\DestinoProducto;

use App\Models\DestinoProducto;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Eliminar extends ModalComponent
{
    public $id;


    public function render()
    {
        return view('livewire.general.destino-producto.eliminar');
    }

    public function delete()
    {
        try {
            DestinoProducto::find($this->id)->delete();
            $this->dispatch('actualizar_tabla_destino');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'Se Elimino el destino exitosamente');
        } catch (\Throwable $th) {
            $this->dispatch('error', mensaje: 'Error'. $th);
        }
    }
}
