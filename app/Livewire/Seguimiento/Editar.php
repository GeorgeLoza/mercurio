<?php

namespace App\Livewire\Seguimiento;

use App\Models\Seguimiento;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Editar extends ModalComponent
{



    public $id;
    public $id2;
    public $rt;
    public $moho;
    public $observaciones_micro;
    public $usuario_rt;






    public function mount()
    {

        $datos = Seguimiento::findOrFail($this->id);
        $this->rt = $datos->rt;
        $this->moho = $datos->moho;
        $this->observaciones_micro = $datos->observaciones_micro;
        $this->usuario_rt = $datos->usuario_rt;
    }



    public function rts()
    {

        try {
            $datos = Seguimiento::find($this->id);
            // Verificación para todas las variables antes de asignarlas al modelo

            $datos->rt = $this->rt !== '' ? $this->rt : null;
            $datos->observaciones_micro = $this->observaciones_micro !== '' ? $this->observaciones_micro : null;
            $datos->usuario_rt = auth()->user()->id;
            $datos->save();

            $this->dispatch('actualizar_tabla_seguimiento');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'Analisis realizado exitosamente.');


        } catch (\Throwable $th) {
            $this->closeModal();
            $this->dispatch('error_mensaje', mensaje: 'problema' . $th->getMessage());
        }
    }
    public function mohos()
    {

        try {
            $datos = Seguimiento::find($this->id);
            // Verificación para todas las variables antes de asignarlas al modelo

            $datos->moho = $this->moho !== '' ? $this->moho : null;
            $datos->observaciones_micro = $this->observaciones_micro !== '' ? $this->observaciones_micro : null;
            $datos->usuario_moho = auth()->user()->id;
            $datos->save();

            $this->dispatch('actualizar_tabla_seguimiento');

            $this->closeModal();

            $this->dispatch('success', mensaje: 'Analisis realizado exitosamente.');
        } catch (\Throwable $th) {
            $this->closeModal();
            $this->dispatch('error_mensaje', mensaje: 'problema' . $th->getMessage());
        }
    }



    public function render()
    {




        return view('livewire.seguimiento.editar');
    }
}
