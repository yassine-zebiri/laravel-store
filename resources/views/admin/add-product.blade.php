<x-layout-admin>

    @if(session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <span>تم اضافة المنتج بالنجاح</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="p-5">
        <form method="POST" action="/admin/product/add-product/create" 
        class="row row-gap-4 w-100 bg-white border p-4 rounded" enctype="multipart/form-data" >
            @csrf
            <div class="col-6">
                <label class="form-label" for="name">اسم المنتج</label>
                <input name="name" value="{{old('name')}}" class="form-control form-control-lg" type="text">
                @error('name')
                    <div>{{$message}}</div>
                @enderror
            </div>
            <div class="col-6">
                <label class="form-label" for="categorie_id">فئة المنتج</label>
                <select value="{{old('categorie_id')}}" name="categorie_id" 
                class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                    <option selected>قم باختيار فئة المنتج</option>
                    @foreach ($categories as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
                @error('categorie_id')
                    <div>{{$message}}</div>
                @enderror
            </div>
            <div class="col-6">
                <label class="form-label" for="market">ماركة المنتج</label>
                <input value="{{old('market')}}" name="market" class="form-control form-control-lg" type="text">
                @error('market')
                    <div>{{$message}}</div>
                @enderror
            </div>
            <div class="col-6">
                <label class="form-label" for="price">سعر المنتج</label>
                <input value="{{old('price')}}" name="price" class="form-control form-control-lg" type="number" min="1">
                @error('price')
                    <div>{{$message}}</div>
                @enderror
            </div>
            <div class="col-6">
                <label class="form-label" for="pic">رفع صورة المنتج</label>
                <input name="pic" type="file" class="form-control form-control-lg" aria-label="file example">
                <div class="invalid-feedback">Example invalid form file feedback</div>
            </div>
            <div class="col-12">
                <label  class="form-label" for="description">وصف المنتج</label>
                <textarea name="description" class="form-control form-control-lg" type="text">
                    {{old('description')}}
                </textarea>
                @error('description')
                    <div>{{$message}}</div>
                @enderror
            </div>
            <div>
                <button class="btn btn-primary" type="submit">اضافة منتج</button>
            </div>
        </form>
    </div>
</x-layout-admin>