<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;

class AnalisisLeche implements FromCollection, WithHeadings
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

            'Fecha' => $orp->tiempo,
            'Ruta' => $orp->recepcion_leche->subruta_acopio->ruta_acopio->nombre,
            'Temperatura' => $orp->temperatura,
            'Ph' => $orp->ph,
            'Acidez' => $orp->acidez,
            'Brix' => $orp->brix,
            'Densidad' => $orp->densidad,
            'Alcohol' => $orp->prueba_alcohol,
            'Grasa' => $orp->contenido_graso,
            'Inicio' => $orp->tram_inicio,
            'Fin' => $orp->tram_fin,
            'Lapso' => $orp->tram_lapso,
            'Tempertatura Congelacion' => $orp->temperatura_congelacion,
            'porcentaje de agua' => $orp->porcentaje_agua,
            'Observaciones  ' => $orp->observaciones,
            'analista' =>  optional($orp->user)->codigo,





             // Agrega más columnas según sea necesario
        ];
    });
}
public function headings(): array
     {
         return [
            'Fecha',
            'Ruta' ,
            'Temperatura' ,
            'Ph' ,
            'Acidez',
            'Brix' ,
            'Densidad' ,
            'Alcohol' ,
            'Grasa' ,
            'Inicio' ,
            'Fin' ,
            'Lapso' ,
            'Tempertatura Congelacion' ,
            'porcentaje de agua' ,
            'Observaciones  ' ,
            'usuario  ' ,
         ];
     }

}
