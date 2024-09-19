<?php

namespace App\Livewire\LecheCruda\Analisis;

use App\Models\CalidadLeche;
use App\Models\RecepcionLeche;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Editar extends ModalComponent
{
    public $id;

    public $temperatura;
    public $ph;
    public $acidez;
    public $brix;
    public $densidad;
    public $prueba_alcohol;
    public $contenido_graso;
    public $tram_inicio;
    public $tram_fin;
    public $tram_lapso;
    public $temperatura_congelacion;
    public $porcentaje_agua;
    public $observaciones;

    //consulta extras
    public $extra;
    public function mount()
    {

        $datos = CalidadLeche::where('id', $this->id)->first();
        $this->temperatura = $datos->temperatura;
        $this->ph = $datos->ph;
        $this->acidez = $datos->acidez;
        $this->brix = $datos->brix;
        $this->densidad = $datos->densidad;
        $this->prueba_alcohol = $datos->prueba_alcohol;
        $this->contenido_graso = $datos->contenido_graso;
        $this->tram_inicio = $datos->tram_inicio;
        $this->tram_fin = $datos->tram_fin;
        $this->tram_lapso = $datos->tram_lapso;
        $this->temperatura_congelacion = $datos->temperatura_congelacion;
        $this->porcentaje_agua = $datos->porcentaje_agua;
        $this->observaciones = $datos->observaciones;
    }

    public function render()
    {
        return view('livewire.leche-cruda.analisis.editar');
    }

    public function update()
    {

        if ($this->prueba_alcohol) {
            $this->prueba_alcohol = 1;
        } else {
            $this->prueba_alcohol = 0;
        }
        try {

            $analisis = CalidadLeche::find($this->id);
            $analisis->temperatura = $this->temperatura;
            $analisis->ph = $this->ph;
            $analisis->acidez = $this->acidez;
            $analisis->brix = $this->brix;
            $analisis->densidad = $this->densidad;
            $analisis->prueba_alcohol = $this->prueba_alcohol;
            $analisis->contenido_graso = $this->contenido_graso;
            $analisis->tram_inicio = $this->tram_inicio;
            $analisis->tram_fin = $this->tram_fin;
            $analisis->tram_lapso = $this->tram_lapso;
            $analisis->temperatura_congelacion = $this->temperatura_congelacion;
            $analisis->porcentaje_agua = $this->porcentaje_agua;
            $analisis->observaciones = $this->observaciones;
            $analisis->tiempo = now();
            $analisis->user_id = auth()->user()->id;
            $analisis->save();

            $solicitud = RecepcionLeche::find($analisis->recepcion_leche_id);
            $solicitud->estado = 'Completado';
            $solicitud->save();

            $this->dispatch('actualizar_tabla_CalidadLeche');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'Analisis realizado exitosamente.');
        } catch (\Throwable $th) {
            $this->closeModal();
            $this->dispatch('error_mensaje', mensaje: 'problema' . $th->getMessage());
        }
    }
}
