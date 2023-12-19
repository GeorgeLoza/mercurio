<?php

namespace App\Livewire\AnalisisLinea\Solicitud;

use App\Models\SolicitudAnalisisLinea;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Eliminar extends ModalComponent
{
    public $id;
    public function render()
    {
        return view('livewire.analisis-linea.solicitud.eliminar');
    }
    public function delete()
    {
        try {
            SolicitudAnalisisLinea::find($this->id)->delete();
            $this->dispatch('actualizar_tabla_solicitudAnalisisLineas');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'Se Elimino la solicitud exitosamente');
        } catch (\Throwable $th) {
            $this->dispatch('error', mensaje: 'Error: ' . $th);
        }
    }
}
