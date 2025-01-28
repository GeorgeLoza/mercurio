<?php

namespace App\Livewire\Sustancias;

use App\Exports\SustaciasExports;
use App\Models\DetalleMov;
use App\Models\Item;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Mov;
use Carbon\Carbon;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Support\Facades\App;

class Tabla extends Component
{
    use WithPagination;
    // Lista de movimientos
    public $totalesPorItem = []; // Cantidad actual por ítem (ingresos - egresos)
    public $rutas;
    public $ruta;
    public $fechaInicio;
    public $fechaFin;

    // Lista de movimientos
    public $detallesAbiertos = []; // Almacena qué movimientos tienen sus detalles abiertos


    #[On('actualizar_movimiento_sustancia')]
    public function mount()
    {
        $this->rutas     = Item::pluck('nombre')->unique();

        $this->calcularCantidadActualPorItem();
        // dd($this->totalesPorItem);

    }

    public function toggleDetalles($movId)
    {
        // Alterna el estado (abierto/cerrado) del movimiento en $detallesAbiertos
        if (isset($this->detallesAbiertos[$movId])) {
            unset($this->detallesAbiertos[$movId]); // Cerrar si ya está abierto
        } else {
            $this->detallesAbiertos[$movId] = true; // Abrir si está cerrado
        }
    }
    public function render()
    {
        $movimientos = Mov::with('detalleMovs.item')
            ->orderBy('tiempo', 'desc') // Ordenar por fecha de creación descendente
            ->paginate(10);
        return view('livewire.sustancias.tabla', [
            'movimientos' => $movimientos,
        ]);
    }


    public function cambiarEstado1($movId)
    {
        // Busca el movimiento y cambia su estado a 'autorizado'
        $mov = Mov::find($movId);

        if ($mov) {
            $mov->estado = 'Autorizado';

            $mov->autorizante = auth()->user()->id;
            // dd($mov->user_id);
            $mov->save();
        }

        // Refresca la lista de movimientos
    }

    public function cambiarEstado2($movId)
    {
        // Busca el movimiento y cambia su estado a 'autorizado'
        $mov = Mov::find($movId);

        if ($mov) {
            $mov->estado = 'Denegado';
            $mov->autorizante = auth()->user()->id;
            $mov->save();
        }

        // Refresca la lista de movimientos
    }

    public function cambiarEstado3($movId)
    {
        // Busca el movimiento y cambia su estado a 'autorizado'
        $mov = Mov::find($movId);

        if ($mov) {
            $mov->estado = 'Entregado';
            $mov->entregante = auth()->user()->id;
            dd($mov->entregante);
            $mov->save();
        }

        // Refresca la lista de movimientos
    }



    public function calcularCantidadActualPorItem()
    {
        // Obtén todos los ítems
        $items = Item::all();

        // Calcula ingresos, egresos, y encuentra el último egreso
        $movimientos = Mov::where('estado', 'Entregado')
            ->with('detalleMovs.item')
            ->get()
            ->flatMap->detalleMovs
            ->groupBy('item_id')
            ->map(function ($detalles) {
                $ingresos = $detalles->where('mov.tipo', 1)->sum('cantidad');
                $egresos = $detalles->where('mov.tipo', 0)->sum('cantidad');
                $ultimoEgreso = $detalles->where('mov.tipo', 0)->sortByDesc('mov.tiempo')->first();

                return [
                    'ingresos' => $ingresos,
                    'egresos' => $egresos,
                    'cantidad_actual' => $ingresos - $egresos,
                    'ultimo_egreso' => $ultimoEgreso ? [
                        'cantidad' => $ultimoEgreso->cantidad,
                        'fecha' => $ultimoEgreso->mov->tiempo,
                    ] : null,
                ];
            });

        // Asocia los resultados a todos los ítems y completa con ceros si faltan
        $this->totalesPorItem = $items->map(function ($item) use ($movimientos) {
            $movimiento = $movimientos->get($item->id, [
                'ingresos' => 0,
                'egresos' => 0,
                'cantidad_actual' => 0,
                'ultimo_egreso' => null,
            ]);

            return [
                'nombre' => $item->nombre,
                'codigo' => $item->codigo,
                'unidad' => $item->unidad ?? ' ',

                'cantidad_actual' => $movimiento['cantidad_actual'],
                'ultimo_egreso' => $movimiento['ultimo_egreso'],

            ];
        })->toArray();
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
        $query = DetalleMov::query()
            ->whereBetween('updated_at', [$fechaInicio, $fechaFin]);
        $query->whereHas('mov', function ($subQuery) {
            $subQuery->where('estado', 'Entregado');
        });
        $query->whereHas('mov', function ($subQuery) {
            $subQuery->where('tipo', 0);
        });
        if ($this->ruta) {
            $query->whereHas('item', function ($subQuery) {
                $subQuery->where('nombre', $this->ruta);
            });
        }

        $orp = $query->get();

        // Crear nombre del archivo con las fechas seleccionadas
        $nombreArchivo = "Reporte_{$this->fechaInicio}_a_{$this->fechaFin}.xlsx";

        // Exportar datos
        return Excel::download(new SustaciasExports($orp), $nombreArchivo);
    }





    public function PDFSustancias()
    {

        $this->validate([
            'fechaInicio' => 'required|date',
            'ruta' => 'required',
            'fechaFin' => 'required|date|after_or_equal:fechaInicio',

        ]);


        return response()->streamDownload(
            function () {

                $fechaInicio = Carbon::parse($this->fechaInicio)->startOfDay();
                $fechaFin = Carbon::parse($this->fechaFin)->endOfDay();

                $query = DetalleMov::query()
                    ->whereBetween('updated_at', [$fechaInicio, $fechaFin]);
                $query->whereHas('mov', function ($subQuery) {
                    $subQuery->where('estado', 'Entregado');
                });



                if ($this->ruta) {
                    $query->whereHas('item', function ($subQuery) {
                        $subQuery->where('nombre', $this->ruta);
                    });
                }


                $ruta = Item::query()
                ->where('nombre', $this->ruta)
                ->get();





                // Obtener los detalles de los movimientos
                $detalleMovs = $query->with(['mov.user', 'mov.usuarioAutorizante', 'mov.usuarioEntregante'])->get();

                // Inicializamos un array para almacenar los usuarios
                $usuariosInvolucrados = collect();

                // Recorremos los detalles de movimiento y agregamos los usuarios involucrados
                foreach ($detalleMovs as $detalle) {
                    // Agregar usuario que está relacionado con el movimiento
                    if ($detalle->mov->user) {
                        $usuariosInvolucrados->push($detalle->mov->user);
                    }

                    // Agregar autorizante si existe
                    if ($detalle->mov->usuarioAutorizante) {
                        $usuariosInvolucrados->push($detalle->mov->usuarioAutorizante);
                    }

                    // Agregar entregante si existe
                    if ($detalle->mov->usuarioEntregante) {
                        $usuariosInvolucrados->push($detalle->mov->usuarioEntregante);
                    }
                }

                // Eliminar usuarios duplicados usando el campo 'id' como clave única
                $usuariosUnicos = $usuariosInvolucrados->unique('id');

                // Ahora $usuariosUnicos tiene la lista de usuarios únicos involucrados






                $variable = $query->get();
                $pdf = App::make('dompdf.wrapper');
                $pdf = Pdf::loadView('pdf.reportes.sustanciasReporte', compact(['variable', 'fechaInicio', 'fechaFin', 'usuariosUnicos','ruta']));
                $pdf->setPaper('letter', 'portrait');
                echo $pdf->stream();
            },
            "{$this->fechaInicio}_a_{$this->fechaFin}.pdf"
        );
    }
}
