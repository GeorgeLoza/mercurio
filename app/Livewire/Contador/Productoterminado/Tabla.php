<?php

namespace App\Livewire\Contador\Productoterminado;

use Livewire\Component;
use App\Models\Contador;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class Tabla extends Component
{

    use WithPagination;
    //filtros-busqueda
    public $f_fecha_hora = null;
    public $f_codigo = null;
    public $f_producto = null;
    public $f_tipo = null;
    public $f_cantidad = null;
    public $f_ubicacion = null;

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

    #[On('actualizar_tabla_contador_productoTerminado')]
    public function render()
    {
        $this->aplicandoFiltros = $this->hayFiltrosActivos();
        
        $query = Contador::query()
            ->when($this->f_fecha_hora, function ($query) {
                return $query->where('tiempo', 'like', '%' . $this->f_fecha_hora . '%');
            })
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
            ->when($this->f_cantidad, function ($query) {
                return $query->where('cantidad', 'like', '%' . $this->f_cantidad . '%');
            })
            ->when($this->f_tipo, function ($query) {
                return $query->where('tipo', 'like', '%' . $this->f_tipo . '%');
            })
            ->when($this->f_ubicacion, function ($query) {
                return $query->whereHas('almacenProductoTerminado', function ($query) {
                    $query->where('nombre', 'like', '%' . $this->f_ubicacion . '%');
                });
            })
            ->when($this->sortField, function ($query) {
                $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
            });
            

            $terminados = $this->aplicandoFiltros ? $query->get() : $query->paginate(50);
        return view('livewire.contador.productoterminado.tabla', [
            'terminados' => $terminados
        ]);
    }
    public function aplicarFiltros()
    {
        $this->aplicandoFiltros = true;
        // Resto de la lógica para aplicar los filtros
    }
    public function limpiarFiltros()
    {
        $this->reset(['f_fecha_hora', 'f_codigo', 'f_producto', 'f_tipo', 'f_cantidad', 'f_ubicacion']);

        // Refresca el componente
        $this->js('window.location.reload()');
    }
    private function hayFiltrosActivos(): bool
    {
        return $this->f_fecha_hora || $this->f_codigo || $this->f_producto || $this->f_tipo || $this->f_cantidad || $this->f_ubicacion;
    }


}
