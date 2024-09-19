<?php

namespace App\Livewire\Parametro\ParametroLinea;

use App\Models\Etapa;
use Livewire\Component;
use App\Models\ParametroLinea;
use App\Models\Producto;
use LivewireUI\Modal\ModalComponent;

class Crear extends ModalComponent
{
    
    public $producto_id; 
    public $etapa_id;
    public $temperatura_min;
    public $temperatura_max;
    public $ph_min;
    public $ph_max;
    public $acidez_min;
    public $acidez_max;
    public $brix_min;
    public $brix_max;
    public $viscosidad_min;
    public $viscosidad_max;
    public $densidad_min;
    public $densidad_max;




    // para los selects 
    public $etapas;
    public $productos;
    public function mount()
    {
        $this->etapas = Etapa::all();
        $this->productos = Producto::all();
    }

    public function render()
    {
        return view('livewire.parametro.parametro-linea.crear');
    }

    public function save()
    {
        $this->validate([

            'producto_id' => 'required',
            'etapa_id' => 'required',
        ]);
        
        try {
            ParametroLinea::create([
                'producto_id' => $this->producto_id,
                'etapa_id' => $this->etapa_id,
                'temperatura_min' => $this->temperatura_min,
                'temperatura_max' => $this->temperatura_max,
                'ph_min' => $this->ph_min,
                'ph_max' => $this->ph_max,
                'acidez_min' => $this->acidez_min,
                'acidez_max' => $this->acidez_max,
                'brix_min' => $this->brix_min,
                 'brix_max' => $this->brix_max,
                  'viscosidad_min' => $this->viscosidad_min,
                  'viscosidad_max' => $this->viscosidad_max,
                   'densidad_min' => $this->densidad_min,
                'densidad_max' => $this->densidad_max,

            ]);
            $this->dispatch('actualizar_tabla_parametroLinea');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'Parametro registrado exitosamente');
        } catch (\Throwable $th) {
            $this->closeModal();
            $this->dispatch('error_mensaje', mensaje: 'problema'.$th->getMessage());
        }
    }
    
    
}
