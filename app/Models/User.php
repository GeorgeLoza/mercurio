<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'codigo',
        'nombre',
        'apellido',
        'telefono',
        'correo',
        'rol',
        'planta_id',
        'division_id',
        'password',
    ];
    public function planta()
    {
        return $this->belongsTo(Planta::class);
    }
    public function division()
    {
        return $this->belongsTo(Division::class);
    }
    public function estadoPlanta()
    {
        return $this->hasMany(EstadoPlanta::class);
    }
    public function analisisLinea()
    {
        return $this->hasMany(AnalisisLinea::class);
    }
    public function contador()
    {
        return $this->hasMany(Contador::class);
    }
    public function recepcion_leche()
    {
        return $this->hasMany(RecepcionLeche::class);
    }
    public function hasRole($role)
    {
        return $this->rol === $role;
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
