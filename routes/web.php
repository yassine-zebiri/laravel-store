<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\storeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[storeController::class,'index']);

Route::get('/show',[storeController::class,'show']);

Route::get('/show/filter',[storeController::class,'filter']);

Route::get('/cart',[storeController::class,'cart']);

Route::get('/product/{product}',[storeController::class,'product']);

Route::get('/slider/{slider}',[storeController::class,'slider_products']);





// login user

Route::get('/admin/log-in',[UserController::class,'logIn'])->name('login');

Route::post('/users/authenticate',[UserController::class,'authenticate']);

Route::post('/logout',[UserController::class,'logOut'])->middleware('auth');




// admin pages

Route::get('/admin',[AdminController::class,'dashborad'])->middleware('auth');

// page for create new product
Route::get('/admin/products/add-product',[AdminController::class,'add_product'])->middleware('auth');
// create new product
Route::post('/admin/product/add-product/create',[AdminController::class,'create_product'])->middleware('auth');

// page for show all products
Route::get('/admin/products/show-products',[AdminController::class,'show_products'])->middleware('auth');

// page for edit product
Route::get('/admin/products/edit/{product}',[AdminController::class,'edit_product'])->middleware('auth');
// update product
Route::put('/admin/products/{product}',[AdminController::class,'update_product'])->middleware('auth');

// delete product
Route::delete('/admin/products/{product}',[AdminController::class,'delete_product'])->middleware('auth');

//page show all categories
Route::get('/admin/products/categories',[AdminController::class,'show_categories'])->middleware('auth');
// create new categorie
Route::post('/admin/products/categories/create',[AdminController::class,'create_categorie'])->middleware('auth');
// page edit categorie
Route::get('/admin/products/categories/{categorie}',[AdminController::class,'edit_categorie'])->middleware('auth');
// update categorie
Route::put('/admin/products/categories/{categorie}',[AdminController::class,'update_categorie'])->middleware('auth'); 
// remove categorie
Route::delete('/admin/products/categories/{categorie}',[AdminController::class,'delete_categorie'])->middleware('auth');


// slider/////////////

// page show all sliders
Route::get('/admin/ui-store/tools-slider',[AdminController::class,'show_sliders'])->middleware('auth');
// create new slider
Route::post('/admin/ui-store/tools-slider/create',[AdminController::class,'create_slider'])->middleware('auth');
// delete slider
Route::delete('/admin/ui-store/tools-slider/slider/{slider}',[AdminController::class,'delete_slider'])->middleware('auth');
// update slider
Route::put('/admin/ui-store/tools-slider/slider/{slider}',[AdminController::class,'update_slider'])->middleware('auth');
// serach product 
Route::get('/admin/ui-store/tools-slider/edit/serach',[AdminController::class,'serach_slider'])->middleware('auth');
// add product to slider
Route::post('/admin/ui-store/tools-slider/edit/card/{sliderId}/{productId}',[AdminController::class,'add_card_to_slider'])->middleware('auth');
// remove product in slider
Route::delete('/admin/ui-store/tools-slider/edit/card/{sliderId}/{productId}',[AdminController::class,'remove_card_in_slider'])->middleware('auth');
// page edit slider
Route::get('/admin/ui-store/tools-slider/edit/{slider}',[AdminController::class,'edit_slider'])->middleware('auth');



// rows /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// page show all sliders
Route::get('/admin/ui-store/tools-rows',[AdminController::class,'show_rows'])->middleware('auth');
// create new row
Route::post('/admin/ui-store/tools-rows/create',[AdminController::class,'create_row'])->middleware('auth');
// delete row
Route::delete('/admin/ui-store/tools-rows/row/{row}',[AdminController::class,'delete_row'])->middleware('auth');
// serach product 
Route::get('/admin/ui-store/tools-row/edit/serach',[AdminController::class,'serach_row'])->middleware('auth');
// page edit slider
Route::get('/admin/ui-store/tools-row/edit/{row}',[AdminController::class,'edit_row'])->middleware('auth');
// update row
Route::put('/admin/ui-store/tools-row/row/{row}',[AdminController::class,'update_row'])->middleware('auth');
// add product to row
Route::post('/admin/ui-store/tools-row/edit/card/{rowId}/{productId}',[AdminController::class,'add_card_to_row'])->middleware('auth');
// remove product in row
Route::delete('/admin/ui-store/tools-row/edit/card/{rowId}/{productId}',[AdminController::class,'remove_card_in_row'])->middleware('auth');