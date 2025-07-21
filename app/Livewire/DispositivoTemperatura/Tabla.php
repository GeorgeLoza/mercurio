<?php

namespace App\Livewire\DispositivoTemperatura;

use App\Models\DispositivoTemperatura;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Tabla extends Component
{
    use WithPagination;

    public $f_fecha_hora = null;
    public $dispositivo = null;

    #[On('actualizar_dispositivo_temperatura')]
    public function render()
    {
        $temperaturas = DispositivoTemperatura::query()
            ->when($this->f_fecha_hora, function ($query) {
                return $query->where('fecha_hora', 'like', '%' . $this->f_fecha_hora . '%');
            })
            ->when($this->dispositivo, function ($query) {
                return $query->where('dispositivos_medicion_id', $this->dispositivo);
            })
            ->orderBy('fecha_hora', 'desc')
            ->paginate(15);

        return view('livewire.dispositivo-temperatura.tabla', [
            'temperaturas' => $temperaturas,
        ]);
    }
}