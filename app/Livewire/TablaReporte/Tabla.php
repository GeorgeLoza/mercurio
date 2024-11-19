<?php

namespace App\Livewire\TablaReporte;

use Livewire\Component;
use App\Models\AnalisisLinea;
use App\Models\CalidadLeche;
use App\Models\RecepcionLeche;
use App\Models\SolicitudAnalisisLinea;
use Livewire\Attributes\On;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DatosExport;
use App\Models\Orp;

class Tabla extends Component
{
    // descarga excel


    public $anio;  // Año, por ejemplo: 2024
    public $mes;    // Mes, por ejemplo: 6 (junio)

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

    protected $rules = [
        'mes' => 'required|integer|min:1|max:12',
        'anio' => 'required|integer|min:2024|max:2100',
    ];

    public function mount()
    {
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

    public function exportarExcel()

    {
        ini_set('max_execution_time', 300);
        ini_set('memory_limit', '512M');

        $this->validate();


        $analisis = AnalisisLinea::whereHas('solicitudAnalisisLinea.estadoPlanta.estadoDetalle.orp', function ($query) {
            $query->whereNotIn('codigo', [0, 1, 2]);
        })
            ->when($this->anio, function ($query) {
                return $query->whereYear('created_at', $this->anio);
            })
            ->when($this->mes, function ($query) {
                return $query->whereMonth('created_at', $this->mes);
            })
            // ->when($this->mes, function ($query) {
            //     return $query->whereMonth('created_at', '<', $this->mes);
            // })
            ->orderBy('created_at', 'asc')
            ->get();

        $nombreMes = Carbon::createFromFormat('m', $this->mes)->translatedFormat('F'); // 'F' da el nombre completo del mes
        $nombreArchivo = "{$nombreMes}-{$this->anio}.csv";
        // Utiliza el paquete maatwebsite/excel para exportar los datos a un archivo Excel
        return Excel::download(new DatosExport($analisis), $nombreArchivo, \Maatwebsite\Excel\Excel::CSV);
    }

    // public function exportarExcel( )

    // {  

    //     $this->validate();


    //     $analisis = AnalisisLinea::whereHas('solicitudAnalisisLinea.estadoPlanta.estadoDetalle.orp', function ($query) {
    //         $query->whereNotIn('codigo', [1, 2, 0, 10073794  ]);
    //     })
    //     ->when($this->anio, function ($query) {
    //         return $query->whereYear('created_at', $this->anio);
    //     })
    //     ->when($this->mes, function ($query) {
    //         return $query->whereMonth('created_at', $this->mes);
    //     })
    //     ->orderBy('created_at', 'desc')
    //     ->get();

    //     $nombreMes = Carbon::createFromFormat('m', $this->mes)->translatedFormat('F'); // 'F' da el nombre completo del mes

    //     // Utiliza el paquete maatwebsite/excel para exportar los datos a un archivo Excel
    //     return Excel::download(new DatosExport($analisis), "{$nombreMes}-{$this->anio}.xlsx");
    // }



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



        return view('livewire.tabla-reporte.tabla', [
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
