<?php

namespace App\Livewire\General\CategoriaProducto;

use App\Models\CategoriaProducto;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Editar extends ModalComponent
{
    public $id;

    public $nombre;
    public $descripcion;

    public function mount()
    {
        $categoria = CategoriaProducto::where('id', $this->id)->first();

        $this->nombre = $categoria->nombre;
        $this->descripcion = $categoria->descripcion;
    }


    public function update()
    {

        $this->validate([

            'nombre' => 'required',
            'descripcion' => 'required',

        ]);
        try {

            $categoria = CategoriaProducto::find($this->id);

            $categoria->nombre = $this->nombre;
            $categoria->descripcion = $this->descripcion;

            $categoria->save();

            $this->dispatch('actualizar_tabla_categoria');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'Se actualizo la categoria exitosamente');
        } catch (\Throwable $th) {
            $this->closeModal();
            dd($th);
            $this->dispatch('error', mensaje: $th);
        }
    }
    public function render()
    {
        return view('livewire.general.categoria-producto.editar');
    }
}
