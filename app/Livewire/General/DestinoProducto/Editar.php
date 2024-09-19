<?php

namespace App\Livewire\General\DestinoProducto;

use App\Models\DestinoProducto;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Editar extends ModalComponent
{
    public $id;

    public $nombre;
    public $descripcion;



    public function mount()
    {
        $destino = DestinoProducto::where('id', $this->id)->first();
        $this->nombre = $destino->nombre;
        $this->descripcion = $destino->descripcion;
    }

    public function render()
    {
        return view('livewire.general.destino-producto.editar');
    }

    public function update()
    {

        $this->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
        ]);
        try {

            $destino = DestinoProducto::find($this->id);
            $destino->nombre = $this->nombre;
            $destino->descripcion = $this->descripcion;
            $destino->save();

            $this->dispatch('actualizar_tabla_destino');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'Se actualizo el destino exitosamente');
        } catch (\Throwable $th) {
            $this->closeModal();

            $this->dispatch('error_mensaje', mensaje: 'problema'.$th->getMessage());
        }
    }
    
}
