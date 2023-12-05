<?php

namespace App\Livewire\UsuarioComponent;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On; 

class Tabla extends Component
{

    //filtros-busqueda
    public $f_codigo = null;
    public $f_nombre = null;
    public $f_telefono = null;
    public $f_correo = null;
    //filtros-ordenamiento
    public $sortField;
    public $sortAsc = true;
    //paginacion


    
    public function sortBy($field)
    {
        if($this->sortField === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }

    
    #[On('actualizar_tabla_usuarios')] 
    public function render()
    {
       $usuario = User::query()
            ->when($this->f_codigo, function ($query) {
                return $query->where('codigo', 'like', '%' . $this->f_codigo . '%');
            })
            ->when($this->f_nombre, function ($query) {
                return $query->where('nombre', 'like', '%' . $this->f_nombre . '%')->orwhere('apellido', 'like', '%' . $this->f_nombre . '%');
            })
            
            ->when($this->f_telefono, function ($query) {
                return $query->where('telefono', 'like', '%' . $this->f_telefono . '%');
            })
            ->when($this->f_correo, function ($query) {
                return $query->where('correo', 'like', '%' . $this->f_correo . '%');
            })
            ->when($this->sortField, function($query){
                $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
            })
            ->get();

        return view('livewire.usuario-component.tabla', ['usuarios' => $usuario
        ]);
    }
}


