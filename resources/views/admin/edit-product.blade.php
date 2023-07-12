<x-layout-admin>

    @if(session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <span>{{session('message')}}</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="p-5">
        <form method="POST" action="/admin/products/{{$product->id}}" 
        class="row row-gap-4 w-100 bg-white border p-4 rounded" enctype="multipart/form-data" >
            @csrf
            @method('PUT')
            <div class="p-3 text-center">
                <h5>تعديل المنتج</h5>
            </div>
            <div class="col-6">
                <label class="form-label" for="name">اسم المنتج</label>
                <input name="name" value="{{$product->name}}" class="form-control form-control-lg" type="text">
                @error('name')
                    <div>{{$message}}</div>
                @enderror
            </div>
            <div class="col-6">
                <label class="form-label" for="categorie_id">فئة المنتج</label>
                <select  name="categorie_id" 
                class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                    <option selected>قم باختيار فئة المنتج</option>
                    @foreach ($categories as $item)
                        @if($product->categorie_id==$item->id)
                            <option value="{{$item->id}}" selected>{{$item->name}}</option>
                        @else
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endif
                    @endforeach
                </select>
                @error('categorie_id')
                    <div>{{$message}}</div>
                @enderror
            </div>
            <div class="col-6">
                <label class="form-label" for="market">ماركة المنتج</label>
                <input value="{{$product->market}}" name="market" class="form-control form-control-lg" type="text">
                @error('market')
                    <div>{{$message}}</div>
                @enderror
            </div>
            <div class="col-6">
                <label class="form-label" for="price">سعر المنتج</label>
                <input value="{{$product->price}}" name="price" class="form-control form-control-lg" type="number" min="1">
                @error('price')
                    <div>{{$message}}</div>
                @enderror
            </div>
            <div class="col-6">
                <label class="form-label" for="pic">رفع صورة المنتج</label>
                <input name="pic" type="file" class="form-control form-control-lg" aria-label="file example">
                <div class="invalid-feedback">Example invalid form file feedback</div>
            </div>
            <div class="col-6 text-center p-3">
                @if ($product->pic)
                    <img src="{{asset('/storage/'.$product->pic)}}" width="85" alt="" srcset="">
                @else
                    <div class="text-center">لا توجد صورة</div>
                @endif
            </div>
            <div class="col-12">
                <label  class="form-label" for="description">وصف المنتج</label>
                <textarea name="description" class="form-control form-control-lg" 
                type="text">{{$product->description}}</textarea>
                @error('description')
                    <div>{{$message}}</div>
                @enderror
            </div>
            <div>
                <button class="btn btn-primary" type="submit">حفظ منتج</button>
            </div>
        </form>
    </div>
</x-layout-admin>