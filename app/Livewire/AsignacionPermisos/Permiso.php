<?php

namespace App\Livewire\AsignacionPermisos;

use App\Models\Modulo;
use App\Models\Permiso as ModelsPermiso;
use Livewire\Component;

class Permiso extends Component
{

     public $name, $description, $permiso_id;
    public $modalOpen = false;

    protected $rules = [
        'name' => 'required|unique:permisos,name',
        'description' => 'nullable|string',
    ];

    public function render()
    {
        $permisos = ModelsPermiso::latest()->paginate(10);
        return view('livewire.asignacion-permisos.permiso', compact('permisos'));
    }

    public function openModal($id = null)
    {
        $this->resetValidation();
        $this->permiso_id = $id;
        if ($id) {
            $perm = ModelsPermiso::findOrFail($id);
            $this->name = $perm->name;
            $this->description = $perm->description;
        }
        $this->modalOpen = true;
    }

    public function save()
    {
        $this->validate();
        ModelsPermiso::updateOrCreate(
            ['id' => $this->permiso_id],
            ['name' => $this->name, 'description' => $this->description]
        );
        $this->reset(['name','description','permiso_id','modalOpen']);
        session()->flash('success', 'Permiso guardado correctamente.');
    }

    public function delete($id)
    {
        ModelsPermiso::find($id)->delete();
        session()->flash('success', 'Permiso eliminado.');
    }





}
