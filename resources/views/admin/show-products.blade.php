<x-layout-admin>
    @if(session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <span>تم حذف المنتج بالنجاح</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
        <div>
            <table class=" table bg-white">
                <thead>
                    <tr>
                        <td>
                            <span>المنتج</span>
                        </td>
                        <td>
                            <span>الفئة</span>
                        </td>
                        <td>
                            <span>السعر</span>
                        </td>
                        <td>
                            <span>اعدادات</span>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    
                    @if (count($products)>0)
                        @foreach($products as $item)
                        <tr>
                            <td>
                                <img src="{{asset('/storage/'.$item->pic)}}" width="75" alt="" srcset="">
                                <span>{{$item->name}}</span>
                            </td>
                            <td>
                                <p class="">{{$categorie::findOrFail($item->categorie_id)->name}}</p>
                            </td>
                            <td>
                                <span>{{$item->price}} د.ج</span>
                            </td>
                            <td>
                                <div class=" d-flex align-items-center gap-3">
                                <a href="/admin/products/edit/{{$item->id}}"  class="btn btn-primary">عرض</a>

                                <form method="post" action="/admin/products/{{$item->id}}">
                                    @csrf
                                    @method('DELETE')
                                    <button  class="btn btn-danger">خذف</button>
                                </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    @else
                        
                    @endif
                   
                </tbody>
            </table>
   
</x-layout-admin>