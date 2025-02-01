<?php

namespace App\Livewire\General\SubrutaAcopio;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\SubrutaAcopio;

class Tabla extends Component
{
    //filtros-busqueda
    public $f_nombre = null;
    public $f_ruta = null;
    public $f_detalle = null;
    //filtros-ordenamiento
    public $sortField;
    public $sortAsc = true;

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }
    #[On('actualizar_tabla_subruta_acopio')]

    public function render()
    {
        $subrutas = SubrutaAcopio::query()

        ->when($this->f_nombre, function ($query) {
            return $query->where('nombre', 'like', '%' . $this->f_nombre . '%');
        })
        ->when($this->f_ruta, function ($query) {
            return $query->whereHas('ruta_acopio', function ($query) {
                $query->where('nombre', 'like', '%' . $this->f_ruta . '%');
            });
        })
        ->when($this->sortField, function ($query) {
            $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
        })
        ->get();
        return view('livewire.general.subruta-acopio.tabla', [
            'subrutas' => $subrutas
        ]);
    }
}
