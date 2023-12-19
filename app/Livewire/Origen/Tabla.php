<?php

namespace App\Livewire\Origen;

use App\Models\Origen;
use Livewire\Component;
use Livewire\Attributes\On;

class Tabla extends Component
{
     //filtros-busqueda
     public $f_alias = null;
     public $f_descripcion = null;
      public $f_codigo_maquina = null;
     //filtros-ordenamiento
     public $sortField;
     public $sortAsc = true;
    

     public function sortBy($field)
     {
         if($this->sortField === $field) {
             $this->sortAsc = !$this->sortAsc;
         } else {
             $this->sortAsc = true;
         }
 
         $this->sortField = $field;
     }

     #[On('actualizar_tabla_origen')] 


    public function render()
    {
        $origen = Origen::query()
                
        ->when($this->f_alias, function ($query) {
            return $query->where('alias', 'like', '%' . $this->f_alias . '%');
        })
        
        ->when($this->f_descripcion, function ($query) {
            return $query->where('descripcion', 'like', '%' . $this->f_descripcion . '%');
        })
        ->when($this->f_codigo_maquina, function ($query) {
            return $query->where('codigo_maquina', 'like', '%' . $this->f_codigo_maquina . '%');
        })
        ->when($this->sortField, function($query){
            $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
        })
        ->get();


        return view('livewire.origen.tabla',['origens' => $origen
    ]);
    
    }
}
