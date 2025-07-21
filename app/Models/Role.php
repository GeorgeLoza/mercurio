<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];




    public function user()
    {
        return $this->hasMany(User::class);
    }


    public function rolModuloPermisos()
    {
        return $this->hasMany(RolModuloPermiso::class, 'rol_id');
    }

    public function calendarioActividades()
    {
        return $this->belongsToMany(calendarioActividades::class, 'calendario_actividad_rols', 'role_id', 'calendario_actividad_id');
    }
}
