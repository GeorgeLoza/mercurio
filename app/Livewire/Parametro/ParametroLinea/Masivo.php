<?php

namespace App\Livewire\Parametro\ParametroLinea;

use App\Models\CategoriaProducto;
use App\Models\DestinoProducto;
use App\Models\Etapa;
use App\Models\ParametroLinea;
use App\Models\Producto;
use Livewire\Attributes\Rule;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Masivo extends ModalComponent
{
    public $mensaje = null;

    

    public $categorias;
    public $destinos;
    public $categoria_id;
    public $destino_id;
    public $categoria;
    public $productos;
    public $parametros;
    public $etapas;
    public $activeTab = null;

    // Campos del formulario
    public $etapa_id=null;
    public $parametro_id;

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

    public function mount()
    {
        $this->categorias = CategoriaProducto::all();
        $this->destinos = DestinoProducto::all();
        $this->etapas = Etapa::all();

        // Inicializa con la primera categoría y destino si existen
        $this->categoria_id = $this->categorias->first()?->id;
        $this->destino_id = $this->destinos->first()?->id;

        $this->updateCategoriaDestino();

        // No seleccionar etapa al abrir
        $this->activeTab = null;
        $this->etapa_id = null;
    }
    public function updatedCategoriaId()
    {
        $this->updateCategoriaDestino();
    }

    public function updatedDestinoId()
    {
        $this->updateCategoriaDestino();
    }
    public function updateCategoriaDestino()
    {
        $this->categoria = CategoriaProducto::find($this->categoria_id);
        $this->productos = Producto::where('categoria_producto_id', $this->categoria_id)
            ->where('destino_producto_id', $this->destino_id)
            ->get();
        $this->loadParametros();
        $this->resetForm();
    }
    public function loadParametros()
    {
        // Trae un "resumen" por etapa usando el primer producto de la categoría
        $firstProduct = $this->productos->first();
        if ($firstProduct) {
            $this->parametros = ParametroLinea::with('etapa')
                ->where('producto_id', $firstProduct->id)
                ->orderBy('etapa_id')
                ->get();
        } else {
            $this->parametros = collect();
        }
    }

    public function selectEtapa($etapa_id)
    {
        $firstProduct = $this->productos->first();
        if (!$firstProduct) return;

        $parametro = ParametroLinea::where('producto_id', $firstProduct->id)
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

    public function saveParametro()
    {
        if (!$this->etapa_id) {
            $this->mensaje = 'Debes seleccionar una etapa antes de guardar.';
            return;
        }
        $validated = $this->validate();

        foreach ($this->productos as $producto) {
            ParametroLinea::updateOrCreate(
                [
                    'producto_id' => $producto->id,
                    'etapa_id'    => $this->etapa_id
                ],
                array_merge($validated, [
                    'producto_id' => $producto->id,
                    'etapa_id'    => $this->etapa_id
                ])
            );
        }

        $this->loadParametros();
        $this->resetForm();
        $this->mensaje = 'Parámetros aplicados correctamente.';
        $this->dispatch('actualizar_tabla_parametroLinea');
    }

    public function deleteParametro()
    {
        if (!$this->etapa_id) {
            $this->mensaje = 'Debes seleccionar una etapa antes de eliminar.';
            return;
        }
        foreach ($this->productos as $producto) {
            ParametroLinea::where('producto_id', $producto->id)
                ->where('etapa_id', $this->etapa_id)
                ->delete();
        }

        $this->resetForm();
        $this->loadParametros();
        $this->mensaje = 'Parámetros eliminados correctamente.';
        $this->dispatch('actualizar_tabla_parametroLinea');
    }

    public function resetForm()
    {
        $this->reset([
            'parametro_id',
            'temperatura_min',
            'temperatura_max',
            'ph_min',
            'ph_max',
            'acidez_min',
            'acidez_max',
            'brix_min',
            'brix_max',
            'viscosidad_min',
            'viscosidad_max',
            'densidad_min',
            'densidad_max'
        ]);
        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.parametro.parametro-linea.masivo');
    }
}
