<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{   
    

    public function index(){
        
        return view('usuario.index');
    }
}
