<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrpController extends Controller
{
    public function index(){
        return view('orp.index');
    }
}
