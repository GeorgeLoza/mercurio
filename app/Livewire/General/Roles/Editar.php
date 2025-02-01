<?php

namespace App\Livewire\General\Roles;

use App\Models\Role;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Editar extends ModalComponent
{
    public $id;
    public $name;
    public $description;

    public function mount()
    {
        $role = Role::where('id', $this->id)->first();
        $this->name = $role->name;
        $this->description = $role->description;
    }

    public function render()
    {
        return view('livewire.general.roles.editar');
    }

    public function update()
    {
        $this->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        try {
            $role = Role::find($this->id);
            $role->name = $this->name;
            $role->description = $this->description;

            $role->save();

            $this->dispatch('actualizar_tabla_role');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'Rol actualizado exitosamente');
        } catch (\Throwable $th) {
            $this->closeModal();
            $this->dispatch('error_mensaje', mensaje: 'Problema: ' . $th->getMessage());
        }
    }
}
