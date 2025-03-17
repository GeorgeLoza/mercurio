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
    public $f_final = null;
    public $aplicandoFiltros = false;

    // Ordenamiento
    public $sortField;
    public $sortAsc = true;
    public $filtro = false;

    // ORPs desplegadas
    public $orpExpandida = [];

    public function aplicarFiltros()
    {
        $this->aplicandoFiltros = true;
        // Resto de la lógica para aplicar los filtros
    }

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

        // Obtener los ORP que coinciden con el filtro de tipo
        $orpIdsConFiltro = Contador::query()
        ->when($this->f_tipo === 'Total', function ($query) {
            return $query->where('tipo', 'Total'); // Filtra solo los de tipo "Total"
        })
        ->when($this->f_tipo === 'Sin Total', function ($query) {
            return $query->whereNotIn('orp_id', function ($subquery) {
                $subquery->select('orp_id')
                         ->from('contadors') // Nombre real de la tabla de Contador
                         ->where('tipo', 'Total');
            });
        })
            ->pluck('orp_id')
            ->unique();

        // Obtener los ORP paginados, sin filtrar por tipo directamente
        $orpPaginator = Contador::query()
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
            ->when($this->f_tipo, function ($query) use ($orpIdsConFiltro) {
                return $query->whereIn('orp_id', $orpIdsConFiltro);
            })
            ->selectRaw('orp_id, MAX(created_at) as latest_date')
            ->groupBy('orp_id')
            ->orderBy($this->sortField === 'created_at' ? 'latest_date' : $this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate(25);

        // Obtener todos los registros asociados a los ORP seleccionados
        $contadores = Contador::with('orp', 'orp.producto', 'almacenProductoTerminado')
            ->whereIn('orp_id', $orpPaginator->pluck('orp_id'))
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->get();

        // Agrupar los resultados por ORP
        $resultados = $contadores->groupBy('orp_id');

        return view('livewire.contador.productoterminado.tabla', [
            'orpAgrupadas' => $resultados,
            'orpPaginator' => $orpPaginator
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
