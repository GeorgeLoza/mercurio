<?php

namespace App\Livewire\Parametro\ParametroLeche;

use App\Models\ParametroLeche;
use App\Models\ParametroLinea;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
class Eliminar extends ModalComponent
{
    public $id;
    public function render()
    {
        return view('livewire.parametro.parametro-leche.eliminar');
    }
    public function delete()
    {
        
        try {
            ParametroLeche::find($this->id)->delete();
            $this->dispatch('actualizar_tabla_parametroLeche');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'Se Elimino el parametro exitosamente');
        } catch (\Throwable $th) {
            $this->dispatch('error_mensaje', mensaje: 'Error'. $th);
        }
    }
}
