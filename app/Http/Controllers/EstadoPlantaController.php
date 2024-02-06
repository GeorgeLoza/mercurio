<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EstadoPlantaController extends Controller
{
    public function index()
    {
        return view('estadoPlanta.index');
    }
}
