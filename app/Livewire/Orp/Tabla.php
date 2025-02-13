<?php

namespace App\Livewire\Orp;

use App\Exports\MuestrasExport;
use App\Models\Orp;
use App\Models\Color;
use App\Models\EstadoDetalle;
use App\Models\User;
use App\Notifications\CierreOrp;
use App\Notifications\orpNotification;
use Livewire\WithPagination;
use Livewire\Component;
use Livewire\Attributes\On;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;

class Tabla extends Component
{
    use WithPagination;
    //filtros-busqueda
    public $f_codigo = null;
    public $f_codigoProducto = null;
    public $f_nombreProducto = null;

    public $f_destino = null;
    public $f_lote = null;
    public $f_estado = null;
    public $f_tiempoElaboracion = null;
    public $f_fechaVencimiento1 = null;
    public $f_fechaVencimiento2 = null;
    public $f_producto = null;
    public $f_productoCodigo = null;
    //categoria
    public $f_grupo = null;
    public $f_updated_at = null;


    public $aplicandoFiltros = false;

    //filtros-ordenamiento
    public $sortField;
    public $sortAsc = true;
    //mostrar filtro
    public $filtro = false;


    public $anio;  // Año, por ejemplo: 2024
    public $mes;
    public $dia;
    public $fecha;
    public $cat;

    public function show_filtro()
    {
        $this->filtro = !$this->filtro;
    }



    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }

    public function iniciar($id)
    {

        $registro = Orp::find($id);
        $registro->estado = 'En proceso';
        $registro->tiempo_elaboracion = now();
        $registro->save();

        $colorDisponible = Color::whereNull('orp_id')->first();
        if ($colorDisponible) {
            $colorDisponible->orp_id = $id;
            $colorDisponible->save();
        }


        // Notificar a los usuarios admin
        // $admins = User::where('rol', 'Admi')->orWhere('rol', 'Jef')->orWhere('rol', 'Sup')->get();

        // foreach ($admins as $admin) {
        //     $admin->notify(new orpNotification($registro));
        // }

    }

    public function cancelar($id)
    {
        $registro = Orp::find($id);
        $registro->estado = 'Cancelado';
        $registro->save();

    }

    public function pendiente($id)
    {
        $registro = Orp::find($id);
        $registro->estado = 'Pendiente';
        $registro->save();
    }

    public function programar($id)
    {
        $registro = Orp::find($id);
        $registro->estado = 'Programado';
        $registro->save();
    }
    public function completar($id)
    {
        $registro = Orp::find($id);
        $registro->estado = 'Completado';
        $registro->save();


        try {
            DB::table('colors')
                ->where('orp_id', $id)
                ->update(['orp_id' => null]);
        } catch (\Throwable $th) {
            // Manejo de error: puedes registrar el error si es necesario
            // Log::error('Error al actualizar colors: ' . $th->getMessage());
        }

        // DB::table('colors')
        //     ->where('orp_id', $id)
        //     ->update(['orp_id' => null]);

        // Notificar a los usuarios admin
        // $admins = User::where('rol', 'Admi')->orWhere('rol', 'Jef')->orWhere('rol', 'Sup')->get();

        // foreach ($admins as $admin) {
        //     $admin->notify(new CierreOrp($registro));
        // }
    }

    public function mount()
    {
        $this->sortField = 'created_at';
        $this->sortAsc = false;



    }


    #[On('actualizar_tabla_orps')]
    public function render()
    {
        $this->aplicandoFiltros = $this->hayFiltrosActivos();
        $query = Orp::query()

            ->when($this->f_codigo, function ($query) {
                return $query->where('codigo', 'like', '%' . $this->f_codigo . '%');
            })

            //prueba
            ->when($this->f_grupo, function ($query) {
                return $query->whereHas('producto.categoriaProducto', function ($query) {
                    $query->where('grupo', 'like', '%' . $this->f_grupo . '%');
                });
            })
            //fin prueba
            ->when($this->f_codigoProducto, function ($query) {
                return $query->whereHas('producto', function ($query) {
                    $query->where('codigo', 'like', '%' . $this->f_codigoProducto . '%');
                });
            })
            ->when($this->f_nombreProducto, function ($query) {
                return $query->whereHas('producto', function ($query) {
                    $query->where('nombre', 'like', '%' . $this->f_nombreProducto . '%');
                });
            })
            ->when($this->f_destino, function ($query) {
                return $query->whereHas('producto.destinoProducto', function ($query) {
                    $query->where('nombre', 'like', '%' . $this->f_destino . '%');
                });
            })
            ->when($this->f_lote, function ($query) {
                return $query->where('lote', 'like', '%' . $this->f_lote . '%');
            })
            ->when($this->f_updated_at , function ($query) {
                return $query->where('updated_at', 'like', '%' . $this->f_updated_at . '%');
            })
            ->when($this->f_estado, function ($query) {
                return $query->where('estado', 'like', '%' . $this->f_estado . '%');
            })
            ->when($this->f_tiempoElaboracion, function ($query) {
                return $query->where('tiempo_elaboracion', 'like', '%' . $this->f_tiempoElaboracion . '%');
            })
                ->when($this->f_fechaVencimiento1, function ($query) {

                    return $query->where('fecha_vencimiento1', 'like', '%' . $this->f_fechaVencimiento1 . '%');
                })
            ->when($this->f_fechaVencimiento2, function ($query) {
                return $query->where('fecha_vencimiento2', 'like', '%' . $this->f_fechaVencimiento2 . '%');
            })

            ->when($this->f_productoCodigo, function ($query) {
                return $query->whereHas('producto', function ($query) {
                    $query->where('codigo', 'like', '%' . $this->f_productoCodigo . '%');
                });
            })

            ->when($this->sortField, function ($query) {
                $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
            });
        $orps = $this->aplicandoFiltros ? $query->get() : $query->paginate(50);


        return view('livewire.orp.tabla', [
            'orps' => $orps
        ]);
    }

    public function aplicarFiltros()
    {
        $this->aplicandoFiltros = true;
        // Resto de la lógica para aplicar los filtros
    }
    public function limpiarFiltros()
    {
        $this->reset(['f_codigo', 'f_codigoProducto', 'f_nombreProducto', 'f_lote', 'f_estado', 'f_tiempoElaboracion', 'f_fechaVencimiento1', 'f_fechaVencimiento2', 'f_productoCodigo','f_grupo']);

        // Refresca el componente
        $this->js('window.location.reload()');
    }
    private function hayFiltrosActivos(): bool
    {
        return $this->f_codigo || $this->f_codigoProducto || $this->f_nombreProducto || $this->f_lote || $this->f_estado || $this->f_tiempoElaboracion || $this->f_fechaVencimiento1 || $this->f_fechaVencimiento2 || $this->f_productoCodigo || $this->f_grupo;
    }



    public function exportarExcel()
{
    // Asegúrate de que $this->fecha esté correctamente definido
    // Extraer año, mes y día de la fecha seleccionada
    $anio = Carbon::parse($this->fecha)->year;
    $mes = Carbon::parse($this->fecha)->month;
    $dia = Carbon::parse($this->fecha)->day;
     $cat= $this->cat ;


     $estadoDetalles = EstadoDetalle::select('orp_id', 'preparacion')
    ->distinct() // Asegura que no se repitan las combinaciones de orp_id y preparacion


    ->when($anio, function ($query) use ($anio) {
        $query->whereHas('orp', function ($q) use ($anio) {
            $q->whereYear('tiempo_elaboracion', $anio);
        });
    })
    ->when($mes, function ($query) use ($mes) {
        $query->whereHas('orp', function ($q) use ($mes) {
            $q->whereMonth('tiempo_elaboracion', $mes);
        });
    })
    ->when($dia, function ($query) use ($dia) {
        $query->whereHas('orp', function ($q) use ($dia) {
            $q->whereDay('tiempo_elaboracion', $dia);
        });
    })
    ->when($cat, function ($query) use ($cat) {
                $query->whereHas('orp.producto.categoriaProducto', function ($q) use ($cat) {
                    $q->where('grupo', $cat);
                 });
             })
    ->get();


    // Consultar registros basados en la fecha completa



    // Crear nombre del archivo con la fecha seleccionada
    $nombreMes = Carbon::createFromFormat('m', $mes)->translatedFormat('F'); // Obtener el nombre del mes
    $nombreArchivo = "{$dia}-{$nombreMes}-{$anio}.csv";

    // Exportar datos usando el paquete maatwebsite/excel
    return Excel::download(new MuestrasExport($estadoDetalles), $nombreArchivo, \Maatwebsite\Excel\Excel::CSV);
}


public function generatePDFsegimiento()
{
    // Definir las variables antes de la descarga
    $anio = Carbon::parse($this->fecha)->year;
    $mes = Carbon::parse($this->fecha)->month;
    $dia = Carbon::parse($this->fecha)->day;
    $cat = 'HTST';

    // Obtener el nombre completo del mes
    $nombreMes = Carbon::createFromDate($anio, $mes, $dia)->format('F'); // Nombre completo del mes

    // Construir el nombre del archivo
    $nombreArchivo = "{$dia} {$nombreMes} {$anio}.pdf";  // Nombre del archivo PDF

    return response()->streamDownload(
        function () use ($anio, $mes, $dia, $cat) { // Pasamos las variables necesarias
            $estadoDetalles = EstadoDetalle::select('orp_id', 'preparacion')
                ->with('orp.producto.destinoProducto')
                ->distinct() // Asegura que no se repitan las combinaciones de orp_id y preparacion
                ->whereHas('orp.producto', function ($q) {
                    $q->whereNotNull('destino_producto_id'); // Solo filtra si destino_producto_id no es NULL
                })


                ->when($anio, function ($query) use ($anio) {
                    $query->whereHas('orp', function ($q) use ($anio) {
                        $q->whereYear('updated_at', $anio);
                    });
                })
                ->when($mes, function ($query) use ($mes) {
                    $query->whereHas('orp', function ($q) use ($mes) {
                        $q->whereMonth('updated_at', $mes);
                    });
                })
                ->when($dia, function ($query) use ($dia) {
                    $query->whereHas('orp', function ($q) use ($dia) {
                        $q->whereDay('updated_at', $dia);
                    });
                })
                ->when($cat, function ($query) use ($cat) {
                    $query->whereHas('orp.producto.categoriaProducto', function ($q) use ($cat) {
                        $q->where('grupo', 'HTST');
                    });
                })
                ->when($cat, function ($query) use ($cat) {
                    $query->whereHas('orp', function ($q) use ($cat) {
                        $q->where('estado', 'Completado');
                    });
                })


                ->get();

            $pdf = App::make('dompdf.wrapper');
            $pdf = Pdf::loadView('pdf.reportes.seguimientoProductoTerminado', compact(['estadoDetalles']));
            $pdf->setPaper('letter', 'portrait');
            echo $pdf->stream();
        },
        $nombreArchivo // Ahora pasamos la variable correctamente
    );
}



}
