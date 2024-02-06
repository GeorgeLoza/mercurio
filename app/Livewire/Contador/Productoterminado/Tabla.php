<?php

namespace App\Livewire\Contador\Productoterminado;

use Livewire\Component;
use App\Models\Contador;
use Livewire\Attributes\On;

class Tabla extends Component
{


    //filtros-busqueda
    public $f_fecha_hora = null;
    public $f_codigo = null;
    public $f_producto = null;
    public $f_tipo = null;
    public $f_cantidad = null;
    public $f_ubicacion = null;
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

    #[On('actualizar_tabla_contador_productoTerminado')]
    public function render()
    {
        $terminados = Contador::query()
            ->when($this->f_fecha_hora, function ($query) {
                return $query->where('tiempo', 'like', '%' . $this->f_fecha_hora . '%');
            })
            ->when($this->f_codigo, function ($query) {
                return $query->whereHas('orp', function ($query) {
                    $query->where('codigo', 'like', '%' . $this->f_codigo . '%');
                });
            })
            ->when($this->f_tipo, function ($query) {
                return $query->where('tipo', 'like', '%' . $this->f_tipo . '%');
            })
            ->when($this->f_ubicacion, function ($query) {
                return $query->whereHas('almacen_producto_terminado', function ($query) {
                    $query->where('nombre', 'like', '%' . $this->f_ubicacion . '%');
                });
            })
            ->when($this->sortField, function ($query) {
                $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
            })
            ->get();


        return view('livewire.contador.productoterminado.tabla', [
            'terminados' => $terminados
        ]);
    }
}
