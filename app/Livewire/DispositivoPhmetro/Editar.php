<?php

namespace App\Livewire\DispositivoPhmetro;

use App\Models\DispositivoPhmetro;
use App\Models\DispositivosMedicion;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Editar extends ModalComponent
{
    public $id;
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
        $phmetro = DispositivoPhmetro::find($this->id);
        if ($phmetro) {
            $this->verificacion_temperatura1 = $phmetro->verificacion_temperatura1;
            $this->verificacion_temperatura2 = $phmetro->verificacion_temperatura2;
            $this->verificacion_temperatura3 = $phmetro->verificacion_temperatura3;
            $this->verificacion_4 = $phmetro->verificacion_4;
            $this->verificacion_7 = $phmetro->verificacion_7;
            $this->verificacion_10 = $phmetro->verificacion_10;
            $this->requiere_ajuste = $phmetro->requiere_ajuste;
            $this->verificacion_ajuste_temperatura1 = $phmetro->verificacion_ajuste_temperatura1;
            $this->verificacion_ajuste_temperatura2 = $phmetro->verificacion_ajuste_temperatura2;
            $this->verificacion_ajuste_temperatura3 = $phmetro->verificacion_ajuste_temperatura3;
            $this->verificacion_ajuste_4 = $phmetro->verificacion_ajuste_4;
            $this->verificacion_ajuste_7 = $phmetro->verificacion_ajuste_7;
            $this->verificacion_ajuste_10 = $phmetro->verificacion_ajuste_10;
            $this->dispositivos_medicion_id = $phmetro->dispositivos_medicion_id;
            $this->estado = $phmetro->estado;
            $this->observaciones = $phmetro->observaciones;
        }
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
    public function actualizar()
    {
        $this->validate();

        $phmetro = DispositivoPhmetro::find($this->id);
        if ($phmetro) {
            $phmetro->update([
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
        }
        $this->dispatch('actualizar_dispositivo_phmetro');
        $this->dispatch('closeModal');
        session()->flash('message', 'Registro actualizado correctamente.');
    }
    public function render()
    {
        return view('livewire.dispositivo-phmetro.editar');
    }
}
