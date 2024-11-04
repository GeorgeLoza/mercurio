<?php

namespace App\Livewire\AnalisisLinea\Analisis;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\AnalisisLinea;
use App\Models\CalidadLeche;
use App\Models\RecepcionLeche;
use App\Models\SolicitudAnalisisLinea;
use Carbon\Carbon;

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

    public $analisisPendientes;

    protected $listeners = ['refreshComponent' => '$refresh'];

    public function mount()
    {
        $this->checkForPendingAnalisis();
        $this->sortField = 'created_at';
        $this->sortAsc = false;
    }

    public function checkForPendingAnalisis()
    {
        // Obtén la fecha y hora de hace una hora
        $oneHourAgo = Carbon::now()->subHour();

        // Consulta los registros que tienen estado 'Pendiente' y fueron creados en la última hora
        $this->analisisPendientes = SolicitudAnalisisLinea::where('estado', 'Pendiente')
            ->where('created_at', '>=', $oneHourAgo)
            ->exists(); // Devuelve true si encuentra algún registro, false si no

        // Si hay análisis pendientes, emitir el evento para reproducir el sonido
        if ($this->analisisPendientes) {
            $this->dispatch('analisisPendiente');
        }
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



    #[On('actualizar_tabla_analisisLineas')]
    public function render()
    {

        $this->aplicandoFiltros = $this->hayFiltrosActivos();
        $query = AnalisisLinea::query()
            ->when($this->f_orp, function ($query) {
                return $query->whereHas('solicitudAnalisisLinea.estadoPlanta.estadoDetalle.orp', function ($query) {
                    $query->where('codigo', 'like', '%' . $this->f_orp . '%');
                });
            })
            ->when($this->f_producto, function ($query) {
                return $query->whereHas('solicitudAnalisisLinea.estadoPlanta.estadoDetalle.orp.producto', function ($query) {
                    $query->where('nombre', 'like', '%' . $this->f_producto . '%');
                });
            })
            ->when($this->f_preparacion, function ($query) {
                return $query->whereHas('solicitudAnalisisLinea.estadoPlanta.estadoDetalle', function ($query) {
                    $query->where('preparacion', 'like', '%' . $this->f_preparacion . '%');
                });
            })
            ->when($this->f_origen, function ($query) {
                return $query->whereHas('solicitudAnalisisLinea.estadoPlanta.origen', function ($query) {
                    $query->where('alias', 'like', '%' . $this->f_origen . '%');
                });
            })
            ->when($this->f_etapa, function ($query) {
                return $query->whereHas('solicitudAnalisisLinea.estadoPlanta.etapa', function ($query) {
                    $query->where('nombre', 'like', '%' . $this->f_etapa . '%');
                });
            })
            ->when($this->f_estado, function ($query) {
                return $query->whereHas('solicitudAnalisisLinea', function ($query) {
                    $query->where('estado', 'like', '%' . $this->f_estado . '%');
                });
            })
            ->with(['solicitudAnalisisLinea.estadoPlanta.etapa.parametroLinea'])
            ->when($this->sortField, function ($query) {
                $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
            });

        $calidades = $this->aplicandoFiltros ? $query->get() : $query->paginate(50);

        $pendiente = RecepcionLeche::where('estado', 'pendiente')
            ->where('created_at', '>=', Carbon::now()->subMinutes(20))
            ->exists(); // Devuelve true si existen registros, false si no



        return view('livewire.analisis-linea.analisis.tabla', [
            'calidades' => $calidades,
            'pendiente' => $pendiente
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
        return $this->f_orp || $this->f_producto || $this->f_tiempo || $this->f_user || $this->f_preparacion || $this->f_origen || $this->f_estado || $this->f_etapa;
    }
}
