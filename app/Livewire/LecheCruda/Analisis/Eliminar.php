<?php

namespace App\Livewire\LecheCruda\Analisis;

use LivewireUI\Modal\ModalComponent;
use App\Models\RecepcionLeche;
use Livewire\Component;

class Eliminar extends ModalComponent
{
    public function render()
    {
        return view('livewire.leche-cruda.analisis.eliminar');
    }

    public function delete()
    {
        try {
            RecepcionLeche::find($this->id)->delete();
            $this->dispatch('actualizar_tabla_origen');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'Se Elimino el origen exitosamente');
        } catch (\Throwable $th) {
            $this->dispatch('error_mensaje', mensaje: 'problema'.$th->getMessage());
        }
    }
}
