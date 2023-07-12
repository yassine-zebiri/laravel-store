<x-layout :pageTitle="$namePage">
    @include('partails._hero')
@php
   // print_r($sliders);
@endphp
    @if (count($sliders))
        <x-slider :data="$sliders"/>
    @endif
    
    <x-card-content >

        <div class="row w-100  justify-content-center g-0 row-gap-3">
            <div class="col-12">
                <h3>أقسام المتجر</h3>
            </div>
            @foreach ($categories as $item)
                <x-card-categorie :item='$item' />
            @endforeach
        </div>


        <div class="row w-100 align-items-stretch  justify-content-start g-0 row-gap-3" dir="rtl">
            <h3>الأكثر مبيعا</h3>
            @foreach ($products as $item)   
                <x-card-product :item="$item"  />
            @endforeach
        </div>

        @foreach ($rows as $row)
        @if (count($row->products)>0)
            <div class="row w-100 align-items-stretch 
                justify-content-start g-0 row-gap-3 mt-3" dir="rtl">
                <h3>{{$row->title}}</h3>
                @foreach ($row->products as $item)   
                    <x-card-product :item="$item"  />
                @endforeach
            </div>
        @endif
        @endforeach




    </x-card-content>
    <div class=" bg-white w-100 mt-5">
        <div class="row g-0">
            <div class="col-12 text-center p-3">
                <h5>مزايا المتجر</h5>
            </div>
            <div class="col-lg-4 text-center p-3">
                <div class="bg-primary-subtle rounded-circle pt-2 m-auto" style="width: 70px;height:70px">
                    <i style="font-size: 3rem;" class="fa-solid fa-headset w-100"></i>
                </div>
                <div class="p-1">
                    <h6>دعم خاص</h6>
                    <p style="font-size: 12px;color: gray;">نوفر لك أسهل الطرق لأسترجاع منتجك ( التالف - المتضرر )</p>
                </div>
            </div>
            <div class="col-lg-4 text-center p-3">
                <div class="bg-primary-subtle rounded-circle pt-2 m-auto" style="width: 70px;height:70px">
                    <i style="font-size: 3rem;" class="fa-solid fa-money-bill-wave "></i>
                </div>
                <div class="p-1">
                    <h6>الدفع عند الاستلام</h6>
                    <p style="font-size: 12px;color: gray;">مدى - فيزا - ماتسركارد - ابل باي - تحويل بنكي- تابي</p>
                </div>
            </div>
            <div class="col-lg-4 text-center p-3">
                <div class="bg-primary-subtle rounded-circle pt-2 m-auto" style="width: 70px;height:70px">
                    <i style="font-size: 3rem;"  class="fa-solid fa-clover"></i>
                </div>
                <div class="p-1">
                    <h6>الجودة</h6>
                    <p style="font-size: 12px;color: gray;">نضمن لك جودة جميع منتجاتنا </p>
                </div>
            </div>
        </div>
    </div>
</x-layout>