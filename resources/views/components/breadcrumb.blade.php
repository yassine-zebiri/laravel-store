@props(['data','name'])
 <!-- breadcrumb         ------------------------------------------->
 <nav aria-label="breadcrumb" >
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">الصفحة الرئيسية</a></li>
        <li class="breadcrumb-item">
            <a href="/show/filter/?categories%5B{{$data->id}}%5D={{$data->id}}">
                {{$data->name}}
            </a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">{{$name}}</li>
    </ol>
</nav>
<!-- end breadcrumb         ------------------------------------------->