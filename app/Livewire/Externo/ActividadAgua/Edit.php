<?php

namespace App\Livewire\Externo\ActividadAgua;


use App\Models\ActividadAgua;
use App\Models\DetalleSolicitudPlanta;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Edit extends ModalComponent
{
    public $id;
    public $temperatura;
    public $por_hum_rel;
    public $act_agua;

    public function mount()
    {
        $actividadAgua = ActividadAgua::findOrFail($this->id);
        $this->temperatura = $actividadAgua->temperatura;
        $this->por_hum_rel = $actividadAgua->por_hum_rel;
        $this->act_agua = $actividadAgua->act_agua;
    }
    public function render()
    {
        return view('livewire.externo.actividad-agua.edit');
    }

    public function update()
    {
        $this->validate([
            'temperatura' => 'required',
            'por_hum_rel' => 'required',
            'act_agua' => 'required',
        ]);

        try {
            $actividadAgua = ActividadAgua::find($this->id);
            $actividadAgua->temperatura = $this->temperatura;
            $actividadAgua->por_hum_rel = $this->por_hum_rel;
            $actividadAgua->act_agua = $this->act_agua;
            $actividadAgua->estado = "Analizado";
            if (is_null($actividadAgua->tiempo)) {
                $actividadAgua->tiempo = now();
            }
            if (is_null($actividadAgua->user_id)) {
                $actividadAgua->user_id = auth()->user()->id;
            }
            $actividadAgua->save();

            $detalle = DetalleSolicitudPlanta::where("id", $actividadAgua->detalle_solicitud_planta_id)->first();
            $detalle->estado = "Analizado";
            $detalle->save();

            $this->dispatch('actualizar_tabla_ActividadAgua');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'Analisis realizado exitosamente.');
        } catch (\Throwable $th) {
            $this->closeModal();
            $this->dispatch('error_mensaje', mensaje: 'problema' . $th->getMessage());
        }
    }
}
