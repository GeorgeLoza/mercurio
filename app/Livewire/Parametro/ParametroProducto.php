<?php

namespace App\Livewire\Parametro;

use App\Models\ParametroLinea;
use App\Models\Producto;
use App\Models\Etapa;
use Livewire\Component;
use Livewire\Attributes\Rule;
use LivewireUI\Modal\ModalComponent;

class ParametroProducto extends ModalComponent
{
    public $producto_id;
    public $producto;
    public $parametros;
    public $etapas;
    public $activeTab = 1;

    // Campos del formulario
    public $parametro_id;
    public $etapa_id;
    
    #[Rule('nullable|numeric|min:0')]
    public $temperatura_min;
    
    #[Rule('nullable|numeric|min:0')]
    public $temperatura_max;
    
    #[Rule('nullable|numeric|min:0|max:14')]
    public $ph_min;
    
    #[Rule('nullable|numeric|min:0|max:14')]
    public $ph_max;
    
    #[Rule('nullable|numeric|min:0')]
    public $acidez_min;
    
    #[Rule('nullable|numeric|min:0')]
    public $acidez_max;
    
    #[Rule('nullable|numeric|min:0')]
    public $brix_min;
    
    #[Rule('nullable|numeric|min:0')]
    public $brix_max;
    
    #[Rule('nullable|numeric|min:0')]
    public $viscosidad_min;
    
    #[Rule('nullable|numeric|min:0')]
    public $viscosidad_max;
    
    #[Rule('nullable|numeric|min:0')]
    public $densidad_min;
    
    #[Rule('nullable|numeric|min:0')]
    public $densidad_max;

    public function mount($producto_id) {
        $this->producto_id = $producto_id;
        $this->producto = Producto::find($producto_id);
        $this->etapas = Etapa::all();
        $this->loadParametros();
    }

    public function loadParametros() {
        $this->parametros = ParametroLinea::with('etapa')
            ->where('producto_id', $this->producto_id)
            ->orderBy('etapa_id')
            ->get();
    }

    public function selectEtapa($etapa_id) {
        $parametro = ParametroLinea::where('producto_id', $this->producto_id)
                        ->where('etapa_id', $etapa_id)
                        ->first();

        $this->etapa_id = $etapa_id;
        $this->activeTab = $etapa_id;
        
        if ($parametro) {
            $this->parametro_id = $parametro->id;
            $this->temperatura_min = $parametro->temperatura_min;
            $this->temperatura_max = $parametro->temperatura_max;
            $this->ph_min = $parametro->ph_min;
            $this->ph_max = $parametro->ph_max;
            $this->acidez_min = $parametro->acidez_min;
            $this->acidez_max = $parametro->acidez_max;
            $this->brix_min = $parametro->brix_min;
            $this->brix_max = $parametro->brix_max;
            $this->viscosidad_min = $parametro->viscosidad_min;
            $this->viscosidad_max = $parametro->viscosidad_max;
            $this->densidad_min = $parametro->densidad_min;
            $this->densidad_max = $parametro->densidad_max;
        } else {
            $this->resetForm();
        }
    }

    public function saveParametro() {
        $validated = $this->validate();

        ParametroLinea::updateOrCreate(
            ['id' => $this->parametro_id],
            array_merge($validated, [
                'producto_id' => $this->producto_id,
                'etapa_id' => $this->etapa_id
            ])
        );

        $this->loadParametros();
        $this->dispatch('showToast', 
            type: 'success', 
            message: 'Parámetros guardados exitosamente'
        );
    }

    public function resetForm() {
        $this->reset([
            'parametro_id',
            'temperatura_min', 'temperatura_max',
            'ph_min', 'ph_max',
            'acidez_min', 'acidez_max',
            'brix_min', 'brix_max',
            'viscosidad_min', 'viscosidad_max',
            'densidad_min', 'densidad_max'
        ]);
        $this->resetValidation();
    }

    public function deleteParametro() {
        if ($this->parametro_id) {
            ParametroLinea::find($this->parametro_id)->delete();
            $this->resetForm();
            $this->loadParametros();
            $this->dispatch('showToast', 
                type: 'success', 
                message: 'Parámetros eliminados'
            );
        }
    }

    public function render() {
        return view('livewire.parametro.parametro-producto');
    }
}