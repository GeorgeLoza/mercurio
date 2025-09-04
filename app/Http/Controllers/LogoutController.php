<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function store()
    {
        $userId = auth()->id();

        // Remover el usuario de la lista de usuarios disponibles en la sesión
        $availableUserIds = session('available_user_ids', []);
        $updatedUserIds = array_diff($availableUserIds, [$userId]);
        session(['available_user_ids' => $updatedUserIds]);
        session()->forget('selected_user_id');

        auth()->logout();
        return redirect()->route('login');
    }
}
