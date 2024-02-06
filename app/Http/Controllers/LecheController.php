<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LecheController extends Controller
{
    public function recepcion()
    {
        return view('leche.recepcion.index');
    }
    public function analisis()
    {
        return view('leche.analisis.index');
    }
}
