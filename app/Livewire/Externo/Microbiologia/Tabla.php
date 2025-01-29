<?php

namespace App\Livewire\Externo\Microbiologia;

use App\Models\DetalleSolicitudPlanta;
use App\Models\MicrobiologiaExterno;
use Livewire\Attributes\On;
use Livewire\Component;

class Tabla extends Component
{
    public $fecha_sembrado;



    #[On('actualizar_tabla_microexterno')]
    public function render()
    {
        $microbiologia = MicrobiologiaExterno::orderBy('created_at', 'desc')->paginate(50);
        return view('livewire.externo.microbiologia.tabla', compact(['microbiologia']));
    }



    public function sembrar($id)
    {
        $this->validate([
            'fecha_sembrado' => 'required',

        ]);
        $microbiologia = MicrobiologiaExterno::find($id);

        // Verificar si el usuario seleccionó una fecha; si no, usar la fecha actual
        $microbiologia->fecha_sembrado = $this->fecha_sembrado ?? now();

        $microbiologia->estado = "Sembrado";
        $microbiologia->ana_sem_id = auth()->user()->id;
        $microbiologia->save();

        $detalle = DetalleSolicitudPlanta::where("id", $microbiologia->detalle_solicitud_planta_id)->first();
        $detalle->estado = "Analizando";
        $detalle->save();

        // Limpiar la fecha después de guardar
        $this->fecha_sembrado = null;
    }

    public function eliminar($id){
        $microbiologia = MicrobiologiaExterno::findOrFail($id);
        $microbiologia->delete();
    }


    public function dia2($id)
    {
        /*$this->validate([
            'aer_mes' => 'required',
            'col_tot' => 'required',
        ]);*/

        try {
            $microbiologia = MicrobiologiaExterno::find($id);
            // Verificación para todas las variables antes de asignarlas al modelo

            $microbiologia->aer_mes = 0;
            $microbiologia->col_tot = 0;


            if ($microbiologia->detalleSolicitudPlanta->tipoMuestra->id == 9) {
                $microbiologia->aer_mes = null;
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

            $this->dispatch('success', mensaje: 'Analisis realizado exitosamente.');
        } catch (\Throwable $th) {

            $this->dispatch('error_mensaje', mensaje: 'problema' . $th->getMessage());
        }
    }

    public function dia5($id)
    {
        /*
        $this->validate([
            'moh_lev' => 'required',
        ]);
*/
        try {
            $microbiologia = MicrobiologiaExterno::find($id);
            $microbiologia->moh_lev = 0;
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

            $this->dispatch('success', mensaje: 'Analisis realizado exitosamente.');
        } catch (\Throwable $th) {

            $this->dispatch('error_mensaje', mensaje: 'problema' . $th->getMessage());
        }
    }


}
