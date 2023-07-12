<x-layout :pageTitle="$namePage">
<x-card-content>
@php
    //print_r($data->id);
@endphp
<x-breadcrumb :data="$breadcrumb" :name="$product->name" />
<!--card product   ------>
<div class="row bg-white p-3">

    <div class="col-lg-6 col-12">
        <img class="w-100 rounded" src="{{asset('/storage/'.$product->pic)}}"  alt="" srcset="">
    </div>

    <div class="col-lg-6 col-12">
        <div class="d-flex justify-content-center align-items-start 
        flex-column h-100 p-3">
            <h1>{{$product->name}}</h1>
            <h6>{{$product->market}}</h6>
            <div class="py-3">
                <label for="">الوصف :</label>
                <p>{{$product->description}}</p>
            </div>
            <h2>السعر : {{$product->price}} د.ج</h2>
            <button class="btn btn-dark btn-lg mt-3" @click="addToCart({
                id:{{$product->id}},
                name:'{{$product->name}}',
                price:{{$product->price}},
                pic:'{{asset('/storage/'.$product->pic)}}',
                quantity:1
                })"><i class="fa-solid fa-cart-plus mx-1"></i>
                اضافة للسلة</button>
        </div>

    </div>

</div>
<!--end card product   ------>

<div class="mt-5">
    <h2>منتجات ذات صلة :</h2>
    <div class="row w-100 align-items-stretch  justify-content-start g-0 row-gap-3">
        @foreach ($categorie_products as $item)
        <x-card-product :item="$item" />

        @endforeach
        
    </div>
</div>
</x-card-content>

</x-layout>