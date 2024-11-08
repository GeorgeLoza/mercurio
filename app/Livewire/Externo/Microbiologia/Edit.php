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
    public $aer_mes2;
    public $col_tot2;
    public $moh_lev2;

    public $data;
    public function mount()
    {

        $microbiologia = MicrobiologiaExterno::findOrFail($this->id);
        $this->data = $microbiologia;
        $this->aer_mes = $microbiologia->aer_mes;
        $this->col_tot = $microbiologia->col_tot;
        $this->moh_lev = $microbiologia->moh_lev;
        $this->aer_mes2 = $microbiologia->aer_mes2;
        $this->col_tot2 = $microbiologia->col_tot2;
        $this->moh_lev2 = $microbiologia->moh_lev2;
    }
    public function render()
    {
        return view('livewire.externo.microbiologia.edit');
    }

    public function dia2()
    {
        /*$this->validate([
            'aer_mes' => 'required',
            'col_tot' => 'required',
        ]);*/

        try {
            $microbiologia = MicrobiologiaExterno::find($this->id);
            // Verificación para todas las variables antes de asignarlas al modelo
            $microbiologia->aer_mes = $this->aer_mes !== '' ? $this->aer_mes : null;
            $microbiologia->col_tot = $this->col_tot !== '' ? $this->col_tot : null;
            $microbiologia->aer_mes2 = $this->aer_mes2 !== '' ? $this->aer_mes2 : null;
            $microbiologia->col_tot2 = $this->col_tot2 !== '' ? $this->col_tot2 : null;
            if ($microbiologia->detalleSolicitudPlanta->tipoMuestra->id == 9) {
                $microbiologia->estado = "Analizado";

                $detalle = DetalleSolicitudPlanta::where("id", $microbiologia->detalle_solicitud_planta_id)->first();
                $detalle->estado = "Revision";
                $detalle->save();
            } else {
                $microbiologia->estado = "2 Dias";
            }

            if (is_null($microbiologia->fecha_dia2)) {
                $microbiologia->fecha_dia2 = now();
            }
            if (is_null($microbiologia->ana_dia2_id)) {
                $microbiologia->ana_dia2_id = auth()->user()->id;
            }
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
        /*
        $this->validate([
            'moh_lev' => 'required',
        ]);
*/
        try {
            $microbiologia = MicrobiologiaExterno::find($this->id);
            $microbiologia->moh_lev = $this->moh_lev !== '' ? $this->moh_lev : null;
            $microbiologia->moh_lev2 = $this->moh_lev2 !== '' ? $this->moh_lev2 : null;
            $microbiologia->estado = "Analizado";
            if (is_null($microbiologia->fecha_dia5)) {
                $microbiologia->fecha_dia5 = now();
            }
            if (is_null($microbiologia->ana_dia5_id)) {
                $microbiologia->ana_dia5_id = auth()->user()->id;
            }
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
