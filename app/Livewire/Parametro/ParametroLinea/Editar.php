<?php

namespace App\Livewire\Parametro\ParametroLinea;

use App\Models\Etapa;
use Livewire\Component;
use App\Models\Producto;
use App\Models\ParametroLinea;
use LivewireUI\Modal\ModalComponent;

class Editar extends ModalComponent
{
    public $id;
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
    public $origens;
    public $productos;
    public function mount()
    {
        $this->etapas = Etapa::all();
        $this->productos = Producto::all();

        $parametroLinea = ParametroLinea::where('id', $this->id)->first();
        $this->producto_id = $parametroLinea->producto_id;
        $this->etapa_id = $parametroLinea->etapa_id;
        $this->temperatura_min = $parametroLinea->temperatura_min;
        $this->temperatura_max = $parametroLinea->temperatura_max;
        $this->ph_min = $parametroLinea->ph_min;
        $this->ph_max = $parametroLinea->ph_max;
        $this->acidez_min = $parametroLinea->acidez_min;
        $this->acidez_max = $parametroLinea->acidez_max;
        $this->brix_min = $parametroLinea->brix_min;
        $this->brix_max = $parametroLinea->brix_max;
        $this->viscosidad_min = $parametroLinea->viscosidad_min;
        $this->viscosidad_max = $parametroLinea->viscosidad_max;
        $this->densidad_min = $parametroLinea->densidad_min;
        $this->densidad_max = $parametroLinea->densidad_max;
    }
    public function render()
    {
        return view('livewire.parametro.parametro-linea.editar');
    }
    public function update()
    {

        $this->validate([
            'producto_id' => 'required',
            'etapa_id' => 'required',
    
        ]);
        try {

            $parametroLinea = ParametroLinea::find($this->id);
            $parametroLinea->producto_id = $this->producto_id;
            $parametroLinea->etapa_id = $this->etapa_id;
            $parametroLinea->temperatura_min = $this->temperatura_min;
            $parametroLinea->temperatura_max = $this->temperatura_max;
            $parametroLinea->ph_min = $this->ph_min;
            $parametroLinea->ph_max = $this->ph_max;
            $parametroLinea->acidez_min = $this->acidez_min;
            $parametroLinea->acidez_max = $this->acidez_max;
            $parametroLinea->brix_min = $this->brix_min;
            $parametroLinea->brix_max = $this->brix_max;
            $parametroLinea->viscosidad_min = $this->viscosidad_min;
            $parametroLinea->viscosidad_max = $this->viscosidad_max;
            $parametroLinea->densidad_min = $this->densidad_min;
            $parametroLinea->densidad_max = $this->densidad_max;



            $parametroLinea->save();

            $this->dispatch('actualizar_tabla_parametroLinea');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'Se actualizo el parametro exitosamente');
        } catch (\Throwable $th) {
            $this->closeModal();

            $this->dispatch('error', mensaje: 'Error: ' .$th);
        }
    }
   
}
