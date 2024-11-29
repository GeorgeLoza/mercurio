<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;
    protected $fillable = [
        'color',
        'orp_id',
    ];

    public function orp()
    {
        return $this->belongsTo(Orp::class);
        
    }



}
