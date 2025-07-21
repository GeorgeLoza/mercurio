<?php

namespace App\Livewire\DispositivoRefractometro;

use App\Models\DispositivoRefractometro;
use App\Models\DispositivosMedicion;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Editar extends ModalComponent
{
    public $id;
    public $verificacion_temperatura;
    public $verificacion_concentracion_0;
    public $verificacion_concentracion_25;
    public $requiere_ajuste;
    public $verificacion_ajuste_temperatura;
    public $verificacion_ajuste_concentracion_0;
    public $verificacion_ajuste_concentracion_25;
    public $dispositivos_medicion_id;
    public $estado;
    public $observaciones;
    public $dispositivos = [];

    public function mount()
    {
        $this->dispositivos = DispositivosMedicion::where('dispositivo', 'Refractometro')->where('baja', '-')->get();
        $refractometro = DispositivoRefractometro::find($this->id);
        if ($refractometro) {
            $this->verificacion_temperatura = $refractometro->verificacion_temperatura;
            $this->verificacion_concentracion_0 = $refractometro->verificacion_concentracion_0;
            $this->verificacion_concentracion_25 = $refractometro->verificacion_concentracion_25;
            $this->requiere_ajuste = $refractometro->requiere_ajuste;
            $this->verificacion_ajuste_temperatura = $refractometro->verificacion_ajuste_temperatura;
            $this->verificacion_ajuste_concentracion_0 = $refractometro->verificacion_ajuste_concentracion_0;
            $this->verificacion_ajuste_concentracion_25 = $refractometro->verificacion_ajuste_concentracion_25;
            $this->dispositivos_medicion_id = $refractometro->dispositivos_medicion_id;
            $this->estado = $refractometro->estado;
            $this->observaciones = $refractometro->observaciones;
        }
    }

    protected function rules()
    {
        return [
            'dispositivos_medicion_id' => 'required',
            'verificacion_temperatura' => 'nullable|numeric',
            'verificacion_concentracion_0' => 'nullable|numeric',
            'verificacion_concentracion_25' => 'nullable|numeric',
            'requiere_ajuste' => 'boolean',
            'verificacion_ajuste_temperatura' => 'nullable|numeric',
            'verificacion_ajuste_concentracion_0' => 'nullable|numeric',
            'verificacion_ajuste_concentracion_25' => 'nullable|numeric',
            'estado' => 'required',
            'observaciones' => 'nullable|string',
        ];
    }
    
    public function actualizar()
    {
        $this->validate();

        $refractometro = DispositivoRefractometro::find($this->id);
        if ($refractometro) {
            $refractometro->update([
                'fecha_hora' => now(),
                'verificacion_temperatura' => $this->verificacion_temperatura,
                'verificacion_concentracion_0' => $this->verificacion_concentracion_0,
                'verificacion_concentracion_25' => $this->verificacion_concentracion_25,
                'requiere_ajuste' => $this->requiere_ajuste,
                'verificacion_ajuste_temperatura' => $this->verificacion_ajuste_temperatura,
                'verificacion_ajuste_concentracion_0' => $this->verificacion_ajuste_concentracion_0,
                'verificacion_ajuste_concentracion_25' => $this->verificacion_ajuste_concentracion_25,
                'dispositivos_medicion_id' => $this->dispositivos_medicion_id,
                'user_id' => auth()->id(),
                'estado' => $this->estado,
                'observaciones' => $this->observaciones,
            ]);
        }

        $this->dispatch('actualizar_dispositivo_refractometro');
        $this->closeModal();
        $this->dispatch('success', 'Verificación de dispositivo actualizada correctamente.');
    }
    public function render()
    {
        return view('livewire.dispositivo-refractometro.editar');
    }
}
