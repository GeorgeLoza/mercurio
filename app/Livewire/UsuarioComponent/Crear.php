<?php

namespace App\Livewire\UsuarioComponent;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Modelable;
use Illuminate\Support\Facades\Hash;
use LivewireUI\Modal\ModalComponent;

class Crear extends ModalComponent
{
    public $codigo;
    public $nombre;
    public $apellido;
    public $telefono;
    public $correo;
    public $password;

    public function render()
    {
        return view('livewire.usuario-component.crear');
    }


    public function save()
    {
        $this->validate([
            'codigo' => 'required|min:4|max:7||unique:users',
            'nombre' => 'required',
            'apellido' => 'required',
            'telefono' => 'required',
            'correo' => 'required|email',
            'password' => 'required'
        ]);
        try {

            User::create([
                'codigo' => $this->codigo,
                'nombre' => $this->nombre,
                'apellido' => $this->apellido,
                'telefono' => $this->telefono,
                'correo' => $this->correo,
                'password' => Hash::make($this->password),
            ]);
            $this->dispatch('actualizar_tabla_usuarios');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'Usuario registrado exitosamente');
            
        } catch (\Throwable $th) {
            $this->closeModal();
            $this->dispatch('error', mensaje: $th);
        }
    }
}
