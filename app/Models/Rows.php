<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rows extends Model
{
    protected $fillable = ['title'];
    use HasFactory;
    function products(){
        return $this->belongsToMany(Products::class,'cards_rows','row_id','product_id');
    }
}
