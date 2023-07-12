@props(['item'])
<div class="col-lg-3 col-md-4 col-sm-6 col-6 p-1">
    <div class="card h-100">
        <div  class="h-100 d-flex flex-column justify-content-between text-decoration-none text-black" >
        <a href="/product/{{$item->id}}">
            <img class=" card-img-top" width="100%" src="{{asset('/storage/'.$item->pic)}}" alt="" srcset="">
        </a>
        <div class="card-body d-flex flex-column justify-content-between">
            <a href="" class="text-decoration-none text-black pb-2">
                <p class="card-title">{{$item->name}} </p>
                <p class="card-text">{{$item->price}} د.ج</p>
            </a>
            <button class="btn btn-dark w-100" @click="addToCart({
                id:{{$item->id}},
                name:'{{$item->name}}',
                price:{{$item->price}},
                pic:'{{asset('/storage/'.$item->pic)}}',
                quantity:1
                })">
                <i class="fa-solid fa-cart-plus mx-1"></i>
                اضافة للسلة</button>
        </div>
        </div>
    </div>
</div>

