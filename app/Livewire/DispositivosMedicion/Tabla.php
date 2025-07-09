<?php

namespace App\Livewire\DispositivosMedicion;

use App\Models\DispositivosMedicion;
use Livewire\Component;

class Tabla extends Component
{
    //variables para filtros-busqueda
    public $f_dispositivo = null;
    public $f_codigo = null;
    public $f_marca = null;
    public $f_modelo = null;
    public $f_areaUso = null;
    public $f_responsable = null;
    

    public function render()
    {
        $dispositivos = DispositivosMedicion::query()
                
        ->when($this->f_dispositivo, function ($query) {
            return $query->where('dispositivo', 'like', '%' . $this->f_dispositivo . '%');
        })
        
        ->when($this->f_codigo, function ($query) {
            return $query->where('codigo', 'like', '%' . $this->f_codigo . '%');
        })
        ->when($this->f_marca, function ($query) {
            return $query->where('marca', 'like', '%' . $this->f_marca . '%');
        })
        ->when($this->f_modelo, function ($query) {
            return $query->where('modelo', 'like', '%' . $this->f_modelo . '%');
        })
        ->when($this->f_areaUso, function ($query) {
            return $query->where('area_uso', 'like', '%' . $this->f_areaUso . '%');
        })
        ->when($this->f_responsable, function ($query) {
            return $query->where('responsable', 'like', '%' . $this->f_responsable . '%');
        })
        ->when($this->sortField, function($query){
            $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
        })
        ->get();
        return view('livewire.dispositivos-medicion.tabla', compact('dispositivos'));
    }
}
