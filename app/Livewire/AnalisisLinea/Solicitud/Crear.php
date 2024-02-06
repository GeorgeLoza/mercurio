<?php

namespace App\Livewire\AnalisisLinea\Solicitud;

use App\Livewire\Contador\Productoterminado\EstadoOrp;
use App\Models\AnalisisLinea;
use App\Models\EstadoPlanta;
use App\Models\Origen;
use App\Models\SolicitudAnalisisLinea;
use LivewireUI\Modal\ModalComponent;

class Crear extends ModalComponent
{
    public $origen_id;

    public $informacion = null;
    //valores para cargar selects
    public $origenes;

    public function mount()
    {
        $this->origenes = Origen::all();
    }

    public function render()
    {
        if ($this->origen_id) {

            $this->informacion = EstadoPlanta::where('origen_id', $this->origen_id)
                ->latest() // Ordena los resultados por fecha de creación en orden descendente
                ->first();
        }

        return view('livewire.analisis-linea.solicitud.crear', [
            'informacion' => $this->informacion
        ]);
    }
    public function save()
    {
        $this->validate([
            'origen_id' => 'required',
        ]);

        try {
            if ($this->origen_id) {
                $this->informacion = EstadoPlanta::where('origen_id', $this->origen_id)
                    ->latest()
                    ->first();

                // Asegúrate de que $informacion no sea null antes de acceder a sus propiedades
                if ($this->informacion) {
                    $solicitud = SolicitudAnalisisLinea::create([
                        'tiempo' => now(),
                        'user_id' => auth()->user()->id,
                        'estado_planta_id' => $this->informacion->id,
                        'estado' => 'Pendiente',
                    ]);
                    $id = $solicitud->id;

                    AnalisisLinea::create([
                        'solicitud_analisis_linea_id' => $id,
                    ]);

                    $this->dispatch('actualizar_tabla_solicitudAnalisisLineas');
                    $this->dispatch('actualizar_tabla_analisisLineas');
                    $this->closeModal();
                    $this->dispatch('success', mensaje: 'Solicitud registrado exitosamente');
                } else {
                    // Manejar el caso donde $informacion es null
                    $this->dispatch('error', mensaje: 'No se encontró información para el origen seleccionado.');
                }
            }
        } catch (\Throwable $th) {
            $this->closeModal();
            dd($th);
            $this->dispatch('error', mensaje: 'Error: ' . $th);
        }
    }
}
