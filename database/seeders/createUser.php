<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class createUser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'codigo' => '69965 ',
            'nombre' => 'Jorge Rodrigo',
            'apellido' => 'Loza Quispe ',
            'telefono' => 77540313  ,
            'correo' => 'jorgelozaquispe@gmail.com',
            'rol' => 'Admi',
            'password' => bcrypt('Jorgeloza78'),
            'planta_id' => 1, // Id de la planta, ajusta según tus necesidades
            'division_id' => 1, // Id de la división, ajusta según tus necesidades
        ]);
        
    }
}
