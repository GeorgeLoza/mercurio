<?php

namespace App\Livewire\Producto;



use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Component;
use App\Models\Producto;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use App\Exports\ProductosExport;
use Maatwebsite\Excel\Facades\Excel;

class Tabla extends Component
{
    use WithPagination;
    //filtros-busqueda
    public $f_codigo = null;
    public $f_nombre = null;
    public $f_cantidad = null;
    public $f_unidad = null;
    public $f_empaque = null;
    public $f_categoriaProducto = null;
    public $f_destinoProducto = null;

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


    #[On('actualizar_tabla_productos')]
    public function render()
    {
        $this->aplicandoFiltros = $this->hayFiltrosActivos();
        $query = Producto::query()
            ->when($this->f_codigo, function ($query) {
                return $query->where('codigo', 'like', '%' . $this->f_codigo . '%');
            })
            ->when($this->f_nombre, function ($query) {
                return $query->where('nombre', 'like', '%' . $this->f_nombre . '%');
            })

            ->when($this->f_cantidad, function ($query) {
                return $query->where('cantidad', 'like', '%' . $this->f_cantidad . '%');
            })
            ->when($this->f_empaque, function ($query) {
                return $query->where('empaque', 'like', '%' . $this->f_empaque . '%');
            })

            ->when($this->f_unidad, function ($query) {
                return $query->whereHas('unidad', function ($query) {
                    $query->where('nombre', 'like', '%' . $this->f_unidad . '%');
                });
            })
            ->when($this->f_categoriaProducto, function ($query) {
                return $query->whereHas('categoriaProducto', function ($query) {
                    $query->where('nombre', 'like', '%' . $this->f_categoriaProducto . '%');
                });
            })
            ->when($this->f_destinoProducto, function ($query) {
                return $query->whereHas('destinoProducto', function ($query) {
                    $query->where('nombre', 'like', '%' . $this->f_destinoProducto . '%');
                });
            })
            ->when($this->sortField, function ($query) {
                $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
            });
            $producto = $this->aplicandoFiltros ? $query->get() : $query->paginate(50);

        return view('livewire.producto.tabla', [
            'productos' => $producto
        ]);
    }
    public function exportarExcel()
    {
        $productos = Producto::query()
            ->when($this->f_codigo, function ($query) {
                return $query->where('codigo', 'like', '%' . $this->f_codigo . '%');
            })
            ->when($this->f_nombre, function ($query) {
                return $query->where(function ($query) {
                    $query->where('nombre', 'like', '%' . $this->f_nombre . '%');
                });
            })
            ->when($this->f_cantidad, function ($query) {
                return $query->where('cantidad', 'like', '%' . $this->f_cantidad . '%');
            })
            ->when($this->f_empaque, function ($query) {
                return $query->where('empaque', 'like', '%' . $this->f_empaque . '%');
            })

            ->when($this->f_unidad, function ($query) {
                return $query->whereHas('unidad', function ($query) {
                    $query->where('nombre', 'like', '%' . $this->f_unidad . '%');
                });
            })
            ->when($this->f_categoriaProducto, function ($query) {
                return $query->whereHas('categoriaProducto', function ($query) {
                    $query->where('nombre', 'like', '%' . $this->f_categoriaProducto . '%');
                });
            })
            ->when($this->sortField, function ($query) {
                $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
            })
            ->get();

        // Utiliza el paquete maatwebsite/excel para exportar los datos a un archivo Excel

        return Excel::download(new ProductosExport($productos), 'productos.xlsx');
    }


    public function generatePDF()
    {
        $data = Producto::all();
        $pdf = Pdf::loadView('livewire.producto.pdf', compact('data'));
        $pdf->setPaper('letter', 'portrait');

        return $pdf->stream('certificado.pdf');
    }

    public function aplicarFiltros()
    {
        $this->aplicandoFiltros = true;
        // Resto de la lógica para aplicar los filtros
    }

    public function limpiarFiltros()
    {
        $this->reset(['f_codigo', 'f_nombre', 'f_cantidad', 'f_unidad', 'f_empaque', 'f_categoriaProducto', 'f_destinoProducto']);

        // Refresca el componente
        $this->js('window.location.reload()');
    }
    private function hayFiltrosActivos(): bool
    {
        return $this->f_codigo || $this->f_nombre || $this->f_cantidad || $this->f_unidad || $this->f_empaque || $this->f_categoriaProducto || $this->f_destinoProducto;
    }

}
