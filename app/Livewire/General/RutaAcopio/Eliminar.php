<?php

namespace App\Livewire\General\RutaAcopio;

use App\Models\RutaAcopio;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Eliminar extends ModalComponent
{
    public $id;
    public function render()
    {
        return view('livewire.general.ruta-acopio.eliminar');
    }
    public function delete()
    {
        try {
            RutaAcopio::find($this->id)->delete();
            $this->dispatch('actualizar_tabla_ruta_acopio');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'Se Elimino el producto exitosamente');
        } catch (\Throwable $th) {
            $this->dispatch('error_mensaje', mensaje: 'problema'.$th->getMessage());
        }
    }
}
