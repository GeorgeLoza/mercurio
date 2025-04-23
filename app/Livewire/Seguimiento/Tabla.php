<?php

namespace App\Livewire\Seguimiento;

use App\Models\DetalleSolicitudPlanta;
use App\Models\MicrobiologiaExterno;
use App\Models\Orp;
use App\Models\Producto;
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
    public $fechaSiembra;

    public $f_orp = null;
    public $f_prod = null;
    public $f_cabezal = null;
    public $f_siembra = null;
    public $f_numero = null;
    public $f_destino = null;
    public $f_lote = null;

    public $aplicandoFiltros = false;

    //filtros-ordenamiento
    public $sortField;
    public $sortAsc = true;
    //mostrar filtro
    public $filtro = false;

    public function show_filtro()
    {
        $this->filtro = !$this->filtro;
    }

    public function aplicarFiltros()
    {
        $this->aplicandoFiltros = true;
        // Resto de la lógica para aplicar los filtros
    }




    #[On('actualizar_tabla_seguimiento')]
    public function render()
{
    $seguimientos = Seguimiento::orderBy('id', 'desc')
        ->when(!empty($this->f_orp), function ($query) {
            $orpIds = Orp::where('codigo', 'like', '%' . $this->f_orp . '%')->pluck('id')->toArray();
            if (!empty($orpIds)) {
                $query->where(function ($q) use ($orpIds) {
                    foreach ($orpIds as $id) {
                        $q->orWhereJsonContains('orp_ids', $id);
                    }
                });
            }
        })
        ->when(!empty($this->f_destino), function ($query) {
            $orpIds2 = Orp::whereHas('producto.destinoProducto', function ($subQuery) {
                if ($this->f_destino === 'comerciales') {
                    $subQuery->where('nombre', 'Comerciales');
                } else {
                    $subQuery->where('nombre', '!=', 'Comerciales');
                }
            })->pluck('id')->toArray();

            if (!empty($orpIds2)) {
                $query->where(function ($q) use ($orpIds2) {
                    foreach ($orpIds2 as $id) {
                        $q->orWhereJsonContains('orp_ids', $id);
                    }
                });
            }
        })
        ->when(!empty($this->f_numero), function ($query) {
            return $query->where('numero', 'like', '%' . $this->f_numero . '%');
        })
        ->when(!empty($this->f_cabezal), function ($query) {
            return $query->whereHas('origen', function ($query) {
                $query->where('alias', 'like', '%' . $this->f_cabezal . '%');
            });
        })
        ->when(!empty($this->f_siembra), function ($query) {
            return $query->where('fechaSiembra', 'like', '%' . $this->f_siembra . '%');
        })
        ->when(!empty($this->f_lote), function ($query) {
            return $query->where('lote', 'like', '%' . $this->f_lote . '%');
        })
        ->paginate(40)
        ->withQueryString();

    return view('livewire.seguimiento.tabla', compact(['seguimientos']));
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

    public function eliminar($id)
    {
        $microbiologia = Seguimiento::findOrFail($id);
        $microbiologia->delete();
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




    public function sembrar($id)
    {
        $this->validate([
            'fechaSiembra' => 'required',

        ]);
        $microbiologia = Seguimiento::find($id);

        // Verificar si el usuario seleccionó una fecha; si no, usar la fecha actual
        $microbiologia->fechaSiembra = $this->fechaSiembra ?? now();

        $microbiologia->usuario_siembra = auth()->user()->id;
        $microbiologia->save();



        // Limpiar la fecha después de guardar
        $this->fechaSiembra = null;
    }

}
