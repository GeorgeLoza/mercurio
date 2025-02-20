<?php

namespace App\Livewire\Externo\AguaFisico;

use App\Models\AguaFisico;
use App\Models\DetalleSolicitudPlanta;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Edit extends ModalComponent
{
    public $id;
    public $ph;
    public $dureza;
    public $cloruros;
    public $conductividad;

    public function mount()
    {
        $aguaFisico = AguaFisico::findOrFail($this->id);
        $this->ph = $aguaFisico->ph;
        $this->dureza = $aguaFisico->dureza;
        $this->cloruros = $aguaFisico->cloruros;
        $this->conductividad = $aguaFisico->conductividad;
    }

    public function render()
    {
        return view('livewire.externo.agua-fisico.edit');
    }

    public function update()
    {
        $this->validate([
            'ph' => 'required',
            'dureza' => 'required',
            'cloruros' => 'required',
            'conductividad' => 'required',
        ]);

        try {
            $aguaFisico = AguaFisico::find($this->id);
            $aguaFisico->ph = $this->ph;
            $aguaFisico->dureza = $this->dureza;
            $aguaFisico->cloruros = $this->cloruros;
            $aguaFisico->conductividad = $this->conductividad;
            $aguaFisico->estado = "Analizado";

            if (is_null($aguaFisico->tiempo)) {
                $aguaFisico->tiempo = now();
            }
            if (is_null($aguaFisico->user_id)) {
                $aguaFisico->user_id = auth()->user()->id;
            }
            $aguaFisico->save();

            $detalle = DetalleSolicitudPlanta::where("id", $aguaFisico->detalle_solicitud_planta_id)->first();
            $detalle->estado = "Analizado";
            $detalle->save();

            $this->dispatch('actualizar_tabla_aguaFisico');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'Analisis realizado exitosamente.');
        } catch (\Throwable $th) {
            $this->closeModal();
            $this->dispatch('error_mensaje', mensaje: 'problema' . $th->getMessage());
        }
    }
}
