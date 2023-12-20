<?php

namespace App\Livewire\Orp;

use App\Models\Orp;
use Livewire\Component;
use Livewire\Attributes\On;

class Tabla extends Component
{
       
    //filtros-busqueda
    public $f_codigo = null;
    public $f_lote = null;
    public $f_estado = null;
    public $f_tiempoElaboracion = null;
    public $f_fechaVencimiento1 = null;
    public $f_fechaVencimiento2 = null;
    public $f_producto = null;
    public $f_productoCodigo = null;
    //filtros-ordenamiento
    public $sortField;
    public $sortAsc = true;
    //mostrar filtro
    public $filtro=false;
    
    public function show_filtro(){
        $this->filtro =!$this->filtro;
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

    public function iniciar($id){
        
        $registro = Orp::find($id);
        $registro->estado = 'En proceso';
        $registro->save();
    }

    public function cancelar($id){
        $registro = Orp::find($id);
        $registro->estado = 'Cancelado';
        $registro->save();
    }

    public function mount()
    {
        $this->sortField = 'created_at';
        $this->sortAsc = false;
    }


    #[On('actualizar_tabla_orps')]
    public function render()
    {
        $orps = Orp::query()
            ->when($this->f_codigo, function ($query) {
                return $query->where('codigo', 'like', '%' . $this->f_codigo . '%');
            })
            ->when($this->f_lote, function ($query) {
                return $query->where('cantidad', 'like', '%' . $this->f_cantidad . '%');
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
            ->when($this->f_producto, function ($query) {
                return $query->whereHas('producto', function ($query) {
                    $query->where('nombre', 'like', '%' . $this->f_producto . '%');
                });
            })
            ->when($this->f_productoCodigo, function ($query) {
                return $query->whereHas('producto', function ($query) {
                    $query->where('codigo', 'like', '%' . $this->f_productoCodigo . '%');
                });
            })
            
            ->when($this->sortField, function ($query) {
                $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
            })
            ->get();

        return view('livewire.orp.tabla', [
            'orps' => $orps
        ]);

    }

}
