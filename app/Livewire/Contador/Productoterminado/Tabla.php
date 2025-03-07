<?php

namespace App\Livewire\Contador\Productoterminado;

use Livewire\Component;
use App\Models\Contador;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class Tabla extends Component
{
    use WithPagination;

    // Filtros y búsqueda
    public $f_fecha_hora = null;
    public $f_codigo = null;
    public $f_producto = null;
    public $f_tipo = null;
    public $f_cantidad = null;
    public $f_ubicacion = null;
    public $aplicandoFiltros = false;

    // Ordenamiento
    public $sortField;
    public $sortAsc = true;
    public $filtro = false;

    // ORPs desplegadas
    public $orpExpandida = [];

    public function mount()
    {
        $this->sortField = 'created_at';
        $this->sortAsc = false;
    }

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

    #[On('actualizar_tabla_contador_productoTerminado')]
    public function render()
    {
        $this->aplicandoFiltros = $this->hayFiltrosActivos();

        // Agrupar por ORP
        $query = Contador::with('orp', 'orp.producto', 'almacenProductoTerminado')
            ->when($this->f_codigo, function ($query) {
                return $query->whereHas('orp', function ($query) {
                    $query->where('codigo', 'like', '%' . $this->f_codigo . '%');
                });
            })
            ->when($this->f_producto, function ($query) {
                return $query->whereHas('orp.producto', function ($query) {
                    $query->where('nombre', 'like', '%' . $this->f_producto . '%');
                });
            })
            ->when($this->f_tipo, function ($query) {
                return $query->where('tipo', 'like', '%' . $this->f_tipo . '%');
            })
            ->when($this->sortField, function ($query) {
                $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
            });

        $resultados = $query->get()->groupBy('orp_id'); // Agrupar por ORP

        return view('livewire.contador.productoterminado.tabla', [
            'orpAgrupadas' => $resultados,
        ]);
    }

    public function toggleOrp($orpId)
    {
        if (isset($this->orpExpandida[$orpId])) {
            unset($this->orpExpandida[$orpId]);
        } else {
            $this->orpExpandida[$orpId] = true;
        }
    }

    public function limpiarFiltros()
    {
        $this->reset(['f_fecha_hora', 'f_codigo', 'f_producto', 'f_tipo', 'f_cantidad', 'f_ubicacion']);
        $this->js('window.location.reload()');
    }

    private function hayFiltrosActivos(): bool
    {
        return $this->f_fecha_hora || $this->f_codigo || $this->f_producto || $this->f_tipo || $this->f_cantidad || $this->f_ubicacion;
    }
}
