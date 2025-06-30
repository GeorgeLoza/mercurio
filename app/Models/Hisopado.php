<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hisopado extends Model
{
    use HasFactory;
    protected $fillable = [
        'fechaMuestra',
        'fechaResultado',
        'resultado',
        'muestrero',
        'personal_id',
        'usuarioSiembra',
        'fechaSiembra',
        'col',
        'usuarioLectura',
        'fechaLectura',
        'observacionSiembra',
        'observacionLectura',
        'usuarioObservacionesSiembra',
        'usuarioObservacionesLectura',
    ];


    public function personal()
    {
        return $this->belongsTo(Personal::class);
    }

   public function usuarioMuestrero()
{
    return $this->belongsTo(User::class, 'muestrero');
}
   public function Lectura()
{
    return $this->belongsTo(User::class, 'usuarioLectura');
}
   public function Siembra()
{
    return $this->belongsTo(User::class, 'usuarioSiembra');
}
  public function observacionLectura()
{
    return $this->belongsTo(User::class, 'usuarioObservacionesLectura');
}
   public function observacionSiembra()
{
    return $this->belongsTo(User::class, 'usuarioObservacionesSiembra');
}

}
