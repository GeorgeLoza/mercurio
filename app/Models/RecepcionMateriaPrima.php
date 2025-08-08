<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecepcionMateriaPrima extends Model
{
    use HasFactory;
    protected $fillable = [
        'tiempo',
        'ubicacion',
        'user_id',
        'item_materia_prima_id',
        'cantidad',
        'unidades',
        'proveedor_materia_prima_id',
        'marca',
        'limpieza_transporte',
        'sin_elementos',
        'cerrado',
        'lote',
        'fecha_elaboracion',
        'fecha_vencimiento',
        'nit',
        'rs',
        'certificado',
        'observacion',
        'correccion',
        'almacenero',
        'codigo_certificado',
        'almacenero_materia_prima_id',
    ];

    public function itemMateriaPrima()
    {
        return $this->belongsTo(ItemMateriaPrima::class);
    }

    public function proveedorMateriaPrima()
    {
        return $this->belongsTo(ProveedorMateriaPrima::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
