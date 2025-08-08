<?php

namespace App\Livewire\MateriaPrima\Almacenero;

use App\Models\AlmaceneroMateriaPrima;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Crear extends ModalComponent
{
    public $nombre;
    public function render()
    {
        return view('livewire.materia-prima.almacenero.crear');
    }



     public function save()
    {
         try {
        AlmaceneroMateriaPrima::create([
            'nombre' => $this->nombre,

        ]);
            $this->dispatch('actualizar_crear_recepcion_materia_prima');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'item creado exitosamente');
        } catch (\Throwable $th) {
            $this->closeModal();
            $this->dispatch('error_mensaje', mensaje: 'problema' . $th->getMessage());
        }

    }
}
