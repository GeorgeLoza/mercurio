<?php

namespace App\Livewire\General\Planta;

use App\Models\Planta;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Eliminar extends ModalComponent
{
    public $id;

    public function render()
    {
        return view('livewire.general.planta.eliminar');
    }

    public function delete()
    {
        try {
            Planta::find($this->id)->delete();
            $this->dispatch('actualizar_tabla_planta');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'Se Elimino la planta exitosamente');
        } catch (\Throwable $th) {
            $this->dispatch('error_mensaje', mensaje: 'problema'.$th->getMessage());
        }
    }
    
}
