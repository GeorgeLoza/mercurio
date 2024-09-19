<?php

namespace App\Livewire\Origen;

use App\Models\Origen;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Eliminar extends ModalComponent
{
    public $id;

    public function render()
    {
        return view('livewire.origen.eliminar');
    }

    public function delete()
    {
        try {
            Origen::find($this->id)->delete();
            $this->dispatch('actualizar_tabla_origen');
    $this->closeModal();
    $this->dispatch('success', mensaje: 'Se Elimino el origen exitosamente');
        } catch (\Throwable $th) {
            $this->dispatch('error_mensaje', mensaje: 'problema'.$th->getMessage());
        }
        
    }
  
}
