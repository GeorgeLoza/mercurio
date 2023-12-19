<?php

namespace App\Livewire\Producto;

use Livewire\Component;
use App\Models\Producto;
use Livewire\Attributes\On;

class Tabla extends Component
{
    
    //filtros-busqueda
    public $f_codigo = null;
    public $f_nombre = null;
    public $f_cantidad = null;
    public $f_unidad = null;
    public $f_empaque = null;
    public $f_categoriaProducto = null;
    public $f_destinoProducto = null;
    //filtros-ordenamiento
    public $sortField;
    public $sortAsc = true;
    //mostrar filtro
    public $filtro=false;
    
    public function show_filtro(){
        $this->filtro =!$this->filtro;
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


    #[On('actualizar_tabla_productos')]
    public function render()
    {
        $producto = Producto::query()
            ->when($this->f_codigo, function ($query) {
                return $query->where('codigo', 'like', '%' . $this->f_codigo . '%');
            })
            ->when($this->f_nombre, function ($query) {
                return $query->where(function ($query) {
                    $query->where('nombre', 'like', '%' . $this->f_nombre . '%');
                });
            })
            ->when($this->f_cantidad, function ($query) {
                return $query->where('cantidad', 'like', '%' . $this->f_cantidad . '%');
            })
            ->when($this->f_empaque, function ($query) {
                return $query->where('empaque', 'like', '%' . $this->f_empaque . '%');
            })
            
            ->when($this->f_unidad, function ($query) {
                return $query->whereHas('unidad', function ($query) {
                    $query->where('nombre', 'like', '%' . $this->f_unidad . '%');
                });
            })
            ->when($this->f_categoriaProducto, function ($query) {
                return $query->whereHas('categoriaProducto', function ($query) {
                    $query->where('nombre', 'like', '%' . $this->f_categoriaProducto . '%');
                });
            })
            ->when($this->sortField, function ($query) {
                $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
            })
            ->get();


        return view('livewire.producto.tabla', [
            'productos' => $producto
        ]);
    }

}
