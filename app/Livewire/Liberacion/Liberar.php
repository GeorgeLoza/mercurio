<?php

namespace App\Livewire\Liberacion;

use App\Models\Liberacion;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Liberar extends ModalComponent
{
    public $id;
    public $tipo;
    public function render()
    {
        return view('livewire.liberacion.liberar');
    }

    public function guardar()
    {
        //encontrar la liberacion
        $liberacion = Liberacion::find($this->id);
        $liberacion->estado = 'Por Liberar';
        $liberacion->tipo = $this->tipo;
        $liberacion->liberador_id = auth()->user()->id;
        // $liberacion->fecha_liberacion = now();
        $liberacion->save();


        // Lógica para guardar la liberación
        $this->dispatch('success', mensaje: 'Liberación guardada exitosamente.');
        $this->closeModal();
        $this->dispatch('actualizar_tabla_liberacion');
    }
}
