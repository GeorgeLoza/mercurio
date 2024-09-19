<?php

namespace App\Livewire\General\SubrutaAcopio;

use Livewire\Component;
use App\Models\RutaAcopio;
use App\Models\SubrutaAcopio;
use LivewireUI\Modal\ModalComponent;

class Editar extends ModalComponent
{
    public $id;
    public $ruta;
    //inputs
    public $nombre;
    public $detalle;
    public $ruta_id;
//valores para cargar selects
public $rutas;
    public function mount()
    {
        $this->rutas = RutaAcopio::all();

        $subruta = SubrutaAcopio::where('id', $this->id)->first();
        $this->nombre = $subruta->nombre;
        $this->detalle = $subruta->detalle;
        $this->ruta_id = $subruta->ruta_acopio_id;
    }

    public function render()
    {
        return view('livewire.general.subruta-acopio.editar');
    }
    public function update()
    {
        $this->validate([
          
            'nombre' => 'required',
            'ruta_id' => 'required',
            'detalle' => 'required',
           
        ]);
        try {

            $subruta = SubrutaAcopio::find($this->id);
            $subruta->nombre = $this->nombre;
            $subruta->detalle = $this->detalle;
            $subruta->ruta_acopio_id = $this->ruta_id;
            $subruta->save();
            $this->dispatch('actualizar_tabla_subruta_acopio');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'Subruta actualizada exitosamente');
            
        } catch (\Throwable $th) {
            $this->closeModal();
            $this->dispatch('error_mensaje', mensaje: 'problema'.$th->getMessage());
        }
    }

    
}
