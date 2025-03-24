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
        'rol_id', //
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
    public function estadoDetalle()
    {
        return $this->hasMany(EstadoDetalle::class);
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



    public function informacionUsuario()
    {
        return $this->hasOne(InformacionUsuario::class);
    }
    public function solicitudPlanta()
    {
        return $this->hasMany(SolicitudPlanta::class);
    }
    public function detalleSolicitudPlanta()
    {
        return $this->hasMany(DetalleSolicitudPlanta::class);
    }
    public function actividadAgua()
    {
        return $this->belongsto(ActividadAgua::class);
    }
    public function aguaFisico()
    {
        return $this->belongsto(AguaFisico::class);
    }
    public function microbiologiaExterno()
    {
        return $this->belongsto(MicrobiologiaExterno::class);
    }
    public function paseTurno()
    {
        return $this->hasMany(PaseTurno::class);
    }

    public function autorizantes(){
        return $this->hasMany(Mov::class , 'autorizante');
    }
    public function entregantes(){
        return $this->hasMany(Mov::class , 'entregante');
    }

    public function usuarioTrams(){
        return $this->hasMany(CalidadLeche::class , 'usuarioTram');
    }
    public function usuarioSiembras(){
        return $this->hasMany(CalidadLeche::class);
    }
    public function usuarioLecturas(){
        return $this->hasMany(CalidadLeche::class , 'usuarioLectura');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'rol_id');
    }

    public function seguimiento()
    {
        return $this->belongsto(Seguimiento::class);
    }


    /**
     * Verifica si el usuario tiene un rol específico.
     */


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
