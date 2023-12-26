<?php

namespace App\Livewire\General\Etapa;

use App\Models\Etapa;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Eliminar extends ModalComponent
{
    public $id;

    public function render()
    {
        return view('livewire.general.etapa.eliminar');
    }

    public function delete()
    {
        try {
            Etapa::find($this->id)->delete();
            $this->dispatch('actualizar_tabla_etapa');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'Se Elimino la etapa exitosamente');
        } catch (\Throwable $th) {
            $this->dispatch('error', mensaje: 'Error'. $th);
        }
    }
}
