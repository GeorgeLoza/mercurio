<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DatosExport implements FromCollection, WithHeadings
{
    protected $analisis;

    public function __construct(Collection $analisis)
    {
        $this->analisis = $analisis;
    }

    public function collection(): Collection
    {
        return $this->analisis->map(function ($analisis) {
            return [
                'ORP' => $analisis->id,
                'hora S' => $analisis->solicitudAnalisisLinea->tiempo,
                'hora R' => $analisis->tiempo,
                'etapa' => $analisis->id,
                'origen' => $analisis->id,
                't' => $analisis->temperatura,
                'ph' => $analisis->ph,
                'ac' => $analisis->acidez,
                'brix' => $analisis->brix,
                'vis' => $analisis->viscosidad,
                'dens' => $analisis->densidad,
                'c' => $analisis->color,
                'o' => $analisis->olor,
                's' => $analisis->sabor,
                
                
                // Agrega más columnas aquí según tu necesidad
            ];
        });
    }

    /**
     * Define los encabezados de las columnas.
     */
    public function headings(): array
    {
        return [
            'ORP',
            // Agrega los nombres de las columnas aquí
        ];
    }
}
