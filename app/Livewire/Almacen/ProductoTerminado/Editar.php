<?php

namespace App\Livewire\Almacen\ProductoTerminado;

use App\Models\almacenProductoTerminado;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Editar extends ModalComponent
{
    public $id;
    public $almacen;
    //input
    public $codigo;
    public $nombre;
    public $alias;

    public function mount()
    {
        
        $almacen = almacenProductoTerminado::where('id', $this->id)->first();
        $this->codigo = $almacen->codigo;
        $this->nombre = $almacen->nombre;
        $this->alias = $almacen->alias;
    }

    public function render()
    {
        return view('livewire.almacen.producto-terminado.editar');
    }

    public function update()
    {

        $this->validate([
            'codigo' => 'required',
            'nombre' => 'required',
            'alias' => 'required',
        ]);
        try {

            $almacen = almacenProductoTerminado::find($this->id);
            $almacen->codigo = $this->codigo;
            $almacen->nombre = $this->nombre;
            $almacen->alias = $this->alias;
            $almacen->save();
            
            $this->dispatch('actualizar_tabla_almacen_PT');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'Se actualizo el almacen exitosamente');
        } catch (\Throwable $th) {
            $this->closeModal();
            
            $this->dispatch('error', mensaje: 'problema'.$th->getMessage());
        }
    }

}
