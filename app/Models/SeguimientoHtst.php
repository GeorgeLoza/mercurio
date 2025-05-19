<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeguimientoHtst extends Model
{
    use HasFactory;


    protected $fillable = [

        'tiempo',
        'orp_id',
        'codigo',
        'preparacion',
        'origen_id',
        'fechaSiembra',
        'lote',
        'rt',
        'col',
        'moho',
        'usuario_siembra',
        'usuario_solicitud',
        'usuario_dia2',
        'usuario_dia5',
        'observaciones',
        'hora_sachet',
    ];

      public function origen()
    {
        return $this->belongsTo(Origen::class);
    }
    public function usuarioSolicitud()
    {
        return $this->belongsTo(User::class, 'usuario_solicitud');
    }

    public function usuarioSiembra()
    {
        return $this->belongsTo(User::class, 'usuario_siembra');
    }

    public function usuarioDia2()
    {
        return $this->belongsTo(User::class, 'usuario_dia2');
    }
    public function usuarioDia5()
    {
        return $this->belongsTo(User::class, 'usuario_dia5');
    }

    public function orp()
    {
        return $this->belongsTo(Orp::class);
    }
}
