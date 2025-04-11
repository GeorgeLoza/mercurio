<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;

class SeguimientoExport implements FromCollection, WithHeadings, WithCustomCsvSettings
{
    protected $seguimientos;

    public function __construct($seguimientos)
    {
        $this->seguimientos = $seguimientos;
    }

    public function collection()
    {
        return collect($this->seguimientos)->map(function ($item) {
            return [
                'ID' => $item->id,
                'Fecha de Siembra' => $item->fechaSiembra,
                'Numero' => $item->numero,
                'RT' => $item->rt,
                'Moho' => $item->moho,
                // 'PH' => $item->ph,
                // 'Temperatura' => $item->temperatura,
                'Origen' => optional($item->origen)->alias,
                'Lote' => $item->lote,
                'Observaciones Micro' => $item->observaciones_micro,
                'Observaciones FQ' => $item->observaciones_fq,
                'Usuario Siembra' => optional($item->user1)->nombre,
                'Usuario Rt' => optional($item->user2)->nombre,
                'Usuario Moho' => optional($item->user3)->nombre,
                // 'Fecha Registro' => $item->created_at->format('Y-m-d H:i:s'),
            ];
        });
    }

    public function headings(): array
    {
        return [
            'ID',
            'Fecha de Siembra',
            'Numero',
            'RT',
            'Moho',
            // 'PH',
            // 'Temperatura',
            'Origen',
            'Lote',
            'Observaciones Micro',
            'Observaciones FQ',
            'Usuario Siembra',
            'Usuario Rt',
            'Usuario Moho',
            // 'Fecha Registro',
        ];
    }
    public function getCsvSettings(): array
     {
        return [
             'delimiter' => ';', // Cambia a ',' si prefieres el delimitador estándar
         ];
     }
}
