<?php

namespace App\Livewire\SeguimientoHtst;

use App\Exports\MicrobiologiaHtst;
use App\Models\DestinoProducto;
use App\Models\Orp;
use App\Models\SeguimientoHtst;
use Carbon\Carbon;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

use Maatwebsite\Excel\Facades\Excel;
class Tabla extends Component
{



    use WithPagination;
    public $fechaSiembra;
    public $destinoProductos;

    public $f_orp = null;
    public $f_prod = null;
    public $f_cabezal = null;
    public $f_siembra = null;
    public $f_numero = null;
    public $f_destino = null;
    public $f_lote = null;
    public $f_codigo = null;
    public $f_preparacion = null;

    public $aplicandoFiltros = false;

    //filtros-ordenamiento
    public $sortField;
    public $sortAsc = true;
    //mostrar filtro
    public $filtro = false;


    public $fechaInicio;
    public $fechaFin;

    public function show_filtro()
    {
        $this->filtro = !$this->filtro;
    }

    public function aplicarFiltros()
    {
        $this->aplicandoFiltros = true;
        // Resto de la lógica para aplicar los filtros
    }




    #[On('actualizar_tabla_seguimiento_htst')]
    public function render()
    {
        $this->destinoProductos = DestinoProducto::all();
        $seguimientos = SeguimientoHtst::orderBy('id', 'desc')
            ->when(!empty($this->f_orp), function ($query) {
                return $query->whereHas('orp', function ($query) {
                    $query->where('codigo', 'like', '%' . $this->f_orp . '%');
                });
            })


            ->when(!empty($this->f_destino), function ($query) {
                return $query->whereHas('orp.producto', function ($query) {
                    $query->where('destino_producto_id', 'like', '%' . $this->f_destino . '%');
                });
            })

            ->when(!empty($this->f_preparacion), function ($query) {
                return $query->where('preparacion', 'like', '%' . $this->f_preparacion . '%');
            })

            ->when(!empty($this->f_codigo), function ($query) {
                return $query->where('codigo', 'like', '%' . $this->f_codigo . '%');
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

        return view('livewire.seguimiento-htst.tabla', compact(['seguimientos']));
    }


    public function sembrarnow($id)
    {


        try {
            $seguimientos = SeguimientoHtst::findOrFail($id);
            // Verificación para todas las variables antes de asignarlas al modelo
            if ($seguimientos->fechaSiembra == null) {
                $seguimientos->fechaSiembra = now()->hour >= 22 ? now()->addDay()->startOfDay() : now();

                $seguimientos->usuario_siembra = auth()->user()->id;
                $seguimientos->save();


                $this->dispatch('success', mensaje: 'Analisis realizado exitosamente.');
            } else {

                $this->dispatch('warning', mensaje: 'Ya tiene fecha de Sembrado');
            }
        } catch (\Throwable $th) {

            $this->dispatch('error_mensaje', mensaje: 'problema' . $th->getMessage());
        }
    }
    public function mohos2($id)
    {


        try {
            $seguimientos = SeguimientoHtst::findOrFail($id);
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
        $microbiologia = SeguimientoHtst::findOrFail($id);
        $microbiologia->delete();
    }


    public function firmar()
    {

        try {
            $datos = SeguimientoHtst::where(function ($query) {
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
            $datos = SeguimientoHtst::where(function ($query) {
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
        $microbiologia = SeguimientoHtst::find($id);

        // Verificar si el usuario seleccionó una fecha; si no, usar la fecha actual
        $microbiologia->fechaSiembra = $this->fechaSiembra ?? now();

        $microbiologia->usuario_siembra = auth()->user()->id;
        $microbiologia->save();



        // Limpiar la fecha después de guardar
        $this->fechaSiembra = null;
    }


    public function dia2($id)
    {
        try {
            $microbiologia = SeguimientoHtst::find($id);
               $microbiologia->rt = 0;

               $microbiologia->col = 0;




            $microbiologia->usuario_dia2 = auth()->user()->id;
            $microbiologia->save();
            $this->dispatch('success', mensaje: 'Analisis realizado exitosamente.');
        } catch (\Throwable $th) {
            $this->dispatch('error_mensaje', mensaje: 'problema' . $th->getMessage());
        }
    }

    public function dia5($id)
    {
        try {
            $microbiologia = SeguimientoHtst::find($id);
            $microbiologia->moho = 0;

             $microbiologia->usuario_dia5 = auth()->user()->id;

            $microbiologia->save();

            $this->dispatch('success', mensaje: 'Analisis realizado exitosamente.');
        } catch (\Throwable $th) {
            $this->dispatch('error_mensaje', mensaje: 'problema' . $th->getMessage());
        }
    }



    public function exportarExcel()
    {
        // Validar que las fechas sean correctas
        $this->validate([
            'fechaInicio' => 'required|date',
            'fechaFin' => 'required|date|after_or_equal:fechaInicio',
        ]);

        // Convertir las fechas a formato adecuado
        $fechaInicio = Carbon::parse($this->fechaInicio)->startOfDay();
        $fechaFin = Carbon::parse($this->fechaFin)->endOfDay();

        // Consultar registros basados en el rango de fechas y la ruta seleccionada
        $query = SeguimientoHtst::query()
            ->whereBetween('tiempo', [$fechaInicio, $fechaFin]);



        $orp = $query->get();

        // Crear nombre del archivo con las fechas seleccionadas
        $nombreArchivo = "Reporte_{$this->fechaInicio}_a_{$this->fechaFin}.xlsx";

        // Exportar datos
        return Excel::download(new MicrobiologiaHtst($orp), $nombreArchivo);
    }





    // public function generatePDF6()
    // {

    //     $this->validate([
    //         'fechaInicio' => 'required|date',
    //         'fechaFin' => 'required|date|after_or_equal:fechaInicio',
    //     ]);

    //     return response()->streamDownload(
    //         function () {

    //             $fechaInicio = Carbon::parse($this->fechaInicio)->startOfDay();
    //             $fechaFin = Carbon::parse($this->fechaFin)->endOfDay();

    //             // Consultar registros basados en el rango de fechas y la ruta seleccionada
    //             $query = CalidadLeche::query()
    //                 ->whereBetween('tiempo', [$fechaInicio, $fechaFin]);

    //             if ($this->ruta) {
    //                 $query->whereHas('recepcion_leche.subruta_acopio.ruta_acopio', function ($subQuery) {
    //                     $subQuery->where('nombre', $this->ruta);
    //                 });
    //             }


    //             $query2 = RecepcionLeche::query()
    //                 ->whereBetween('tiempo', [$fechaInicio, $fechaFin])
    //                 ->whereHas('calidad_leche', function ($query) {
    //                     $query->whereNot('user_id',NULL);
    //                 });
    //             if ($this->ruta) {
    //                 $query2->whereHas('subruta_acopio.ruta_acopio', function ($subQuery) {
    //                     $subQuery->where('nombre', $this->ruta);
    //                 });
    //             }




    //             $analistasidfq = $query->get()->pluck('user_id')
    //                 ->unique();

    //                 $analistasidlec = $query->get()->pluck('usuarioTram')
    //                 ->unique();
    //                 $analistasidsi = $query->get()->pluck('usuarioSiembra')
    //                 ->unique();
    //                 $analistasidtr = $query->get()->pluck('usuarioLectura')
    //                 ->unique();

    //             $solicitantesid = $query2->get()->pluck('user_id')
    //                 ->unique();

    //             $allUserIds = $analistasidfq
    //                 ->merge($solicitantesid)
    //                 ->merge($analistasidlec)
    //                 ->merge($analistasidsi)
    //                 ->merge($analistasidtr)
    //                 ->unique();


    //             $this->usuariosInvolucrados = User::whereIn('id', $allUserIds)->get();


    //             $this->analistasInvolucrados = User::whereIn('id', $analistasidfq)->get();
    //             $this->solicitantesInvolucrados = User::whereIn('id', $solicitantesid)->get();






    //             $usuariosInvolucrados = $this->usuariosInvolucrados;
    //             $analistasInvolucrados = $this->analistasInvolucrados;
    //             $solicitantesInvolucrados = $this->solicitantesInvolucrados;

    //             $variable = $query->get();
    //             $pdf = App::make('dompdf.wrapper');
    //             $pdf = Pdf::loadView('pdf.reportes.analisisLeche', compact(['variable', 'usuariosInvolucrados', 'fechaInicio', 'fechaFin', 'analistasInvolucrados', 'solicitantesInvolucrados']));
    //             $pdf->setPaper('letter', 'landscape');

    //             echo $pdf->stream();



    //         },
    //         "{$this->fechaInicio}_a_{$this->fechaFin}.pdf"
    //     );

    // }
}
