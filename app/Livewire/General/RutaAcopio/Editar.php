<?php

namespace App\Livewire\General\RutaAcopio;

use App\Models\RutaAcopio;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Editar extends ModalComponent
{
    public $id;
    public $ruta;
    //inputs
    public $nombre;
    public $detalle;

    public function mount()
    {
        $ruta = RutaAcopio::where('id', $this->id)->first();
        $this->nombre = $ruta->nombre;
        $this->detalle = $ruta->detalle;
    }
    public function render()
    {
        return view('livewire.general.ruta-acopio.editar');
    }
    public function update()
    {
        $this->validate([

            'nombre' => 'required',
            'detalle' => 'required',

        ]);
        try {

            $ruta = RutaAcopio::find($this->id);
            $ruta->nombre = $this->nombre;
            $ruta->detalle = $this->detalle;
            $ruta->save();
            $this->dispatch('actualizar_tabla_ruta_acopio');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'Ruta actualizada exitosamente');
        } catch (\Throwable $th) {
            $this->closeModal();
            $this->dispatch('error_mensaje', mensaje: 'problema'.$th->getMessage());
        }
    }
}
