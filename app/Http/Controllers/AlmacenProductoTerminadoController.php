<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlmacenProductoTerminadoController extends Controller
{
    public function index(){
        return view('almacen.productoTerminado.index');
    }
}
