<?php

namespace App\Livewire\Parametro\ParametroLinea;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use App\Models\ParametroLinea;

class Tabla extends Component
{
    use WithPagination;
 //filtros-busqueda
  public $f_producto_codigo = null;
  public $f_producto_nombre = null;
  public $f_etapa_nombre = null;
  public $f_temperatura_min = null;
  public $f_temperatura_max = null;
  public $f_ph_min = null;
  public $f_ph_max = null;
  public $f_acidez_min = null;
  public $f_acidez_max = null;
  public $f_brix_min= null;
  public $f_brix_max= null;
  public $f_viscosidad_min = null;
  public $f_viscosidad_max = null;
  public $f_densidad_min = null;
  public $f_densidad_max = null;

  public $aplicandoFiltros = false;
 //filtros-ordenamiento
 public $sortField;
 public $sortAsc = true;
 //paginacion

 public function sortBy($field)
 {
     if($this->sortField === $field) {
         $this->sortAsc = !$this->sortAsc;
     } else {
         $this->sortAsc = true;
     }

     $this->sortField = $field;
 }

 #[On('actualizar_tabla_parametroLinea')]
    public function render()

    {
        $this->aplicandoFiltros = $this->hayFiltrosActivos();


        $query = ParametroLinea::query()

        ->when($this->f_producto_codigo, function ($query) {
            return $query->whereHas('Producto', function ($query) {
                $query->where('codigo', 'like', '%' . $this->f_producto_codigo . '%');
            });
        })
        ->when($this->f_producto_nombre, function ($query) {
            return $query->whereHas('Producto', function ($query) {
                $query->where('nombre', 'like', '%' . $this->f_producto_nombre . '%');
            });
        })
        ->when($this->f_etapa_nombre, function ($query) {
            return $query->whereHas('Etapa', function ($query) {
                $query->where('nombre', 'like', '%' . $this->f_etapa_nombre . '%');
            });
        })
        ->when($this->f_temperatura_min, function ($query) {
            return $query->where('temperatura_min', 'like', '%' . $this->f_temperatura_min . '%');
        })
        ->when($this->f_temperatura_max, function ($query) {
            return $query->where('temperatura_max', 'like', '%' . $this->f_temperatura_max . '%');
        })
        ->when($this->f_ph_min, function ($query) {
            return $query->where('ph_min', 'like', '%' . $this->f_ph_min. '%');
        })
        ->when($this->f_ph_max, function ($query) {
            return $query->where('ph_max', 'like', '%' . $this->f_ph_max. '%');
        })
        ->when($this->f_acidez_min, function ($query) {
            return $query->where('acidez_min', 'like', '%' . $this->f_acidez_min . '%');
        })
        ->when($this->f_acidez_max, function ($query) {
            return $query->where('acidez_max', 'like', '%' . $this->f_acidez_max . '%');
        })
        ->when($this->f_brix_min, function ($query) {
            return $query->where('brix_min', 'like', '%' . $this->f_brix_min. '%');
        })
        ->when($this->f_brix_min, function ($query) {
            return $query->where('brix_min', 'like', '%' . $this->f_brix_max. '%');
        })
        ->when($this->f_viscosidad_min, function ($query) {
            return $query->where('viscosidad_min', 'like', '%' . $this->f_viscosidad_min. '%');
        })
        ->when($this->f_viscosidad_max, function ($query) {
            return $query->where('viscosidad_max', 'like', '%' . $this->f_viscosidad_max. '%');
        })
        ->when($this->f_densidad_min, function ($query) {
            return $query->where('densidad_min', 'like', '%' . $this->f_densidad_min. '%');
        })
        ->when($this->f_densidad_max, function ($query) {
            return $query->where('densidad_max', 'like', '%' . $this->f_densidad_max. '%');
        })


        ->when($this->sortField, function($query){
            $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
        });

        $parametro_lineas =  $query->paginate(50);
        return view('livewire.parametro.parametro-linea.tabla',['parametro_lineas' => $parametro_lineas
    ]);


    }
    public function aplicarFiltros()
    {
        $this->aplicandoFiltros = true;
        // Resto de la lógica para aplicar los filtros
    }

    public function limpiarFiltros()
    {
        $this->reset(['f_producto_codigo', 'f_producto_nombre','f_etapa_nombre', 'f_temperatura_min', 'f_temperatura_max', 'f_ph_min', 'f_ph_max', 'f_acidez_min', 'f_acidez_max','f_brix_min', 'f_brix_max', 'f_viscosidad_min', 'f_viscosidad_max','f_densidad_min', 'f_densidad_max']);

        // Refresca el componente
        $this->js('window.location.reload()');
    }
    private function hayFiltrosActivos(): bool
    {
        return $this->f_producto_codigo || $this->f_producto_nombre || $this->f_etapa_nombre || $this->f_temperatura_min || $this->f_temperatura_max || $this->f_ph_min || $this->f_ph_max|| $this->f_acidez_min || $this->f_acidez_max || $this->f_brix_max|| $this->f_viscosidad_min || $this->f_viscosidad_max || $this->f_densidad_min|| $this->f_densidad_max;
    }


}
