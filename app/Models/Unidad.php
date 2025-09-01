<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'abreviatura',
    ];
    public function producto()
    {
        return $this->hasMany(Producto::class);
    }

    public function materiaPrima()
    {
        return $this->hasMany(ItemMateriaPrima::class);
    }
}
