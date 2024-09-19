<?php

namespace App\Livewire\EstadoPlanta;

use App\Models\EstadoDetalle;
use App\Models\EstadoPlanta;
use App\Models\Orp;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Almacen extends ModalComponent
{
    public $id;
    public $orp_id;
    public $cantidad; 
    public $estadoPlantaActual;

    public function mount()
    {
        $this->estadoPlantaActual = EstadoPlanta::find($this->id);
    }
    public function render()
    {
        return view('livewire.estado-planta.almacen');
    }

    public function save(){
        $this->validate([
            'orp_id' => 'required',
            'cantidad' => 'required'
        ]);

        try {
            $estadoPlanta = EstadoPlanta::create([
                'tiempo' => now(),
                'user_id' => auth()->user()->id,
                'origen_id' => $this->estadoPlantaActual->origen_id,
                'proceso' => "Almacen",
            ]);

            EstadoDetalle::create([
                'orp_id' => $this->orp_id,
                'preparacion' => 0,
                'estado_planta_id' => $estadoPlanta->id,
                'user_id' => auth()->user()->id,
                'cantidad' => $this->cantidad,
            ]);

            $this->closeModal();
                $this->dispatch('actualizar_dashboardPlanta');
                $this->dispatch('success', mensaje: 'Estado registrado exitosamente');
        } catch (\Throwable $th) {
            $this->dispatch('error_mensaje', mensaje: 'problema'.$th->getMessage());
        }
    }
}
