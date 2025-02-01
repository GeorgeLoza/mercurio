<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function rolModuloPermiso()
    {
        return $this->hasMany(RolModuloPermiso::class);
    }

}
