<?php

namespace App\Livewire\Desinfeccion;

use App\Models\DestinoSolucion;
use App\Models\itemSolucion;
use App\Models\movSolucion;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Movimiento extends ModalComponent
{

    public $est;

    public $item;
public $destino;


    public $id;
    public $items;
    public $destinos;

    public $movimiento;



    public function mount($id = null)
    {
        $this->items = itemSolucion::all();

        // Si el ID no es nulo, estamos en modo edición
        if ($id) {
            $this->movimiento = movSolucion::with('detalleMovs')->find($id);
            if ($this->movimiento) {

                // Cargar los detalles del movimiento
                // $this->detalles = $this->movimiento->detalleMovs->toArray();
            }
        }

        $this->destinos = DestinoSolucion::all();
        // echo $this->destinos;
        // dd($this->destinos);

    }

    public function render()
    {
        return view('livewire.desinfeccion.movimiento');
    }


    public function updatedItem($value)
    {
        $this->destinos = DestinoSolucion::where('item_solucion_id', $value)->get();
        $this->destino = null; // Reiniciar selección de destino
    }

    // public function updateDestino($value)
    // {
    //     $this->destinos = DestinoSolucion::where('item_solucion_id', $value)->get();
    //     // dd($this->destinos);
    // }
}
