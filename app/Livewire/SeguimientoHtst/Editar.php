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
public $datos;





    public function mount()
    {

        $this->datos = SeguimientoHtst::findOrFail($this->id);
        $this->rt = $this->datos->rt;
        $this->col = $this->datos->col;
        $this->moho = $this->datos->moho;
        $this->observaciones = $this->datos->observaciones;
        $this->usuario_siembra = $this->datos->usuario_siembra;
    }



    public function rts()
    {

        try {
            $this->datos = SeguimientoHtst::find($this->id);
            // Verificación para todas las variables antes de asignarlas al modelo

            $this->datos->rt = $this->rt !== '' ? $this->rt : null;
            $this->datos->col = $this->col !== '' ? $this->col : null;

            $this->datos->observaciones = $this->observaciones !== '' ? $this->observaciones : null;
            $this->datos->usuario_dia2 = auth()->user()->id;
            $this->datos->save();

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
            $this->datos = SeguimientoHtst::find($this->id);
            // Verificación para todas las variables antes de asignarlas al modelo

            $this->datos->moho = $this->moho !== '' ? $this->moho : null;
            $this->datos->observaciones = $this->observaciones !== '' ? $this->observaciones : null;
            $this->datos->usuario_dia5 = auth()->user()->id;
            $this->datos->save();

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
