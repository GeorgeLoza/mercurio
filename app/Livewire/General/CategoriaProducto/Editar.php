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
    public $grupo;

    public function mount()
    {
        $categoria = CategoriaProducto::where('id', $this->id)->first();

        $this->nombre = $categoria->nombre;
        $this->descripcion = $categoria->descripcion;
        $this->grupo = $categoria->grupo;
    }


    public function update()
    {

        $this->validate([

            'nombre' => 'required',
            'descripcion' => 'required',
            'grupo' => 'required',

        ]);
        try {

            $categoria = CategoriaProducto::find($this->id);

            $categoria->nombre = $this->nombre;
            $categoria->descripcion = $this->descripcion;
            $categoria->grupo = $this->grupo;

            $categoria->save();

            $this->dispatch('actualizar_tabla_categoria');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'Se actualizo la categoria exitosamente');
        } catch (\Throwable $th) {
            $this->closeModal();
            $this->dispatch('error_mensaje', mensaje: 'problema'.$th->getMessage());
        }
    }
    public function render()
    {
        return view('livewire.general.categoria-producto.editar');
    }
}
