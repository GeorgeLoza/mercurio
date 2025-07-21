<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{   
    

    public function index(){
        return view('usuario.index');
    }
    
    public function perfil(){
        return view('usuario.perfil');   
    }

    public function asignacionPermisos(){
        return view('usuario.asignacionPermisos');
    }
}