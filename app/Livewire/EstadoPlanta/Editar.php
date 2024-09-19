<?php

namespace App\Livewire\EstadoPlanta;

use App\Models\EstadoDetalle;
use App\Models\EstadoPlanta;
use App\Models\Etapa;
use App\Models\Orp;
use App\Models\Origen;
use Livewire\Component;
use App\Models\ParametroLinea;
use LivewireUI\Modal\ModalComponent;

class Editar extends ModalComponent
{

    public $id; // Identificador único del estado de planta a editar
    public $origen_id;
    public $proceso;
    public $orp_id;
    public $etapa_id;
    public $preparacion;

    //valores para cargar selects
    public $orps;
    public $origenes = [];
    public $etapas ;

    //tabla interna
    public $detalles;

    public function mount($id)
    {
        $this->id = $id;
            $estadoPlanta = EstadoPlanta::findOrFail($id);
            $this->origen_id = $estadoPlanta->origen_id;
            $this->proceso = $estadoPlanta->proceso;
            $this->etapa_id = $estadoPlanta->etapa_id;

        // Cargar otros datos necesarios para la vista
        $this->orps = Orp::where('estado', 'En proceso')->get();
        $this->origenes = Origen::all();
        $this->etapas = Etapa::all();

        // Si tienes lógica adicional para cargar datos basados en $estadoPlanta, hazlo aquí
    }

    public function render()
    {
        // Cargar datos adicionales para la vista si es necesario
        if ($this->orp_id) {
            $orp_extra = Orp::where('id', $this->orp_id)->first();
            $this->etapas = ParametroLinea::where('producto_id', $orp_extra->producto_id)->get();
        }

        // Cargar detalles existentes para mostrar en la tabla
        $this->detalles = EstadoDetalle::where('user_id', auth()->user()->id)
            ->where('estado_planta_id', $this->id)
            ->get();

        return view('livewire.estado-planta.editar', [
            'etapas' => $this->etapas,
        ]);
    }

    public function save()
    {
        // Validación de los datos, si es necesario
        $this->validate([
            'origen_id' => 'required',
            'proceso' => 'required',
        ]);

        try {
            // Actualizar el estado de planta existente
            $estadoPlanta = EstadoPlanta::findOrFail($this->id);
            $estadoPlanta->update([
                'origen_id' => $this->origen_id,
                'proceso' => $this->proceso,
                'etapa_id' => $this->etapa_id,
            ]);

            // Guardar o actualizar detalles de estado asociados
            foreach ($this->detalles as $detalle) {
                $detalle->update([
                    // Actualizar según tus campos necesarios
                ]);
            }

            $this->dispatch('actualizar_tabla_estado');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'Estado actualizado exitosamente');
        } catch (\Throwable $th) {
            $this->closeModal();
            $this->dispatch('error_mensaje', mensaje: 'problema'.$th->getMessage());
        }
    }

    public function agregar_orp()
    {
        $this->validate([
            'orp_id' => 'required',
            'preparacion' => 'required',

        ]);

        EstadoDetalle::create([
            'orp_id' => $this->orp_id,
            'preparacion' => $this->preparacion,
            'user_id' => auth()->user()->id,
            'estado_planta_id' => $this->id,
        ]);
    }

    public function borrar_orp($id)
    {
        
        try {
            EstadoDetalle::where('id', $id)->delete();
        } catch (\Throwable $th) {
            dd($th);
        }
        // Encuentra y elimina el detalle del estado con el ORP correspondiente
        
    }

}
