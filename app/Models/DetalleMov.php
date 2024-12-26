<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleMov extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id',
        'mov_id',
        'cantidad',
        

    ];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function mov()
    {
        return $this->belongsTo(Mov::class);
    }
}
