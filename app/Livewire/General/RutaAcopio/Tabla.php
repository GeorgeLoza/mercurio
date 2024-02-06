<?php

namespace App\Livewire\General\RutaAcopio;

use App\Models\RutaAcopio;
use Livewire\Component;
use Livewire\Attributes\On;

class Tabla extends Component
{
    //filtros-busqueda
    public $f_nombre = null;
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
    #[On('actualizar_tabla_ruta_acopio')]
    public function render()
    {
        $rutas = RutaAcopio::query()

        ->when($this->f_nombre, function ($query) {
            return $query->where('nombre', 'like', '%' . $this->f_nombre . '%');
        })
        ->when($this->sortField, function ($query) {
            $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
        })
        ->get();
        return view('livewire.general.ruta-acopio.tabla', [
            'rutas' => $rutas
        ]);
    }
}
