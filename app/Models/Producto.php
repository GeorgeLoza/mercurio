<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $fillable = [
        'codigo',
        'nombre',   
        'cantidad',
        'empaque',
        'unidad_id',
        'categoria_producto_id',
        'destino_producto_id',
        'norma',
    ];
    public function unidad()
    {
        return $this->belongsTo(Unidad::class);
    }
    public function categoriaProducto()
    {
        return $this->belongsTo(CategoriaProducto::class);
    }
    public function destinoProducto()
    {
        return $this->belongsTo(DestinoProducto::class);
    }
    
    public function orp()
    {
        return $this->hasMany(Orp::class);
    }
    public function parametroLinea()
    {
        return $this->hasMany(ParametroLinea::class);
    }
}
