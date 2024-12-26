<?php

namespace App\Livewire\Externo;

use App\Models\ProductosPlantas;
use Livewire\Component;
use Livewire\Attributes\On;


class ProductoPlanta extends Component
{
    public $productoId;
    public $nombre;
    public $envase;
    public $neto;
    public $unidad;

    protected $rules = [
        'nombre' => 'required|string|max:255',
    ];



    #[On('actualizar_tabla_recepcionLeche')]
    public function render()
    {
        if(auth()->user()->rol == 'Ext'){
            $productosPlanta = ProductosPlantas::whereHas('planta', function ($query) {
                $query->where('id',auth()->user()->planta->id);
            })->get();
            
        }else{
            $productosPlanta = ProductosPlantas::all();
        }
        
        return view('livewire.externo.producto-planta', [
            'productosPlanta' => $productosPlanta
        ]);
    }

    public function create()
    {   
        
        try {
            $this->validate();
            ProductosPlantas::create([
                'nombre' => $this->nombre,
                'planta_id' => auth()->user()->planta->id,
            ]);

            $this->resetFields();
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    

    public function update()
    {
        $this->validate();

        $producto = ProductosPlantas::find($this->id);
        $producto->update([
            'nombre' => $this->nombre,
            'plata_id' => auth()->user()->planta->id,
        ]);

        $this->resetFields();
    }
    public function edit($id)
    {
        $this->productoId = $id;
        $producto = ProductosPlantas::find($id);
        $this->nombre = $producto->nombre;
    }

    public function delete($id)
    {
        $producto = ProductosPlantas::find($id);
        $producto->delete();
    }

    public function resetFields()
    {
        $this->nombre = " ";
        $this->envase = " ";
        $this->neto = " ";
        $this->unidad = " ";
        $this->productoId = null;
    }
}
