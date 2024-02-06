<?php

namespace App\Livewire\Orp;

use App\Models\Orp;
use App\Models\Producto;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Crear extends ModalComponent
{
    //input
    public $codigo;
    public $producto_id;
    public $lote;
    public $estado;
    public $tiempo_elaboracion;
    public $fecha_vencimiento1;
    public $fecha_vencimiento2;
    
    //valores para cargar selects
    public $productos;
    public function mount()
    {
        $this->productos = Producto::all();
        
    }

    public function render()
    {
        return view('livewire.orp.crear');
    }
    public function save()
    {
        $this->validate([
            'codigo' => 'required',
            'producto_id' => 'required',
            'lote' => 'required',
        ]);

        try {
            Orp::create([
                'codigo' => $this->codigo,
                'producto_id' => $this->producto_id,
                'lote' => $this->lote,
                'estado' => 'Pendiente',
                'tiempo_elaboracion' => $this->tiempo_elaboracion,
                'fecha_vencimiento1' => $this->fecha_vencimiento1,
                'fecha_vencimiento2' => $this->fecha_vencimiento2,
            ]);
            $this->dispatch('actualizar_tabla_orps');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'ORP registrado exitosamente');
        } catch (\Throwable $th) {
            $this->closeModal();
            $this->dispatch('error', mensaje: 'Error: '.$th);
        }
    }
}
