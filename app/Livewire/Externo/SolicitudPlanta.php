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
        if (auth()->user()->rol == 'Ext') {
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
}
