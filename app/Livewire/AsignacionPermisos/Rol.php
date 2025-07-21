<?php

namespace App\Livewire\AsignacionPermisos;

use App\Models\Role;
use Livewire\Component;

class Rol extends Component
{
    public $name, $description, $role_id;
    public $modalOpen = false;

    protected $rules = [
        'name' => 'required|unique:roles,name',
        'description' => 'nullable|string',
    ];

    public function render()
    {
        $roles = Role::latest()->paginate(10);
        return view('livewire.asignacion-permisos.rol', compact('roles'));
    }

    public function openModal($id = null)
    {
        $this->resetValidation();
        $this->role_id = $id;

        if ($id) {
            $role = Role::findOrFail($id);
            $this->name = $role->name;
            $this->description = $role->description;
        }

        $this->modalOpen = true;
    }

    public function save()
    {
        $this->validate();

        Role::updateOrCreate(
            ['id' => $this->role_id],
            ['name' => $this->name, 'description' => $this->description]
        );

        $this->reset(['name', 'description', 'role_id', 'modalOpen']);
        session()->flash('success', 'Rol guardado correctamente.');
    }

    public function delete($id)
    {
        Role::find($id)->delete();
        session()->flash('success', 'Rol eliminado.');
    }
    
}
