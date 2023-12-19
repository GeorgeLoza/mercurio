<?php

namespace App\Livewire\General\Unidad;

use App\Models\Unidad;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Editar extends ModalComponent
{
    public $id;

    public $nombre;
    public $abreviatura;

    public function mount()
    {
        $unidad = Unidad::where('id', $this->id)->first();
        $this->nombre = $unidad->nombre;
        $this->abreviatura = $unidad->abreviatura;
    }

    public function render()
    {
        return view('livewire.general.unidad.editar');
    }

    public function update()
    {

        $this->validate([
            'nombre' => 'required',
            'abreviatura' => 'required',
        ]);
        try {

            $unidad = Unidad::find($this->id);
            $unidad->nombre = $this->nombre;
            $unidad->abreviatura = $this->abreviatura;
            $unidad->save();

            $this->dispatch('actualizar_tabla_unidad');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'Se actualizo la unidad exitosamente');
        } catch (\Throwable $th) {
            $this->closeModal();

            $this->dispatch('error', mensaje: $th);
        }
    }
    
}
