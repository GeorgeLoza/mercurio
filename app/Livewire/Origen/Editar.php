<?php

namespace App\Livewire\Origen;

use App\Models\Origen;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Editar extends ModalComponent
{
    public $id;

    public $alias;
    public $descripcion;
    public $codigo_maquina;
   
    public function mount()
    {
        $origen = Origen::where('id', $this->id)->first();
        $this->alias = $origen->alias;
        $this->descripcion = $origen->descripcion;
        $this->codigo_maquina = $origen->codigo_maquina;        
    }

    public function render()
    {
        return view('livewire.origen.editar');
    }

    public function update()
    {

        $this->validate([
            'alias' => 'required',
            'descripcion' => 'required',
            'codigo_maquina' => 'required',
        ]);
        try {

            $origen = Origen::find($this->id);
            $origen->alias = $this->alias;
            $origen->descripcion = $this->descripcion;
            $origen->codigo_maquina = $this->codigo_maquina;
            $origen->save();

            $this->dispatch('actualizar_tabla_origen');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'Se actualizo la origen exitosamente');
        } catch (\Throwable $th) {
            $this->closeModal();

            $this->dispatch('error', mensaje: 'Error: '.$th);
        }
    }
    
}
