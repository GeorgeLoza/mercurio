<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParametroLecheController extends Controller
{
    public function indexLeche(){

        return view('parametro.productoLinea.indexLeche');
    }
}
