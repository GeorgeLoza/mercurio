<?php

namespace App\Livewire\UsuarioComponent;

use App\Models\Division;
use App\Models\Planta;
use App\Models\User;
use App\Models\Role;
use Livewire\Component;
use Livewire\Attributes\Modelable;
use Illuminate\Support\Facades\Hash;
use LivewireUI\Modal\ModalComponent;

class Crear extends ModalComponent
{
    //inputs
    public $codigo;
    public $nombre;
    public $apellido;
    public $telefono;
    public $correo;

    public $planta_id;
    public $division_id;
    public $rol_id;
    public $password;
    //valores para cargar selects
    public $plantas;
    public $divisiones;
    public $roles;

    public function mount()
    {
        $this->plantas = Planta::all();
        $this->divisiones = Division::all();
        $this->roles = Role::all();
    }

    public function render()
    {
        return view('livewire.usuario-component.crear');
    }


    public function save()
    {
        $this->validate([
            'codigo' => 'required|min:4|max:7|unique:users',
            'nombre' => 'required',
            'apellido' => 'required',
            'telefono' => 'required',
            'correo' => 'required|email',
            'planta_id' => 'required',
            'division_id' => 'required',

            'password' => 'required'
        ]);
        try {

            User::create([
                'codigo' => $this->codigo,
                'nombre' => $this->nombre,
                'apellido' => $this->apellido,
                'telefono' => $this->telefono,
                'correo' => $this->correo,
                'rol' => 'Trabajador',
                'rol_id' => $this->rol_id,
                'planta_id' => $this->planta_id,
                'division_id' => $this->division_id,
                'password' => Hash::make($this->password),
            ]);
            $this->dispatch('actualizar_tabla_usuarios');
            $this->dispatch('actualizar_perfil_usuarios');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'Usuario registrado exitosamente');
        } catch (\Throwable $th) {
            $this->closeModal();
            $this->dispatch('error_mensaje', mensaje: 'Error'. $th);
        }
    }
}
