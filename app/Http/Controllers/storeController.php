<?php

namespace App\Http\Controllers;

use App\Models\CategoriesProduct;
use App\Models\Products;
use App\Models\Rows;
use App\Models\Sliders;

class storeController extends Controller
{
    //
    public function index(){
        return view('store.index',[
            'namePage'=>'الصفحة الرئيسية',
            'products'=>Products::all(),
            'categories'=>CategoriesProduct::get(),
            'data'=>'rrr',
            'rows'=>Rows::with('products')->get(),
            'sliders'=>Sliders::get()
        ]);
    }
    public function show(){

        //dd(request('categorie'));
        return view('store.show',[
            'namePage'=>'عرض كل منتجات',
            'products'=>Products::latest()
            ->paginate(9),
            'max_price'=>Products::get()->max('price'),
            'min_price'=>Products::get()->min('price'),
            'categories'=>CategoriesProduct::get(),
        ]);
    } 

    public function filter(){

        //dd(request('categorie'));
        return view('store.filter',[
            'namePage'=>'فلاتر',
            'products'=>Products::filter([
                'categories' => request('categories'),
                'min' => request('min-price'),
                'max' => request('max-price')
                ])->get(),
            'categories'=>CategoriesProduct::get(),
            'max_price'=>Products::get()->max('price'),
            'min_price'=>Products::get()->min('price'),
        ]);
    }

    public function product(Products $product){
        return view('store.product',[
            'namePage'=>$product->name,
            'product'=>$product,
            'categorie_products'=>CategoriesProduct::with('products')
            ->find($product->categorie_id)
            ->products
            ->whereNotIn('id', [$product->id])  
            ->take(4),
            'breadcrumb'=>CategoriesProduct::find($product->categorie_id)
            
        ]);
    } 

    public function cart (){
        return view('store.cart',['namePage'=>'عربة التسوق']);
    }
    public function slider_products(Sliders $slider){
        return view('store.slider-products',[
            'namePage'=>'عرض الشريحة',
            'slider'=>$slider,
            'products'=>Sliders::find($slider->id)
            ->products
            
        ]);
    }
}
