<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProductosExport implements FromCollection
{
    protected $productos;

    public function __construct(Collection $productos)
    {
        $this->productos = $productos;
    }

    public function collection(): Collection
    {
        return $this->productos->map(function ($producto) {
            return [
                'Código' => $producto->codigo,
                'Nombre' => $producto->nombre,
                'Cantidad' => $producto->cantidad,
                'Empaque' => $producto->empaque,
                'Unidad' => optional($producto->unidad)->nombre, // Accede al nombre de la unidad de forma segura
                'Categoría' => optional($producto->categoriaProducto)->nombre, // Accede al nombre de la categoría de forma segura
                'Destino' => optional($producto->destinoProducto)->nombre, // Accede al nombre del destino de forma segura
                // Agrega más columnas según sea necesario
            ];
        });
    }
}
