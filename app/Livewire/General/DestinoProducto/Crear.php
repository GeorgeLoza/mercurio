<?php

namespace App\Livewire\General\DestinoProducto;

use App\Models\DestinoProducto;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Crear extends ModalComponent
{
      
    public $nombre;
    public $descripcion;
  
    public function render()
    {
        return view('livewire.general.destino-producto.crear');
    }

    public function save()
    {
        $this->validate([
          
            'nombre' => 'required',
            'descripcion' => 'required',
         
           
        ]);
        try {

            DestinoProducto::create([
              
                'nombre' => $this->nombre,
                'descripcion' => $this->descripcion,
              
             
            ]);
            $this->dispatch('actualizar_tabla_destino');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'Destino registrado exitosamente');
            
        } catch (\Throwable $th) {
            $this->closeModal();
           
            $this->dispatch('error_mensaje', mensaje: 'problema'.$th->getMessage());
        }
    }
    
}
