<?php

namespace App\Livewire\General\RutaAcopio;

use App\Models\RutaAcopio;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Crear extends ModalComponent
{
    
    public $nombre;
    public $detalle;

    public function render()
    {
        return view('livewire.general.ruta-acopio.crear');
    }
    
    public function save()
    {
        $this->validate([
          
            'nombre' => 'required',
            'detalle' => 'required',
           
        ]);
        try {

            RutaAcopio::create([
              
                'nombre' => $this->nombre,
                'detalle' => $this->detalle,
            ]);
            $this->dispatch('actualizar_tabla_ruta_acopio');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'Ruta registrado exitosamente');
            
        } catch (\Throwable $th) {
            $this->closeModal();
           
            $this->dispatch('error', mensaje: 'Error'. $th);
        }
    }
}
