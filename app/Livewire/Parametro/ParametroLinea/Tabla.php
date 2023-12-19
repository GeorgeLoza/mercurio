<?php

namespace App\Livewire\Parametro\ParametroLinea;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\ParametroLinea;

class Tabla extends Component
{
      
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
        $parametroLinea = ParametroLinea::query()
             
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
        })
        ->get();
        return view('livewire.parametro.parametro-linea.tabla',['parametro_lineas' => $parametroLinea
    ]);
    
    }
   
}
