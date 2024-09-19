<?php

namespace App\Livewire\Parametro\ParametroLeche;

use App\Models\ParametroLeche;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Crear extends ModalComponent
{

    public $temperatura_max;
    public $temperatura_congelada_min;
    public $temperatura_congelada_max;
    public $ph_min;
    public $ph_max;
    public $acidez_min;
    public $acidez_max;
    public $brix_min;
    public $contenido_graso_min;
    public $densidad_min;
    public $densidad_max;
    


    public function render()
    {
        return view('livewire.parametro.parametro-leche.crear');
    }

    public function save()
    {
       
        try {
            ParametroLeche::create([
        
         
                'temperatura_max' => $this->temperatura_max, 
                'ph_min' => $this->ph_min,
                'ph_max' => $this->ph_max,
                'acidez_min' => $this->acidez_min,
                'acidez_max' => $this->acidez_max,
                'brix_min' => $this->brix_min,
                  'contenido_graso_min' => $this->contenido_graso_min,
                  'temperatura_congelada_min' => $this->temperatura_congelada_min,
                  'temperatura_congelada_max' => $this->temperatura_congelada_max,
                   'densidad_min' => $this->densidad_min,
                'densidad_max' => $this->densidad_max,
                
            

            ]);
            $this->dispatch('actualizar_tabla_parametroLeche');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'Parametro registrado exitosamente');
        } catch (\Throwable $th) {
            $this->closeModal();
            $this->dispatch('error_mensaje', mensaje: 'problema'.$th->getMessage());
        }
    }

}
