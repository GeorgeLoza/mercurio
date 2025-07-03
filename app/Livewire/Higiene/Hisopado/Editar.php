<?php

namespace App\Livewire\Higiene\Hisopado;

use App\Models\Hisopado;
use App\Models\HisopadoCorreccion;
use App\Models\Personal;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Carbon\Carbon;

class Editar extends ModalComponent
{

    public $id;
    public $id2;
    public $col;
    public $observacionLectura;
    public $observacionSiembra;
    public $usuario_siembra;
    public $datos;
    public function mount()
    {

        $this->datos = Hisopado::findOrFail($this->id);

        $this->col = $this->datos->col;
        $this->observacionSiembra = $this->datos->observacionSiembra;
        $this->observacionLectura = $this->datos->observacionLectura;
    }
    public function render()
    {
        return view('livewire.higiene.hisopado.editar');
    }


    public function guardar()
    {
        try {
            $hisopado = Hisopado::findOrFail($this->id); // Usa findOrFail para lanzar excepción si no existe

            // Actualiza campos con valores válidos
            $hisopado->col = $this->col !== '' ? $this->col : null;
            $hisopado->observacionLectura = $this->observacionLectura !== '' ? $this->observacionLectura : null;
            $hisopado->usuarioLectura = auth()->id();
            $hisopado->fechaLectura = now();

            // Si col >= 1000, se crea corrección
            if ($hisopado->col !== null && $hisopado->col >= 100) {
                HisopadoCorreccion::firstOrCreate([
                    'hisopado_id' => $hisopado->id,
                ]);

                $personal = Personal::find($hisopado->personal_id);
                $personal->hisopado = 'Correcion';
                $personal->save();

                $conteo = HisopadoCorreccion::whereHas('hisopado.personal', function ($query) use ($hisopado) {
                    $query->where('id', 'like', '%' . $hisopado->personal->id . '%');
                })
                    ->whereBetween('created_at', [
                        Carbon::now()->subMonth()->startOfDay(),
                        Carbon::now()->endOfDay()
                    ])
                    ->count();
                    if ($conteo > 1) {
                        $personal = Personal::find($hisopado->personal_id);
                        $personal->hisopado = 'Memorandum';
                        $personal->save();
                    }

            } else {

                HisopadoCorreccion::where('hisopado_id', $hisopado->id)->delete();
                // Si col < 1000, se actualiza el estado del personal a 'Habilitado'
                $personal = Personal::find($hisopado->personal_id);
                $personal->hisopado = 'Si';
                $personal->save();
            }

            $hisopado->save();

            // Éxito
            $this->dispatch('actualizar_tabla_hisopado');
            $this->dispatch('success', mensaje: 'Análisis realizado exitosamente.');
            $this->closeModal();
        } catch (\Throwable $th) {
            // Error
            $this->closeModal();
            $this->dispatch('error_mensaje', mensaje: 'Problema: ' . $th->getMessage());
        }
    }

    public function observarSiembra()
    {

        try {
            $this->datos = Hisopado::find($this->id);
            // Verificación para todas las variables antes de asignarlas al modelo

            $this->datos->observacionSiembra = $this->observacionSiembra !== '' ? $this->observacionSiembra : null;
            $this->datos->usuarioObservacionesSiembra = auth()->user()->id;
            $this->datos->save();

            $this->dispatch('actualizar_tabla_hisopado');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'Analisis realizado exitosamente.');
        } catch (\Throwable $th) {
            $this->closeModal();
            $this->dispatch('error_mensaje', mensaje: 'problema' . $th->getMessage());
        }
    }
}
