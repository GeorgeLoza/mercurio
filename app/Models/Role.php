<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'descripcion'];




    public function user()
    {
        return $this->hasMany(User::class);
    }


    public function rolModuloPermisos()
    {
        return $this->hasMany(RolModuloPermiso::class, 'rol_id');
    }


}
