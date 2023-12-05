<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function store(Request $request)
    {
        //validation

        $this->validate($request, [
            'codigo' => 'required',
            'password' => 'required'
        ]);


        if (!auth()->attempt($request->only('codigo', 'password'), $request->remember)) {
            return back()->with('mensaje', 'credenciales incorrectas');
        }
 
        return redirect('/');
    }
    
}
