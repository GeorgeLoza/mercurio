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

class Crear extends ModalComponent
{

    public $origen_id;
    public $proceso;
    public $orp_id;
    public $etapa_id;
    public $preparacion;

    //valores para cargar selects
    public $orps;
    public $origenes = [];
    public $etapas;

    //tabla interna
    public $detalles;

    public function mount()
    {
        $this->orps = Orp::where('estado', 'En proceso')->get();
        $this->etapas = Etapa::all();
        $this->origenes = Origen::whereNot('descripcion', 'like', '%' . 'ENVASADORA' . '%')
                        ->orderBy('alias')
                        ->get();

    }

    public function render()
    {
        $this->detalles = EstadoDetalle::where('user_id', auth()->user()->id)->where('estado_planta_id', NULL)->get();

        return view('livewire.estado-planta.crear');
    }
    public function save()
    {

        $this->validate([
            'origen_id' => 'required',
            'proceso' => 'required',
        ]);
        $detallesPendientes = EstadoDetalle::where('user_id', auth()->user()->id)
        ->whereNull('estado_planta_id')
        ->get();


        if ($this->proceso == 'Produccion') {

            $this->validate([
                'etapa_id' => 'required',
            ]);



            if ($detallesPendientes->isEmpty()) {
                // Manejar el caso cuando $detallesPendientes está vacío
                $this->dispatch('error_mensaje', mensaje: 'No se puedes registrar el estado de planta, Debe agregar una Orp y su preparacion.');
                return; // Detener la ejecución si no hay detalles pendientes
            }
        }



        try {

            $estadoPlanta = EstadoPlanta::create([
                'tiempo' => now(),
                'user_id' => auth()->user()->id,
                'origen_id' => $this->origen_id,
                'proceso' => $this->proceso,
                'etapa_id' => $this->etapa_id,
            ]);
            // Obtener los detalles de estado asociados con el usuario actual y estado_planta_id nulo

            // Asociar los detalles de estado con el estado planta recién creado
            foreach ($detallesPendientes as $detalle) {
                $detalle->estado_planta_id = $estadoPlanta->id;
                $detalle->save();
            }
            $this->dispatch('actualizar_tabla_estado');
            $this->closeModal();
            $this->dispatch('actualizar_dashboardPlanta');
            $this->dispatch('success', mensaje: 'Estado registrado exitosamente');
        } catch (\Throwable $th) {
            $this->closeModal();
            $this->dispatch('error_mensaje', mensaje: 'problema' . $th->getMessage());
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
