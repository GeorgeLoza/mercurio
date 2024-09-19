<?php

namespace App\Livewire\AnalisisLinea\Analisis;

use App\Models\User;
use Livewire\Component;
use App\Models\AnalisisLinea;
use App\Models\ParametroLinea;
use LivewireUI\Modal\ModalComponent;
use App\Models\SolicitudAnalisisLinea;
use App\Notifications\ParametrosOrp;

class Editar extends ModalComponent
{
    public $id;

    //input
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
        $analisis = AnalisisLinea::find($this->id);
        $this->temperatura = $analisis->temperatura;
        $this->ph = $analisis->ph;
        $this->acidez = $analisis->acidez;
        $this->brix = $analisis->brix;
        $this->viscosidad = $analisis->viscosidad;
        $this->densidad = $analisis->densidad;
        $this->color = $analisis->color;
        $this->olor = $analisis->olor;
        $this->sabor = $analisis->sabor;
        $this->aspecto = $analisis->aspecto;
        $this->peso = $analisis->peso;
        $this->volumen = $analisis->volumen;
        $this->observaciones = $analisis->observaciones;
    }

    public function render()
    {
        return view('livewire.analisis-linea.analisis.editar');
    }

    public function update()
    {


        if (optional($this->extra->solicitudAnalisisLinea->estadoPlanta->etapa)->id != '2') {
            $this->validate([
                'temperatura' => 'nullable|numeric|min:0|max:200',
                'ph' => 'nullable|numeric|min:0|max:14',
                'acidez' => 'nullable|numeric|min:0|max:1.5',
                'brix' => 'nullable|numeric|min:0|max:75',
            ]);
        }
        if (optional($this->extra->solicitudAnalisisLinea->estadoPlanta->etapa)->id == '2') {
            $this->validate([
                'temperatura' => 'numeric|min:10|max:200',

            ]);
        }


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
            if (auth()->user()->division->nombre == 'Calidad') {
                $analisis->user_id = auth()->user()->id;
            }
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
            $registro = $analisis;

            $solicitud = SolicitudAnalisisLinea::find($analisis->solicitud_analisis_linea_id);
            $solicitud->estado = 'Completado';
            $solicitud->save();
            // Notificar a los usuarios
            $admins = User::where('rol', 'Admi')->orWhere('rol', 'Jef')->orWhere('rol', 'Sup')->get();

            if ($this->extra->solicitudAnalisisLinea->estadoPlanta->etapa) {
                //obtener etapa y producto para sacar sus parametros
                $productoParametro = $this->extra->solicitudAnalisisLinea->estadoPlanta->estadoDetalle[0]->orp->producto->id;
                $etapaParametro = $this->extra->solicitudAnalisisLinea->estadoPlanta->etapa->id;
                $parametros = ParametroLinea::where('producto_id', $productoParametro)->where('etapa_id', $etapaParametro)->first();
                if ($parametros) {
                    if ($parametros->temperatura_min > $this->temperatura || $this->temperatura > $parametros->temperatura_max) {
                        foreach ($admins as $admin) {
                            $admin->notify(new ParametrosOrp($registro));
                        }
                    }
                }
            }

            
            



            $this->dispatch('actualizar_tabla_analisisLineas');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'Analisis realizado exitosamente.');
        } catch (\Throwable $th) {
            $this->closeModal();
            $this->dispatch('error_mensaje', mensaje: 'problema' . $th->getMessage());
        }
    }
}
