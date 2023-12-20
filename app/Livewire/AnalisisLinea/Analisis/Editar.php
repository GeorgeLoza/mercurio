<?php

namespace App\Livewire\AnalisisLinea\Analisis;

use App\Models\AnalisisLinea;
use App\Models\SolicitudAnalisisLinea;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Editar extends ModalComponent
{
    public $id;

    public $temperatura;
    public $ph;
    public $acidez;
    public $brix;
    public $viscosidad;
    public $densidad;
    public $color;
    public $olor;
    public $sabor;
    public $aspecto;
    public $peso;
    public $volumen;
    public $observaciones;

    //consulta extras
    public $extra;
    public function mount()
    {
        $this->extra = AnalisisLinea::find($this->id);
    }

    public function render()
    {
        return view('livewire.analisis-linea.analisis.editar');
    }

    public function update()
    {
    
        if ($this->color) {
            $this->color = 1;
        } else {
            $this->color = 0;
        }
        if ($this->olor) {
            $this->olor = 1;
        } else {
            $this->olor = 0;
        }
        if ($this->sabor) {
            $this->sabor = 1;
        } else {
            $this->sabor = 0; 
        }

        try {

            $analisis = AnalisisLinea::find($this->id);
            $analisis->tiempo = now();
            $analisis->user_id = auth()->user()->id;
            $analisis->temperatura = $this->temperatura;
            $analisis->ph = $this->ph;
            $analisis->acidez = $this->acidez;
            $analisis->brix = $this->brix;
            $analisis->viscosidad = $this->viscosidad;
            $analisis->densidad = $this->densidad;
            $analisis->color = $this->color;
            $analisis->olor = $this->olor;
            $analisis->sabor = $this->sabor;
            $analisis->color = $this->color;
            $analisis->aspecto = $this->aspecto;
            $analisis->peso = $this->peso;
            $analisis->volumen = $this->volumen;
            $analisis->observaciones = $this->observaciones;
            $analisis->save();

            $solicitud = SolicitudAnalisisLinea::find($analisis->solicitud_analisis_linea_id);
            $solicitud->estado = 'Completado';
            $solicitud->save();
            
            $this->dispatch('actualizar_tabla_analisisLineas');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'Analisis realizado exitosamente.');
        } catch (\Throwable $th) {
            $this->closeModal();
            $this->dispatch('error', mensaje: 'Error: ' . $th);
        }
    }
}
