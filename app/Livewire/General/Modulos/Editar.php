<?php

namespace App\Livewire\General\Modulos;

use App\Models\Modulo;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Editar extends ModalComponent
{

    public $id;
    public $name;
    public $description;

    public function mount()
    {
        $modulo = Modulo::find($this->id);
        $this->name = $modulo->name;
        $this->description = $modulo->description;
    }

    public function render()
    {
        return view('livewire.general.modulos.editar');
    }

    public function update()
    {
        $this->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        try {
            $modulo = Modulo::find($this->id);
            $modulo->name = $this->name;
            $modulo->description = $this->description;
            $modulo->save();

            $this->dispatch('actualizar_tabla_modulo');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'Módulo actualizado exitosamente');
        } catch (\Throwable $th) {
            $this->dispatch('error_mensaje', mensaje: 'Problema: ' . $th->getMessage());
        }
    }
}
