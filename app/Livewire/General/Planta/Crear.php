<?php

namespace App\Livewire\General\Planta;

use App\Models\Planta;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Crear extends ModalComponent
{
    
    public $nombre;
    public $direccion;
    public $abreviatura;
   

    public function render()
    {
        return view('livewire.general.planta.crear');
    }
    
    public function save()
    {
        $this->validate([
          
            'nombre' => 'required',
            'direccion' => 'required',
            'abreviatura' => 'required',
           
        ]);
        try {

            Planta::create([
              
                'nombre' => $this->nombre,
                'direccion' => $this->direccion,
                'abreviatura' => $this->abreviatura,
             
            ]);
            $this->dispatch('actualizar_tabla_planta');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'planta registrado exitosamente');
            
        } catch (\Throwable $th) {
            $this->closeModal();
           
            $this->dispatch('error', mensaje: 'Error'. $th);
        }
    }
    
}
