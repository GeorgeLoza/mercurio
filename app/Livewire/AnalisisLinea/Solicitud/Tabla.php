<?php

namespace App\Livewire\AnalisisLinea\Solicitud;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\SolicitudAnalisisLinea;

class Tabla extends Component
{

    //filtros-busqueda
    public $f_orp = null;
    
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


    #[On('actualizar_tabla_solicitudAnalisisLineas')]
    public function render()
    {
        $solicitudes = SolicitudAnalisisLinea::query()
            ->when($this->sortField, function ($query) {
                $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
            })
            ->get();


        return view('livewire.analisis-linea.solicitud.tabla', [
            'solicitudes' => $solicitudes
        ]);
    }
}
