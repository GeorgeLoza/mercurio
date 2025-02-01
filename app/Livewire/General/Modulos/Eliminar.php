<?php

namespace App\Livewire\General\Modulos;

use App\Models\Modulo;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Eliminar extends ModalComponent
{

    public $id;

    public function render()
    {
        return view('livewire.general.modulos.eliminar');
    }

    public function delete()
    {
        try {
            Modulo::find($this->id)->delete();
            $this->dispatch('actualizar_tabla_modulo');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'Módulo eliminado exitosamente');
        } catch (\Throwable $th) {
            $this->dispatch('error_mensaje', mensaje: 'Problema: ' . $th->getMessage());
        }
    }
}
