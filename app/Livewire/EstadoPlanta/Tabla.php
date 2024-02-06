<?php

namespace App\Livewire\EstadoPlanta;

use App\Models\EstadoPlanta;
use Livewire\Component;
use Livewire\Attributes\On;

class Tabla extends Component
{
    //filtros-busqueda
    public $f_tiempo = null;
    public $f_origen = null;
    public $f_proceso = null;
    public $f_orp = null;
    public $f_etapa = null;
    public $f_preparacion = null;
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

    #[On('actualizar_tabla_estado')]


    public function render()
    {
        $estados = EstadoPlanta::query()

            ->when($this->f_tiempo, function ($query) {
                return $query->where('tiempo', 'like', '%' . $this->f_tiempo . '%');
            })
            ->when($this->f_origen, function ($query) {
                return $query->whereHas('origen', function ($query) {
                    $query->where('alias', 'like', '%' . $this->f_origen . '%');
                });
            })
            ->when($this->f_proceso, function ($query) {
                return $query->where('proceso', 'like', '%' . $this->f_proceso . '%');
            })
            ->when($this->f_orp, function ($query) {
                return $query->whereHas('orp', function ($query) {
                    $query->where('codigo', 'like', '%' . $this->f_orp . '%');
                });
            })
            ->when($this->f_etapa, function ($query) {
                return $query->whereHas('etapa', function ($query) {
                    $query->where('nombre', 'like', '%' . $this->f_etapa . '%');
                });
            })
            ->when($this->f_preparacion, function ($query) {
                return $query->where('preparacion', 'like', '%' . $this->f_preparacion . '%');
            })
            ->when($this->sortField, function ($query) {
                $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
            })
            ->get();


        return view('livewire.estado-planta.tabla', [
            'estados' => $estados
        ]);
    }
}
