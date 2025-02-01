<?php

namespace App\Livewire\General\Roles;

use App\Models\Role;
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
    #[On('actualizar_tabla_role')]
    public function render()
    {
        $roles = Role::query()

            // Filtros de búsqueda
            ->when($this->f_nombre, function ($query) {
                return $query->where('name', 'like', '%' . $this->f_nombre . '%');
            })
            ->when($this->f_descripcion, function ($query) {
                return $query->where('description', 'like', '%' . $this->f_descripcion . '%');
            })

            // Ordenación
            ->when($this->sortField, function ($query) {
                $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
            })

            // Obtener los resultados
            ->get();

        return view('livewire.general.roles.tabla', [
            'roles' => $roles
        ]);
    }
}
