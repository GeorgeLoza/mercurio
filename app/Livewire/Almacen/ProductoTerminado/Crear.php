<?php

namespace App\Livewire\Almacen\ProductoTerminado;

use App\Models\almacenProductoTerminado;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Crear extends ModalComponent
{
    
    //input
    public $codigo;
    public $nombre;
    public $alias;
 
    public function render()
    {
        return view('livewire.almacen.producto-terminado.crear');
    }
    public function save()
    {
        $this->validate([
            'codigo' => 'required',
            'nombre' => 'required',
            'alias' => 'required',
        ]);
        try {

            almacenProductoTerminado::create([
                'codigo' => $this->codigo,
                'nombre' => $this->nombre,
                'alias' => $this->alias,
            ]);
            $this->dispatch('actualizar_tabla_almacen_PT');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'Almacen registrado exitosamente');
        } catch (\Throwable $th) {
            $this->closeModal();
            $this->dispatch('error_mensaje', mensaje: 'Error'. $th);
        }
    }
}
