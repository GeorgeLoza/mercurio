<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HisopadoController extends Controller
{
    //
    public function index(){
        return view('higiene.hisopado.index');
    }
}
