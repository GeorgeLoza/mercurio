<?php

namespace App\Livewire\EstadoPlanta;

use App\Models\EstadoDetalle;
use App\Models\EstadoPlanta;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Eliminar extends ModalComponent
{
    public $id;
    public function render()
    {
        return view('livewire.estado-planta.eliminar');
    }
    public function delete()
    {
        try {
            EstadoDetalle::where('estado_planta_id',$this->id)->delete();
            EstadoPlanta::find($this->id)->delete();
            $this->dispatch('actualizar_tabla_estado');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'Se Elimino el estado de planta exitosamente');
        } catch (\Throwable $th) {
            $this->dispatch('error_mensaje', mensaje: 'problema'.$th->getMessage());
        }
    }






}
