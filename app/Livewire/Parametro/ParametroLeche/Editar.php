<?php

namespace App\Livewire\Parametro\ParametroLeche;

use App\Models\ParametroLeche;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Editar extends ModalComponent
{
    public $id;

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
   

    public function mount()
    {
       

        $parametroLeche = ParametroLeche::where('id', $this->id)->first();
      
        $this->temperatura_max = $parametroLeche->temperatura_max;
        $this->temperatura_congelada_min = $parametroLeche->temperatura_congelada_min;
        $this->temperatura_congelada_max = $parametroLeche->temperatura_congelada_max;
        $this->ph_min = $parametroLeche->ph_min;
        $this->ph_max = $parametroLeche->ph_max;
        $this->acidez_min = $parametroLeche->acidez_min;
        $this->acidez_max = $parametroLeche->acidez_max;
        $this->brix_min = $parametroLeche->brix_min;
        $this->contenido_graso_min = $parametroLeche->contenido_graso_min;
        $this->densidad_min = $parametroLeche->densidad_min;
        $this->densidad_max = $parametroLeche->densidad_max;
        
    }

    public function render()
    {
        return view('livewire.parametro.parametro-leche.editar');
    }
    public function update()
    {
        try {

            $parametroLeche = ParametroLeche::find($this->id);
          
            $parametroLeche->temperatura_max = $this->temperatura_max;
            $parametroLeche->temperatura_congelada_min = $this->temperatura_congelada_min;
            $parametroLeche->temperatura_congelada_max = $this->temperatura_congelada_max;
            $parametroLeche->ph_min = $this->ph_min;
            $parametroLeche->ph_max = $this->ph_max;
            $parametroLeche->acidez_min = $this->acidez_min;
            $parametroLeche->acidez_max = $this->acidez_max;
            $parametroLeche->brix_min = $this->brix_min;
            $parametroLeche->contenido_graso_min = $this->contenido_graso_min;
            $parametroLeche->densidad_min = $this->densidad_min;
            $parametroLeche->densidad_max = $this->densidad_max;
           
            $parametroLeche->save();

            $this->dispatch('actualizar_tabla_parametroLeche');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'Se actualizo el parametro exitosamente');
        } catch (\Throwable $th) {
            $this->closeModal();
            $this->dispatch('error_mensaje', mensaje: 'problema'.$th->getMessage());
        }
    }
}
