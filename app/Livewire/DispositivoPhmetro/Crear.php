<?php

namespace App\Livewire\DispositivoPhmetro;

use App\Models\DispositivoPhmetro;
use App\Models\DispositivosMedicion;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Crear extends ModalComponent
{
    
    public $verificacion_temperatura1;
    public $verificacion_temperatura2;
    public $verificacion_temperatura3;
    public $verificacion_4;
    public $verificacion_7;
    public $verificacion_10;
    public $requiere_ajuste;
    public $verificacion_ajuste_temperatura1;
    public $verificacion_ajuste_temperatura2;
    public $verificacion_ajuste_temperatura3;
    public $verificacion_ajuste_4;
    public $verificacion_ajuste_7;
    public $verificacion_ajuste_10;
    public $dispositivos_medicion_id;
    public $estado;
    public $observaciones;

    public $dispositivos = [];

    public function mount()
    {
        $this->dispositivos = DispositivosMedicion::where('dispositivo', 'pH metro')->where('baja', '-')->get();
    }

    protected function rules()
    {
        return [
            'dispositivos_medicion_id' => 'required',
            'verificacion_temperatura1' => 'nullable|numeric',
            'verificacion_temperatura2' => 'nullable|numeric',
            'verificacion_temperatura3' => 'nullable|numeric',
            'verificacion_4' => 'nullable|numeric',
            'verificacion_7' => 'nullable|numeric',
            'verificacion_10' => 'nullable|numeric',
            'requiere_ajuste' => 'boolean',
            'verificacion_ajuste_temperatura1' => 'nullable|numeric',
            'verificacion_ajuste_temperatura2' => 'nullable|numeric',
            'verificacion_ajuste_temperatura3' => 'nullable|numeric',
            'verificacion_ajuste_4' => 'nullable|numeric',
            'verificacion_ajuste_7' => 'nullable|numeric',
            'verificacion_ajuste_10' => 'nullable|numeric',
            'estado' => 'required',
            'observaciones' => 'nullable|string',
        ];
    }
    public function guardar()
    {
        $this->validate();

        DispositivoPhmetro::create([
            'fecha_hora' => now(),
            'verificacion_temperatura1' => $this->verificacion_temperatura1,
            'verificacion_temperatura2' => $this->verificacion_temperatura2,
            'verificacion_temperatura3' => $this->verificacion_temperatura3,
            'verificacion_4' => $this->verificacion_4,
            'verificacion_7' => $this->verificacion_7,
            'verificacion_10' => $this->verificacion_10,
            'requiere_ajuste' => $this->requiere_ajuste,
            'verificacion_ajuste_temperatura1' => $this->verificacion_ajuste_temperatura1,
            'verificacion_ajuste_temperatura2' => $this->verificacion_ajuste_temperatura2,
            'verificacion_ajuste_temperatura3' => $this->verificacion_ajuste_temperatura3,
            'verificacion_ajuste_4' => $this->verificacion_ajuste_4,
            'verificacion_ajuste_7' => $this->verificacion_ajuste_7,
            'verificacion_ajuste_10' => $this->verificacion_ajuste_10,
            'dispositivos_medicion_id' => $this->dispositivos_medicion_id,
            'user_id' => auth()->id(),
            'estado' => $this->estado,
            'observaciones' => $this->observaciones,
        ]);

        $this->dispatch('actualizar_dispositivo_phmetro');
        $this->closeModal();
        $this->dispatch('success', 'Verificación de dispositivo creada correctamente.');
    }

    public function render()
    {
        return view('livewire.dispositivo-phmetro.crear');
    }
}
