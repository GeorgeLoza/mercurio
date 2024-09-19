<?php

namespace App\Livewire\Producto;

use App\Models\CategoriaProducto;
use App\Models\DestinoProducto;
use App\Models\Producto;
use App\Models\Unidad;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Crear extends ModalComponent
{
    //input
    public $codigo;
    public $nombre;
    public $cantidad;
    public $empaque;
    public $unidad_id;
    public $categoria_producto_id;
    public $destino_producto_id;
    public $norma;
    
    //valores para cargar selects
    public $unidades;
    public $categoriaProductos;
    public $destinoProductos;
    public function mount()
    {
        $this->unidades = Unidad::all();
        $this->categoriaProductos = CategoriaProducto::all();
        $this->destinoProductos = DestinoProducto::all();
    }
    public function render()
    {
        return view('livewire.producto.crear');
    }
    public function save()
    {
        
        $this->validate([
            'codigo' => 'required',
            'nombre' => 'required',
            'cantidad' => 'required',
            'unidad_id' => 'required',
        ]);
        try {

            Producto::create([
                'codigo' => $this->codigo,
                'nombre' => $this->nombre,
                'cantidad' => $this->cantidad,
                'empaque' => $this->empaque,
                'unidad_id' => $this->unidad_id,
                'categoria_producto_id' => $this->categoria_producto_id,
                'destino_producto_id' => $this->destino_producto_id,
                'norma' => $this->norma,

            ]);
            $this->dispatch('actualizar_tabla_productos');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'Producto registrado exitosamente');
        } catch (\Throwable $th) {
            $this->closeModal();
            $this->dispatch('error_mensaje', mensaje: 'problema'.$th->getMessage());
        }
    }
}
