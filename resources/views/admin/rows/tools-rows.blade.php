<x-layout-admin>
    <x-flash-message/>
    <div >
        
        <form method="post" action="/admin/ui-store/tools-rows/create" 
        class="row row-gap-4 w-100 bg-white border p-4 rounded" enctype="multipart/form-data" >
            @csrf
            <div class="col-12">
                <label class="form-label" for="">اسم السطرا</label>
                <input name="title" class="form-control form-control-lg" type="text">
            </div>
            
            <div>
                <button class="btn btn-primary" type="submit">اضافة شريحة</button>
            </div>
        </form>
    </div>
    <div class="py-3 ">
        <h3>الأسطرا :</h3>
        <div class="p-3 bg-white border rounded">
            @if(count($rows)>0)
            <table class="table">
                <thead>
                    <tr>
                        <td>رقم السطر</td>
                        <td>عنوان</td>
                        <td>عدد المنتجات</td>
                        <td>اعدادات</td>
                    </tr> 
                </thead>
                <tbody>
                    @foreach ($rows as $item)
                    <tr>
                        <td>{{$item->id}}#</td>
                        <td>{{$item->title}}</td>
                        <td>{{count(App\Models\Rows::with('products')->find($item->id)->products)}}</td>
                        <td>
                            <div class="d-flex align-items-center gap-3" >
                                <a href="/admin/ui-store/tools-row/edit/{{$item->id}}" class="btn btn-primary">عرض</a>
                                <form method="POST" action="/admin/ui-store/tools-rows/row/{{$item->id}}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">حذف</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
                <div class="text-center p-3">
                    لا يوجد اسطرا
                </div>
            @endif       
        </div>
    </div>
</x-layout-admin>