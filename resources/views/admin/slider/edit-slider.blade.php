<x-layout-admin>
    <x-flash-message/>
    <div class="w-100 ">
        <div class="bg-white p-3 rounded">
        <img class=" m-auto d-block w-100" src="{{asset('/storage/'.$slider->pic_slider)}}" alt="" srcset=""> 
        <div >
            <form method="post" action="/admin/ui-store/tools-slider/slider/{{$slider->id}}" 
            class="row row-gap-4 w-100 bg-white" enctype="multipart/form-data" >
                @csrf
                @method('PUT')
                <div class="col-6">
                    <label class="form-label" for="">رفع صورة الشريحة</label>
                    <input name="pic" accept="image/*" type="file" class="form-control form-control-lg" aria-label="file example" required>
                </div>
                <div>
                    <button class="btn btn-primary" type="submit">تحديث صورة شريحة</button>
                </div>
            </form>
        </div>
    </div> 

    <div class="py-3">
        @include('admin.slider._serach')
    </div>


    
    <div class="py-3">
        <div class="p-3 rounded bg-white">
            <h5>المنتجات التي تم اضافتها :</h5>

            <div class="row align-items-stretch column-g ap-1">
                @if(count($products)>0)
                    @foreach ($products as $item)
                        <div class="col-3 rounded border p-0">
                            <div class="  ">
                                <div class="p-3">
                                    <form action="/admin/ui-store/tools-slider/edit/card/{{$slider->id}}/{{$item->id}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-outline-dark">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                                <img width="100%" class="p-0" src="{{asset('/storage/'.$item->pic)}}" alt="" srcset="">
                                <div class="p-3 text-center">
                                    <div>
                                        {{$item->name}}
                                    </div>
                                    <div>{{$item->price}} د.ج</div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="p-5 text-center">
                        لا توجد منتوجات
                    </div>
                @endif


            </div>
        </div>
    </div>
</x-layout-admin>