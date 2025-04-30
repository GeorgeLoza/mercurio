<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class movSolucion extends Model
{
    use HasFactory;


    protected $fillable = [

        'tiempo',
        'user_id',
        'tipo',
        'autorizante',
        'entregante',
        'estado',
        'item_id',
        'cantidad',
        'saldo',
        'concentracion',
        'confirmacion',
        'cantidad_mezcla',
        'porcentaje',
        'observacion',
    ];

    public function item()
    {
        return $this->belongsTo(itemSolucion::class);
    }

    public function destino()
    {
        return $this->belongsTo(DestinoSolucion::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function usuarioAutorizante(){
        return $this->belongsTo(User::class, 'autorizante');
    }

    public function usuarioEntregante(){
        return $this->belongsTo(User::class, 'entregante');
    }

}
