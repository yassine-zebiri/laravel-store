<?php

namespace App\Http\Controllers;

use App\Models\CategoriesProduct;
use App\Models\Products;
use App\Models\Rows;
use App\Models\Sliders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use LDAP\Result;

class AdminController extends Controller
{
    //
    function dashborad(){
        return view('admin.dashborad');
    }


    //start product /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-
    function add_product(){
        return view('admin.add-product',[
            'categories'=>CategoriesProduct::get()
        ]);
    }
    public function create_product(Request $request){
        $formFielde=$request->validate([
            "name"=>"required",
            "categorie_id"=>"required",
            "market"=>"required",
            "price"=>"required",
            "description"=>"required"
        ]); 
        if($request->hasFile('pic')){
            $formFielde['pic']=$request->file('pic')->store('pics','public');
        }
        Products::create($formFielde); 
        return back()->with('message','gdg g ggg');
    }
    function show_products(){
        return view('admin.show-products',[
            "products"=>Products::with('categorie')->get(),
            "categorie"=>CategoriesProduct::class
        ]) ;
    }
    function edit_product(Products $product){
        return view('admin.edit-product',[
            'product'=>$product,
            'categories'=>CategoriesProduct::get()
        ]);
    }
    function delete_product(Products $product){
        $product->delete();
        return back()->with('message',' ');
    }
    function update_product(Request $request,Products $product){
        $formFielde=$request->validate([
            "name"=>"required",
            "categorie_id"=>"required",
            "market"=>"required",
            "price"=>"required",
            "description"=>"required"
        ]); 
        if($request->hasFile('pic')){
            if(Storage::exists('public/'.$product->pic)){
                
                Storage::delete('public/'.$product->pic);
            } 
            $formFielde['pic']=$request->file('pic')->store('pics','public');
            
        }
        $product->update($formFielde); 
        return back()->with('message','تم تحديث المنتج بالنجاح');
    }
    //end product /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


    //start categorie /////////////////////////////////////////////////////////////////////////////////////
    function show_categories(){
        return view('admin.tools-categories',[
            'categories'=>CategoriesProduct::all()
        ]);
    }
    function create_categorie(Request $request){
        $formFielde=$request->validate([
            'name'=>'required'
        ]);
        if($request->hasFile('pic')){
            $formFielde['path_pic']=$request->file('pic')->store('pics','public');
        }
        CategoriesProduct::create($formFielde);
        return back()->with('message','تم اضافة فئة جديد بالنجاح');
    }

    function delete_categorie(CategoriesProduct $categorie){
        if(Storage::exists('public/'.$categorie->path_pic)){         
            Storage::delete('public/'.$categorie->path_pic);
        }
        $categorie->delete();
        return back()->with('message','تم حذف فئة بالنجاح');
    }

    function edit_categorie(CategoriesProduct $categorie){
        return view('admin.edit-categorie',[
            'categorie'=>$categorie
        ]);
    }
    function update_categorie(Request $request,CategoriesProduct $categorie){
        $formFielde=$request->validate([
            'name'=>'required'
        ]);
        if($request->hasFile('pic')){
            if(Storage::exists('public/'.$categorie->path_pic)){         
                Storage::delete('public/'.$categorie->path_pic);
            } 
            $formFielde['path_pic']=$request->file('pic')->store('pics','public'); 
        }else{
            $formFielde['path_pic']=$categorie->path_pic;
        }
        $categorie->update($formFielde);
        return back()->with('message','تمم تحديث بالنجاح');
    }
    //end categorie /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////





    //start  slider //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    function show_sliders(){
        return view('admin.slider.tools-sliders',[
            'sliders'=>Sliders::all(),
        ]);
    }
    function create_slider(Request $request){
        $slider=new Sliders;
        if($request->hasFile('pic')){
            $slider->pic_slider=$request->file('pic')->store('pics','public');
        }
        $slider->save();
        return back()->with('message','تم اضافة شريحة بالنجاح');
    }

    function delete_slider(Sliders $slider){
        if(Storage::exists('public/'.$slider->pic_slider)){         
            Storage::delete('public/'.$slider->pic_slider);
        }
        $slider->delete();
        return back()->with('message','تم حذف شريحة بالنجاح');
    }

    function update_slider(Request $request,Sliders $slider){
       // $slider=new Sliders;
        if($request->hasFile('pic')){
            if(Storage::exists('public/'.$slider->pic_slider)){         
                Storage::delete('public/'.$slider->pic_slider);
            }
            $slider->pic_slider=$request->file('pic')->store('pics','public');
        }
        $slider->update();
        return back()->with('message','تم تحديث شريحة بالنجاح');
    }

    function edit_slider(Sliders $slider,Request $request){
        return view('admin.slider.edit-slider',[
            'slider'=>$slider,
            'products'=>Sliders::with('products')
            ->find($slider->id)
            ->products,
        ]);
    }
    function serach_slider(Request $request){
        $result=[];
        if($request['keyword'] ?? false){
            $result=Products::where('id','=',$request['keyword'])
            ->orWhere('name','like','%'.$request['keyword'].'%')
            ->take(10)
            ->get();
        }; 
        return view('admin.slider.serach',[
            'result'=>$result
        ]); 
    }
    function add_card_to_slider($sliderId,$productId){
        $slider=Sliders::find($sliderId);
        $slider->products()->attach($productId);
        return back()->with('message','تم اضافة بالنجاح');
    }
    function remove_card_in_slider($sliderId,$productId){
        $slider=Sliders::find($sliderId);
        $slider->products()->detach($productId);
        return back()->with('message','تم الحذف بالنجاح');
    }
    //end slider  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////





    //start row  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    function show_rows(){
        return view('admin.rows.tools-rows',[
            'rows'=>Rows::all()
        ]);
    }
    function create_row(Request $request){
        $formFielde=$request->validate([
            'title'=>'required'
        ]);
        Rows::create($formFielde);
        return back()->with('message','تم اضافة سطرا بالنجاح');
    }
    function delete_row(Rows $row){
        $row->delete();
        return back()->with('message','تم حذف سطرا بالنجاح');
    }
    function edit_row(Rows $row){
        return view('admin.rows.edit-row',[
            'row'=>$row,
            'products'=>Rows::with('products')
            ->find($row->id)
            ->products
        ]);
    }
    function update_row(Rows $row,Request $request){
        $formFielde=$request->validate([
            'title'=>'required'
        ]);
        $row->update($formFielde);
        return back()->with('message','تم تحديث سطرا بالنجاح');
    }
    function serach_row(Request $request){
        $result=[];
        if($request['keyword'] ?? false){
            $result=Products::where('id','=',$request['keyword'])
            ->orWhere('name','like','%'.$request['keyword'].'%')
            ->take(10)
            ->get();
        }; 
        return view('admin.rows.serach',[
            'result'=>$result
        ]); 
    } 
    function add_card_to_row($rowId,$productId){
        $row=Rows::find($rowId);
        $row->products()->attach($productId);
        return back()->with('message','تم اضافة بالنجاح');
    }
    function remove_card_in_row($rowId,$productId){
        $row=Rows::find($rowId);
        $row->products()->detach($productId);
        return back()->with('message','تم الحذف بالنجاح');
    }
    //end row /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

   
}
