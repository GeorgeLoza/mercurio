<?php

namespace App\Livewire\General\Division;

use Livewire\Component;
use App\Models\Division;
use Livewire\Attributes\On;

class Tabla extends Component
{
     //filtros-busqueda

     public $f_nombre = null;
     public $f_descripcion = null;
 
     //filtros-ordenamiento
     public $sortField;
     public $sortAsc = true;
     //paginacion
 
     public function sortBy($field)
     {
         if ($this->sortField === $field) {
             $this->sortAsc = !$this->sortAsc;
         } else {
             $this->sortAsc = true;
         }
 
         $this->sortField = $field;
     }
 
     #[On('actualizar_tabla_division')]
     public function render()
     {
         $division = Division::query()
 
             ->when($this->f_nombre, function ($query) {
                 return $query->where('nombre', 'like', '%' . $this->f_nombre . '%');
             })
 
             ->when($this->f_descripcion, function ($query) {
                 return $query->where('descripcion', 'like', '%' . $this->f_descripcion . '%');
             })
 
             ->when($this->sortField, function ($query) {
                 $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
             })
             ->get();
 
         return view('livewire.general.division.tabla', [
             'divisions' => $division
         ]);
     }
    
}
