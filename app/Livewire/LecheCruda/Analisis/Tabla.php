<?php

namespace App\Livewire\LecheCruda\Analisis;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\CalidadLeche;
use Livewire\WithPagination;
use App\Models\ParametroLeche;
use App\Models\SolicitudAnalisisLinea;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AnalisisLeche;
class Tabla extends Component
{

    use WithPagination;
//parametros
public $parametro;

public $anio;  // Año, por ejemplo: 2024
public $mes;
public $dia;
public $fecha;
public $cat;
    //filtros-busqueda
    public $f_tiempo = null;
    public $f_ruta = null;
    public $f_subruta = null;
    public $f_estado = null;
    public $f_cantidad = null;
    public $f_user = null;

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
        $this->parametro = ParametroLeche::first();

    }

    #[On('actualizar_tabla_CalidadLeche')]
    public function render()
    {
        $this->aplicandoFiltros = $this->hayFiltrosActivos();

        $query = CalidadLeche::query()
            ->when($this->f_tiempo, function ($query) {
                return $query->where('tiempo', 'like', '%' . $this->f_tiempo . '%');
            })

            ->when($this->f_ruta, function ($query) {
                return $query->whereHas('recepcion_leche.subruta_acopio.ruta_acopio', function ($query) {
                    $query->where('nombre', 'like', '%' . $this->f_ruta . '%');
                });
            })

            ->when($this->f_subruta, function ($query) {
                return $query->whereHas('recepcion_leche.subruta_acopio', function ($query) {
                    $query->where('nombre', 'like', '%' . $this->f_subruta . '%');
                });
            })
            ->when($this->f_estado, function ($query) {
                return $query->whereHas('recepcion_leche', function ($query) {
                    $query->where('estado', 'like', '%' . $this->f_estado . '%');
                });
            })

            ->when($this->f_cantidad, function ($query) {
                return $query->where('cantidad', 'like', '%' . $this->f_cantidad . '%');
            })
            ->when($this->f_user, function ($query) {
                return $query->whereHas('user', function ($query) {
                    $query->where('nombre', 'like', '%' . $this->f_user . '%');
                });
            })
            ->when($this->sortField, function ($query) {
                $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
            });
            $registros = $this->aplicandoFiltros ? $query->get() : $query->paginate(50);
            $pendiente = SolicitudAnalisisLinea::where('estado', 'pendiente')
            ->where('created_at', '>=', Carbon::now()->subMinutes(20))
            ->exists(); // Devuelve true si existen registros, false si no

        return view('livewire.leche-cruda.analisis.tabla', [
            'registros' => $registros,'pendiente' => $pendiente
        ]);
    }

    public function aplicarFiltros()
    {
        $this->aplicandoFiltros = true;
        // Resto de la lógica para aplicar los filtros
    }

    public function limpiarFiltros()
    {
        $this->reset(['f_tiempo', 'f_ruta', 'f_subruta', 'f_estado', 'f_cantidad', 'f_user']);

        // Refresca el componente
        $this->js('window.location.reload()');
    }
    private function hayFiltrosActivos(): bool
    {
        return $this->f_tiempo || $this->f_ruta || $this->f_subruta || $this->f_estado || $this->f_cantidad || $this->f_user;
    }



    public function exportarExcel()
{
    // Asegúrate de que $this->fecha esté correctamente definido
    // Extraer año, mes y día de la fecha seleccionada
    $anio = Carbon::parse($this->fecha)->year;
    $mes = Carbon::parse($this->fecha)->month;
    $dia = Carbon::parse($this->fecha)->day;



    // Consultar registros basados en la fecha completa
    $orp = CalidadLeche::all(); // Filtra por códigos específicos




        // Ordena por fecha




    // Crear nombre del archivo con la fecha seleccionada
    $nombreMes = Carbon::createFromFormat('m', $mes)->translatedFormat('F'); // Obtener el nombre del mes
    $nombreArchivo = "{$dia}-{$nombreMes}-{$anio}.csv";

    // Exportar datos usando el paquete maatwebsite/excel
    return Excel::download(new AnalisisLeche($orp), 'leche.xlsx');

}



}
