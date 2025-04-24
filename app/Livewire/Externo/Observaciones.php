<?php

namespace App\Livewire\Externo;

use App\Models\DetalleSolicitudPlanta;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Observaciones extends ModalComponent
{
    public $observaciones;
    public $id;

    public function mount($id)
    {
        $this->id = $id;
        $detalle = DetalleSolicitudPlanta::find($this->id);
        $this->observaciones = $detalle->observaciones;
    }
    public function render()
    {


        $detalle = DetalleSolicitudPlanta::find($this->id);

        return view('livewire.externo.observaciones');
    }

    public function guardarObservaciones()
    {
        $this->validate([
            'observaciones' => 'required',
        ]);

        $detalle = DetalleSolicitudPlanta::find($this->id);
        $detalle->observaciones = $this->observaciones;
        $detalle->estado = "Observado";
        $detalle->save();
        $this->dispatch('actualizar_tabla_solicitudes');

        $this->closeModal();
        $this->dispatch('success', mensaje: 'Observacion realizada exitosamente.');
    }
}
