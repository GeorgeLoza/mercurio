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
            'Contenido graso' => $orp->contenido_graso,
            'Tempertatura Congelacion' => $orp->temperatura_congelacion,
            'porcentaje de agua' => $orp->porcentaje_agua,
            'Observaciones  ' => $orp->observaciones,
            'RAM  ' => $orp->recuento,

            'Inicio' => $orp->tram_inicio,
            'Fin' => $orp->tram_fin,
            'Lapso' => $orp->tram_lapso,

            'solicitante' =>  optional($orp->recepcion_leche->user)->codigo,
            'Usuario FQ' =>  optional($orp->user)->codigo,
            'Usuario Siembra' =>  optional($orp->uSiembra)->codigo,
            'Usuario Lectura' =>  optional($orp->uLectura)->codigo,
            'Usuario TRAM' =>  optional($orp->uTram)->codigo,





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
            'Contenido Graso' ,
            'Tempertatura Congelacion' ,
            'porcentaje de agua' ,
            'Observaciones  ' ,
            'RAM  ' ,

            'Inicio' ,
            'Fin' ,
            'Lapso' ,
            'Solicitante  ' ,
            'Analista FQ  ' ,
            'Analista Siembra  ' ,
            'Usuario lectura  ' ,
            'Usuario TRAM  ' ,
         ];
     }

}
