<?php

namespace App\Livewire\General\Division;

use App\Models\Division;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Crear extends ModalComponent
{
    public $nombre;
    public $descripcion;
 

    public function render()
    {
        return view('livewire.general.division.crear');
    }

    public function save()
    {
        $this->validate([
            
            'nombre' => 'required',
            'descripcion' => 'required'

           
        ]);
        try {

            Division::create([
               
                'nombre' => $this->nombre,
                'descripcion' => $this->descripcion,
             
            ]);
            $this->dispatch('actualizar_tabla_division');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'Division registrado exitosamente');
            
        } catch (\Throwable $th) {
            $this->closeModal();
            $this->dispatch('error', mensaje: 'Error'. $th);
        }
    }

    
}
