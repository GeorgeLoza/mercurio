<?php

namespace App\Livewire\LecheCruda\Recepcion;

use Livewire\Component;
use App\Models\Contador;
use App\Models\RecepcionLeche;
use Livewire\Attributes\On;

class Tabla extends Component
{


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
    }

    #[On('actualizar_tabla_recepcionLeche')]
    public function render()
    {
        $this->aplicandoFiltros = $this->hayFiltrosActivos();
       
        $query = RecepcionLeche::query()
            ->when($this->f_tiempo, function ($query) {
                return $query->where('tiempo', 'like', '%' . $this->f_tiempo . '%');
            })
            
            ->when($this->f_ruta, function ($query) { 
               return $query->whereHas('subruta_acopio.ruta_acopio', function ($query) {
                        $query->where('nombre', 'like', '%' . $this->f_ruta . '%');
                    });
                })
            
            ->when($this->f_subruta, function ($query) {
                return $query->whereHas('subruta_acopio', function ($query) {
                    $query->where('nombre', 'like', '%' . $this->f_subruta . '%');
                });
            })
            ->when($this->f_estado, function ($query) {
                return $query->where('estado', 'like', '%' . $this->f_estado . '%');
            })
            ->when($this->f_cantidad, function ($query) {
                return $query->where('cantidad', 'like', '%' . $this->f_cantidad . '%');
            })
            ->when($this->f_user, function ($query) {
                return $query->whereHas('user', function ($query) {
                    $query->where(function ($query) {
                        $query->where('nombre', 'like', '%' . $this->f_user . '%')
                            ->orWhere('apellido', 'like', '%' . $this->f_user . '%');
                    });
                });
            }) 
            ->when($this->sortField, function ($query) {
                $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
            });
            $recepciones = $this->aplicandoFiltros ? $query->get() : $query->paginate(50); 


        return view('livewire.leche-cruda.recepcion.tabla', [
            'recepciones' => $recepciones
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
