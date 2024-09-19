<?php

namespace App\Livewire\General\Planta;

use App\Models\Planta;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Editar extends ModalComponent
{
    public $id;

    public $nombre;
    public $direccion;
    public $abreviatura;


    public function mount()
    {
        $planta = Planta::where('id', $this->id)->first();
        $this->nombre = $planta->nombre;
        $this->direccion = $planta->direccion;
        $this->abreviatura = $planta->abreviatura;
    }

    public function render()
    {
        return view('livewire.general.planta.editar');
    }

    public function update()
    {

        $this->validate([
            'nombre' => 'required',
            'direccion' => 'required',
            'abreviatura' => 'required',

        ]);
        try {

            $planta = Planta::find($this->id);
            $planta->nombre = $this->nombre;
            $planta->direccion = $this->direccion;
            $planta->abreviatura = $this->abreviatura;

            $planta->save();

            $this->dispatch('actualizar_tabla_planta');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'Se actualizo la planta exitosamente');
        } catch (\Throwable $th) {
            $this->closeModal();
            $this->dispatch('error_mensaje', mensaje: 'problema'.$th->getMessage());
        }
    }
    
}
