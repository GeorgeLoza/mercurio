<?php

namespace App\Livewire\MateriaPrima\RecepcionMateriaPrima;

use App\Models\ItemMateriaPrima;
use App\Models\RecepcionMateriaPrima;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Tabla extends Component
{

    use WithPagination;

    // public $recepciones;
    public $items;
    public $expanded = [];


    public $filtro = false;
    public $f_item = '';
    public $fechaInicio;
    public $fechaFin;
    public $f_recepcion = '';


    public function mount()
    {
        $this->items  = ItemMateriaPrima::all();
    }

    #[On('actualizar_tabla_recepcion_materia_prima')]
    public function render()
    {
        $recepciones = RecepcionMateriaPrima::with(['itemMateriaPrima', 'proveedorMateriaPrima'])
            ->when($this->f_item, function ($query) {
                $filtro = $this->f_item;
                return $query->whereHas('itemMateriaPrima', function ($q) use ($filtro) {
                    $q->where(function ($sub) use ($filtro) {
                        $sub->where('nombre', 'like', '%' . $filtro . '%')
                            ->orWhere('descripcion', 'like', '%' . $filtro . '%');
                    });
                });
            })
            //filtro de proveedor
            ->when($this->f_recepcion, function ($query) {
                $filtro = $this->f_recepcion;
                return $query->whereHas('proveedorMateriaPrima', function ($q) use ($filtro) {
                    $q->where(function ($sub) use ($filtro) {
                        $sub->where('nombre', 'like', '%' . $filtro . '%')
                            ->orWhere('descripcion', 'like', '%' . $filtro . '%');
                    });
                });
            })
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('livewire.materia-prima.recepcion-materia-prima.tabla', [
            'recepciones' => $recepciones
        ]);
    }


    public function show_filtro()
    {
        $this->filtro = !$this->filtro;
    }

    public function toggle($id)
    {
        if (in_array($id, $this->expanded)) {
            $this->expanded = array_diff($this->expanded, [$id]);
        } else {
            $this->expanded[] = $id;
        }
    }

    public function eliminar($id)
    {
        $recepcion = RecepcionMateriaPrima::findOrFail($id);
        $recepcion->delete();
    }

    public function aceptado($id)
    {
        $recepcion = RecepcionMateriaPrima::findOrFail($id);
        $recepcion->almacenero = 'Aceptado';
        $recepcion->save();
    }

    public function rechazado($id)
    {
        $recepcion = RecepcionMateriaPrima::findOrFail($id);
        $recepcion->almacenero = 'Rechazado';
        $recepcion->save();
    }




    public function PDFRecepcionMP()
    {

        $this->validate([
            'fechaInicio' => 'required|date',
            // 'ruta' => 'required',
            'fechaFin' => 'required|date|after_or_equal:fechaInicio',

        ]);


        return response()->streamDownload(
            function () {

                $fechaInicio = Carbon::parse($this->fechaInicio)->startOfDay();
                $fechaFin = Carbon::parse($this->fechaFin)->endOfDay();

                $query = RecepcionMateriaPrima::query()
                    ->whereBetween('updated_at', [$fechaInicio, $fechaFin]);
                // $query->whereHas('mov', function ($subQuery) {
                //     $subQuery->where('estado', 'Entregado');
                // });



                // if ($this->ruta) {
                //     $query->whereHas('item', function ($subQuery) {
                //         $subQuery->where('nombre', $this->ruta);
                //     });
                // }


                // $ruta = Item::query()
                //     ->where('nombre', $this->ruta)
                //     ->get();





                // Obtener los detalles de los movimientos
                // $detalleMovs = $query->with(['user', 'mov.usuarioAutorizante', 'mov.usuarioEntregante'])->get();

                // Inicializamos un array para almacenar los usuarios
                $usuariosInvolucrados = collect();

                // Recorremos los detalles de movimiento y agregamos los usuarios involucrados

                // Agregar
                foreach ($query->with(['user', 'proveedorMateriaPrima', 'itemMateriaPrima'])->get() as $recepcion) {
                    if ($recepcion->user) {
                        $usuariosInvolucrados->push($recepcion->user);
                    }
                }

                // Eliminar usuarios duplicados usando el campo 'id' como clave única
                $usuariosUnicos = $usuariosInvolucrados->unique('id');

                // Ahora $usuariosUnicos tiene la lista de usuarios únicos involucrados






                $variable = $query->get();
                $pdf = App::make('dompdf.wrapper');
                $pdf = Pdf::loadView('pdf.reportes.recepcionMPReporte', compact(['variable', 'fechaInicio', 'fechaFin', 'usuariosUnicos']));
                $pdf->setPaper('letter', 'landscape');
                echo $pdf->stream();
            },
            "Recepciones maeria prima de {$this->fechaInicio}_a_{$this->fechaFin}.pdf"
        );
    }
}
