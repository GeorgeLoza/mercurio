<?php

namespace App\Livewire\DispositivoTemperatura;

use App\Models\DispositivoTemperatura;
use App\Models\DispositivosMedicion;
use LivewireUI\Modal\ModalComponent;

class Crear extends ModalComponent
{
    public $patron_1, $inst_1, $error_1;
    public $patron_2, $inst_2, $error_2;
    public $patron_3, $inst_3, $error_3;
    public $dispositivos_medicion_id;
    public $estado;
    public $observaciones;

    public $dispositivos = [];

    public function mount()
    {
        $this->dispositivos = DispositivosMedicion::where('dispositivo', 'Termómetro')->where('baja', '-')->get();
    }
    public function updated($property)
{
    if (in_array($property, ['patron_1', 'inst_1'])) {
        $this->error_1 = (is_numeric($this->patron_1) && is_numeric($this->inst_1))
            ? floatval($this->patron_1) - floatval($this->inst_1)
            : null;
    }
    if (in_array($property, ['patron_2', 'inst_2'])) {
        $this->error_2 = (is_numeric($this->patron_2) && is_numeric($this->inst_2))
            ? floatval($this->patron_2) - floatval($this->inst_2)
            : null;
    }
    if (in_array($property, ['patron_3', 'inst_3'])) {
        $this->error_3 = (is_numeric($this->patron_3) && is_numeric($this->inst_3))
            ? floatval($this->patron_3) - floatval($this->inst_3)
            : null;
    }
}

    protected function rules()
    {
        return [
            'dispositivos_medicion_id' => 'required',
            'patron_1' => 'nullable|numeric',
            'inst_1' => 'nullable|numeric',
            'error_1' => 'nullable|numeric',
            'patron_2' => 'nullable|numeric',
            'inst_2' => 'nullable|numeric',
            'error_2' => 'nullable|numeric',
            'patron_3' => 'nullable|numeric',
            'inst_3' => 'nullable|numeric',
            'error_3' => 'nullable|numeric',
            'estado' => 'required',
            'observaciones' => 'nullable|string',
        ];
    }

    public function guardar()
    {
        $this->validate();

        DispositivoTemperatura::create([
            'fecha_hora' => now(),
            'patron_1' => $this->patron_1,
            'inst_1' => $this->inst_1,
            'error_1' => $this->error_1,
            'patron_2' => $this->patron_2,
            'inst_2' => $this->inst_2,
            'error_2' => $this->error_2,
            'patron_3' => $this->patron_3,
            'inst_3' => $this->inst_3,
            'error_3' => $this->error_3,
            'dispositivos_medicion_id' => $this->dispositivos_medicion_id,
            'user_id' => auth()->id(),
            'estado' => $this->estado,
            'observaciones' => $this->observaciones,
        ]);

        $this->dispatch('actualizar_dispositivo_temperatura');
        $this->closeModal();
        $this->dispatch('success', 'Verificación de temperatura creada correctamente.');
    }

    public function render()
    {
        return view('livewire.dispositivo-temperatura.crear');
    }
}
