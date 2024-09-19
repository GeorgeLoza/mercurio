<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contador extends Model
{
    use HasFactory;
    protected $fillable = [
        'tiempo',
        'cantidad',
        'observaciones',
        'tipo',
        'almacen_producto_terminado_id',
        'orp_id',
        'user_id',
    ];

    public function orp()
    {
        return $this->belongsto(Orp::class);
    }
    public function user()
    {
        return $this->belongsto(User::class);
    }
    public function almacenProductoTerminado()
{
    return $this->belongsTo(AlmacenProductoTerminado::class);
}

}
