<?php

namespace App\Livewire\AnalisisLinea\Solicitud;

use App\Models\Orp;
use App\Models\Etapa;
use App\Models\Origen;
use Livewire\Component;
use App\Models\SolicitudAnalisisLinea;
use App\Models\User;
use LivewireUI\Modal\ModalComponent;

class Editar extends ModalComponent
{
    public $id;
    //input
    public $orp_id;
    public $tiempo;
    public $user_id;
    public $preparacion;
    public $origen_id;
    public $estado;
    public $etapa_id;

    //valores para cargar selects
    public $orps;
    public $origenes;
    public $etapas;
    public $usuarios;

    public function mount()
    {
        $this->orps = Orp::all();
        $this->origenes = Origen::all();
        $this->etapas = Etapa::all();
        $this->usuarios = User::all();

        $solicitus = SolicitudAnalisisLinea::where('id', $this->id)->first();
        $this->orp_id = $solicitus->orp_id;
        $this->tiempo = $solicitus->tiempo;
        $this->user_id = $solicitus->user_id;
        $this->preparacion = $solicitus->preparacion;
        $this->origen_id = $solicitus->origen_id;
        $this->estado = $solicitus->estado;
        $this->etapa_id = $solicitus->etapa_id;
    }

    public function render()
    {
        return view('livewire.analisis-linea.solicitud.editar');
    }
    public function update()
    {

        $this->validate([
            'orp_id' => 'required',
            'tiempo' => 'required',
            'user_id' => 'required',
            'preparacion' => 'required',
            'origen_id' => 'required',
            'estado' => 'required',
            'etapa_id' => 'required',
        ]);
        try {

            $solicitus = SolicitudAnalisisLinea::find($this->id);
            $solicitus->orp_id = $this->orp_id;
            $solicitus->tiempo = $this->tiempo;
            $solicitus->user_id = $this->user_id;
            $solicitus->preparacion = $this->preparacion;
            $solicitus->origen_id = $this->origen_id;
            $solicitus->estado = $this->estado;
            $solicitus->etapa_id = $this->etapa_id;
            $solicitus->save();

            $this->dispatch('actualizar_tabla_solicitudAnalisisLineas');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'Se actualizo solicitud exitosamente');
        } catch (\Throwable $th) {
            $this->closeModal();

            $this->dispatch('error_mensaje', mensaje: 'problema'.$th->getMessage());
        }
    }
}
