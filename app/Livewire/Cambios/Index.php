<?php


namespace App\Livewire\Cambios;

use App\Models\Cambio;
use App\Models\Role;
use Livewire\Component;
use Livewire\WithFileUploads;

class Index extends Component
{
    use WithFileUploads;

    public $cambios;
    public $roles;

    // Formulario de creación
    public $titulo;
    public $descripcion;
    public $fecha_inicio;
    public $fecha_fin;
    public $imagen1;
    public $roles_selected = [];
    public $nota;

    // Edición inline
    public $editId = null;
    public $editField = null;
    public $editValue = null;

    protected $rules = [
        'titulo' => 'required|string|max:255',
        'descripcion' => 'nullable|string',
        'fecha_inicio' => 'nullable|date',
        'fecha_fin' => 'nullable|date',
        'imagen1' => 'nullable|image|max:2048', // Solo imágenes, máximo 2MB
        'roles_selected' => 'array',
        'nota' => 'nullable|string',
    ];

    public function mount()
    {
        $this->cambios = Cambio::all();
        $this->roles = Role::all();
    }

    public function render()
    {
        $this->cambios = Cambio::all();
        return view('livewire.cambios.index');
    }

    public function store()
    {
        $this->validate();
        $imagePath = null;
        if ($this->imagen1) {
            $imagePath = $this->imagen1->store('cambios', 'public');
        }
          $cambio = Cambio::create([
            'titulo' => $this->titulo,
            'descripcion' => $this->descripcion,
            'fecha_inicio' => $this->fecha_inicio,
            'fecha_fin' => $this->fecha_fin,
            'imagen1' => $imagePath,
            'roles' => $this->roles_selected,
            'nota' => $this->nota,
        ]);

        $this->resetForm();
        $this->cambios = Cambio::all();
        session()->flash('success', 'Cambio creado correctamente.');
    }

    public function updateRoles($id, $roles)
    {
        $cambio = Cambio::find($id);
        if ($cambio) {
            $cambio->roles = json_encode($roles);
            $cambio->save();
            $this->cambios = Cambio::all();
            session()->flash('success', 'Roles actualizados.');
        }
    }
    public function startEdit($id, $field)
    {
        $this->editId = $id;
        $this->editField = $field;
        $this->editValue = Cambio::find($id)?->$field;
    }

    public function saveEdit($id)
    {
        $cambio = Cambio::find($id);
        if ($cambio && $this->editField) {
            $cambio->{$this->editField} = $this->editValue;
            $cambio->save();
            $this->editId = null;
            $this->editField = null;
            $this->editValue = null;
            $this->cambios = Cambio::all();
            session()->flash('success', 'Cambio actualizado.');
        }
    }



    public function delete($id)
    {
        Cambio::find($id)?->delete();
        $this->cambios = Cambio::all();
        session()->flash('success', 'Cambio eliminado.');
    }

    public function resetForm()
    {
        $this->reset(['titulo', 'descripcion', 'fecha_inicio', 'fecha_fin', 'imagen1', 'roles_selected', 'nota']);
    }
}
