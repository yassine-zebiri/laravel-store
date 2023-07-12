@if(session()->has('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <span>{{session('message')}}</span>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif