<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class PruebaUsuario extends Component
{

    public $users;

    public function mount()
    {
        $this->users = User::all();  // Carga todos los usuarios
    }

    public function render()
    {
        return view('livewire.prueba-usuario');
    }
}
