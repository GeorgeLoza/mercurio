<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planta extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'direccion',
        'abreviatura',
    ];
    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function productoPlanta()
    {
        return $this->hasMany(ProductosPlantas::class);
    }
    public function productosPlantas()
    {
        return $this->belongsTo(ProductosPlantas::class);
    }
}
