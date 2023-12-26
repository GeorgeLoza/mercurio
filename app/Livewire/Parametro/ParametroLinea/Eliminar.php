<?php

namespace App\Livewire\Parametro\ParametroLinea;

use App\Models\ParametroLinea;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Eliminar extends ModalComponent
{
    public $id;
    public function render()
    {
        return view('livewire.parametro.parametro-linea.eliminar');
    }
    public function delete()
    {
        try {
            ParametroLinea::find($this->id)->delete();
            $this->dispatch('actualizar_tabla_parametroLinea');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'Se Elimino el parametro exitosamente');
        } catch (\Throwable $th) {
            $this->dispatch('error', mensaje: 'Error'. $th);
        }
    }
}
