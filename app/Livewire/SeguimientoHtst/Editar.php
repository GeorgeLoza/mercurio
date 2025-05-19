<?php

namespace App\Livewire\SeguimientoHtst;

use App\Models\SeguimientoHtst;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Editar extends ModalComponent
{




    public $id;
    public $id2;
    public $rt;
    public $col;
    public $moho;
    public $observaciones;
    public $usuario_siembra;






    public function mount()
    {

        $datos = SeguimientoHtst::findOrFail($this->id);
        $this->rt = $datos->rt;
        $this->col = $datos->col;
        $this->moho = $datos->moho;
        $this->observaciones = $datos->observaciones;
        $this->usuario_siembra = $datos->usuario_siembra;
    }



    public function rts()
    {

        try {
            $datos = SeguimientoHtst::find($this->id);
            // Verificación para todas las variables antes de asignarlas al modelo

            $datos->rt = $this->rt !== '' ? $this->rt : null;
            $datos->col = $this->col !== '' ? $this->col : null;

            $datos->observaciones = $this->observaciones !== '' ? $this->observaciones : null;
            $datos->usuario_dia2 = auth()->user()->id;
            $datos->save();

            $this->dispatch('actualizar_tabla_seguimiento_htst');
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
            $datos = SeguimientoHtst::find($this->id);
            // Verificación para todas las variables antes de asignarlas al modelo

            $datos->moho = $this->moho !== '' ? $this->moho : null;
            $datos->observaciones = $this->observaciones !== '' ? $this->observaciones : null;
            $datos->usuario_dia5 = auth()->user()->id;
            $datos->save();

            $this->dispatch('actualizar_tabla_seguimiento_htst');

            $this->closeModal();

            $this->dispatch('success', mensaje: 'Analisis realizado exitosamente.');
        } catch (\Throwable $th) {
            $this->closeModal();
            $this->dispatch('error_mensaje', mensaje: 'problema' . $th->getMessage());
        }
    }


    public function render()
    {
        return view('livewire.seguimiento-htst.editar');
    }
}
