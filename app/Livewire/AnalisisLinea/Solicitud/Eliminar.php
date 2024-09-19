<?php

namespace App\Livewire\AnalisisLinea\Solicitud;

use Livewire\Component;
use App\Models\AnalisisLinea;
use LivewireUI\Modal\ModalComponent;
use App\Models\SolicitudAnalisisLinea;

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
            AnalisisLinea::where('solicitud_analisis_linea_id',$this->id)->delete();
            SolicitudAnalisisLinea::find($this->id)->delete();
            $this->dispatch('actualizar_tabla_solicitudAnalisisLineas');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'Se Elimino la solicitud exitosamente');
        } catch (\Throwable $th) {
            $this->dispatch('error_mensaje', mensaje: 'problema'.$th->getMessage());
        }
    }
}
