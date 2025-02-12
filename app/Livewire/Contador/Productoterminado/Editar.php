<?php

namespace App\Livewire\Contador\Productoterminado;

use App\Models\Orp;
use Livewire\Component;
use App\Models\Contador;
use LivewireUI\Modal\ModalComponent;
use App\Models\almacenProductoTerminado;

class Editar extends ModalComponent
{
    public $id;
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
        $contador = Contador::where('id', $this->id)->first();
        $this->orp_id = $contador->orp_id;
        $this->tipo = $contador->tipo;
        $this->almacen_id = $contador->almacen_producto_terminado_id;
        $this->cantidad = $contador->cantidad;
    }

    public function render()
    {

        return view('livewire.contador.productoterminado.editar');
    }
    public function update()
    {
        $this->validate([
            'orp_id' => 'required',
            'tipo' => 'required',
         //   'almacen_id' => 'required',
            'cantidad' => 'required',
        ]);
        try {

            $contador = Contador::find($this->id);
            $contador->tiempo =  now();
            $contador->cantidad =  $this->cantidad;
            $contador->tipo =  $this->tipo;
            $contador->observaciones =  $this->observaciones;
            $contador->almacen_producto_terminado_id =  1;
            $contador->orp_id =  $this->orp_id;
            $contador->user_id =  auth()->user()->id;
            $contador->save();

            $this->dispatch('actualizar_tabla_contador_productoTerminado');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'Conteo actualizado exitosamente');
        } catch (\Throwable $th) {
            $this->closeModal();
            $this->dispatch('error_mensaje', mensaje: 'problema'.$th->getMessage());
        }
    }
}
