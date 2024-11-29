<?php

namespace App\Livewire\General\Unidad;

use App\Models\Unidad;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Temperatura;
use Illuminate\Support\Facades\DB;

class Tabla extends Component
{
    //filtros-busqueda

    public $f_nombre = null;
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

    #[On('actualizar_tabla_unidad')]
    public function render()
    {

        $unidades = Unidad::query()

            ->when($this->f_nombre, function ($query) {
                return $query->where('nombre', 'like', '%' . $this->f_nombre . '%');
            })

            ->when($this->f_abreviatura, function ($query) {
                return $query->where('abreviatura', 'like', '%' . $this->f_abreviatura . '%');
            })

            ->when($this->sortField, function ($query) {
                $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
            })
            ->get();

        return view('livewire.general.unidad.tabla', [
            'unidades' => $unidades
        ]);
    }




    public function consulta()
    {
        
        
        $datos = DB::connection('sqlsrv')->select('SELECT * FROM temperaturas');
        dd($datos);
    }
    
}
