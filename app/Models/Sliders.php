<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sliders extends Model
{
    use HasFactory;
    function products(){
        return $this->belongsToMany(Products::class,'cards_sliders','slider_id','product_id');
    }
}
