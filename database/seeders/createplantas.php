<?php

namespace Database\Seeders;

use App\Models\Planta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class createplantas extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Planta::create([
            'nombre' => 'Lacteos ',
            'direccion' => 'Casa Matriz',
            'abreviatura' => 'PLL',
        ]);
        Planta::create([
            'nombre' => 'Soya ',
            'direccion' => 'Casa Matriz',
            'abreviatura' => 'PLS',
        ]);
    }
}
