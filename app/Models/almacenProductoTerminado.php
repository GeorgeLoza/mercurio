<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class almacenProductoTerminado extends Model
{
    use HasFactory;
    protected $fillable = [
        'codigo',
        'nombre',
        'alias',
    ];
    public function contador()
    {
        return $this->hasMany(Contador::class);
    }
    public function contadores()
    {
        return $this->hasMany(Contador::class, 'almacen_producto_terminado_id');
    }
}
