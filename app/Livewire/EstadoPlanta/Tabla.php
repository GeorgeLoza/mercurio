<?php

namespace App\Livewire\EstadoPlanta;

use App\Models\EstadoPlanta;
use Livewire\Component;
use Livewire\Attributes\On;

use Livewire\WithPagination;

class Tabla extends Component
{use WithPagination;
    //filtros-busqueda
    public $f_tiempo = null;
    public $f_origen = null;
    public $f_proceso = null;
    public $f_orp = null;
    public $f_producto = null;
    public $f_preparacion = null;
    public $f_etapa = null;

    public $aplicandoFiltros = false;
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

    #[On('actualizar_tabla_estado')]
    public function render()
    {
        $this->aplicandoFiltros = $this->hayFiltrosActivos();
        $query = EstadoPlanta::query()

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
            ->when($this->f_etapa, function ($query) {
                return $query->whereHas('etapa', function ($query) {
                    $query->where('nombre', 'like', '%' . $this->f_etapa . '%');
                });
            })
            // Filtro para el código en orp
            ->when($this->f_orp, function ($query) {
                return $query->whereHas('estadoDetalle.orp', function ($query) {
                    $query->where('codigo', 'like', '%' . $this->f_orp . '%');
                });
            })

            // Filtro para el nombre en producto
            ->when($this->f_producto, function ($query) {
                return $query->whereHas('estadoDetalle.orp.producto', function ($query) {
                    $query->where('nombre', 'like', '%' . $this->f_producto . '%');
                });
            })

            // Filtro para la preparación en estadoDetalle
            ->when($this->f_preparacion, function ($query) {
                return $query->whereHas('estadoDetalle', function ($query) {
                    $query->where('preparacion', 'like', '%' . $this->f_preparacion . '%');
                });
            })
            ->when($this->sortField, function ($query) {
                $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
            });
            // Decide si usar paginación o mostrar todos los resultados
        $estados = $query->paginate(50);


        return view('livewire.estado-planta.tabla', [
            'estados' => $estados
        ]);
    }


    public function aplicarFiltros()
    {
        $this->aplicandoFiltros = true;
        // Resto de la lógica para aplicar los filtros
    }

    public function limpiarFiltros()
    {
        $this->reset(['f_tiempo', 'f_origen', 'f_proceso', 'f_etapa', 'f_orp', 'f_producto', 'f_preparacion']);

        // Refresca el componente
        $this->js('window.location.reload()');
    }
    private function hayFiltrosActivos(): bool
    {
        return $this->f_tiempo || $this->f_origen || $this->f_proceso || $this->f_etapa || $this->f_orp || $this->f_producto || $this->f_preparacion;
    }
}
