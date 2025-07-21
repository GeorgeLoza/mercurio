<?php

namespace App\Livewire\AsignacionPermisos;

use App\Models\Modulo as ModelsModulo;
use Livewire\Component;

class Modulo extends Component
{
     public $name, $description, $modulo_id;
    public $modalOpen = false;

    protected $rules = [
        'name' => 'required|unique:modulos,name',
        'description' => 'nullable|string',
    ];

    public function render()
    {
        $modulos = ModelsModulo::latest()->paginate(10);
        return view('livewire.asignacion-permisos.modulo', compact('modulos'));
    }

    public function openModal($id = null)
    {
        $this->resetValidation();
        $this->modulo_id = $id;
        if ($id) {
            $mod = ModelsModulo::findOrFail($id);
            $this->name = $mod->name;
            $this->description = $mod->description;
        }
        $this->modalOpen = true;
    }

    public function save()
    {
        $this->validate();
        ModelsModulo::updateOrCreate(
            ['id' => $this->modulo_id],
            ['name' => $this->name, 'description' => $this->description]
        );
        $this->reset(['name','description','modulo_id','modalOpen']);
        session()->flash('success', 'Módulo guardado correctamente.');
    }

    public function delete($id)
    {
        ModelsModulo::find($id)->delete();
        session()->flash('success', 'Módulo eliminado.');
    }

}
