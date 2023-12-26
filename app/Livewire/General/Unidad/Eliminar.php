<?php

namespace App\Livewire\General\Unidad;

use App\Models\Unidad;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Eliminar extends ModalComponent
{
    public $id;

    public function render()
    {
        return view('livewire.general.unidad.eliminar');
    }
    public function delete()
    {
        try {
            Unidad::find($this->id)->delete();
            $this->dispatch('actualizar_tabla_unidad');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'Se Elimino la unidad exitosamente');
        } catch (\Throwable $th) {
            $this->dispatch('error', mensaje: 'Error'. $th);
        }
    }
}
