<?php

namespace App\Livewire\AnalisisLinea\Analisis;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\AnalisisLinea;

class Tabla extends Component
{
    
    //filtros-busqueda
    public $f_orp = null;
    public $f_producto = null;
    public $f_tiempo = null;
    public $f_user = null;
    public $f_preparacion = null;
    public $f_origen = null;
    public $f_estado = null;
    public $f_etapa = null;
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

     public function mount()
    {
        $this->sortField = 'created_at';
        $this->sortAsc = false;
    }

    #[On('actualizar_tabla_analisisLineas')]
    public function render()
    {
        $analisis = AnalisisLinea::query()
            ->when($this->f_orp, function ($query) {
                return $query->whereHas('orp', function ($query) {
                    $query->where('codigo', 'like', '%' . $this->f_orp . '%');
                });
            })
            ->when($this->f_producto, function ($query) {
                return $query->whereHas('producto', function ($query) {
                    $query->where('nombre', 'like', '%' . $this->f_producto . '%');
                });
            })
            ->when($this->f_tiempo, function ($query) {
                return $query->where('tiempo', 'like', '%' . $this->f_tiempo . '%');
            })
            ->when($this->f_user, function ($query) {
                return $query->whereHas('user', function ($query) {
                    $query->where('codigo', 'like', '%' . $this->f_orp . '%');
                });
            })
            ->when($this->f_preparacion, function ($query) {
                return $query->where('preparacion', 'like', '%' . $this->f_preparacion . '%');
            })

            ->when($this->f_origen, function ($query) {
                return $query->whereHas('origen', function ($query) {
                    $query->where('alias', 'like', '%' . $this->f_origen . '%');
                });
            })
            ->when($this->f_estado, function ($query) {
                return $query->where('estado', 'like', '%' . $this->f_estado . '%');
            })
            ->when($this->f_etapa, function ($query) {
                return $query->whereHas('etapa', function ($query) {
                    $query->where('nombre', 'like', '%' . $this->f_etapa . '%');
                });
            })
            ->when($this->sortField, function ($query) {
                $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
            })
            ->get();


        return view('livewire.analisis-linea.analisis.tabla', [
            'analisis' => $analisis
        ]);
    }
    
}
