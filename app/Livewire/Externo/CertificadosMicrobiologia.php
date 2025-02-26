<?php

namespace App\Livewire\Externo;

use App\Models\ActividadAgua;
use App\Models\AguaFisico;
use App\Models\DetalleSolicitudPlanta;
use App\Models\MicrobiologiaExterno;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;



class CertificadosMicrobiologia extends Component
{

    use WithPagination;

    public $selectedOption = 'micro';

    public $f_codigo;
    public $f_producto;
    public $f_lote;
    public $f_estado;

    public $aplicandoFiltros = false;
    public $filtro = false;

    public function show_filtro()
    {
        $this->filtro = !$this->filtro;
    }

    public function aplicarFiltros()
    {
        $this->aplicandoFiltros = true;
        $this->resetPage();
    }

    public function limpiarFiltros()
    {
        $this->reset(['f_codigo', 'f_producto', 'f_lote', 'f_estado']);
        $this->aplicandoFiltros = false;
        $this->resetPage();
    }

    public function render()
    {
        $query = MicrobiologiaExterno::query()
            ->when($this->f_codigo, function ($query) {
                $query->whereHas('detalleSolicitudPlanta', function ($query) {
                    $query->where('subcodigo', 'like', '%' . $this->f_codigo . '%');
                });
            })
            ->when($this->f_producto, function ($query) {
                $query->whereHas('detalleSolicitudPlanta.productosPlanta', function ($query) {
                    $query->where('nombre', 'like', '%' . $this->f_producto . '%');
                });
            })
            ->when($this->f_lote, function ($query) {
                $query->whereHas('detalleSolicitudPlanta', function ($query) {
                    $query->where('lote', 'like', '%' . $this->f_lote . '%');
                });
            })
            ->when($this->f_estado, function ($query) {
                $query->whereHas('detalleSolicitudPlanta', function ($query) {
                    $query->where('estado', 'like', '%' . $this->f_estado . '%');
                });
            })
            ->when(auth()->check() && auth()->user()->role->id == 23, function ($query) {
                $query->whereHas('detalleSolicitudPlanta.solicitudPlanta.user', function ($query) {
                    $query->where('planta_id', auth()->user()->planta_id);
                });
            })
            ->orderBy('id', 'desc'); // Ordenar de manera descendente según el id;

        $micros = $this->aplicandoFiltros ? $query->get() : $query->paginate(50);



        $query1 = ActividadAgua::query();
        $query2 = AguaFisico::query();

        $applyFilters = function ($query) {
            return $query
                ->when($this->f_codigo, function ($query) {
                    $query->whereHas('detalleSolicitudPlanta', function ($query) {
                        $query->where('subcodigo', 'like', '%' . $this->f_codigo . '%');
                    });
                })
                ->when($this->f_producto, function ($query) {
                    $query->whereHas('detalleSolicitudPlanta.productosPlanta', function ($query) {
                        $query->where('nombre', 'like', '%' . $this->f_producto . '%');
                    });
                })
                ->when($this->f_lote, function ($query) {
                    $query->whereHas('detalleSolicitudPlanta', function ($query) {
                        $query->where('lote', 'like', '%' . $this->f_lote . '%');
                    });
                })
                ->when($this->f_estado, function ($query) {
                    $query->whereHas('detalleSolicitudPlanta', function ($query) {
                        $query->where('estado', 'like', '%' . $this->f_estado . '%');
                    });
                })
                ->when(auth()->check() && auth()->user()->role->id == 23, function ($query) {
                    $query->whereHas('detalleSolicitudPlanta.solicitudPlanta.user', function ($query) {
                        $query->where('planta_id', auth()->user()->planta_id);
                    });
                });
        };

        // Aplicar filtros a ambas consultas
        $query1 = $applyFilters($query1);
        $query2 = $applyFilters($query2);

        // Obtener resultados
        $result1 = $query1->get();
        $result2 = $query2->get();

        // Combinar y ordenar por subcodigo en orden descendente
        $fisicos = collect($result1)->merge($result2)->sortByDesc('detalleSolicitudPlanta.subcodigo');

        // Si no se están aplicando filtros, paginar manualmente
        if (!$this->aplicandoFiltros) {
            $page = request()->get('page', 1); // Obtener la página actual
            $perPage = 50; // Elementos por página
            $fisicos = new LengthAwarePaginator(
                $fisicos->forPage($page, $perPage), // Obtener elementos para la página actual
                $fisicos->count(), // Total de elementos
                $perPage, // Elementos por página
                $page, // Página actual
                ['path' => request()->url(), 'query' => request()->query()] // URL de paginación
            );
        }


        return view('livewire.externo.certificados-microbiologia', [
            'micros' => $micros,
            'fisicos' => $fisicos,
        ]);
    }

    public function cambiar_estado($id)
    {

        $registro = DetalleSolicitudPlanta::find($id);
        $registro->estado = 'Terminado';
        $registro->save();
    }

    public function cancelar($id)
    {
        $registro = DetalleSolicitudPlanta::find($id);
        $registro->estado = 'Cancelado';
        $registro->save();
    }
}
