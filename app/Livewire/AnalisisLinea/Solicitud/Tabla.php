<?php

namespace App\Livewire\AnalisisLinea\Solicitud;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\SolicitudAnalisisLinea;

class Tabla extends Component
{

    //filtros-busqueda
    public $f_orp = null;
    public $f_producto = null;
    public $f_tiempo = null;
    public $f_user = null;
    public $f_preparacion = null;
    public $f_origen = null;
    public $f_estado = null;
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


    #[On('actualizar_tabla_solicitudAnalisisLineas')]
    public function render()
    {
        $this->aplicandoFiltros = $this->hayFiltrosActivos();
       
        $query = SolicitudAnalisisLinea::query()
            ->when($this->f_orp, function ($query) {
                return $query->whereHas('AnalisisLinea.solicitudAnalisisLinea.estadoPlanta.estadoDetalle.orp', function ($query) {
                    $query->where('codigo', 'like', '%' . $this->f_orp . '%');
                });
            })
            ->when($this->f_producto, function ($query) {
                return $query->whereHas('estadoPlanta.estadoDetalle.orp.producto', function ($query) {
                    $query->where('nombre', 'like', '%' . $this->f_producto . '%');
                });
            }) ->when($this->f_tiempo, function ($query) {
                return $query->whereHas('estadoPlanta.estadoDetalle', function ($query) {
                    $query->where('tiempo', 'like', '%' . $this->f_tiempo . '%');
                });
            })
            ->when($this->f_user, function ($query) {
                return $query->whereHas('user', function ($query) {
                    $query->where(function ($query) {
                        $query->where('nombre', 'like', '%' . $this->f_user . '%')
                            ->orWhere('apellido', 'like', '%' . $this->f_user . '%');
                    });
                });
            })
            ->when($this->f_preparacion, function ($query) {
                return $query->whereHas('estadoPlanta.estadoDetalle', function ($query) {
                    $query->where('preparacion', 'like', '%' . $this->f_preparacion . '%');
                });
            })
            ->when($this->f_origen, function ($query) {
                return $query->whereHas('estadoPlanta.origen', function ($query) {
                    $query->where('alias', 'like', '%' . $this->f_origen . '%');
                });
            })
            ->when($this->f_etapa, function ($query) {
                return $query->whereHas('estadoPlanta.etapa', function ($query) {
                    $query->where('nombre', 'like', '%' . $this->f_etapa . '%');
                });
            })
            ->when($this->f_estado, function ($query) {
                return $query->where('estado', 'like', '%' . $this->f_estado . '%');
            })
            ->when($this->sortField, function ($query) {
                $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
            });

            $solicitudes = $this->aplicandoFiltros ? $query->get() : $query->paginate(50);
          

        return view('livewire.analisis-linea.solicitud.tabla', [
            'solicitudes' => $solicitudes
        ]);
    }
    public function aplicarFiltros()
    {
        $this->aplicandoFiltros = true;
        // Resto de la lógica para aplicar los filtros
    }

    public function limpiarFiltros()
    {
        $this->reset(['f_orp', 'f_producto', 'f_tiempo', 'f_user', 'f_preparacion', 'f_origen', 'f_estado', 'f_etapa']);

        // Refresca el componente
        $this->js('window.location.reload()');
    }
    private function hayFiltrosActivos(): bool
    {
        return $this->f_orp || $this->f_producto || $this->f_tiempo || $this->f_user || $this->f_preparacion || $this->f_origen || $this->f_estado|| $this->f_etapa;
    }


}
