<?php

namespace App\Livewire\UsuarioComponent;

use App\Models\User;
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

    public function mount()
    {
        $usuario = User::where('id', $this->id)->first();
        $this->codigo = $usuario->codigo;
        $this->nombre = $usuario->nombre;
        $this->apellido = $usuario->apellido;
        $this->telefono = $usuario->telefono;
        $this->correo = $usuario->correo;
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
        ]);
        try {

            $usuario = User::find($this->id);
            $usuario->codigo = $this->codigo;
            $usuario->nombre = $this->nombre;
            $usuario->apellido = $this->apellido;
            $usuario->telefono = $this->telefono;
            $usuario->correo = $this->correo;
            $usuario->save();

            $this->dispatch('actualizar_tabla_usuarios');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'Se actualizo el usuario exitosamente');
        } catch (\Throwable $th) {
            $this->closeModal();
            $this->dispatch('error', mensaje: $th);
        }
    }
}
