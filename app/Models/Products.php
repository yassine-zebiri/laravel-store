<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = ['name','categorie_id','pic','market','description','price'];


    use HasFactory;

    public function scopeFilter($query,array $filters){
        
        if($filters['categories'] ?? false){
            $categories = array_keys($filters['categories']);
            $query->whereIn('categorie_id',$categories);
        }
        if ($filters['min'] ?? false) {
            $query->where('price', '>=', $filters['min']);
        }
    
        if ($filters['max'] ?? false) {
            $query->where('price', '<=', $filters['max']);
        }
    }


    public function categorie(){
        return $this->belongsTo(User::class,'categorie_id');
    }
    function rows(){
        return $this->belongsToMany(Rows::class,'cards_rows','product_id','row_id');
    }
    function sliders(){
        return $this->belongsToMany(Sliders::class,'cards_sliders','product_id','slider_id');
    }
}
