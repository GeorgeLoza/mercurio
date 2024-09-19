<?php

namespace App\Livewire\Externo;

use App\Models\InformacionUsuario;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;

class Informacio extends Component
{
    public $procedencia, $direccion, $abreviatura, $user_id;
    public $usuarios;
    public $selectedId; // Para saber si estamos editando

    protected $rules = [
        'procedencia' => 'required|string|max:1000',
        'direccion' => 'required|string|max:1000',
        'abreviatura' => 'required|string|max:1000',
    ];

    public function mount()
    {
        $this->usuarios =User::all(); 
    }

    #[On('actualizar_tabla_informacion')]
    public function render()
    {
        $informaciones = InformacionUsuario::all();
        return view('livewire.externo.informacio', [
            'informaciones' => $informaciones
        ]);
    }


    public function resetFields()
    {
        $this->procedencia = '';
        $this->direccion = '';
        $this->abreviatura = '';
        $this->user_id = null;
        $this->selectedId = null;
    }

    public function save()
    {
        $this->validate();

        if ($this->selectedId) {
            // Actualizar
            $informacionUsuario = InformacionUsuario::find($this->selectedId);
            $informacionUsuario->update([
                'procedencia' => $this->procedencia,
                'direccion' => $this->direccion,
                'abreviatura' => $this->abreviatura,
                'user_id' => $this->user_id,
            ]);
        } else {
            // Crear nuevo registro
            InformacionUsuario::create([
                'procedencia' => $this->procedencia,
                'direccion' => $this->direccion,
                'abreviatura' => $this->abreviatura,
                'user_id' => $this->user_id,
            ]);
        }

        $this->resetFields();
        $this->dispatch('actualizar_tabla_informacion');
        session()->flash('message', $this->selectedId ? 'Registro actualizado exitosamente.' : 'Registro creado exitosamente.');
    }


    public function edit($id)
    {
        $informacionUsuario = InformacionUsuario::findOrFail($id);
        $this->selectedId = $informacionUsuario->id;
        $this->procedencia = $informacionUsuario->procedencia;
        $this->direccion = $informacionUsuario->direccion;
        $this->abreviatura = $informacionUsuario->abreviatura;
        $this->user_id = $informacionUsuario->user_id;
    }
    
}
