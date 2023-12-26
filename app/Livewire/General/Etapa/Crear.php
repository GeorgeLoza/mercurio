<?php

namespace App\Livewire\General\Etapa;

use App\Models\Etapa;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Crear extends ModalComponent
{
     
    public $nombre;
    public $abreviatura;
    public $descripcion;
  
    public function render()
    {
        return view('livewire.general.etapa.crear');
    }

    public function save()
    {
        $this->validate([
          
            'nombre' => 'required',
            'abreviatura' => 'required',
            'descripcion' => 'required',
         
           
        ]);
        try {

            Etapa::create([
              
                'nombre' => $this->nombre,
                'abreviatura' => $this->abreviatura,
                'descripcion' => $this->descripcion,
              
             
            ]);
            $this->dispatch('actualizar_tabla_etapa');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'etapa registrado exitosamente');
            
        } catch (\Throwable $th) {
            $this->closeModal();
           
            $this->dispatch('error', mensaje: 'Error'. $th);
        }
    }
    }
