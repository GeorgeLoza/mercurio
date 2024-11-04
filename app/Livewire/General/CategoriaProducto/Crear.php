<?php

namespace App\Livewire\General\CategoriaProducto;

use App\Models\CategoriaProducto;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Crear extends ModalComponent
{
    
    public $nombre;
    public $descripcion;
    public $grupo;
 

    public function render()
    {
        return view('livewire.general.categoria-producto.crear');
    }


    public function save()
    {
        $this->validate([
            
            'nombre' => 'required',
            'descripcion' => 'required',
            'grupo' => 'required'
           
        ]);
        try {

            CategoriaProducto::create([
               
                'nombre' => $this->nombre,
                'descripcion' => $this->descripcion,
                'grupo' => $this->grupo,
             
            ]);
            $this->dispatch('actualizar_tabla_categoria');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'Categoria registrado exitosamente');
            
        } catch (\Throwable $th) {
            $this->closeModal();
            $this->dispatch('error_mensaje', mensaje: 'problema'.$th->getMessage());
        }
    }
    
}
