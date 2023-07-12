<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriesProduct extends Model
{
    protected $fillable = ['name','path_pic'];
    use HasFactory;
    public function products(){
        return $this->hasMany(Products::class,'categorie_id');
    }
}
