<?php

namespace App\Livewire\Liberacion;

use App\Models\Liberacion;
use App\Models\LiberacionDetalle;
use App\Models\Origen;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Agregar extends ModalComponent
{

    public $id;
    public $id2;
    public $liberacion;
    public $liberacionDetalle;
    public $origens;
    public $origen_id;
    public $hora_sachet;
    public $peso;
    public $temperatura;
    public $ph;
    public $brix;
    public $acidez;
    public $viscosidad;
    public $color = true;
    public $olor = true;
    public $sabor = true;
    public $observaciones;

    public function mount()
    {
        $this->liberacion = Liberacion::find($this->id);

        if ($this->id2 != null) {

            $this->liberacionDetalle = LiberacionDetalle::find($this->id2);
            $this->origen_id = $this->liberacionDetalle->origen_id;
            $this->hora_sachet = $this->liberacionDetalle->hora_sachet;
            $this->peso = $this->liberacionDetalle->peso;
            $this->temperatura = $this->liberacionDetalle->temperatura;
            $this->ph = $this->liberacionDetalle->ph;
            $this->brix = $this->liberacionDetalle->brix;
            $this->acidez = $this->liberacionDetalle->acidez;
            $this->viscosidad = $this->liberacionDetalle->viscosidad;
            $this->color = (bool) $this->liberacionDetalle->color;
            $this->olor = (bool) $this->liberacionDetalle->olor;
            $this->sabor = (bool) $this->liberacionDetalle->sabor;
            $this->observaciones = $this->liberacionDetalle->observaciones;
        }

        $this->origens = Origen::whereHas('estadoPlanta.estadoDetalle', function ($query) {
            $query->where('orp_id', $this->liberacion->orp_id);
        })
            ->where('descripcion', 'like', '%ENVASADORA%')
            ->get();
    }
    public function render()
    {
        return view('livewire.liberacion.agregar');
    }




    public function save()
    {
        $this->validate([
            'origen_id' => 'required',
        ]);

        try {
            if ($this->id2) {
                // Modo edición
                $detalle = LiberacionDetalle::find($this->id2);
            } else {
                // Modo creación
                $detalle = new LiberacionDetalle();
                $detalle->liberacion_id = $this->liberacion->id;
                $detalle->user_id = auth()->user()->id;
            }

            // Asignación común
            $detalle->origen_id = $this->origen_id;
            $detalle->hora_sachet = $this->hora_sachet;
            $detalle->peso = $this->peso;
            $detalle->temperatura = $this->temperatura;
            $detalle->ph = $this->ph;
            $detalle->brix = $this->brix;
            $detalle->acidez = $this->acidez;
            $detalle->viscosidad = $this->viscosidad;
            $detalle->color = $this->color;
            $detalle->olor = $this->olor;
            $detalle->sabor = $this->sabor;
            $detalle->observaciones = $this->observaciones;

            $detalle->save();

            $this->dispatch('actualizar_tabla_liberacion');
            $this->closeModal();
            $this->dispatch('success', mensaje: $this->id2 ? 'Detalle actualizado correctamente' : 'Conteo registrado exitosamente');
        } catch (\Throwable $th) {
            $this->closeModal();
            $this->dispatch('error_mensaje', mensaje: 'Problema: ' . $th->getMessage());
        }
    }
}
