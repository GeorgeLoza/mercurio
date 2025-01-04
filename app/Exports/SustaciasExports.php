<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;

class SustaciasExports implements FromCollection, WithHeadings
{
    /**
     * Retorna los datos de la tabla calidad_leche con usuario relacionado.
     */
    protected $orp;


public function __construct(Collection $orp)
{
    $this->orp = $orp;

}

public function collection(): Collection
{
    return $this->orp->map(function ($orp) {
        return [

            'Nombre' => $orp->item->nombre,
            'Cantidad' => $orp->cantidad,
            'Unidad' => $orp->item->unidad,
            'Estado' => $orp->mov->estado,







             // Agrega más columnas según sea necesario
        ];
    });
}
public function headings(): array
     {
         return [
            'Nombre',
            'Cantidad',
            'Unidad',
            'Estado',

         ];
     }

}
