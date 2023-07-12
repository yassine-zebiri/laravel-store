<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/admin/style.css">

    
    <!-- CSS bootstrap -->

    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/main.css')}}">

    <script src="https://kit.fontawesome.com/e005db6dde.js" crossorigin="anonymous"></script>
</head>

<body class="bg-light" dir="rtl">
    <main class="container-fluid  pt-5">

        <form method="POST" action="/users/authenticate" 
        class="form m-auto w-100 border rounded p-4 bg-white" style="max-width: 450px;">
            @csrf
            <h2 class="text-center mt-3">تسجيل الدخول</h2>

            <div class="form-group mt-3">
                <label  class="form-label" for="">ايميل</label>
                <div class="input-group flex-nowrap" dir="ltr">
                    <span class="input-group-text">@</span>
                    <input name="email" placeholder="ادخل البريد الالكتروني"  class="form-control" type="email">
                    @error('email')
                        <p class="text-red-500"> {{$message}} </p>
                    @enderror
                </div>
                
            </div>

            <div class="form-group mt-3">
                <label class="form-label" for="">كلمو السر</label>
                <input name="password" class="form-control" placeholder="كلمة السر" type="password">
                @error('password')
                    <p class="text-red-500"> {{$message}} </p>
                @enderror
            </div>

            <div class="mt-3">
                <button class="btn btn-primary">تسجي الدخول</button>
            </div>
            
        </form>
    </main>
<!-- script js bootstrap -->
<script src="{{URL::asset('js/bootstrap.bundle.min.js')}}"></script>

</body>
</html>