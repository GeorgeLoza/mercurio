<?php

namespace Database\Seeders;

use App\Models\Division;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class createDivisiones extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Division::create([
            'nombre' => 'Produccion',
            'descripcion' => ' Coordina la fabricación de líquidos, asegurando que los recursos y procesos se gestionen eficientemente para cumplir con los objetivos de producción, ya sea de bebidas, productos químicos o cualquier otro líquido.',
        ]);

        Division::create([
            'nombre' => 'Calidad',
            'descripcion' => 'Asegura que los líquidos producidos cumplen con los estándares y especificaciones establecidos. Realiza pruebas y análisis para garantizar la consistencia, pureza y seguridad de los productos líquidos.',
        ]);
        
        Division::create([
            'nombre' => 'Desarrolla',
            'descripcion' => 'Se centra en la investigación, diseño y mejora de fórmulas para líquidos. Involucra la creación de nuevos productos líquidos, la optimización de recetas existentes y la adaptación a las demandas del mercado.',
        ]);

        Division::create([
            'nombre' => 'Mantenimiento',
            'descripcion' => 'Preserva y optimiza los equipos utilizados en la producción de líquidos. Incluye actividades preventivas, como la limpieza de maquinaria, así como intervenciones correctivas para garantizar un funcionamiento continuo y eficiente de los equipos.',
        ]);

        Division::create([
            'nombre' => 'Almacen',
            'descripcion' => 'Desempeña un papel crucial en la gestión y almacenamiento de materias primas, productos semielaborados y productos terminados.',
        ]);
    }
}
