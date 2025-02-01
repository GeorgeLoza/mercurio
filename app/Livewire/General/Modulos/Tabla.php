<?php

namespace App\Livewire\General\Modulos;


use App\Models\Modulo;
use Livewire\Component;

use Livewire\Attributes\On;
class Tabla extends Component
{

    // Filtros de búsqueda
    public $f_nombre = null;
    public $f_descripcion = null;

    // Filtros de ordenamiento
    public $sortField;
    public $sortAsc = true;

    // Método para ordenar
    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }

    // Método render para obtener los datos
    #[On('actualizar_tabla_modulo')]
    public function render()
    {
        $modulos = Modulo::where('name', 'like', '%' . $this->f_nombre . '%')->get();

        return view('livewire.general.modulos.tabla', compact('modulos'));
    }
}
