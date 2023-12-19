<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrigenController extends Controller
{
    public function index(){
        return view('origen.index');
    }
}
