<x-layout-admin>
    @if(session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <span>{{session('message')}}</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="p-5">
        <form method="post" action="/admin/products/categories/create" class="row row-gap-4 w-100 bg-white border p-4 rounded" 
        enctype="multipart/form-data" >
        @csrf
            <div class="col-6">
                <label class="form-label" for="">اسم الفئة</label>
                <input name="name" class="form-control form-control-lg" type="text">
            </div>
            
            <div class="col-6">
                <label class="form-label" for="">رفع صورة الفئة</label>
                <input name="pic" type="file" class="form-control form-control-lg" aria-label="file example" required>
                <div class="invalid-feedback">Example invalid form file feedback</div>
            </div>
            
            <div>
                <button class="btn btn-primary" type="submit">اضافة منتج</button>
            </div>
        </form>
    </div>

    <div class="px-5">
        <h3>الفئات :</h3>
        <table class="table bg-white">
            <thead>
                <tr>
                    <td>
                        <span>معرف id</span>
                    </td>
                    <td>
                        <span>اسم الفئة</span>
                    </td>
                    <td>
                        <span>حذف</span>
                    </td>
                </tr>
            </thead>
            <tbody>
            @if (count($categories)>0)
                    @foreach ($categories as $item)
                    <tr>
                        <td>
                            #{{$item->id}}
                        </td>
                        <td><img src="{{asset('/storage/'.$item->path_pic)}}" width="75" alt="" srcset="">
                            <span class="">{{$item->name}} </span>
                        </td>
                        <td>
                            <div class=" d-flex align-items-center gap-3">
                                <a class="btn btn-primary" href="/admin/products/categories/{{$item->id}}">تعديل</a>
                                <form action="/admin/products/categories/{{$item->id}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">خذف</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                @else
                <tr>
                    <td class="w-100">
                    <div class="text-center p-3 bg-white">
                        لا يوجد فئات
                    </div></td></tr>
                @endif
            </tbody>
        </table>
    </div>
</x-layout-admin>