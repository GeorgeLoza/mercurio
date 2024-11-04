<?php

namespace App\Livewire\LecheCruda\Analisis;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\CalidadLeche;
use Livewire\WithPagination;
use App\Models\ParametroLeche;
use App\Models\SolicitudAnalisisLinea;
use Carbon\Carbon;

class Tabla extends Component
{

    use WithPagination;
//parametros
public $parametro;
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


    
}
