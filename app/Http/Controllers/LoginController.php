<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        if (auth()->user()->rol != 'Ext') {
            // Obtener el ID del usuario autenticado
            $userId = Auth::id();

            // Obtener la lista actual de IDs de usuario en la sesión
            $availableUserIds = session('available_user_ids', []);
            if (!in_array($userId, $availableUserIds)) {
                $availableUserIds[] = $userId;
                session(['available_user_ids' => $availableUserIds]);
            }
            return redirect('/');
        } else {
            return redirect()->route('solicitudPlanta.index');
        }
    }
}
