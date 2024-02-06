<?php

namespace App\Livewire\General\SubrutaAcopio;

use App\Models\CalidadLeche;
use App\Models\RutaAcopio;
use App\Models\SubrutaAcopio;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Crear extends ModalComponent
{
        
    public $nombre;
    public $ruta_id;
    public $detalle;

    //valores para cargar selects
    public $rutas;
    public function mount()
    {
        $this->rutas = RutaAcopio::all();
        
    }

    public function render()
    {
        return view('livewire.general.subruta-acopio.crear');
    }
    
    public function save()
    {
        $this->validate([
          
            'nombre' => 'required',
            'ruta_id' => 'required',
            'detalle' => 'required',
           
        ]);
        try {

            SubrutaAcopio::create([
              
                'nombre' => $this->nombre,
                'ruta_acopio_id' => $this->ruta_id,
                'detalle' => $this->detalle,
            ]);

            $this->dispatch('actualizar_tabla_subruta_acopio');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'Ruta registrado exitosamente');
            
        } catch (\Throwable $th) {
            $this->closeModal();
           
            $this->dispatch('error', mensaje: 'Error'. $th);
        }
    }

    
}
