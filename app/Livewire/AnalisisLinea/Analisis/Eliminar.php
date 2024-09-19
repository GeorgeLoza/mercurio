<?php

namespace App\Livewire\AnalisisLinea\Analisis;

use Livewire\Component;
use App\Models\AnalisisLinea;
use LivewireUI\Modal\ModalComponent;

class Eliminar extends ModalComponent
{
    public $id;
    public function render()
    {
        return view('livewire.analisis-linea.analisis.eliminar');
    }
    public function delete()
    {
        try {
            AnalisisLinea::find($this->id)->delete();
            $this->dispatch('actualizar_tabla_analisisLineas');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'Se Elimino el Analiis  Exitosamente');
        } catch (\Throwable $th) {
            $this->dispatch('error_mensaje', mensaje: 'problema'.$th->getMessage());
        }
    }
}
