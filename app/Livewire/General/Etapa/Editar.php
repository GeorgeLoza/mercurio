<?php

namespace App\Livewire\General\Etapa;

use App\Models\Etapa;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Editar extends ModalComponent
{
    public $id;

    public $nombre;
    public $abreviatura;
    public $descripcion;
    public function mount()
    {
        $etapa = Etapa::where('id', $this->id)->first();
        $this->nombre = $etapa->nombre;
        $this->abreviatura = $etapa->abreviatura;
        $this->descripcion = $etapa->descripcion;
    }

    public function render()
    {
        return view('livewire.general.etapa.editar');
    }

    public function update()
    {

        $this->validate([
            'nombre' => 'required',
            'abreviatura' => 'required',
            'descripcion' => 'required',
        ]);
        try {

            $etapa = Etapa::find($this->id);
            $etapa->nombre = $this->nombre;
            $etapa->abreviatura = $this->abreviatura;
            $etapa->descripcion = $this->descripcion;
            $etapa->save();

            $this->dispatch('actualizar_tabla_etapa');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'Se actualizo la etapa exitosamente');
        } catch (\Throwable $th) {
            $this->closeModal();

            $this->dispatch('error_mensaje', mensaje: 'problema'.$th->getMessage());
        }
    }
    
}
