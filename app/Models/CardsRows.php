<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardsRows extends Model
{
    use HasFactory;
    function Row(){
        return $this->belongsTo(Rows::class);
    }
}
