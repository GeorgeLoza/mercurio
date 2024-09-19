<?php

namespace App\Livewire\LecheCruda\Recepcion;

use Livewire\Component;
use App\Models\RutaAcopio;
use App\Models\CalidadLeche;
use App\Models\SubrutaAcopio;
use App\Models\RecepcionLeche;
use LivewireUI\Modal\ModalComponent;

class Crear extends ModalComponent
{
    //input
    public $ruta = null;
    public $subruta;
    public $cantidad;
    
    //valores para cargar selects
    public $rutas;
    public $subrutas = [];

    public function mount()
    {
        $this->rutas = RutaAcopio::all();
        
    }

    public function render()
{
    $this->subrutas = $this->ruta ? SubrutaAcopio::where('ruta_acopio_id', $this->ruta)->get() : [];
    return view('livewire.leche-cruda.recepcion.crear');
}

    public function save()
    {
        $this->validate([
            'ruta' => 'required',
            'subruta' => 'required',
            'cantidad' => 'required',
        ]);

        try {
            $subruta = RecepcionLeche::create([
                'tiempo' => now(),
                'subruta_acopio_id' => $this->subruta,
                'estado' => 'Pendiente',
                'cantidad' => $this->cantidad,
                'user_id' => auth()->user()->id
            ]);

            
            $id = $subruta->id;

            CalidadLeche::create([
                'recepcion_leche_id' => $id,
            ]);

            $this->dispatch('actualizar_tabla_recepcionLeche');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'Solicitud de Recepcion de Leche Agregada');
        } catch (\Throwable $th) {
            $this->closeModal();
            $this->dispatch('error_mensaje', mensaje: 'problema'.$th->getMessage());
        }
    }
}

