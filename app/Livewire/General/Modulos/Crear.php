<?php

namespace App\Livewire\General\Modulos;

use App\Models\Modulo;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Crear extends ModalComponent
{
    public $name;
    public $description;

    public function render()
    {
        return view('livewire.general.modulos.crear');
    }

    public function save()
    {
        $this->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        try {
            Modulo::create([
                'name' => $this->name,
                'description' => $this->description,
            ]);

            $this->dispatch('actualizar_tabla_modulo');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'Módulo creado exitosamente');
        } catch (\Throwable $th) {
            $this->closeModal();
            $this->dispatch('error_mensaje', mensaje: 'Problema: ' . $th->getMessage());
        }
    }
}
