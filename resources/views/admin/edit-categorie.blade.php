<x-layout-admin>
    @if(session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <span>{{session('message')}}</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="p-5">
        <form method="post" action="/admin/products/categories/{{$categorie->id}}" class="row row-gap-4 w-100 bg-white border p-4 rounded" 
        enctype="multipart/form-data" >
        @csrf
        @method('PUT')
        @if($categorie->path_pic)
            <div class="col-12">
                <img src="{{asset('/storage/'.$categorie->path_pic)}}" width="100%" alt="">
            </div>
        @else
            <div class="col-12 textt-center">
                لا توجد صورة
            </div>
        @endif
            <div class="col-6">
                <label class="form-label" for="">اسم الفئة</label>
                <input value="{{$categorie->name}}" name="name" class="form-control form-control-lg" type="text">
            </div>
            
            <div class="col-6">
                <label class="form-label" for="">رفع صورة الفئة</label>
                <input name="pic" type="file" class="form-control form-control-lg" aria-label="file example" >
                <div class="invalid-feedback">Example invalid form file feedback</div>
            </div>
            
            <div>
                <button class="btn btn-primary" type="submit">تحديث منتج</button>
            </div>
        </form>
    </div>
</x-layout-admin>