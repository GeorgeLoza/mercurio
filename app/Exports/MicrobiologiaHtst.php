<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;

class MicrobiologiaHtst implements FromCollection, WithHeadings, WithCustomCsvSettings
{
    /**
     * Retorna los datos de la tabla calidad_leche con usuario relacionado.
     */
    protected $datos;


    public function __construct(Collection $datos)
    {
        $this->datos = $datos;
    }

    public function collection(): Collection
    {
        return $this->datos->map(function ($datos) {
            return [

                'Codigo' => $datos->codigo,
                'Fecha Solicitud' => $datos->tiempo,
                'Fecha Produccion' => $datos->orp->tiempo_elaboracion,
                'Fecha Siembra' => $datos->fechaSiembra,
                'Fecha Vencimiento' => $datos->orp->fecha_vencimiento1,
                'Categoria' => $datos->orp->producto->categoriaProducto->nombre,
                'ORP' => $datos->orp->codigo,
                'Cabezal' => optional($datos->origen)->alias,
                'Hora Sachet' => $datos->hora_sachet,
                'PT' => $datos->orp->producto->codigo,
                'Producto' => $datos->orp->producto->nombre,
                'Preparacion' => $datos->preparacion,
                'Aerobio mesofilo' => $datos->rt === 0 ? '0' : $datos->rt,
                'Coliformes totales' => $datos->col === 0 ? '0' : $datos->col,
                'Mohos' => $datos->moho === 0 ? '0' : $datos->moho,

                'Usuario Solicitante' => optional($datos->usuarioSolicitud)->nombre && optional($datos->usuarioSolicitud)->apellido
                    ? optional($datos->usuarioSolicitud)->nombre . ' ' . optional($datos->usuarioSolicitud)->apellido
                    : null,

                'Usuario Siembra' => optional($datos->usuarioSiembra)->nombre && optional($datos->usuarioSiembra)->apellido
                    ? optional($datos->usuarioSiembra)->nombre . ' ' . optional($datos->usuarioSiembra)->apellido
                    : null,

                'Usuario 2 dias' => optional($datos->usuarioDia2)->nombre && optional($datos->usuarioDia2)->apellido
                    ? optional($datos->usuarioDia2)->nombre . ' ' . optional($datos->usuarioDia2)->apellido
                    : null,

                'Usuario 5 dias' => optional($datos->usuarioDia5)->nombre && optional($datos->usuarioDia5)->apellido
                    ? optional($datos->usuarioDia5)->nombre . ' ' . optional($datos->usuarioDia5)->apellido
                    : null,

                'Observaciones' => $datos->observaciones,

            ];
        });
    }
    public function headings(): array
    {
        return [
            'Codigo',
            'Fecha Solicitud',
            'Fecha Produccion',
            'Fecha Siembra',
            'Fecha Vencimiento',
            'Categoria',
            'ORP',
            'Cabezal',
            'Hora Sachet',
            'PT',
            'Producto',
            'Preparacion',
            'Aerobio mesofilo',
            'Coliformes totales',
            'Moho',
            'Usuario Solicitante',
            'Usuario Siembra',
            'Usuario 2 dias',
            'Usuario 5 dias',
            'Observaciones',

        ];
    }

    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ';', // Cambia a ',' si prefieres el delimitador estándar
        ];
    }
}
