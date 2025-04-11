<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;

class ContadorExport implements FromCollection, WithHeadings , WithCustomCsvSettings
{
    protected $contadores;

    public function __construct($contadores)
    {
        $this->contadores = $contadores;
    }

    public function collection()
    {
        return collect($this->contadores)->map(function ($item) {
            return [
                'ID' => $item->id,
                'Tiempo' => $item->tiempo,
                'Cantidad' => $item->cantidad,
                'Observaciones' => $item->observaciones,
                'Tipo' => $item->tipo,
                'ORP' => optional($item->orp)->codigo,
                'Producto' => optional($item->orp)->producto->nombre,
                'Usuario' => optional($item->user)->nombre,
                'Fecha Registro' => $item->created_at->format('Y-m-d H:i:s'),
            ];
        });
    }

    public function headings(): array
    {
        return [
            'ID',
            'Tiempo',
            'Cantidad',
            'Observaciones',
            'Tipo',
            'ORP',
            'Producto',

            'Usuario',
            'Fecha Registro',
        ];
    }

    public function getCsvSettings(): array
    {
       return [
            'delimiter' => ';', // Cambia a ',' si prefieres el delimitador estándar
        ];
    }
}
