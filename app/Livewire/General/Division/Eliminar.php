<?php

namespace App\Livewire\General\Division;

use App\Models\Division;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Eliminar extends ModalComponent
{
    public $id;

    public function render()
    {
        return view('livewire.general.division.eliminar');
    }

    public function delete()
    {
        try {
            Division::find($this->id)->delete();
            $this->dispatch('actualizar_tabla_division');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'Se Elimino la division exitosamente');
        } catch (\Throwable $th) {
            $this->dispatch('error', mensaje: $th);
        }
    }
}
