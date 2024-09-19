<?php

namespace App\Livewire\General\Unidad;

use App\Models\Unidad;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Crear extends ModalComponent
{
    
    public $nombre;
    public $abreviatura;

    public function render()
    {
        return view('livewire.general.unidad.crear');
    }
    public function save()
    {
        $this->validate([

            'nombre' => 'required',
            'abreviatura' => 'required',
        ]);
        try {
            Unidad::create([
                'nombre' => $this->nombre,
                'abreviatura' => $this->abreviatura,
            ]);
            $this->dispatch('actualizar_tabla_unidad');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'unidad registrado exitosamente');
        } catch (\Throwable $th) {
            $this->closeModal();
            $this->dispatch('error_mensaje', mensaje: 'problema'.$th->getMessage());
        }
    }
    
}
