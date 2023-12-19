<?php

namespace App\Livewire\General\Planta;

use App\Models\Planta;
use Livewire\Component;
use Livewire\Attributes\On;

class Tabla extends Component
{
    //filtros-busqueda
    public $f_nombre = null;
    public $f_direccion = null;
    public $f_abreviatura = null;
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

    #[On('actualizar_tabla_planta')]
    public function render()
    {
        $plantas = Planta::query()

            ->when($this->f_nombre, function ($query) {
                return $query->where('nombre', 'like', '%' . $this->f_nombre . '%');
            })

            ->when($this->f_direccion, function ($query) {
                return $query->where('direccion', 'like', '%' . $this->f_direccion . '%');
            })
            ->when($this->f_abreviatura, function ($query) {
                return $query->where('abreviatura', 'like', '%' . $this->f_abreviatura . '%');
            })
            ->when($this->sortField, function ($query) {
                $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
            })
            ->get();


        return view('livewire.general.planta.tabla', [
            'plantas' => $plantas
        ]);
    }

}
