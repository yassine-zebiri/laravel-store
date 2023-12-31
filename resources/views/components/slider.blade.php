@props(['data'])

<div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        @for ($i = 1; $i < count($data); $i++)
            <button type="button" data-bs-target="#carouselExampleIndicators" 
            data-bs-slide-to="{{$i}}" aria-label="Slide {{$i+1}}"></button>
        @endfor
    </div>

    <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="3000">
            <a href="/slider/{{$data[0]->id}}">
                <img src="{{asset('/storage/'.$data[0]->pic_slider)}}" class="d-block w-100" alt="...">
            </a>
        </div>
        @for ($i = 1; $i < count($data); $i++)
            <div class="carousel-item " data-bs-interval="3000">
                <a href="/slider/{{$data[$i]->id}}">
                    <img src="{{asset('/storage/'.$data[$i]->pic_slider)}}" class="d-block w-100" alt="...">
                </a>
            </div>
        @endfor
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>

</div>