<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContadorController extends Controller
{
    public function index(){
        return view('contador.productoTerminado.index');
    }
}
