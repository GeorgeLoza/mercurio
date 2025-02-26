<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExternoController extends Controller
{
    public function informacion()
    {
        return view('externo/informacion');
    }
    public function productosPlanta()
    {
        return view('externo/productosPlanta');
    }
    public function tipoMuestra()
    {
        return view('externo/tipoMuestra');
    }
    public function solicitudPlanta()
    {
        return view('externo/solicitudPlanta');
    }
    public function detalleSolicitudPlanta()
    {
        return view('externo/detalleSolicitudPlanta');
    }
    public function verificacionEquipo()
    {
        return view('externo/verificacionEquipo');
    }
    public function actividadAgua()
    {
        return view('externo/actividadAgua');
    }
    public function microbiologia()
    {
        return view('externo/microbiologia');
    }
    public function certificado()
    {
        return view('externo/certificado');
    }
    public function certificadoMicrobiologia()
    {
        return view('externo/certificadoMicrobiologia');
    }
    public function aguaFisico()
    {
        return view('externo/aguaFisico');
    }
}
