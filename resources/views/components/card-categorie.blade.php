@props(['item'])
<div class="col-lg-4 col-12 px-2">
    <a href="/show/filter/?categories%5B{{$item->id}}%5D={{$item->id}}" class="text-black text-decoration-none">
        <div class="text-center">
            <img class="w-100 rounded" src="{{asset('/storage/'.$item->path_pic)}}" alt="" srcset="">
            <p class="pt-2">{{$item->name}}</p>
        </div>
    </a>
</div>