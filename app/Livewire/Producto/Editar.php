<?php

namespace App\Livewire\Producto;

use App\Models\Unidad;
use Livewire\Component;
use App\Models\Producto;
use App\Models\DestinoProducto;
use App\Models\CategoriaProducto;
use LivewireUI\Modal\ModalComponent;

class Editar extends ModalComponent
{
    public $id;
    public $producto;
    //input
    public $codigo;
    public $nombre;
    public $cantidad;
    public $empaque;
    public $unidad_id;
    public $categoria_producto_id;
    public $destino_producto_id;
    //valores para cargar selects
    public $unidades;
    public $categoriaProductos;
    public $destinoProductos;
    public function mount()
    {
        $this->unidades = Unidad::all();
        $this->categoriaProductos = CategoriaProducto::all();
        $this->destinoProductos = DestinoProducto::all();
        $producto = Producto::where('id', $this->id)->first();
        $this->codigo = $producto->codigo;
        $this->nombre = $producto->nombre;
        $this->cantidad = $producto->cantidad;
        $this->empaque = $producto->empaque;
        $this->unidad_id = $producto->unidad_id;
        $this->categoria_producto_id = $producto->categoria_producto_id;
        $this->destino_producto_id = $producto->destino_producto_id;
    }

    public function render()
    {
        return view('livewire.producto.editar');
    }


    public function update()
    {

        $this->validate([
            'codigo' => 'required',
            'nombre' => 'required',
            'cantidad' => 'required',
            'unidad_id' => 'required',
        ]);
        try {

            $producto = Producto::find($this->id);
            $producto->codigo = $this->codigo;
            $producto->nombre = $this->nombre;
            $producto->cantidad = $this->cantidad;
            $producto->empaque = $this->empaque;
            $producto->unidad_id = $this->unidad_id;
            $producto->categoria_producto_id = $this->categoria_producto_id;
            $producto->destino_producto_id = $this->destino_producto_id;
            $producto->save();
            
            $this->dispatch('actualizar_tabla_productos');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'Se actualizo el producto exitosamente');
        } catch (\Throwable $th) {
            $this->closeModal();
            
            $this->dispatch('error', mensaje: 'problema'.$th->getMessage());
        }
    }
}
