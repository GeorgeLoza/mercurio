<?php

namespace App\Livewire\LecheCruda\Recepcion;

use App\Models\CalidadLeche;
use Livewire\Component;
use App\Models\RecepcionLeche;
use LivewireUI\Modal\ModalComponent;

class Eliminar extends ModalComponent
{
    public $id;

    public function render()
    {
        return view('livewire.leche-cruda.recepcion.eliminar');
    }
    public function delete()
    {
        try {
            CalidadLeche::where('recepcion_leche_id',$this->id)->delete();
            RecepcionLeche::find($this->id)->delete();
            $this->dispatch('actualizar_tabla_recepcionLeche');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'Se Elimino la recepcion de leche Exitosamente');
        } catch (\Throwable $th) {
            $this->dispatch('error_mensaje', mensaje: 'problema'.$th->getMessage());
        }
    }
}
