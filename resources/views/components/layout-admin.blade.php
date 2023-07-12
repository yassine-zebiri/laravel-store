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
    <main>
        <div class=" float- end  bg-white position-fixed" style="height: 100vh;width: 275px;">
            <h1 class="p-3">admin</h1>
            <div class="">
                <div class=" ">
                    <div class="accordion" id="accordionPanelsStayOpenExample">


                        <a href="/admin" class="accordion-item p-3 d-block text-decoration-none text-dark">
                          <i class="fa-solid fa-gauge mx-1"></i>
                          <span>لوحة القيادة</span>
                        </a>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" 
                              data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="false" aria-controls="panelsStayOpen-collapseOne">
                              <i class="fa-sharp fa-solid fa-bag-shopping mx-1"></i>
                                المنتجات

                              </button>
                            </h2>
                            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse">
                              <div class="accordion-body p-0 ">
                                <a href="/admin/products/add-product" class="p-3 d-block text-decoration-none text-dark">اضافة منتج</a>
                                <a href="/admin/products/show-products" class="p-3 d-block text-decoration-none text-dark">عرض كل المنتجات</a>
                                <a href="/admin/products/categories" class="p-3 d-block text-decoration-none text-dark">عرض كل الفئات</a>
                              </div>
                            </div>
                          </div>

                          <div class="accordion-item">
                            <h2 class="accordion-header">
                              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" 
                              data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                              <i class="fa-sharp fa-solid fa-bag-shopping mx-1"></i>
                              <span>اعدادات واجهة المنتجر</span>
                              </button>
                            </h2>
                            <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
                              <div class="accordion-body p-0 ">
                                <a href="/admin/ui-store/tools-slider" class="p-3 d-block text-decoration-none text-dark">اعدادات الشرائح</a>
                                <a href="/admin/ui-store/tools-rows" class="p-3 d-block text-decoration-none text-dark">اعدادات الأسطرا</a>
                              </div>
                            </div>
                          </div>

                          <form action="/logout" class="w-100 accordion-item p-2" method="POST">
                            @csrf
                            <button type="submit" class="btn d-block text-decoration-none text-dark">
                              <i class="fa-solid fa-arrow-right-from-bracket mx-1"></i>
                              <span>تسجيل الخروج</span>
                            </button>
                          </form>

                      </div>

                </div>

            </div>

        </div>
        <div class="float -start " style="min-width: 1000px;margin-right: 280px;">
            <div class="container p-5"> 
                {{$slot}}
            </div>



</div>
    
</main>
<!-- script js bootstrap -->
<script src="{{URL::asset('js/bootstrap.bundle.min.js')}}"></script>

</body>
</html>