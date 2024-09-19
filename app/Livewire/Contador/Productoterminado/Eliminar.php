<?php

namespace App\Livewire\Contador\Productoterminado;

use Livewire\Component;
use App\Models\Contador;
use LivewireUI\Modal\ModalComponent;

class Eliminar extends ModalComponent
{
    public $id;
    public function render()
    {
        return view('livewire.contador.productoterminado.eliminar');
    }
    public function delete()
    {
        
        try {
            Contador::find($this->id)->delete();
            $this->dispatch('actualizar_tabla_contador_productoTerminado');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'Se Elimino el conteo exitosamente');
        } catch (\Throwable $th) {
            
            $this->dispatch('error_mensaje', mensaje: 'problema'.$th->getMessage());
        }
    }
}
