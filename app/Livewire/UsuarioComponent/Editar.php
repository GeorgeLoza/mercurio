<?php

namespace App\Livewire\UsuarioComponent;

use App\Models\Division;
use App\Models\Planta;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Editar extends ModalComponent
{
    public $id;

    public $codigo;
    public $nombre;
    public $apellido;
    public $telefono;
    public $correo;
    public $rol;
    public $division_id;
    public $role_id;
    public $password;
    public $password_confirmation;

    //valores para cargar selects
    public $divisiones;
    public $roles;

    public function mount()
    {
        $this->divisiones = Division::all();

        $this->roles = Role::all();

        $usuario = User::where('id', $this->id)->first();
        $this->codigo = $usuario->codigo;
        $this->nombre = $usuario->nombre;
        $this->apellido = $usuario->apellido;
        $this->telefono = $usuario->telefono;
        $this->correo = $usuario->correo;
        $this->rol = $usuario->rol;
        $this->role_id = $usuario->rol_id;
        $this->division_id = $usuario->division_id;
    }

    public function render()
    {
        return view('livewire.usuario-component.editar');
    }

    public function update()
    {

        $this->validate([
            'codigo' => 'required|min:4|max:7',
            'nombre' => 'required',
            'apellido' => 'required',
            'telefono' => 'required',
            'correo' => 'required|email',

            'division_id' => 'required',

        ]);
        if ($this->password != null) {
            $this->validate([
                'password' => 'confirmed',

            ]);
        }
        try {

            $usuario = User::find($this->id);
            $usuario->codigo = $this->codigo;
            $usuario->nombre = $this->nombre;
            $usuario->apellido = $this->apellido;
            $usuario->telefono = $this->telefono;
            $usuario->correo = $this->correo;
            $usuario->rol = $this->rol;

            $usuario->rol_id = $this->role_id;

            $usuario->division_id = $this->division_id;
            if ($this->password != null) {
                $usuario->password = Hash::make($this->password);
            }
            $usuario->save();

            $this->dispatch('actualizar_tabla_usuarios');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'Se actualizo el usuario exitosamente');
        } catch (\Throwable $th) {
            $this->closeModal();
            $this->dispatch('error_mensaje', mensaje: 'problema'.$th->getMessage());
        }
    }
}
