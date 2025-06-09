<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaMateriaPrima extends Model
{
    use HasFactory;




    protected $fillable = ['nombre', 'descripcion'];

    public function items()
    {
        return $this->hasMany(ItemMateriaPrima::class);
    }
}
