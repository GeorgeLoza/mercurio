<?php

namespace App\Livewire\Contador\Productoterminado;

use App\Models\Contador;
use App\Models\Orp;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Agregar extends ModalComponent
{
    public $id;
    public $tipo;
    public $orps;
    public $almacen_id;
    public $cantidad;
    public $observaciones;
    public $orp_id;

    public function mount()
    {




        $this->orps = Orp::find($this->id);

    }

    public function render()
    {
        return view('livewire.contador.productoterminado.agregar');
    }

    public function save()
    {
        $this->validate([
             'tipo' => 'required',
          //  'almacen_id' => 'required',
            'cantidad' => 'required',
        ]);
        try {

            Contador::create([
                'tiempo' => now(),
                'cantidad' => $this->cantidad,
                'tipo' => $this->tipo,
                'observaciones' => $this->observaciones,
                'almacen_producto_terminado_id' => 1,
                'orp_id' => $this->orps->id,
                'user_id' => auth()->user()->id

            ]);


            $this->dispatch('actualizar_tabla_contador_productoTerminado');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'Conteo registrado exitosamente');
        } catch (\Throwable $th) {
            $this->closeModal();
            $this->dispatch('error_mensaje', mensaje: 'problema' . $th->getMessage());
        }
    }
}
