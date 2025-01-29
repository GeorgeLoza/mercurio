<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;

 class MuestrasExport implements FromCollection, WithHeadings, WithCustomCsvSettings
 {



    protected $estadoDetalles;

public function __construct(Collection $estadoDetalles)
{

    $this->estadoDetalles = $estadoDetalles;
}

public function collection(): Collection
{
    // Recorremos cada estadoDetalle y devolvemos una colección con los datos que necesitamos
    return $this->estadoDetalles->map(function ($estadoDetalle) {
        // Aquí puedes acceder a las propiedades de cada $estadoDetalle
        return [
            'tiempo_elaboracion' => $estadoDetalle->orp->tiempo_elaboracion,
            'Producto' => $estadoDetalle->orp->producto->nombre, // Accedes a 'producto' relacionado con 'orp'
            'Destino' => $estadoDetalle->orp->producto->destinoProducto->nombre,
            'Orp' => $estadoDetalle->orp->codigo,
            'Vencimiento' => $estadoDetalle->orp->fecha_vencimiento1,
            'preparacion' => "'" . $estadoDetalle->preparacion,
        ];
    });
}

public function headings(): array
{
    return [
        'Fecha','Producto','Destino', 'Orp', 'Vencimiento', 'preparaciones'
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

//                 'fecha' => $detalle->estadoDetalles->tiempo_elaboracion,
//                 'hora S' => $analisis->solicitudAnalisisLinea->tiempo,
//                 'hora R' => $analisis->tiempo,
//                 'ORP' => $detalle->estadoDetalles->codigo,
//                 'CAT' => $detalle->estadoDetalles->producto->categoriaProducto->grupo,
//                 'PT' => $detalle->estadoDetalles->producto->codigo,
//                  'Producto' => $detalle->estadoDetalles->producto->nombre,
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
