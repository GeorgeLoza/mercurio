<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolModuloPermiso extends Model
{
    use HasFactory;


    protected $table = 'rol_modulo_permiso';

    /**
     * Los atributos que se pueden asignar masivamente.
     */
    protected $fillable = [
        'rol_id',
        'modulo_id',
        'permiso_id',
    ];

    /**
     * Relación con el modelo Rol.
     */

    public function rol()
    {
        return $this->belongsTo(Role::class, 'rol_id');
    }
    /**
     * Relación con el modelo Modulo.
     */
    public function modulo()
    {
        return $this->belongsTo(Modulo::class);
    }

    /**
     * Relación con el modelo Permiso.
     */
    public function permiso()
    {
        return $this->belongsTo(Permiso::class);
    }
}
