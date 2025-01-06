<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>خانه | HAMTA - Ecommerce HTML Template</title>
    <!-- font-awesome -->
    <link rel="stylesheet" href="{{url('frontend/css/font-awesome.min.css')}}">
    <!-- Bootstrap 4.5.3 -->
    <link rel="stylesheet" href="{{url('frontend/bootstrap/css/bootstrap.min.css')}}">
    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="{{url('frontend/css/plugins/apexcharts.css')}}">
    <link rel="stylesheet" href="{{url('frontend/css/plugins/jquery.classycountdown.min.css')}}">
    <link rel="stylesheet" href="{{url('frontend/css/plugins/nouislider.min.css')}}">
    <link rel="stylesheet" href="{{url('frontend/css/plugins/sweetalert2.min.css')}}">
    <link rel="stylesheet" href="{{url('frontend/css/plugins/select2.min.css')}}">
    <link rel="stylesheet" href="{{url('frontend/css/plugins/swiper.min.css')}}">
    <!-- CSS Template -->
    <link rel="stylesheet" href="{{url('frontend/css/theme.css')}}">
    <!-- Here goes your custom.css -->
    <link rel="stylesheet" href="{{url('frontend/css/custom.css')}}">
    <!-- colors: amber,blue,brown,cyan,default,green,indigo,orange,pink,purple,red,teal,yellow -->
    <link rel="stylesheet" href="{{url('frontend/css/colors/red.css')}}" id="colorswitch">
</head>

<body>

<div class="page-wrapper">

    <!-- Page Header -->
    <livewire:front.header/>
    <div class="page-header-overlay"></div>
    <!-- header responsive -->
    <div class="header-responsive fixed--header-top">
        <div class="header-top">
            <div class="side-navigation-wrapper">
                <button class="btn-toggle-side-navigation"><i class="far fa-bars"></i></button>
                <div class="side-navigation">
                    <div class="site-logo">
                        <a href="#">
                            <img src="{{url('frontend')}}/images/logo.png" alt="logo">
                        </a>
                    </div>
                    <div class="divider"></div>
                    <ul class="not-list-children">
                        <li><a href="#"><i class="fal fa-apple-crate"></i> سوپرمارکت</a></li>
                        <li><a href="#"><i class="fal fa-badge-percent"></i> پیشنهادها و تخفیف ها</a></li>
                        <li><a href="#"><i class="fal fa-plus-square"></i> فروشنده شوید</a></li>
                        <li><a href="#"><i class="fal fa-question"></i> سوالی دارید؟</a></li>
                    </ul>
                    <div class="divider"></div>
                    <ul class="category-list">
                        <li class="has-children">
                            <a href="#">کالای دیجیتال</a>
                            <ul>
                                <li class="has-children">
                                    <a href="#">لوازم جانبی گوشی</a>
                                    <ul>
                                        <li><a href="#">کیف و کاور گوشی</a></li>
                                        <li><a href="#">پاور بانک (شارژر همراه)</a></li>
                                        <li><a href="#">پایه نگهدارنده گوشی</a></li>
                                    </ul>
                                </li>
                                <li class="has-children">
                                    <a href="#">گوشی موبایل</a>
                                    <ul>
                                        <li><a href="#">سامسونگ</a></li>
                                        <li><a href="#">هوآوی</a></li>
                                        <li><a href="#">اپل</a></li>
                                        <li><a href="#">شیائومی</a></li>
                                        <li><a href="#">آنر</a></li>
                                        <li><a href="#">نوکیا</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">هدفون، هدست، هندزفری</a>
                                </li>
                                <li>
                                    <a href="#">اسپیکر بلوتوث و با سیم</a>
                                </li>
                                <li class="has-children">
                                    <a href="#">دوربین</a>
                                    <ul>
                                        <li><a href="#">دوربین عکاسی دیجیتال</a></li>
                                        <li><a href="#">دوربین‌ ورزشی و فیلم برداری</a></li>
                                        <li><a href="#">دوربین‌ چاپ سریع</a></li>
                                    </ul>
                                </li>
                                <li class="has-children">
                                    <a href="#">لوازم جانبی دوربین</a>
                                    <ul>
                                        <li><a href="#">لنز</a></li>
                                        <li><a href="#">کیف</a></li>
                                        <li><a href="#">کارت حافظه</a></li>
                                        <li><a href="#">کاغذ چاپ عکس</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="has-children">
                            <a href="#">مد و پوشاک</a>
                            <ul>
                                <li><a href="#">لباس زنانه</a></li>
                            </ul>
                        </li>
                        <li class="has-children">
                            <a href="#">زیبایی و سلامت</a>
                            <ul>
                                <li class="has-children">
                                    <a href="#">لوازم جانبی گوشی</a>
                                    <ul>
                                        <li><a href="#">کیف و کاور گوشی</a></li>
                                        <li><a href="#">پاور بانک (شارژر همراه)</a></li>
                                        <li><a href="#">پایه نگهدارنده گوشی</a></li>
                                    </ul>
                                </li>
                                <li class="has-children">
                                    <a href="#">گوشی موبایل</a>
                                    <ul>
                                        <li><a href="#">سامسونگ</a></li>
                                        <li><a href="#">هوآوی</a></li>
                                        <li><a href="#">اپل</a></li>
                                        <li><a href="#">شیائومی</a></li>
                                        <li><a href="#">آنر</a></li>
                                        <li><a href="#">نوکیا</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">هدفون، هدست، هندزفری</a>
                                </li>
                                <li>
                                    <a href="#">اسپیکر بلوتوث و با سیم</a>
                                </li>
                                <li class="has-children">
                                    <a href="#">دوربین</a>
                                    <ul>
                                        <li><a href="#">دوربین عکاسی دیجیتال</a></li>
                                        <li><a href="#">دوربین‌ ورزشی و فیلم برداری</a></li>
                                        <li><a href="#">دوربین‌ چاپ سریع</a></li>
                                    </ul>
                                </li>
                                <li class="has-children">
                                    <a href="#">لوازم جانبی دوربین</a>
                                    <ul>
                                        <li><a href="#">لنز</a></li>
                                        <li><a href="#">کیف</a></li>
                                        <li><a href="#">کارت حافظه</a></li>
                                        <li><a href="#">کاغذ چاپ عکس</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="has-children">
                            <a href="#">خانه و آشپزخانه</a>
                            <ul>
                                <li class="has-children">
                                    <a href="#">لوازم جانبی گوشی</a>
                                    <ul>
                                        <li><a href="#">کیف و کاور گوشی</a></li>
                                        <li><a href="#">پاور بانک (شارژر همراه)</a></li>
                                        <li><a href="#">پایه نگهدارنده گوشی</a></li>
                                    </ul>
                                </li>
                                <li class="has-children">
                                    <a href="#">گوشی موبایل</a>
                                    <ul>
                                        <li><a href="#">سامسونگ</a></li>
                                        <li><a href="#">هوآوی</a></li>
                                        <li><a href="#">اپل</a></li>
                                        <li><a href="#">شیائومی</a></li>
                                        <li><a href="#">آنر</a></li>
                                        <li><a href="#">نوکیا</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">هدفون، هدست، هندزفری</a>
                                </li>
                                <li>
                                    <a href="#">اسپیکر بلوتوث و با سیم</a>
                                </li>
                                <li class="has-children">
                                    <a href="#">دوربین</a>
                                    <ul>
                                        <li><a href="#">دوربین عکاسی دیجیتال</a></li>
                                        <li><a href="#">دوربین‌ ورزشی و فیلم برداری</a></li>
                                        <li><a href="#">دوربین‌ چاپ سریع</a></li>
                                    </ul>
                                </li>
                                <li class="has-children">
                                    <a href="#">لوازم جانبی دوربین</a>
                                    <ul>
                                        <li><a href="#">لنز</a></li>
                                        <li><a href="#">کیف</a></li>
                                        <li><a href="#">کارت حافظه</a></li>
                                        <li><a href="#">کاغذ چاپ عکس</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="has-children">
                            <a href="#">کتاب،لوازم تحریر و هنر</a>
                            <ul>
                                <li class="has-children">
                                    <a href="#">لوازم جانبی گوشی</a>
                                    <ul>
                                        <li><a href="#">کیف و کاور گوشی</a></li>
                                        <li><a href="#">پاور بانک (شارژر همراه)</a></li>
                                        <li><a href="#">پایه نگهدارنده گوشی</a></li>
                                    </ul>
                                </li>
                                <li class="has-children">
                                    <a href="#">گوشی موبایل</a>
                                    <ul>
                                        <li><a href="#">سامسونگ</a></li>
                                        <li><a href="#">هوآوی</a></li>
                                        <li><a href="#">اپل</a></li>
                                        <li><a href="#">شیائومی</a></li>
                                        <li><a href="#">آنر</a></li>
                                        <li><a href="#">نوکیا</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">هدفون، هدست، هندزفری</a>
                                </li>
                                <li>
                                    <a href="#">اسپیکر بلوتوث و با سیم</a>
                                </li>
                                <li class="has-children">
                                    <a href="#">دوربین</a>
                                    <ul>
                                        <li><a href="#">دوربین عکاسی دیجیتال</a></li>
                                        <li><a href="#">دوربین‌ ورزشی و فیلم برداری</a></li>
                                        <li><a href="#">دوربین‌ چاپ سریع</a></li>
                                    </ul>
                                </li>
                                <li class="has-children">
                                    <a href="#">لوازم جانبی دوربین</a>
                                    <ul>
                                        <li><a href="#">لنز</a></li>
                                        <li><a href="#">کیف</a></li>
                                        <li><a href="#">کارت حافظه</a></li>
                                        <li><a href="#">کاغذ چاپ عکس</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">اسباب بازی،کودک و نوزاد</a>
                        </li>
                        <li>
                            <a href="#">ورزش و سفر</a>
                        </li>
                        <li>
                            <a href="#">خوردنی و آشامیدنی</a>
                        </li>
                    </ul>
                </div>
                <div class="overlay-side-navigation"></div>
            </div>
            <div class="site-logo">
                <a href="#">
                    <img src="{{url('frontend')}}/images/logo.png" alt="logo">
                </a>
            </div>
            <div class="header-tools">
                <div class="cart-side">
                    <a href="#" class="btn-toggle-cart-side ml-0">
                        <i class="far fa-shopping-basket"></i>
                        <span class="bag-items-number">2</span>
                    </a>
                    <div class="cart-side-content">
                        <ul>
                            <li class="cart-items">
                                <ul>
                                    <li class="cart-item">
                                            <span class="d-flex align-items-center mb-2">
                                                <a href="#">
                                                    <img src="{{url('frontend')}}/images/cart/item-1.jpg" alt="">
                                                </a>
                                                <span>
                                                    <a href="#">
                                                        <span class="title-item">
                                                            گوشی موبایل شیائومی مدل Redmi 9 ظرفیت 32 گیگابایت
                                                        </span>
                                                    </a>
                                                    <span class="color d-flex align-items-center">
                                                        رنگ:
                                                        <span style="background-color: #8a2be2;"></span>
                                                    </span>
                                                </span>
                                            </span>
                                        <span class="price">4,050,000 تومان</span>
                                        <button class="remove-item">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                    </li>
                                    <li class="cart-item">
                                            <span class="d-flex align-items-center mb-2">
                                                <a href="#">
                                                    <img src="{{url('frontend')}}/images/cart/item-2.jpg" alt="">
                                                </a>
                                                <span>
                                                    <a href="#">
                                                        <span class="title-item">
                                                            ساعت مچی هوشمند Haylou LS02
                                                        </span>
                                                    </a>
                                                    <span class="color d-flex align-items-center">
                                                        رنگ:
                                                        <span style="background-color: #000;"></span>
                                                    </span>
                                                </span>
                                            </span>
                                        <span class="price">750,000 تومان</span>
                                        <button class="remove-item">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                    </li>
                                    <li class="cart-item">
                                            <span class="d-flex align-items-center mb-2">
                                                <a href="#">
                                                    <img src="{{url('frontend')}}/images/cart/item-3.jpg" alt="">
                                                </a>
                                                <span>
                                                    <a href="#">
                                                        <span class="title-item">
                                                            هدفون بلوتوثی کیو سی وای مدل T7
                                                        </span>
                                                    </a>
                                                    <span class="color d-flex align-items-center">
                                                        رنگ:
                                                        <span style="background-color: #fff;"></span>
                                                    </span>
                                                </span>
                                            </span>
                                        <span class="price">635,000 تومان</span>
                                        <button class="remove-item">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                    </li>
                                    <li class="cart-item">
                                            <span class="d-flex align-items-center mb-2">
                                                <a href="#">
                                                    <img src="{{url('frontend')}}/images/cart/item-1.jpg" alt="">
                                                </a>
                                                <span>
                                                    <a href="#">
                                                        <span class="title-item">
                                                            گوشی موبایل شیائومی مدل Redmi 9 ظرفیت 32 گیگابایت
                                                        </span>
                                                    </a>
                                                    <span class="color d-flex align-items-center">
                                                        رنگ:
                                                        <span style="background-color: #8a2be2;"></span>
                                                    </span>
                                                </span>
                                            </span>
                                        <span class="price">4,050,000 تومان</span>
                                        <button class="remove-item">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                    </li>
                                    <li class="cart-item">
                                            <span class="d-flex align-items-center mb-2">
                                                <a href="#">
                                                    <img src="{{url('frontend')}}/images/cart/item-2.jpg" alt="">
                                                </a>
                                                <span>
                                                    <a href="#">
                                                        <span class="title-item">
                                                            ساعت مچی هوشمند Haylou LS02
                                                        </span>
                                                    </a>
                                                    <span class="color d-flex align-items-center">
                                                        رنگ:
                                                        <span style="background-color: #000;"></span>
                                                    </span>
                                                </span>
                                            </span>
                                        <span class="price">750,000 تومان</span>
                                        <button class="remove-item">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                    </li>
                                    <li class="cart-item">
                                            <span class="d-flex align-items-center mb-2">
                                                <a href="#">
                                                    <img src="{{url('frontend')}}/images/cart/item-3.jpg" alt="">
                                                </a>
                                                <span>
                                                    <a href="#">
                                                        <span class="title-item">
                                                            هدفون بلوتوثی کیو سی وای مدل T7
                                                        </span>
                                                    </a>
                                                    <span class="color d-flex align-items-center">
                                                        رنگ:
                                                        <span style="background-color: #fff;"></span>
                                                    </span>
                                                </span>
                                            </span>
                                        <span class="price">635,000 تومان</span>
                                        <button class="remove-item">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                    </li>
                                    <li class="cart-item">
                                            <span class="d-flex align-items-center mb-2">
                                                <a href="#">
                                                    <img src="{{url('frontend')}}/images/cart/item-1.jpg" alt="">
                                                </a>
                                                <span>
                                                    <a href="#">
                                                        <span class="title-item">
                                                            گوشی موبایل شیائومی مدل Redmi 9 ظرفیت 32 گیگابایت
                                                        </span>
                                                    </a>
                                                    <span class="color d-flex align-items-center">
                                                        رنگ:
                                                        <span style="background-color: #8a2be2;"></span>
                                                    </span>
                                                </span>
                                            </span>
                                        <span class="price">4,050,000 تومان</span>
                                        <button class="remove-item">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                    </li>
                                    <li class="cart-item">
                                            <span class="d-flex align-items-center mb-2">
                                                <a href="#">
                                                    <img src="{{url('frontend')}}/images/cart/item-2.jpg" alt="">
                                                </a>
                                                <span>
                                                    <a href="#">
                                                        <span class="title-item">
                                                            ساعت مچی هوشمند Haylou LS02
                                                        </span>
                                                    </a>
                                                    <span class="color d-flex align-items-center">
                                                        رنگ:
                                                        <span style="background-color: #000;"></span>
                                                    </span>
                                                </span>
                                            </span>
                                        <span class="price">750,000 تومان</span>
                                        <button class="remove-item">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                    </li>
                                    <li class="cart-item">
                                            <span class="d-flex align-items-center mb-2">
                                                <a href="#">
                                                    <img src="{{url('frontend')}}/images/cart/item-3.jpg" alt="">
                                                </a>
                                                <span>
                                                    <a href="#">
                                                        <span class="title-item">
                                                            هدفون بلوتوثی کیو سی وای مدل T7
                                                        </span>
                                                    </a>
                                                    <span class="color d-flex align-items-center">
                                                        رنگ:
                                                        <span style="background-color: #fff;"></span>
                                                    </span>
                                                </span>
                                            </span>
                                        <span class="price">635,000 تومان</span>
                                        <button class="remove-item">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                    </li>
                                </ul>
                            </li>
                            <li class="cart-footer">
                                    <span class="d-block text-center mb-3">
                                        مبلغ کل:
                                        <span class="total">4,050,000 تومان</span>
                                    </span>
                                <span class="d-block text-center px-2">
                                        <a href="#" class="btn-cart">
                                            مشاهده سبد خرید
                                            <i class="mi mi-ShoppingCart"></i>
                                        </a>
                                    </span>
                            </li>
                        </ul>
                    </div>
                    <div class="overlay-cart-side"></div>
                </div>
            </div>
        </div>
        <div class="header-bottom">
            <div class="search-box">
                <form action="#">
                    <input type="text" placeholder="نام محصول یا برند را جستجو کنید...">
                    <i class="far fa-search"></i>
                </form>
                <div class="search-result">
                    <ul class="search-result-list">
                        <li><a href="#">موبایل</a></li>
                        <li><a href="#">سامسونگ</a></li>
                        <li><a href="#">مودم</a></li>
                        <li><a href="#">اپل</a></li>
                        <li><a href="#">تلویزیون</a></li>
                    </ul>
                    <ul class="search-result-most-view">
                        <li><a href="#">موبایل</a></li>
                        <li><a href="#">سامسونگ</a></li>
                        <li><a href="#">مودم</a></li>
                        <li><a href="#">اپل</a></li>
                        <li><a href="#">تلویزیون</a></li>
                    </ul>
                </div>
            </div>
            <div class="header-tools">
                <a href="#"><i class="far fa-user-circle"></i></a>
            </div>
        </div>
    </div>
    <!-- end header responsive -->
    <!-- end Page Header -->

    <!-- Page Content -->
    {{$slot}}
    <!-- end Page Content -->

    <!-- Page Footer -->
    <!-- color switcher -->
    <div id="colorswitch-option">
        <button><i class="fas fa-swatchbook"></i></button>
        <ul>
            <li data-path="{{url('frontend/css/colors/amber.css')}}"><span style="background-color: #ffab00;"></span></li>
            <li data-path="{{url('frontend/css/colors/blue.css')}}"><span style="background-color: #2962ff;"></span></li>
            <li data-path="{{url('frontend/css/colors/brown.css')}}"><span style="background-color: #3e2723;"></span></li>
            <li data-path="{{url('frontend/css/colors/cyan.css')}}"><span style="background-color: #00b8d4;"></span></li>
            <li data-path="{{url('frontend/css/colors/green.css')}}"><span style="background-color: #00c853;"></span></li>
            <li data-path="{{url('frontend/css/colors/indigo.css')}}"><span style="background-color: #304ffe;"></span></li>
            <li data-path="{{url('frontend/css/colors/orange.css')}}"><span style="background-color: #ff6d00;"></span></li>
            <li data-path="{{url('frontend/css/colors/pink.css')}}"><span style="background-color: #c51162;"></span></li>
            <li data-path="{{url('frontend/css/colors/red.css')}}"><span style="background-color: #d50000;"></span></li>
            <li data-path="{{url('frontend/css/colors/teal.css')}}"><span style="background-color: #009688;"></span></li>
            <li data-path="{{url('frontend/css/colors/purple.css')}}"><span style="background-color: #aa00ff;"></span></li>
            <li data-path="{{url('frontend/css/colors/yellow.css')}}"><span style="background-color: #ffd600;"></span></li>
        </ul>
    </div>
    <!-- end color switcher -->

    <!-- Page Loader -->
    <div class="page-loader">
        <div class="page-loader-content">
            <div class="logo-area">
                <img src="{{url('frontend/images/logo.png')}}" alt="">
            </div>
            <span class="loader"></span>
        </div>
    </div>
    <!-- end Page Loader -->

    <footer class="main-footer">
        <div class="back-to-top">
            <div class="back-btn">
                <i class="far fa-chevron-up icon"></i>
                <span>برگشت به بالا</span>
            </div>
        </div>
        <div class="container">
            <div class="services row mb-5">
                <div class="col-md-3 col-sm-6 mb-md-0 mb-4">
                    <div class="service-item">
                        <img src="{{url('frontend/images/services/delivery-person.png')}}" alt="">
                        <div class="service-item-body">
                            <h6>تحویل سریع و رایگان</h6>
                            <p>تحویل رایگان کالا برای کلیه سفارشات بیش از 500 هزار تومان</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 mb-md-0 mb-4">
                    <div class="service-item">
                        <img src="{{url('frontend/images/services/recieve.png')}}" alt="">
                        <div class="service-item-body">
                            <h6>۷ روز ضمانت بازگشت</h6>
                            <p>در صورت نارضایتی به هر دلیلی می توانید محصول را بازگردانید</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 mb-md-0 mb-4">
                    <div class="service-item">
                        <img src="{{url('frontend/images/services/headset.png')}}" alt="">
                        <div class="service-item-body">
                            <h6>پشتیبانی ۲۴ ساعته</h6>
                            <p>در صورت وجود هرگونه سوال یا ابهامی، با ما در تماس باشید</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 mb-md-0 mb-4">
                    <div class="service-item">
                        <img src="{{url('frontend/images/services/debit-card.png')}}" alt="">
                        <div class="service-item-body">
                            <h6>پرداخت آنلاین ایمن</h6>
                            <p>محصولات مدنظر خود را با خیال آسوده به صورت آنلاین خریداری کنید</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4 col-sm-6">
                    <div class="widget widget-links">
                        <h2 class="widget-title">دسته بندی کالاها</h2>
                        <ul class="widget-list">
                            <li class="widget-list-item">
                                <a href="#" class="widget-list-link">کالای دیجیتال</a>
                            </li>
                            <li class="widget-list-item">
                                <a href="#" class="widget-list-link">آرایشی،بهداشتی و سلامت</a>
                            </li>
                            <li class="widget-list-item">
                                <a href="#" class="widget-list-link">خودرو،ابزار و اداری</a>
                            </li>
                            <li class="widget-list-item">
                                <a href="#" class="widget-list-link">مد و پوشاک</a>
                            </li>
                            <li class="widget-list-item">
                                <a href="#" class="widget-list-link">خانه و آشپزخانه</a>
                            </li>
                            <li class="widget-list-item">
                                <a href="#" class="widget-list-link">کتاب،لوازم تحریر و هنر</a>
                            </li>
                            <li class="widget-list-item">
                                <a href="#" class="widget-list-link">اسباب بازی،کودک و نوزاد</a>
                            </li>
                            <li class="widget-list-item">
                                <a href="#" class="widget-list-link">ورزش و سفر</a>
                            </li>
                            <li class="widget-list-item">
                                <a href="#" class="widget-list-link">خوردنی و آشامیدنی</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="widget widget-links">
                        <h2 class="widget-title">راهنمای خرید از همتا</h2>
                        <ul class="widget-list">
                            <li class="widget-list-item">
                                <a href="#" class="widget-list-link">نحوه ثبت سفارش</a>
                            </li>
                            <li class="widget-list-item">
                                <a href="#" class="widget-list-link">رویه ارسال سفارش</a>
                            </li>
                            <li class="widget-list-item">
                                <a href="#" class="widget-list-link">شیوه‌های پرداخت</a>
                            </li>
                        </ul>
                    </div>
                    <div class="widget widget-links">
                        <h2 class="widget-title">خدمات مشتریان</h2>
                        <ul class="widget-list">
                            <li class="widget-list-item">
                                <a href="#" class="widget-list-link">پاسخ به پرسش‌های متداول</a>
                            </li>
                            <li class="widget-list-item">
                                <a href="#" class="widget-list-link">رویه‌های بازگرداندن کالا</a>
                            </li>
                            <li class="widget-list-item">
                                <a href="#" class="widget-list-link">شرایط استفاده</a>
                            </li>
                            <li class="widget-list-item">
                                <a href="#" class="widget-list-link">حریم خصوصی</a>
                            </li>
                            <li class="widget-list-item">
                                <a href="#" class="widget-list-link">گزارش باگ</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="widget widget-newsletter">
                        <h2 class="widget-title">خبرنامه:</h2>
                        <div class="newsletter">
                            <form action="#" class="newsletterform">
                                <div class="form-group">
                                    <input type="email" placeholder="آدرس ایمیل خود را وارد نمایید">
                                    <button type="submit">ارسال</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="widget">
                        <h2 class="widget-title">
                            همتا را در شبکه‌های اجتماعی دنبال کنید:
                        </h2>
                        <div class="social">
                            <ul>
                                <li>
                                    <a href="#" class="linkedin"><i class="fab fa-linkedin-in"></i></a>
                                </li>
                                <li>
                                    <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#" class="instagram"><i class="fab fa-instagram"></i></a>
                                </li>
                                <li>
                                    <a href="#" class="telegram"><i class="fab fa-telegram-plane"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="widget">
                        <h2 class="widget-title">دانلود اپلیکیشن</h2>
                        <div class="d-flex flex-wrap">
                            <div class="ml-2 mb-2">
                                <a class="btn-market" href="#">
                                        <span class="d-flex align-items-center justify-content-between">
                                            <span>
                                                <span class="btn-market-subtitle">دانلود از</span>
                                                <span class="btn-market-title">اپ استور</span>
                                            </span>
                                            <i class="fab fa-apple"></i>
                                        </span>
                                </a>
                            </div>
                            <div class="mb-2">
                                <a class="btn-market" href="#">
                                        <span class="d-flex align-items-center justify-content-between">
                                            <span>
                                                <span class="btn-market-subtitle">دانلود از</span>
                                                <span class="btn-market-title">گوگل پلی</span>
                                            </span>
                                            <i class="fab fa-google-play"></i>
                                        </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mb-3">
                    <div class="logo-area">
                        <a href="#">
                            <img src="{{url('frontend/images/logo.png')}}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-12">
                    <div class="widget widget-links mb-2">
                        <ul class="widget-list d-flex flex-wrap justify-content-center justify-content-md-start">
                            <li class="widget-list-item ml-4">
                                <a href="#" class="widget-list-link">درباره همتا</a>
                            </li>
                            <li class="widget-list-item ml-4">
                                <a href="#" class="widget-list-link">فروش در همتا</a>
                            </li>
                            <li class="widget-list-item ml-4">
                                <a href="#" class="widget-list-link">فرصت های شغلی</a>
                            </li>
                            <li class="widget-list-item ml-4">
                                <a href="#" class="widget-list-link">تماس با همتا</a>
                            </li>
                            <li class="widget-list-item ml-4">
                                <a href="#" class="widget-list-link">حریم خصوصی</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-12">
                    <div class="copy-right" dir="ltr">
                        <p>© All rights reserved</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end Page Footer -->

</div>



<!-- JS Global Compulsory -->
<script src="{{url('frontend/js/jquery-3.5.1.min.js')}}"></script>
<script src="{{url('frontend/js/plugins/popper.min.js')}}"></script>
<script src="{{url('frontend/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- JS Implementing Plugins -->
<script src="{{url('frontend/js/plugins/apexcharts.min.js')}}"></script>
<script src="{{url('frontend/js/plugins/jquery.knob.js')}}"></script>
<script src="{{url('frontend/js/plugins/jquery.throttle.js')}}"></script>
<script src="{{url('frontend/js/plugins/jquery.classycountdown.min.js')}}"></script>
<script src="{{url('frontend/js/plugins/jquery.nicescroll.min.js')}}"></script>
<script src="{{url('frontend/js/plugins/nouislider.min.js')}}"></script>
<script src="{{url('frontend/js/plugins/sweetalert2.all.min.js')}}"></script>
<script src="{{url('frontend/js/plugins/select2.full.min.js')}}"></script>
<script src="{{url('frontend/js/plugins/swiper.min.js')}}"></script>
<script src="{{url('frontend/js/plugins/ResizeSensor.min.js')}}"></script>
<script src="{{url('frontend/js/plugins/theia-sticky-sidebar.min.js')}}"></script>
<script src="{{url('frontend/js/plugins/zoomsl.min.js')}}"></script>
<script src="{{url('frontend/js/plugins/wNumb.js')}}"></script>
<!-- JS Template -->
<script src="{{url('frontend/js/theme.js')}}"></script>
<!-- Here goes your custom.js -->
<script src="{{url('frontend/js/custom.js')}}"></script>

<script>
    $(document).ready(function () {
        $('#countdown--offer-slider').ClassyCountdown({
            theme: "black",
            end: $.now() + 645600,
            labels: false,
        });
    });
</script>
</body>

</html>
