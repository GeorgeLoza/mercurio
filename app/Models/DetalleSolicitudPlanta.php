<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleSolicitudPlanta extends Model
{
    use HasFactory;

    protected $fillable = [
        'solicitud_planta_id',
        'productos_planta_id',
        'subcodigo',
        'lote',
        'fecha_elaboracion',
        'fecha_vencimiento',
        'fecha_muestreo',
        'tipo_muestra_id',
        'tipo_analisis',
        'otro',
        'estado',
        'observaciones',
        'user_id',
    ];

    public function solicitudPlanta()
    {
        return $this->belongsTo(SolicitudPlanta::class);
    }

    public function productosPlanta()
    {
        return $this->belongsTo(ProductosPlantas::class);
    }

    public function tipoMuestra()
    {
        return $this->belongsTo(TipoMuestra::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ActividadAgua()
    {
        return $this->hasOne(ActividadAgua::class);
    }
    public function aguaFisico()
    {
        return $this->hasOne(AguaFisico::class);
    }
    public function microbiologiaExterno()
    {
        return $this->hasOne(MicrobiologiaExterno::class);
    }
}
