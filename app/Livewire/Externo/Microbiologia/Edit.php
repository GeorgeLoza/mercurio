<?php

namespace App\Livewire\Externo\Microbiologia;

use App\Models\DetalleSolicitudPlanta;
use App\Models\MicrobiologiaExterno;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Edit extends ModalComponent
{
    public $id;


    public $aer_mes;
    public $col_tot;
    public $moh_lev;

    public function mount()
    {
        $microbiologia = MicrobiologiaExterno::findOrFail($this->id);
        $this->aer_mes = $microbiologia->aer_mes;
        $this->col_tot = $microbiologia->col_tot;
        $this->moh_lev = $microbiologia->moh_lev;
    }
    public function render()
    {
        return view('livewire.externo.microbiologia.edit');
    }

    public function dia2()
    {
        $this->validate([
            'aer_mes' => 'required',
            'col_tot' => 'required',
        ]);

        try {
            $microbiologia = MicrobiologiaExterno::find($this->id);
            $microbiologia->aer_mes = $this->aer_mes;
            $microbiologia->col_tot = $this->col_tot;
            $microbiologia->estado = "2 Dias";
            $microbiologia->fecha_dia2 = now();
            $microbiologia->ana_dia2_id = auth()->user()->id;
            $microbiologia->save();

            

            $this->dispatch('actualizar_tabla_microexterno');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'Analisis realizado exitosamente.');
        } catch (\Throwable $th) {
            $this->closeModal();
            $this->dispatch('error_mensaje', mensaje: 'problema' . $th->getMessage());
        }
    }

    public function dia5()
    {
        $this->validate([
            'moh_lev' => 'required',
        ]);

        try {
            $microbiologia = MicrobiologiaExterno::find($this->id);
            $microbiologia->moh_lev = $this->moh_lev;
            $microbiologia->estado = "Analizado";
            $microbiologia->fecha_dia5 = now();
            $microbiologia->ana_dia5_id = auth()->user()->id;
            $microbiologia->save();

            $detalle = DetalleSolicitudPlanta::where("id", $microbiologia->detalle_solicitud_planta_id)->first();
            $detalle->estado = "Revision";
            $detalle->save();

            $this->dispatch('actualizar_tabla_microexterno');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'Analisis realizado exitosamente.');
        } catch (\Throwable $th) {
            $this->closeModal();
            $this->dispatch('error_mensaje', mensaje: 'problema' . $th->getMessage());
        }
    }
}
