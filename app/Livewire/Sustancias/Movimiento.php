<?php

namespace App\Livewire\Sustancias;

use App\Models\Item;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use App\Models\Mov;


class Movimiento extends ModalComponent
{

    public $id;
    public $items;
    public $detalles = [];

    protected $rules = [
        
        'detalles.*.item_id' => 'required|exists:items,id',
        'detalles.*.cantidad' => 'required|numeric|min:1',
    ];
    public function mount()
    {
        $this->items = Item::all();
    }

    public function addDetalle()
    {
        $this->detalles[] = [
            'item_id' => '',
            'cantidad' => '',
        ];
    }
    
    public function removeDetalle($index)
    {
        unset($this->detalles[$index]);
        $this->detalles = array_values($this->detalles); // Reindexar el arreglo
    }
    public function render()
    {
        return view('livewire.sustancias.movimiento');
    }

    public function cerrar()
    {
        $this->closeModal();
    }




    public function save()
    {   
        // dd($this->detalles);
        $this->validate();

        try {
               // Crear el movimiento
               $movimiento = Mov::create([
                   'user_id' =>  auth()->user()->id,
                'tiempo' => now(),
                'tipo' => 1,
                'estado' => 'Entregado',
                
                
                
                
                
            ]); 

            $movimiento->detalleMovs()->createMany($this->detalles);

        $this->closeModal();
        session()->flash('success', 'Movimiento creado exitosamente.');
         
        $this->dispatch('actualizar_movimiento_sustancia');

        } catch (\Throwable $th) {
            // Manejar errores y mostrar un mensaje de error
        session()->flash('error', 'Ocurrió un error al guardar el movimiento.');
        dd($th); // Registrar el error en los logs
        }

    }
    public function save2()
    {   
        // dd($this->detalles);
        $this->validate();

        try {
               // Crear el movimiento
               $movimiento = Mov::create([
                   'user_id' =>  auth()->user()->id,
                'tiempo' => now(),
                'tipo' => 0,
                'estado' => 'solicitado',
                
                
                
                
                
            ]); 

            $movimiento->detalleMovs()->createMany($this->detalles);

        $this->closeModal();
        session()->flash('success', 'Movimiento creado exitosamente.');
              
            
        } catch (\Throwable $th) {
            // Manejar errores y mostrar un mensaje de error
        session()->flash('error', 'Ocurrió un error al guardar el movimiento.');
        dd($th); // Registrar el error en los logs
        }

    }
}
