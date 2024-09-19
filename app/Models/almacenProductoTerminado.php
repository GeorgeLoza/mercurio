<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlmacenProductoTerminado extends Model
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
    
}
