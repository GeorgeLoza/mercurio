<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaseTurnoController extends Controller
{
    public function index(){
        return view('paseTurno.index');
    }
}
