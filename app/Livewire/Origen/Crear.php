<?php

namespace App\Livewire\Origen;

use App\Models\Origen;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Crear extends ModalComponent
{
    public $alias; 
    public $descripcion;
    public $codigo_maquina;
   

    public function render()
    {
        return view('livewire.origen.crear');
    }


    public function save()
    {
        $this->validate([

            'alias' => 'required',
            'descripcion' => 'required',
            'codigo_maquina' => 'required',
           

        ]);
        
        try {

            Origen::create([

                'alias' => $this->alias,
                'descripcion' => $this->descripcion,
                'codigo_maquina' => $this->codigo_maquina,
                


            ]);
            $this->dispatch('actualizar_tabla_origen');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'origen registrado exitosamente');
        } catch (\Throwable $th) {
            $this->closeModal();

            $this->dispatch('error',  mensaje: 'Error: '.$th);
        }
    }
    
}
