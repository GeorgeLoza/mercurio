<?php

namespace App\Livewire\Externo\Microbiologia;

use App\Models\DetalleSolicitudPlanta;
use App\Models\MicrobiologiaExterno;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class Tabla extends Component
{
    use WithPagination;
    public $f_planta = false;
    public $f_tipo = false;
    public $fecha_sembrado;

    public $aplicandoFiltros = false;

    //mostrar filtro
    public $filtro = false;

    public function show_filtro()
    {
        $this->filtro = !$this->filtro;
    }
    private function hayFiltrosActivos(): bool
    {
        return $this->f_planta || $this->f_tipo;
    }
    public function aplicarFiltros()
    {
        $this->aplicandoFiltros = true;
        // Resto de la lógica para aplicar los filtros
    }


    #[On('actualizar_tabla_microexterno')]
    public function render()
    {

        $this->aplicandoFiltros = $this->hayFiltrosActivos();
        $microbiologia = MicrobiologiaExterno::query()


        //prueba
        ->when($this->f_planta, function ($microbiologia) {
            return $microbiologia->whereHas('detalleSolicitudPlanta.solicitudPlanta.user.planta', function ($microbiologia) {
                $microbiologia->where('nombre', 'like', '%' . $this->f_planta );
            });
        })
        ->when($this->f_tipo, function ($query) {
            if ($this->f_tipo === 'grupo_1') {
                return $query->whereHas('detalleSolicitudPlanta.tipoMuestra', function ($query) {
                    $query->whereIn('nombre', ['PERSONAL', 'AMBIENTE', 'SUPERFICIES','SUP. UTENSILIOS'] );
                });
                // return $query->whereIn('tipo', ['PERSONAL', 'AMBIENTE', 'SUPERFICIE']);
            } elseif ($this->f_tipo === 'grupo_2') {
                return $query->whereHas('detalleSolicitudPlanta.tipoMuestra', function ($query) {
                    $query->whereNotIn('nombre', ['PERSONAL', 'AMBIENTE', 'SUPERFICIES','SUP. UTENSILIOS'] );
                });
                // return $query->whereNotIn('tipo', ['PERSONAL', 'AMBIENTE', 'SUPERFICIE']);
            }
        })


        ->orderBy('created_at', 'desc');




        $microbiologia = $this->aplicandoFiltros ? $microbiologia->get() : $microbiologia->paginate(50)->withQueryString();






        return view('livewire.externo.microbiologia.tabla', compact(['microbiologia']));
    }



    public function sembrarNow($id)
    {
        // Iniciar la transacción
        DB::beginTransaction();

        try {
            // Encontrar la microbiología
            $microbiologia = MicrobiologiaExterno::findOrFail($id);

            // Actualizar el microbiología
            $microbiologia->update([
                'fecha_sembrado' => now(),
                'estado' => 'Sembrado',
                'ana_sem_id' => auth()->user()->id,
            ]);

            // Actualizar el detalle de la solicitud de planta
            $detalle = DetalleSolicitudPlanta::findOrFail($microbiologia->detalle_solicitud_planta_id);
            $detalle->update(['estado' => 'Analizando']);

            // Confirmar la transacción
            DB::commit();

            // Notificar al usuario
            $this->dispatch('success', mensaje: 'Sembrado realizado exitosamente.');
        } catch (\Exception $e) {
            // En caso de error, revertir la transacción
            DB::rollBack();

            // Manejo de error si es necesario
            $this->dispatch('error', mensaje: 'Hubo un error al realizar el sembrado.');
        }
    }

    public function sembrar($id)
    {
        $this->validate([
            'fecha_sembrado' => 'required',

        ]);
        $microbiologia = MicrobiologiaExterno::find($id);

        // Verificar si el usuario seleccionó una fecha; si no, usar la fecha actual
        $microbiologia->fecha_sembrado = $this->fecha_sembrado ?? now();

        $microbiologia->estado = "Sembrado";
        $microbiologia->ana_sem_id = auth()->user()->id;
        $microbiologia->save();

        $detalle = DetalleSolicitudPlanta::where("id", $microbiologia->detalle_solicitud_planta_id)->first();
        $detalle->estado = "Analizando";
        $detalle->save();

        // Limpiar la fecha después de guardar
        $this->fecha_sembrado = null;
    }

    public function eliminar($id)
    {
        $microbiologia = MicrobiologiaExterno::findOrFail($id);
        $microbiologia->delete();
    }


    public function dia2($id)
    {
        /*$this->validate([
            'aer_mes' => 'required',
            'col_tot' => 'required',
        ]);*/

        try {
            $microbiologia = MicrobiologiaExterno::find($id);
            // Verificación para todas las variables antes de asignarlas al modelo

            $microbiologia->aer_mes = 0;
            $microbiologia->col_tot = 0;
            if ($microbiologia->detalleSolicitudPlanta->tipoMuestra->id == 2) {
                $microbiologia->col_tot = null;
            }

            if ($microbiologia->detalleSolicitudPlanta->tipoMuestra->id == 9 || $microbiologia->detalleSolicitudPlanta->tipoMuestra->id == 5) {
                $microbiologia->aer_mes = null;
                $microbiologia->estado = "Analizado";

                $detalle = DetalleSolicitudPlanta::where("id", $microbiologia->detalle_solicitud_planta_id)->first();
                $detalle->estado = "Revision";
                $detalle->save();
            } else {
                $microbiologia->estado = "2 Dias";
            }

            if (is_null($microbiologia->fecha_dia2)) {
                $microbiologia->fecha_dia2 = now();
            }
            if (is_null($microbiologia->ana_dia2_id)) {
                $microbiologia->ana_dia2_id = auth()->user()->id;
            }
            $microbiologia->save();

            // $this->dispatch('actualizar_tabla_microexterno');

            $this->dispatch('success', mensaje: 'Analisis realizado exitosamente.');
        } catch (\Throwable $th) {

            $this->dispatch('error_mensaje', mensaje: 'problema' . $th->getMessage());
        }
    }

    public function dia5($id)
    {
        /*
        $this->validate([
            'moh_lev' => 'required',
        ]);
*/
        try {
            $microbiologia = MicrobiologiaExterno::find($id);
            $microbiologia->moh_lev = 0;
            $microbiologia->estado = "Analizado";
            if (is_null($microbiologia->fecha_dia5)) {
                $microbiologia->fecha_dia5 = now();
            }
            if (is_null($microbiologia->ana_dia5_id)) {
                $microbiologia->ana_dia5_id = auth()->user()->id;
            }
            $microbiologia->save();

            $detalle = DetalleSolicitudPlanta::where("id", $microbiologia->detalle_solicitud_planta_id)->first();
            $detalle->estado = "Revision";
            $detalle->save();

            // $this->dispatch('actualizar_tabla_microexterno');

            $this->dispatch('success', mensaje: 'Analisis realizado exitosamente.');
        } catch (\Throwable $th) {

            $this->dispatch('error_mensaje', mensaje: 'problema' . $th->getMessage());
        }
    }
}
