<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SolicitudAnalisisLineaController extends Controller
{
    public function index(){
        return view('solicitudAnalisisLinea.index');
    }
}
