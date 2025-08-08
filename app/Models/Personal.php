<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{

    use HasFactory;
    protected $fillable = [
        'codigo',
        'nombre',
        'turno',
        'cargo',
        'area',
    ];

    public function hisopados()
    {
        return $this->hasMany(Hisopado::class);
    }

}
