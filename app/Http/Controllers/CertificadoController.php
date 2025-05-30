<?php

namespace App\Http\Controllers;

use App\Models\ActividadAgua;
use App\Models\AguaFisico;
use App\Models\Clasificacion;
use App\Models\DetalleSolicitud;
use App\Models\DetalleSolicitudPlanta;
use App\Models\Microbiologia;
use App\Models\MicrobiologiaExterno;
use App\Models\TipoMuestra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class CertificadoController extends Controller
{
    public function index()
    {

        return view('certificado.index');
    }
    public function certificado_micro_pdf($id)
    {



        $datosSolicitud = DetalleSolicitudPlanta::find($id);

        $normas = TipoMuestra::find($datosSolicitud->tipo_muestra_id);

        if ($datosSolicitud->tipo_analisis == 'Microbiologico') {
            $resultados = MicrobiologiaExterno::where('detalle_solicitud_planta_id', $id)->first();

        }
        $pdf = Pdf::loadView('pdf.externo.certificado', compact('datosSolicitud', 'resultados', 'normas'));
        $pdf->setPaper('letter', 'portrait');

        return $pdf->stream(($datosSolicitud->subcodigo ?? ' ').' '.($datosSolicitud->productosPlanta->nombre ?? ' ').' '.($datosSolicitud->otro ?? ' ').' '.($datosSolicitud->lote ?? ' ').'.pdf');
    }

    public function certificado_micro_pdf2($id)
    {

        $datosSolicitud = DetalleSolicitudPlanta::find($id);

        $normas = TipoMuestra::find($datosSolicitud->tipo_muestra_id);

        if ($datosSolicitud->tipo_analisis == 'Microbiologico') {
            $resultados = MicrobiologiaExterno::where('detalle_solicitud_planta_id', $id)->first();

        }
        $pdf = Pdf::loadView('pdf.externo.certificado2', compact('datosSolicitud', 'resultados', 'normas'));
        $pdf->setPaper('letter', 'portrait');
        return $pdf->stream(($datosSolicitud->subcodigo ?? ' ').' '.($datosSolicitud->productosPlanta->nombre ?? ' ').' '.($datosSolicitud->otro ?? ' ').' '.($datosSolicitud->lote ?? ' ').'.pdf');



    }

    public function certificado_fisi_pdf($id)
    {


        $datosSolicitud = DetalleSolicitudPlanta::find($id);



        $normas = TipoMuestra::find($datosSolicitud->tipo_muestra_id);

        if ($datosSolicitud->tipo_analisis == 'Fisicoquimico') {

            if($datosSolicitud->tipo_muestra_id == 1){
                $resultados = AguaFisico::where('detalle_solicitud_planta_id', $id)->first();

            }else{

                $resultados = ActividadAgua::where('detalle_solicitud_planta_id', $id)->first();
            }

        }





        $pdf = Pdf::loadView('pdf.externo.certificado_fis', compact('datosSolicitud', 'resultados', 'normas'));
        $pdf->setPaper('letter', 'portrait');

       return $pdf->stream(($datosSolicitud->subcodigo ?? ' ').' '.($datosSolicitud->productosPlanta->nombre ?? ' ').' '.($datosSolicitud->otro ?? ' ').' '.($datosSolicitud->lote ?? ' ').'.pdf');

    }
}
