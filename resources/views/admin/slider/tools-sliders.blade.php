<x-layout-admin>
    <x-flash-message/>
    <div >
        
        <form method="post" action="/admin/ui-store/tools-slider/create" 
        class="row row-gap-4 w-100 bg-white border p-4 rounded" enctype="multipart/form-data" >
            @csrf
            <div class="col-6">
                <label class="form-label" for="">رفع صورة الشريحة</label>
                <input name="pic" accept="image/*" type="file" class="form-control form-control-lg" aria-label="file example" required>
            </div>
            
            <div>
                <button class="btn btn-primary" type="submit">اضافة شريحة</button>
            </div>
        </form>
    </div>

    <div class="row pt-3 row-gap-5">
        <h3>الشرائح :</h3>
        
       
        @for ($i = 0; $i < count($sliders); $i++)
        <div  class="col-6">
            <div class=" bg-white rounded">
                <div class="d-flex justify-content-between align-items-center
                px-3 py-1 ">
                    <div>
                        <p>شريحة رقم : {{$i+1}}</p>
                        <p>عدد العناصر : {{count(App\Models\Sliders::with('products')->find($sliders[$i]->id)->products)}}</p>
                    </div>
                    <div class=" d-flex align-content-center gap-3">
                        <a href="/admin/ui-store/tools-slider/edit/{{$sliders[$i]->id}}" class="btn btn-outline-dark">
                            <i class="fa-solid fa-pen"></i>
                        </a>
                        <form method="POST" action="/admin/ui-store/tools-slider/slider/{{$sliders[$i]->id}}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-outline-danger">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <div>
                    <img class="w-100" src="{{asset('/storage/'.$sliders[$i]->pic_slider)}}" alt="" srcset="">
                </div>
            </div>
        </div>
        @endfor
    </div>
</x-layout-admin>