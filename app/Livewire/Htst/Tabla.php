<?php

namespace App\Livewire\Htst;

use App\Exports\MuestrasExport;
use App\Models\Orp;
use App\Models\Color;
use App\Models\User;
use App\Notifications\CierreOrp;
use App\Notifications\orpNotification;
use Livewire\WithPagination;
use Livewire\Component;
use Livewire\Attributes\On;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;


class Tabla extends Component
{

    use WithPagination;
    //filtros-busqueda
    public $f_codigo = null;
    public $f_codigoProducto = null;
    public $f_nombreProducto = null;

    public $f_destino = null;
    public $f_lote = null;
    public $f_estado = null;
    public $f_tiempoElaboracion = null;
    public $f_fechaVencimiento1 = null;
    public $f_fechaVencimiento2 = null;
    public $f_producto = null;
    public $f_productoCodigo = null;
    //categoria
    public $f_grupo = null;

    public $f_updated_at = null;
    public $aplicandoFiltros = false;

    //filtros-ordenamiento
    public $sortField;
    public $sortAsc = true;
    //mostrar filtro
    public $filtro = false;


    public $anio;  // Año, por ejemplo: 2024
    public $mes;
    public $dia;
    public $fecha;
    public $cat;

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


    #[On('actualizar_tabla_orps')]
    public function render()
    {
        $this->aplicandoFiltros = $this->hayFiltrosActivos();
        $query = Orp::query()
        ->whereHas('producto.categoriaProducto', function ($query) {
            $query->where('grupo', 'HTST');
        })


            ->when($this->f_codigo, function ($query) {
                return $query->where('codigo', 'like', '%' . $this->f_codigo . '%');
            })


            //fin prueba
            ->when($this->f_codigoProducto, function ($query) {
                return $query->whereHas('producto', function ($query) {
                    $query->where('codigo', 'like', '%' . $this->f_codigoProducto . '%');
                });
            })
            ->when($this->f_nombreProducto, function ($query) {
                return $query->whereHas('producto', function ($query) {
                    $query->where('nombre', 'like', '%' . $this->f_nombreProducto . '%');
                });
            })
            ->when($this->f_destino, function ($query) {
                return $query->whereHas('producto.destinoProducto', function ($query) {
                    $query->where('nombre', 'like', '%' . $this->f_destino . '%');
                });
            })
            ->when($this->f_lote, function ($query) {
                return $query->where('lote', 'like', '%' . $this->f_lote . '%');
            })
            ->when($this->f_updated_at , function ($query) {
                return $query->where('updated_at', 'like', '%' . $this->f_updated_at . '%');
            })
            ->when($this->f_estado, function ($query) {
                return $query->where('estado', 'like', '%' . $this->f_estado . '%');
            })
            ->when($this->f_tiempoElaboracion, function ($query) {
                return $query->where('tiempo_elaboracion', 'like', '%' . $this->f_tiempoElaboracion . '%');
            })
            ->when($this->f_fechaVencimiento1, function ($query) {
                return $query->where('fecha_vencimiento1', 'like', '%' . $this->f_fechaVencimiento1 . '%');
            })
            ->when($this->f_fechaVencimiento2, function ($query) {
                return $query->where('fecha_vencimiento2', 'like', '%' . $this->f_fechaVencimiento2 . '%');
            })

            ->when($this->f_productoCodigo, function ($query) {
                return $query->whereHas('producto', function ($query) {
                    $query->where('codigo', 'like', '%' . $this->f_productoCodigo . '%');
                });
            })

            ->when($this->sortField, function ($query) {
                $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
            })
            ;

        $orps =  $query->paginate(50);


        return view('livewire.htst.tabla', [
            'orps' => $orps
        ]);
    }

    public function aplicarFiltros()
    {
        $this->aplicandoFiltros = true;
        // Resto de la lógica para aplicar los filtros
    }
    public function limpiarFiltros()
    {
        $this->reset(['f_codigo', 'f_codigoProducto', 'f_nombreProducto', 'f_lote', 'f_estado', 'f_tiempoElaboracion', 'f_fechaVencimiento1', 'f_fechaVencimiento2', 'f_productoCodigo','f_grupo']);

        // Refresca el componente
        $this->js('window.location.reload()');
    }
    private function hayFiltrosActivos(): bool
    {
        return $this->f_codigo || $this->f_codigoProducto || $this->f_nombreProducto || $this->f_lote || $this->f_estado || $this->f_tiempoElaboracion || $this->f_fechaVencimiento1 || $this->f_fechaVencimiento2 || $this->f_productoCodigo || $this->f_grupo;
    }












}
