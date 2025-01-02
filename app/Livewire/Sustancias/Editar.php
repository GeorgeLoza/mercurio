<?php

namespace App\Livewire\Sustancias;

use App\Models\Item;
use App\Models\Mov;
use LivewireUI\Modal\ModalComponent;

class Editar extends ModalComponent
{
    public $id;
    public $detalles = [];
    public $items = [];

    public function mount()
    {
        // Carga inicial de datos, por ejemplo, los ítems
        $this->items = Item::all();
    }

    public function addDetalle()
    {
        $this->detalles[] = ['item_id' => null, 'cantidad' => null];
    }

    public function removeDetalle($index)
    {
        unset($this->detalles[$index]);
        $this->detalles = array_values($this->detalles); // Reindexa el array
    }

    public function save()
    {
        $this->validate([
            'detalles.*.item_id' => 'required|exists:items,id',
            'detalles.*.cantidad' => 'required|numeric|min:1',
        ]);

        // Lógica para guardar los detalles en la base de datos
        foreach ($this->detalles as $detalle) {
            Movimiento::create([
                'item_id' => $detalle['item_id'],
                'cantidad' => $detalle['cantidad'],
            ]);
        }

        // Resetea los datos y muestra un mensaje
        $this->detalles = [];
        session()->flash('message', 'Movimiento guardado con éxito.');
    }

    public function cerrar()
    {
        $this->detalles = [];
    }

    public function render()
    {
        return view('livewire.sustancias.editar');
    }
}
