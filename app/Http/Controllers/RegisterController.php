<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\Planta;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\TryCatch;

class RegisterController extends Controller
{
    //
    public function index()
    {
        $plantas = Planta::all();
        $divisiones = Division::all();
        return view('auth.register', compact(['plantas', 'divisiones']));
    }
    public function store(Request $request)
    {
        
        //validation
        $this->validate($request, [
            'codigo' => 'required|unique:users',
            'nombre' => 'required',
            'apellido' => 'required',
            'telefono' => 'required',
            'correo' => 'email|required',
            'planta_id' => 'required',
            'division_id' => 'required',
            'rol' => 'required',
            'password' => 'required|confirmed'
        ]);

        try {
            //create a user
        User::create([
            'codigo' => $request->codigo,
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'telefono' => $request->telefono,
            'correo' => $request->correo,
            'rol' => $request->rol,
            'planta_id' => $request->planta_id,
            'division_id' => $request->division_id,
            'password' => Hash::make($request->password),
        ]);
        
        } catch (\Throwable $th) {
            dd($th);
        }
        auth()->attempt($request->only('login','password'));
        //Redireccionar
        return redirect('/');
        
    }
}
 