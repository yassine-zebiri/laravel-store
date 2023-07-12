<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$pageTitle}}</title>
    <link rel="stylesheet" href="/css/index.css">
    <link rel="shortcut icon" href="{{asset('/icon.jpg')}}" type="image/x-icon">

    <!-- CSS bootstrap -->

    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/main.css')}}">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="
    https://cdn.jsdelivr.net/npm/js-cookie@3.0.5/dist/js.cookie.min.js
    "></script>
    <script src="https://kit.fontawesome.com/e005db6dde.js" crossorigin="anonymous"></script>
</head>

<body class="bg-light" dir="rtl" x-data='cart' x-init='retrieveCartFromCookies'>

    <!-- nav bar  --------------------------------------------------------->
    <nav class="navbar navbar-expand-lg navbar-expand-md
    bg-white border-bottom position-fixed top-0 w-100 z-3">
        <div class="container ">
            <a href="/" class=" navbar-brand">نظارات أولاين</a>

            <div class="px-5" style="width: 210px;margin-right: auto;">
                <div class="border text-center rounded" >
                    <a class="nav-link px-3 py-2 position-relative"  href="/cart">
                        <i style="font-size: 1.25rem;" class="fa-solid fa-cart-shopping mx-2 "></i>
    
                        <span style="font-size: 10px;right: 0% !important;" x-text="nbr" class=" position-absolute translate-middle badge rounded-pill bg-danger">+99</span>

                        السلة</a>
                </div>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class=" nav-item">
                        <a class="nav-link" href="/">
                            <i class="fa-solid fa-house mx-2"></i>الصفحة الرئيسية</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="/show"><i class="fa-solid fa-list mx-2"></i>كل منتجات</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/"><i class="fa-regular fa-circle-question mx-2"></i>من نحن</a>
                    </li>
                </ul>
            </div>
    
        </div>
    </nav>
    <!-- end nav bar  -------------------------------------------------->


<div style="margin-top:5rem!important;min-height:50vh">

{{$slot}}
</div>




      <!-- footer -------------------------------------------------------------------->
      <footer class="mt-5 bg-white border-top">
        <div class="container">
        <div class="row w-100  mx-0 justify-content-center ">
            <div class="col-lg-6 col-12 p-4">
                <div>
                    <h6 >من نحن</h6>
                    <hr/>
                    <p>نظارات أونلاين للبيع هو موقع تسوق للنظارات العصرية وذات الجودة العالية. نحن نقدم مجموعة واسعة من النظارات الشمسية والنظارات الطبية لتلبية احتياجاتك الشخصية وتحسين أناقتك.</p>
                </div>
            </div>
            <div class="col-lg-6 col-12 p-4">
                <div>
                    <h6>تواصل معنا</h6>
                    <hr/>
                    <div class="text-center">
                        <a href="" class="btn btn-outline-dark"><i class="fa-brands fa-facebook"></i></a>
                        <a href="" class="btn btn-outline-dark"><i class="fa-brands fa-instagram"></i></a>
                        <a href="" class="btn btn-outline-dark"><i class="fa-brands fa-whatsapp"></i></a>
                        <a href="" class="btn btn-outline-dark"><i class="fa-solid fa-envelope"></i></a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="w-100 p-3 text-center">
            <hr/>
            <h6>جميع الحقوق محفوظة © 2023 لـنظارات أولاين</h6>
        </div>
        </div>
    </footer>
<!-- script js bootstrap -->
    <script src="{{URL::asset('js/bootstrap.bundle.min.js')}}"></script>
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('cart', () => ({
                items:[],
                nbr:0,
                price:0,
                addToCart(product){
                    if(this.items.filter(e=>e.id==product.id).length>0){
                        this.items.filter(e=>e.id==product.id)[0].quantity+=1;
                    }else{
                        this.items.push(product);
                    }
                    this.saveCartToCookies();
                },
                changeQuantity(id,nbr){
                    var n=this.items.filter(e=>e.id==id)[0].quantity;
                    if(n>=1 && (n!=1 || nbr!=-1)){
                    this.items.filter(e=>e.id==id)[0].quantity+=nbr;
                    this.saveCartToCookies();
                    }
                },
                removeFormCart(index){
                    this.items.splice(index,1);
                    this.saveCartToCookies();
                },
                saveCartToCookies() {
                    Cookies.set('cart',JSON.stringify(this.items));
                    this.total()
                },
                retrieveCartFromCookies() {
                    const cart = Cookies.get('cart');
                    if (cart) {
                        this.items = JSON.parse(cart);
                    }
                    this.total()
                },
                total(){
                    this.nbr=0;
                    this.price=0
                    this.items.map((i)=>{this.nbr+=i.quantity})
                    this.items.map((i)=>{
                        this.price+=i.quantity*i.price
                    })
                    if(this.nbr<=0){
                        this.nbr=''
                    }
                }
            }))
        })
    </script>
</body>
</html>