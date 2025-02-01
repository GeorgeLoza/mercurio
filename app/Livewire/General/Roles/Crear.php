<?php

namespace App\Livewire\General\Roles;

use App\Models\Role;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Crear extends ModalComponent
{

    public $name;
    public $description;

    public function render()
    {
        return view('livewire.general.roles.crear');
    }

    public function save()
    {

        $this->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        try {
            Role::create([
                'name' => $this->name,
                'description' => $this->description,
            ]);
            $this->dispatch('actualizar_tabla_role');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'Rol registrado exitosamente');
        } catch (\Throwable $th) {
            $this->closeModal();
            $this->dispatch('error_mensaje', mensaje: 'Problema: ' . $th->getMessage());
        }
    }
}
