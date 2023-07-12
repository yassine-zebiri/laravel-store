@php
 $id=$_GET['id'];   
@endphp
<ul class="list-group">
@foreach($result as $item)
<li class=" list-group-item d-flex justify-content-between">
    <div>
        <span class="mx-3" style="color: gray">{{$item->id}}#</span>
        <span class="mx-3">{{$item->name}}</span>
    </div>
    <form action="/admin/ui-store/tools-slider/edit/card/{{$id}}/{{$item->id}}" method="post">
        @csrf
        <button class="btn btn-primary">اضافة</button>
    </form>
</li>
@endforeach
</ul>