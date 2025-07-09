<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DispositivosMedicionController extends Controller
{
    //
    public function index(){

        return view('dispositivosMedicion.index');
    }
}
