<?php

namespace App\Livewire\DispositivoCrioscopo;

use App\Models\DispositivoCrioscopo;
use App\Models\DispositivosMedicion;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Crear extends ModalComponent
{
    public $punto_ajuste_a = false;
    public $punto_ajuste_b = false;
    public $dispositivos_medicion_id;
    public $estado;
    public $observaciones;

    public $dispositivos = [];

    public function mount()
    {
        $this->dispositivos = DispositivosMedicion::where('dispositivo', 'Crioscopo')->where('baja', '-')->get();
    }

    protected function rules()
    {
        return [
            'dispositivos_medicion_id' => 'required',
            'punto_ajuste_a' => 'boolean',
            'punto_ajuste_b' => 'boolean',
            'estado' => 'required',
            'observaciones' => 'nullable|string',
        ];
    }
    public function guardar()
    {

        $this->validate();
        try {
            DispositivoCrioscopo::create([
                'fecha_hora' => now(),
                'punto_ajuste_a' => $this->punto_ajuste_a,
                'punto_ajuste_b' => $this->punto_ajuste_b,
                'estado' => $this->estado,
                'observaciones' => $this->observaciones,
                'dispositivos_medicion_id' => $this->dispositivos_medicion_id,
                'user_id' => auth()->id(),
            ]);

            $this->dispatch('actualizar_dispositivo_crioscopo');
            $this->closeModal();
            $this->dispatch('success', 'Verificación de dispositivo creada correctamente.');
        } catch (\Throwable $th) {
            dd($th);
        }
    }
    public function render()
    {
        return view('livewire.dispositivo-crioscopo.crear');
    }
}
