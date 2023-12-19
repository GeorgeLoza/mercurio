<?php

namespace App\Livewire\General\Division;

use App\Models\Division;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Editar extends ModalComponent
{
    public $id;

    public $nombre;
    public $descripcion;

    public function mount()
    {
        $division = Division::where('id', $this->id)->first();

        $this->nombre = $division->nombre;
        $this->descripcion = $division->descripcion;
    }

    public function render()
    {
        return view('livewire.general.division.editar');
    }

    public function update()
    {

        $this->validate([

            'nombre' => 'required',
            'descripcion' => 'required',

        ]);
        try {

            $division = Division::find($this->id);

            $division->nombre = $this->nombre;
            $division->descripcion = $this->descripcion;

            $division->save();

            $this->dispatch('actualizar_tabla_division');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'Se actualizo la division exitosamente');
        } catch (\Throwable $th) {
            $this->closeModal();
            dd($th);
            $this->dispatch('error', mensaje: $th);
        }
    }

    
}
