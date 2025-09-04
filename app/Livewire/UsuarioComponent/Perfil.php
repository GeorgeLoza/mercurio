<?php

namespace App\Livewire\UsuarioComponent;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\Attributes\On;
use LivewireUI\Modal\ModalComponent;

class Perfil extends ModalComponent
{

    public $id;

    public $codigo;
    public $nombre;
    public $apellido;
    public $telefono;
    public $correo;
    public $password;
    public $color;
    public $barra;
    public $password_confirmation;
    public function mount()
    {
        $this->id = auth()->user()->id;
        $usuario = User::where('id', $this->id)->first();
        $this->codigo = $usuario->codigo;
        $this->nombre = $usuario->nombre;
        $this->apellido = $usuario->apellido;
        $this->telefono = $usuario->telefono;
        $this->correo = $usuario->correo;
        $this->barra = (bool) $usuario->barra;
        $this->color = $usuario->color ?? '#000000';


    }

    public function render()
    {
        return view('livewire.usuario-component.perfil');
    }

    public function update()
    {

        $this->validate([
            'codigo' => 'required|min:4|max:7',
            'nombre' => 'required',
            'apellido' => 'required',
            // 'telefono' => 'required',
            // 'correo' => 'required|email',

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
            $usuario->barra = $this->barra ? 1 : 0;
            $usuario->color = $this->color;

            if ($this->password != null) {
                $usuario->password = Hash::make($this->password);
            }

            $usuario->save();

            $this->dispatch('actualizar_tabla_usuarios');
            $this->dispatch('success', mensaje: 'Se actualizo el usuario exitosamente ');
            $this->closeModal();
             return redirect(request()->header('Referer'));
        } catch (\Throwable $th) {
            $this->closeModal();
            $this->dispatch('error_mensaje', mensaje: 'problema'.$th->getMessage());
        }
    }
}
