<?php

namespace App\Livewire\Seguimiento;

use App\Models\DetalleSolicitudPlanta;
use App\Models\MicrobiologiaExterno;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Seguimiento;
use Carbon\Carbon;
use Livewire\Attributes\On;

use Illuminate\Support\Facades\DB;
use Psy\Command\WhereamiCommand;

class Tabla extends Component
{
    use WithPagination;






    #[On('actualizar_tabla_seguimiento')]
    public function render()
    {
        $seguimientos = Seguimiento::orderBy('id', 'desc')->paginate(40)->withQueryString();

        return view('livewire.seguimiento.tabla',  compact(['seguimientos']));
    }


    public function mohos1($id)
    {


        try {
            $seguimientos = Seguimiento::findOrFail($id);
            // Verificación para todas las variables antes de asignarlas al modelo

            $seguimientos->moho = 0;



            $seguimientos->save();


            $this->dispatch('success', mensaje: 'Analisis realizado exitosamente.');
        } catch (\Throwable $th) {

            $this->dispatch('error_mensaje', mensaje: 'problema' . $th->getMessage());
        }
    }
    public function mohos2($id)
    {


        try {
            $seguimientos = Seguimiento::findOrFail($id);
            // Verificación para todas las variables antes de asignarlas al modelo

            $seguimientos->moho = null;



            $seguimientos->save();


            $this->dispatch('success', mensaje: 'Analisis realizado exitosamente.');
        } catch (\Throwable $th) {

            $this->dispatch('error_mensaje', mensaje: 'problema' . $th->getMessage());
        }
    }



    public function firmar()
    {

        try {
            $datos = Seguimiento::where(function ($query) {
                $query->whereBetween('fechaSiembra', [
                    Carbon::now()->subDays(2)->startOfDay(),
                    Carbon::now()->subDays(2)->endOfDay()
                ]);

                // Si hoy es lunes, también traemos los del día de hace 4 días
                if (Carbon::now()->isMonday()) {
                    $query->orWhereBetween('fechaSiembra', [
                        Carbon::now()->subDays(3)->startOfDay(),
                        Carbon::now()->subDays(3)->endOfDay()
                    ]);
                }
            })
                ->whereNull('usuario_rt')
                ->get();

            // Verificación para todas las variables antes de asignarlas al modelo

            foreach ($datos as $dato) {
                $dato->usuario_rt = auth()->user()->id;
                $dato->save();
            }

            $this->dispatch('success', mensaje: 'Analisis realizado exitosamente.');
        } catch (\Throwable $th) {
            $this->dispatch('error_mensaje', mensaje: 'problema' . $th->getMessage());
        }
    }

    public function firmah()
    {

        try {
            $datos = Seguimiento::where(function ($query) {
                $query->whereBetween('fechaSiembra', [
                    Carbon::now()->subDays(5)->startOfDay(),
                    Carbon::now()->subDays(5)->endOfDay()
                ]);

                // Si hoy es lunes, también traemos los del día de hace 4 días
                if (Carbon::now()->isMonday()) {
                    $query->orWhereBetween('fechaSiembra', [
                        Carbon::now()->subDays(6)->startOfDay(),
                        Carbon::now()->subDays(6)->endOfDay()
                    ]);
                }

            })
            ->where('moho', 0)

            ->whereNull('usuario_moho')
                ->get();
            // Verificación para todas las variables antes de asignarlas al modelo

            foreach ($datos as $dato) {
                $dato->usuario_moho = auth()->user()->id;
                $dato->save();
            }

            $this->dispatch('success', mensaje: 'Analisis realizado exitosamente.');
        } catch (\Throwable $th) {
            $this->dispatch('error_mensaje', mensaje: 'problema' . $th->getMessage());
        }
    }
}
