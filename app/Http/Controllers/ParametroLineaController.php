<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParametroLineaController extends Controller
{
    
    public function index(){
        return view('parametro.productoLinea.index');
    }
}
