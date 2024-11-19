<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;

 class DatosExport implements FromCollection, WithHeadings, WithCustomCsvSettings
 {
     protected $analisis;

     public function __construct(Collection $analisis)
     {
         $this->analisis = $analisis;
     }

     public function collection(): Collection
     {
         return $this->analisis->flatMap(function ($analisis) {
             $estadoDetalles = $analisis->solicitudAnalisisLinea->estadoPlanta->estadoDetalle;
             return collect($estadoDetalles)->map(function ($detalle) use ($analisis) {
                 return [
                     'fecha' => $detalle->orp->tiempo_elaboracion,
                     'hora S' => $analisis->solicitudAnalisisLinea->tiempo,
                     'hora R' => $analisis->tiempo,
                     'ORP' => $detalle->orp->codigo,
                     'CAT' => $detalle->orp->producto->categoriaProducto->grupo,
                     'PT' => $detalle->orp->producto->codigo,
                     'Producto' => $detalle->orp->producto->nombre,
                     'preparacion' => $detalle->preparacion,
                     'origen' => $analisis->solicitudAnalisisLinea->estadoPlanta->origen->alias,
                     'etapa' => $analisis->solicitudAnalisisLinea->estadoPlanta->etapa,
                     't' => $analisis->temperatura,
                     'ph' => $analisis->ph,
                     'ac' => $analisis->acidez,
                     'brix' => $analisis->brix,
                     'vis' => $analisis->viscosidad,
                     'dens' => $analisis->densidad,
                     'c' => $analisis->color,
                     'o' => $analisis->olor,
                     's' => $analisis->sabor,
                 ];
             });
         });
     }

     public function headings(): array
     {
         return [
             'fecha', 'hora S', 'hora R', 'ORP', 'CAT', 'PT', 'Producto', 
             'preparacion', 'origen', 'etapa', 't', 'ph', 'ac', 'brix', 
             'vis', 'dens', 'c', 'o', 's'
         ];
     }

     public function getCsvSettings(): array
     {
        return [
             'delimiter' => ';', // Cambia a ',' si prefieres el delimitador estándar
         ];
     }
 }



// class DatosExport implements FromCollection, WithHeadings
// {
//     protected $analisis;

//     public function __construct(Collection $analisis)
//     {
//         $this->analisis = $analisis;
//     }

//     public function collection(): Collection


//     {
//         return $this->analisis->take(1000)->flatMap(function ($analisis) {


//             $estadoDetalles = $analisis->solicitudAnalisisLinea->estadoPlanta->estadoDetalle;
//             return collect($estadoDetalles)->map(function ($detalle) use ($analisis) {
//                 return [

//                 'fecha' => $detalle->orp->tiempo_elaboracion,
//                 'hora S' => $analisis->solicitudAnalisisLinea->tiempo,
//                 'hora R' => $analisis->tiempo,
//                 'ORP' => $detalle->orp->codigo,
//                 'CAT' => $detalle->orp->producto->categoriaProducto->grupo,
//                 'PT' => $detalle->orp->producto->codigo,
//                  'Producto' => $detalle->orp->producto->nombre,
//                 'preparacion' => $detalle->preparacion,
//                 'origen' => $analisis->solicitudAnalisisLinea->estadoPlanta->origen->alias,

//                     'etapa' => $analisis->solicitudAnalisisLinea->estadoPlanta->etapa,

//                 't' => $analisis->temperatura,
//                 'ph' => $analisis->ph,
//                 'ac' => $analisis->acidez,
//                 'brix' => $analisis->brix,
//                 'vis' => $analisis->viscosidad,
//                 'dens' => $analisis->densidad,
//                 'c' => $analisis->color,
//                 'o' => $analisis->olor,
//                 's' => $analisis->sabor,



//                 // Agrega más columnas aquí según tu necesidad
//             ];
//         });
//         });
//     }

//     /**
//      * Define los encabezados de las columnas.
//      */
//     public function headings(): array
//     {
//         return [
//             'fecha',
//             'hora S' ,
//             'hora R',
//             'ORP',
//             'CAT',
//             'PT',
//             'Producto',
//             'preparacion',
//             'origen' ,
//                 'etapa' ,
//                 't' ,
//                 'ph' ,
//                 'ac' ,
//                 'brix' ,
//                 'vis' ,
//                 'dens' ,
//                 'c' ,
//                 'o' ,
//                 's' ,
//             // Agrega los nombres de las columnas aquí
//         ];
//     } 

// }