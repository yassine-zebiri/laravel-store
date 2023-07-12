<x-layout :pageTitle="$namePage">
    <x-card-content>
    
    <div class="row">
    
    
        <div class="col-lg-3 col-12 p-3">
            <div class="bg-white p-3">
                <h1>تصفيت النتائج</h1>
                <div>
                    
                    <form action="/show/filter" method="get">
                        @csrf
    
                        <div>
                            <p class="p-0 m-0">الفئات :</p>
                            @foreach ($categories as $item)
                                <div class=" input-group justify-content-between">
                                    <label class="form-label" for="">{{$item->name}} </label>
                                    <input class=" form-check mx-2" type="checkbox" 
                                    name="categories[{{$item->id}}]"
                                    value="{{$item->id}}"
                                    @php
                                    if(isset($_REQUEST['categories'])){
                                        foreach ($_REQUEST['categories'] as $value) {
                                            # code...
                                            if($value == $item->id){
                                                echo 'checked';
                                            }
                                        }};
                                    @endphp
                                    
                                    >
                                </div>
                            @endforeach
                        </div>
                        <hr/>
                        <div>
                            <p class="p-0 m-0">السعر:</p>
                            <div class=" input-group mt-2">
                                <label class=" form-label" for="">أعلى سعر</label>
                                <input class="form-control rounded form-control-sm w-50 mx-2" type="number" name="max-price"
                                    max="{{$max_price}}"
                                    min="{{$min_price}}"
                                @php
                                    
                                
                                if(isset($_REQUEST['max-price']) && !empty($_REQUEST['max-price'])){
                                    echo 'value='.$_REQUEST['max-price'];
                                }else{
                                    echo 'value='.$max_price;
                                }
                                @endphp
                                >
                            </div>
                            <div  class=" input-group mt-2">
                                <label class=" form-label"  for="">أدنى سعر</label>
                                
                                <input class="form-control rounded form-control-sm w-50 mx-2" type="number" name="min-price"
                                    max="{{$max_price}}"
                                    min="{{$min_price}}"
                                @php
                                    
                                
                                if(isset($_REQUEST['max-price']) && !empty($_REQUEST['max-price'])){
                                    echo 'value='.$_REQUEST['min-price'];
                                }else{
                                    echo 'value='.$min_price;
                                }
                                @endphp
                                >
                            </div>
                        </div>
                        <hr/>
                        <div class="w-100 mt-3">
                            <button class="btn btn-primary mx-2" type="submit">تطبيق</button>
                            <a href="/show/filter" class="btn btn-outline-primary mx-2" type="reset">اعادة ضبط</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    
    
        <div class="col-lg-9  col-12 pt-3">
            <div class="row">
    
                    @foreach ($products as $item) 
                    
                    <div class="col-lg-3 col-md-4  col-sm-6 col-6 p-1">
                        <div class="card">
                            <a href="/product/{{$item->id}}" class=" text-decoration-none text-black" >
                            <img class=" card-img-top" width="100%" src="{{asset('/storage/'.$item->pic)}}" alt="" srcset="">
                            <div class="card-body">
                                <p class="card-title">{{$item->name}}</p>
                                <p class="card-text">{{$item->price}} د.ج</p>
                                <button class="btn btn-dark w-100"><i class="fa-solid fa-cart-plus mx-1"></i>
                                    اضافة للسلة</button>
                            </div></a>
                        </div>
                    </div>
    
                    @endforeach
        
                
    
            </div>
        </div>
    </div>
    
    
    </x-card-content>
    
    </x-layout>