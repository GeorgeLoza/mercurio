<?php

namespace App\Livewire\LecheCruda\Recepcion;
use App\Models\RutaAcopio;
use App\Models\CalidadLeche;
use App\Models\SubrutaAcopio;
use App\Models\RecepcionLeche;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Editar extends ModalComponent
{
    public $id;
    public $ruta = null;
    public $subruta;
    public $cantidad;
    
    //valores para cargar selects
    public $rutas;
    public $subrutas = [];

    public function mount()
    {
        $this->rutas = RutaAcopio::all();

        $recepcion = RecepcionLeche::where('id', $this->id)->first();
        $this->ruta = $recepcion->subruta_acopio->ruta_acopio_id;
        $this->subruta = $recepcion->subruta_acopio_id;
        $this->cantidad = $recepcion->cantidad;
    }


    public function render()
    {
$this->subrutas = $this->ruta ? SubrutaAcopio::where('ruta_acopio_id', $this->ruta)->get() : [];
        return view('livewire.leche-cruda.recepcion.editar');
    }

    public function update()
    {

        $this->validate([
            'ruta' => 'required',
            'subruta' => 'required',
            'cantidad' => 'required',
        ]);
        try {

            $recepcion = RecepcionLeche::find($this->id);
            $recepcion->subruta_acopio_id = $this->subruta;
            $recepcion->cantidad = $this->cantidad;
            $recepcion->save();

            $this->dispatch('actualizar_tabla_recepcionLeche');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'Se actualizo la recepcion exitosamente');
        } catch (\Throwable $th) {
            $this->closeModal();
            $this->dispatch('error_mensaje', mensaje: 'problema'.$th->getMessage());
        }
    }






}
