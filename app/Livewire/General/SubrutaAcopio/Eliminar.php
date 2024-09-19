<?php

namespace App\Livewire\General\SubrutaAcopio;

use App\Models\SubrutaAcopio;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Eliminar extends ModalComponent
{
    public $id;
    public function render()
    {
        return view('livewire.general.subruta-acopio.eliminar');
    }
    public function delete()
    {
        try {
            SubrutaAcopio::find($this->id)->delete();
            $this->dispatch('actualizar_tabla_subruta_acopio');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'Se Elimino el producto exitosamente');
        } catch (\Throwable $th) {
            $this->closeModal();
            $this->dispatch('error_mensaje', mensaje: 'problema'.$th->getMessage());
        }
    }
}
