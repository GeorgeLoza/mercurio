<?php

namespace App\Livewire\General\Roles;

use App\Models\Role;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Eliminar extends ModalComponent
{
    public $id;

    public function render()
    {
        return view('livewire.general.roles.eliminar');
    }

    public function delete()
    {
        try {
            $role = Role::find($this->id);
            if ($role) {
                $role->delete();
                $this->dispatch('actualizar_tabla_role');
                $this->closeModal();
                $this->dispatch('success', mensaje: 'Rol eliminado exitosamente');
            } else {
                $this->dispatch('error_mensaje', mensaje: 'Rol no encontrado');
            }
        } catch (\Throwable $th) {
            $this->dispatch('error_mensaje', mensaje: 'Problema: ' . $th->getMessage());
        }
    }
}
