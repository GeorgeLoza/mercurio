<?php

namespace App\Livewire\Externo\Microbiologia;

use App\Models\DetalleSolicitudPlanta;
use App\Models\MicrobiologiaExterno;
use Livewire\Attributes\On;
use Livewire\Component;

class Tabla extends Component
{
    #[On('actualizar_tabla_microexterno')]
    public function render()
    {
        $microbiologia = MicrobiologiaExterno::orderBy('created_at', 'desc')->get();
        return view('livewire.externo.microbiologia.tabla', compact(['microbiologia']));
    }

    public function sembrar($id)
    {
        $microbiologia = MicrobiologiaExterno::find($id);
        $microbiologia->fecha_sembrado = now();
        $microbiologia->estado = "Sembrado";
        $microbiologia->ana_sem_id = auth()->user()->id;;
        $microbiologia->save();


        $detalle = DetalleSolicitudPlanta::where("id", $microbiologia->detalle_solicitud_planta_id)->first();
        $detalle->estado = "Analizando";
        $detalle->save();
    }
}
