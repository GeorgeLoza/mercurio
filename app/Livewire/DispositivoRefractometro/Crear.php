<?php

namespace App\Livewire\DispositivoRefractometro;

use App\Models\DispositivoRefractometro;
use App\Models\DispositivosMedicion;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Crear extends ModalComponent
{

    public $verificacion_temperatura = null;
    public $verificacion_concentracion_0 = null;
    public $verificacion_concentracion_25 = null;
    public $requiere_ajuste = null;
    public $verificacion_ajuste_temperatura = null;
    public $verificacion_ajuste_concentracion_0 = null;
    public $verificacion_ajuste_concentracion_25 = null;
    public $dispositivos_medicion_id = null;
    public $estado = null;
    public $observaciones = null;
    
    public $dispositivos = [];

    public function mount()
    {
        $this->dispositivos = DispositivosMedicion::where('dispositivo', 'Refractometro')->where('baja', '-')->get();
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
    public function guardar()
    {
        $this->validate();

        DispositivoRefractometro::create([
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

        $this->dispatch('actualizar_dispositivo_refractometro');
        $this->closeModal();
        $this->dispatch('success', 'Verificación de dispositivo creada correctamente.');
    }
    public function render()
    {
        return view('livewire.dispositivo-refractometro.crear');
    }
}
