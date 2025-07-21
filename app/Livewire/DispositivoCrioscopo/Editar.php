<?php

namespace App\Livewire\DispositivoCrioscopo;

use App\Models\DispositivoCrioscopo;
use App\Models\DispositivosMedicion;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Editar extends ModalComponent
{
    public $id;
    public $punto_ajuste_a = false;
    public $punto_ajuste_b = false;
    public $dispositivos_medicion_id;
    public $estado;
    public $observaciones;

    public $dispositivos = [];

    public function mount($id)
    {
        $registro = DispositivoCrioscopo::findOrFail($id);
        $this->dispositivos_medicion_id = $registro->dispositivos_medicion_id;
        $this->punto_ajuste_a = (bool) $registro->punto_ajuste_a;
        $this->punto_ajuste_b = (bool) $registro->punto_ajuste_b;
        $this->estado = $registro->estado;
        $this->observaciones = $registro->observaciones;
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

    public function actualizar()
    {
        $this->validate();

        try {
            $crioscopo = DispositivoCrioscopo::findOrFail($this->id);

            $crioscopo->update([
                'punto_ajuste_a' => $this->punto_ajuste_a,
                'punto_ajuste_b' => $this->punto_ajuste_b,
                'estado' => $this->estado,
                'observaciones' => $this->observaciones,
                'dispositivos_medicion_id' => $this->dispositivos_medicion_id,
            ]);

            $this->dispatch('actualizar_dispositivo_crioscopo');
            $this->closeModal();
            $this->dispatch('success', 'Verificación de dispositivo actualizada correctamente.');
        } catch (\Throwable $th) {
            dd($th);
        }
    }
    public function render()
    {
        return view('livewire.dispositivo-crioscopo.editar');
    }
}
