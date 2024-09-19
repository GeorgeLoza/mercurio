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
    public $f_rol = null;
    public $f_planta = null;
    public $f_division = null;
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


    #[On('actualizar_tabla_usuarios')]
    public function render()
    {
        $usuario = User::query()
            ->when($this->f_codigo, function ($query) {
                return $query->where('codigo', 'like', '%' . $this->f_codigo . '%');
            })
            ->when($this->f_nombre, function ($query) {
                return $query->where(function ($query) {
                    $query->where('nombre', 'like', '%' . $this->f_nombre . '%')
                        ->orWhere('apellido', 'like', '%' . $this->f_nombre . '%');
                });
            })
            ->when($this->f_telefono, function ($query) {
                return $query->where('telefono', 'like', '%' . $this->f_telefono . '%');
            })
            ->when($this->f_correo, function ($query) {
                return $query->where('correo', 'like', '%' . $this->f_correo . '%');
            })
            ->when($this->f_rol, function ($query) {
                return $query->where('rol', 'like', '%' . $this->f_rol . '%');
            })
            ->when($this->f_planta, function ($query) {
                return $query->whereHas('planta', function ($query) {
                    $query->where('nombre', 'like', '%' . $this->f_planta . '%');
                });
            })
            ->when($this->f_division, function ($query) {
                return $query->whereHas('division', function ($query) {
                    $query->where('nombre', 'like', '%' . $this->f_division . '%');
                });
            })
            ->when($this->sortField, function ($query) {
                $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
            })
            ->get();


        return view('livewire.usuario-component.tabla', [
            'usuarios' => $usuario
            
        ]);
        
        
    }
}
