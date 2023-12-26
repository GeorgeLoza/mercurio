<?php

namespace App\Livewire\UsuarioComponent;

use App\Models\User;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Eliminar extends ModalComponent
{
    public $id;

    public function render()
    {
        return view('livewire.usuario-component.eliminar');
    }

    public function delete()
    {
        try {
            User::find($this->id)->delete();
            $this->dispatch('actualizar_tabla_usuarios');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'Se Elimino el usuario exitosamente');
        } catch (\Throwable $th) {
            $this->dispatch('error', mensaje: 'Error'. $th);
        }
    }
}
