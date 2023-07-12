<x-layout :pageTitle="$namePage">
    <div class="container">
        <img width="100%" src="{{asset('/storage/'.$slider->pic_slider)}}" alt="" srcset="">
    </div>
    <x-card-content>
        <div class="row w-100 align-items-stretch  justify-content-start g-0 row-gap-3" dir="rtl">
            <h3>المنتجات :</h3>
            @foreach ($products as $item)   
                    <x-card-product :item="$item"  />
                @endforeach
        </div>
    </x-card-content>
</x-layout>