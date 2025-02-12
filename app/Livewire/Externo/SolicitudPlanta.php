<?php

namespace App\Livewire\Externo;

use App\Models\ActividadAgua;
use App\Models\DetalleSolicitudPlanta;
use App\Models\MicrobiologiaExterno;
use App\Models\SolicitudPlanta as ModelsSolicitudPlanta;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;
use Livewire\Component;

class SolicitudPlanta extends Component
{
    public $openCollapse = [];


    public function render()
    {
        if (auth()->user()->role->id == 23) {
            $solicitudes = ModelsSolicitudPlanta::where('user_id', auth()->user()->id)
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            $solicitudes = ModelsSolicitudPlanta::orderBy('created_at', 'desc')->get();
        }
        return view('livewire.externo.solicitud-planta', [
            'solicitudes' => $solicitudes
        ]);
    }

    public function recibido($id)
    {
        $solicitud = ModelsSolicitudPlanta::find($id);
        $solicitud->estado = "Recibido";
        $solicitud->save();
    }
    public function cancelar($id)
    {
        $solicitud = ModelsSolicitudPlanta::find($id);
        $solicitud->estado = "Cancelado";
        $solicitud->save();
    }

    public function eliminar($id)
    {
        $solicitud = ModelsSolicitudPlanta::findOrFail($id);

        // Eliminar las relaciones en el orden correcto
        $solicitud->detalles()->each(function ($detalle) {
            $detalle->ActividadAgua()->delete();
            $detalle->microbiologiaExterno()->delete();
            $detalle->delete();
        });

        // Eliminar la solicitud después de eliminar los detalles relacionados
        $solicitud->delete();
    }
    public function eliminar_detalle($id)
    {
        $detalle = DetalleSolicitudPlanta::findOrFail($id);

        // Eliminar las relaciones asociadas
        $detalle->ActividadAgua()->delete();
        $detalle->microbiologiaExterno()->delete();

        // Eliminar el detalle después de las relaciones
        $detalle->delete();
    }
    public function confirmar($id)
    {
        $detalle = DetalleSolicitudPlanta::find($id);
        $detalle->estado = "Por Analizar";
        $detalle->save();

        if ($detalle->tipo_analisis == "Fisicoquimico") {
            ActividadAgua::create([
                'estado' => "Pendiente",
                'detalle_solicitud_planta_id' => $id,
            ]);
        }
        if ($detalle->tipo_analisis == "Microbiologico") {
            MicrobiologiaExterno::create([
                'estado' => "Pendiente",
                'detalle_solicitud_planta_id' => $id,
            ]);
        }
        $this->openCollapse[$id] = true;
    }

    public function observado($id)
    {
        $detalle = DetalleSolicitudPlanta::find($id);
        $detalle->estado = "Observado";
        $detalle->save();
    }
    public function pdf_solicitud($id)
    {
        $solicitud = ModelsSolicitudPlanta::find($id);
        $detalles = DetalleSolicitudPlanta::where('solicitud_planta_id', $solicitud->id)->get();

        $fileName = 'solicitud_' . $solicitud->codigo . '.pdf';

        return response()->streamDownload(
            function () use ($solicitud, $detalles) {
                $pdf = App::make('dompdf.wrapper');
                $pdf = Pdf::loadView('pdf.externo.solicitud', compact('solicitud', 'detalles'));
                $pdf->setPaper('letter', 'portrait');
                echo $pdf->stream();
            },
            $fileName
        );
    }

    public function toggleCollapse($solicitudId)
    {
        if (isset($this->openCollapse[$solicitudId])) {
            $this->openCollapse[$solicitudId] = !$this->openCollapse[$solicitudId];
        } else {
            $this->openCollapse[$solicitudId] = true;
        }
    }


    /*edicion de dato detalle */
    // En tu componente Livewire
    public $editMode = false;
    public $editId = null;
    public $editData = [
        'subcodigo' => '',
        'lote' => '',
        'fecha_elaboracion' => '',
        'fecha_vencimiento' => '',
        'fecha_muestreo' => '',
        'tipo_analisis' => '',
        'estado' => '',
    ];

    // Método para habilitar el modo de edición
    public function edit($id)
    {
        $detalle = DetalleSolicitudPlanta::find($id);
        $this->editId = $id;
        $this->editData = [
            'subcodigo' => $detalle->subcodigo,
            'lote' => $detalle->lote,
            'fecha_elaboracion' => $detalle->fecha_elaboracion,
            'fecha_vencimiento' => $detalle->fecha_vencimiento,
            'fecha_muestreo' => $detalle->fecha_muestreo,
            'tipo_analisis' => $detalle->tipo_analisis,
            'estado' => $detalle->estado,
        ];
        $this->editMode = true;
    }

    // Método para guardar la edición
    public function save()
    {
        $this->validate([
            'editData.subcodigo' => 'required|string',
            'editData.lote' => 'required|string',
            'editData.fecha_elaboracion' => 'required|date',
            'editData.fecha_vencimiento' => 'required|date',
            'editData.fecha_muestreo' => 'required|date',
            'editData.tipo_analisis' => 'required|string',
            'editData.estado' => 'required|string',
        ]);

        $detalle = DetalleSolicitudPlanta::find($this->editId);
        if ($detalle) {
            $detalle->update($this->editData);
        }

        $this->resetEdit();
    }

    // Método para cancelar la edición
    public function resetEdit()
    {
        $this->editMode = false;
        $this->editId = null;
        $this->editData = [];
    }
}
