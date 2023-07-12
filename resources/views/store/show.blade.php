<x-layout :pageTitle="$namePage">
<x-card-content>
    <!--start filter  --------------------------------->
<div class="row">
    <div class="col-lg-3 col-12 p-3">
        <div class="bg-white p-3">
            <h1>تصفيت النتائج</h1>
            <div>
                <form action="/show/filter" method="get">
                    @csrf
<!--start filter categories------------------------------------------------------------------>
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
<!--end filter categories------------------------------------------------------------------>
                    <hr/>
<!--start filter price------------------------------------>
                    <div>
                        <p class="p-0 m-0">السعر:</p>
                        <div class=" input-group mt-2">
                            <label class=" form-label" for="">أعلى سعر</label>
                            <input class="form-control form-control-sm w-50 mx-2 rounded" type="number" name="max-price"
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
                            <input class="form-control form-control-sm w-50 mx-2 rounded" type="number" name="min-price"
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
<!--end filter price----------------------------------------------------------------------------------------->
                    <hr/>
                    <div class="w-100 mt-3">
                        <button class="btn btn-primary mx-2" type="submit">تطبيق</button>
                        <button class="btn btn-outline-primary mx-2" type="reset">اعادة ضبط</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<!--end  filter  ------------------------------------------------------------------->
<!--start list product---------------------------------------------------------->
        <div class="col-lg-9  col-12 pt-3">
            <div class="row">
                    @foreach ($products as $item)   
                        <x-card-product :item="$item" />
                    @endforeach
            </div>
        </div>
    </div>
<!--end list product------------------------------------------------------------------>
    </x-card-content>
<!--pagintion --------->
    <div class="w-100 text-center d-flex justify-content-center mt-5" dir="ltr">
        {{$products->links()}}
    </div>
</x-layout>