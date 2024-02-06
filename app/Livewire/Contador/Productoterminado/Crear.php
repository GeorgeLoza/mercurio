<?php

namespace App\Livewire\Contador\Productoterminado;

use App\Models\almacenProductoTerminado;
use App\Models\Contador;
use App\Models\Orp;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Crear extends ModalComponent
{
    //inputs
    public $orp_id;
    public $tipo;
    public $almacen_id;
    public $cantidad;
    public $observaciones;
    //valores para cargar selects
    public $orps;
    public $almacenes;

    public function mount()
    {
        $this->orps = Orp::where('estado', 'En proceso')->get();
        $this->almacenes = almacenProductoTerminado::all();
    }
    public function render()
    {
        return view('livewire.contador.productoterminado.crear');
    }
    public function save()
    {
        $this->validate([
            'orp_id' => 'required',
            'tipo' => 'required',
            'almacen_id' => 'required',
            'cantidad' => 'required',
        ]);
        try {

            Contador::create([
                'tiempo' => now(),
                'cantidad' => $this->cantidad,
                'tipo' => $this->tipo,
                'observaciones' => $this->observaciones,
                'almacen_producto_terminado_id' => $this->almacen_id,
                'orp_id' => $this->orp_id,
                'user_id' => auth()->user()->id

            ]);

            
            $this->dispatch('actualizar_tabla_contador_productoTerminado');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'Conteo registrado exitosamente');
        } catch (\Throwable $th) {
            $this->closeModal();
            $this->dispatch('error', mensaje: 'Error' . $th);
        }
    }
}
