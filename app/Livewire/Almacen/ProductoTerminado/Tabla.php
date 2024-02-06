<?php

namespace App\Livewire\Almacen\ProductoTerminado;

use App\Models\almacenProductoTerminado;
use Livewire\Component;
use Livewire\Attributes\On;

class Tabla extends Component
{
    //filtros-busqueda
    public $f_codigo = null;
    public $f_nombre = null;
    public $f_alias = null;
    
    //filtros-ordenamiento
    public $sortField;
    public $sortAsc = true;
    //mostrar filtro
    public $filtro = false;

    public function show_filtro()
    {
        $this->filtro = !$this->filtro;
    }



    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }


    #[On('actualizar_tabla_almacen_PT')]
    public function render()
    {
        $almacenes = almacenProductoTerminado::query()
            ->when($this->f_codigo, function ($query) {
                return $query->where('codigo', 'like', '%' . $this->f_codigo . '%');
            })
            ->when($this->f_nombre, function ($query) {
                return $query->where('nombre', 'like', '%' . $this->f_nombre . '%');
            })
            ->when($this->f_alias, function ($query) {
                return $query->where('alias', 'like', '%' . $this->f_alias . '%');
            })
            ->when($this->sortField, function ($query) {
                $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
            })
            ->get();


        return view('livewire.almacen.producto-terminado.tabla', [
            'almacenes' => $almacenes
        ]);
    }
}
