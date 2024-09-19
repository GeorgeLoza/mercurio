<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;


class SwitchUser extends Component
{
    public $users; // Lista de usuarios disponibles
    public $selectedUserId; // ID del usuario seleccionado
    public $showLogin = false; // Flag para mostrar el formulario de login

    public function mount()
    {
        $this->loadAvailableUsers();
    }

    public function loadAvailableUsers()
    {
        // Obtener los usuarios actualmente en sesión
        $availableUserIds = session('available_user_ids', []);
        $this->users = User::whereIn('id', $availableUserIds)->get();
    }
    

    public function selectUser($userId)
    {
        // Actualizar la sesión con el usuario seleccionado
        session(['selected_user_id' => $userId]);
        
        // Actualizar el usuario autenticado
        Auth::login(User::find($userId));

        // Recargar la página
        $this->redirect('/');
    }

    public function showLoginForm()
    {
        $this->showLogin = true;
    }

    public function loginUser($email, $password)
    {
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            // Añadir el usuario a la lista de sesiones disponibles
            session()->push('available_user_ids', Auth::id());

            // Redirigir o recargar
            $this->selectUser(Auth::id());
        } else {
            session()->flash('error', 'Credenciales inválidas');
        }
    }

    public function render()
    {
        return view('livewire.switch-user');
    }
}
