<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;

 class MuestrasExport implements FromCollection, WithHeadings, WithCustomCsvSettings
 {



    protected $orp;

public function __construct(Collection $orp)
{
    $this->orp = $orp;
}

public function collection(): Collection
{
    return $this->orp->flatMap(function ($orp) {
        $estadoDetalles = $orp->estadoDetalle;
        return collect($estadoDetalles)->map(function ($detalle) use ($orp) {
            return [
                'tiempo_elaboracion '=> $orp->tiempo_elaboracion,
                'Producto' => $orp->producto->nombre,
                'Destino'=> $orp->producto->destinoProducto->nombre,
                'Orp' => $orp->codigo,
                'Vencimiento' => $orp->fecha_vencimiento1,

                'preparacion' => $orp->lote,



            ];
        });
    })->unique(function ($item) {
        // Compara las filas basándote en Producto, Orp y Vencimiento
        return $item['Producto'] . $item['Orp'] . $item['Vencimiento'];
    });
}

public function headings(): array
{
    return [
        'Fecha','Producto','Destino', 'Orp', 'Vencimiento', 'lotes',
    ];
}

public function getCsvSettings(): array
{
    return [
        'delimiter' => ';', // Cambia a ',' si prefieres el delimitador estándar
    ];
}

 }

