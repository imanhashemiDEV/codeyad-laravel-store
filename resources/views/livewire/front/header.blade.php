<header class="page-header">
    <div class="container">
        {{--   search     --}}
        <div class="bottom-page-header">
            <div class="d-flex align-items-center">
                <div class="site-logo">
                    <a href="#">
                        <img src="{{url('frontend/images/logo.png')}}" alt="logo">
                    </a>
                </div>
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
            </div>
            <div class="user-items">

                @auth
                    <div class="user-item">
                        <a href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke-width="1.5" stroke="currentColor" width="27">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"/>
                            </svg>
                            <span class="bag-items-number">3</span>
                        </a>
                    </div>
                    <div class="user-item cart-list">
                        <a href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke-width="1.5" stroke="currentColor" width="27">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z"/>
                            </svg>
                            <span class="bag-items-number">{{count($carts)}}</span>
                        </a>
                        <ul>
                            <li class="cart-items">
                                <ul class="do-nice-scroll">
                                    @foreach($carts as $cart)
                                        <li class="cart-item">
                                            <span class="d-flex align-items-center mb-2">
                                                <a href="#">
                                                    <img src="{{url('images/products/'. $cart->product->image)}}"
                                                         alt="">
                                                </a>
                                                <span>
                                                    <a href="#">
                                                        <span class="title-item">
                                                            {{$cart->product->name}}
                                                        </span>
                                                    </a>
                                                    <span class="color d-flex align-items-center">
                                                        رنگ:
                                                        <span style="background-color: {{$cart->color->code}};"></span>
                                                    </span>
                                                </span>
                                            </span>
                                            <span class="price">{{$cart->product->productPrices->where('color_id', $cart->color_id)->where('guaranty_id',$cart->guaranty_id)->first()->price}} تومان</span>
                                            <button class="remove-item">
                                                <i class="far fa-trash-alt"></i>
                                            </button>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="cart-footer d-flex align-items-center justify-content-between">
                                    <span class="d-flex flex-column">
                                        <span>مبلغ کل:</span>
                                        <span class="total">{{$total_price -$total_discount }} تومان</span>
                                    </span>
                                <span class="d-block text-center px-2">
                                        <a href="{{route('shipping')}}" class="btn-cart">
                                            ثبت سفارش
                                        </a>
                                    </span>
                            </li>
                        </ul>
                    </div>
                @endauth
                <div class="user-item account">
                    <!-- <a href="#" class="btn-auth">
                <i class="fal fa-user-circle"></i>
                ورود و عضویت
            </a> -->
                    <a href="#">
                        @auth()
                            {{ auth()->user()->name }}
                        @endauth
                        @guest
                            ثبت نام یا ورود
                        @endguest
                        <i class="fad fa-chevron-down text-sm mr-1"></i>
                    </a>
                    <ul class="dropdown--wrapper">
                        @auth
                            <li class="header-profile-dropdown-account-container">
                                <a href="#" class="d-block">
                                        <span class="header-profile-dropdown-user">
                                            <span class="header-profile-dropdown-user-img">
                                                <img src="{{url('frontend/images/avatar/avatar.png')}}">
                                            </span>
                                            <span class="header-profile-dropdown-user-info">
                                                <p class="header-profile-dropdown-user-name">
                                                   {{ auth()->user()->name }}
                                                </p>
                                                <span class="header-profile-dropdown-user-profile-link">مشاهده حساب
                                                    کاربری</span>
                                            </span>
                                        </span>
                                    <span class="header-profile-dropdown-account">
                                            <span class="header-profile-dropdown-account-item">
                                                <span class="header-profile-dropdown-account-item-title">اعتبار</span>
                                                <span class="header-profile-dropdown-account-item-amount">
                                                    <span
                                                        class="header-profile-dropdown-account-item-amount-number">7,500,000</span>
                                                    تومان
                                                </span>
                                            </span>
                                        </span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    پروفایل
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    پیگیری سفارش
                                </a>
                            </li>
                        @endauth
                        @guest()
                            <li>
                                <a href="{{route('login')}}" class="dropdown--btn-primary">وارد شوید</a>
                            </li>
                            <li>
                                <span>کاربر جدید هستید؟</span>
                                <a href="{{route('register')}}" class="border-bottom-dt">ثبت نام</a>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </div>

        {{--    menu    --}}
        <nav class="nav-wrapper">
            <ul>
                <li class="category-list">
                    <a href="#"><i class="fal fa-bars"></i>دسته بندی کالاها</a>
                    <ul>
                        @foreach($this->categories as $category)
                            <li>
                                <a href="#">{{$category->name}}</a>
                                <ul class="row">
                                    @foreach($category->childCategory as $child)
                                        <li class="col-3">
                                            <a href="#">{{$child->name}}</a>
                                            {{--                                        <ul>--}}
                                            {{--                                            <li><a href="#">کیف و کاور گوشی</a></li>--}}
                                            {{--                                            <li><a href="#">پاور بانک (شارژر همراه)</a></li>--}}
                                            {{--                                            <li><a href="#">پایه نگهدارنده گوشی</a></li>--}}
                                            {{--                                        </ul>--}}
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach


                        <li>
                            <a href="#">رزرو</a>
                            <ul class="row">
                                <li class="col-12">
                                    <a href="#">همه دسته بندی های خودرو، ابزار و تجهیزات صنعتی</a>
                                </li>
                                <li class="col-3">
                                    <a href="#">لوازم جانبی گوشی</a>
                                    <ul>
                                        <li><a href="#">کیف و کاور گوشی</a></li>
                                        <li><a href="#">پاور بانک (شارژر همراه)</a></li>
                                        <li><a href="#">پایه نگهدارنده گوشی</a></li>
                                    </ul>
                                    <a href="#">گوشی موبایل</a>
                                    <ul>
                                        <li><a href="#">سامسونگ</a></li>
                                    </ul>
                                    <a href="#">واقعیت مجازی</a>
                                    <a href="#">مچ‌بند و ساعت هوشمند</a>
                                </li>
                                <li class="col-3">
                                    <a href="#">دوربین</a>
                                    <ul>
                                        <li><a href="#">دوربین عکاسی دیجیتال</a></li>
                                        <li><a href="#">دوربین‌ ورزشی و فیلم برداری</a></li>
                                        <li><a href="#">دوربین‌ چاپ سریع</a></li>
                                    </ul>
                                    <a href="#">لوازم جانبی دوربین</a>
                                    <ul>
                                        <li><a href="#">لنز</a></li>
                                        <li><a href="#">کیف</a></li>
                                        <li><a href="#">کارت حافظه</a></li>
                                        <li><a href="#">کاغذ چاپ عکس</a></li>
                                    </ul>
                                    <a href="#">دوربین دوچشمی و شکاری</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fal fa-apple-crate text-warning"></i>سوپرمارکت</a>
                </li>
                <li class="mega-menu mega-menu-3-columns">
                    <a href="#"><i class="fal fa-badge-percent text-danger"></i>تخفیف ها و پیشنهادها</a>
                    <ul class="row">
                        <li class="col-7">
                            <a href="#">مشاهده همه تخفیف ها و پیشنهادها <i class="fad fa-chevron-left"></i></a>
                            <ul class="row">
                                <li class="col-6">
                                    <ul>
                                        <li><a href="#">کالاهای شگفت انگیز <i
                                                    class="fad fa-chevron-left"></i></a></li>
                                        <li><a href="#">شگفت انگیز سوپرمارکتی <i
                                                    class="fad fa-chevron-left"></i></a>
                                        </li>
                                        <li><a href="#">فروش ویژه <i class="fad fa-chevron-left"></i></a></li>
                                        <li><a href="#">کالای دیجیتال</a></li>
                                        <li><a href="#">مد و پوشاک</a></li>
                                        <li><a href="#">زیبایی و سلامت</a></li>
                                        <li><a href="#">خانه و آشپزخانه</a></li>
                                        <li><a href="#">ورزش و سفر</a></li>
                                        <li><a href="#">خوردنی و آشامیدنی</a></li>
                                    </ul>
                                </li>
                                <li class="col-6">
                                    <ul>
                                        <li><a href="#" class="text-sm text-muted"><i
                                                    class="fad fa-chart-line"></i>
                                                پرفروش ترین کالاها</a></li>
                                        <li><a href="#" class="text-sm text-muted"><i class="fad fa-gift"></i>
                                                با هر
                                                خرید هدیه بگیرید!</a></li>
                                        <li><a href="#" class="text-sm text-muted"><i
                                                    class="fad fa-badge-percent"></i>
                                                تخفیف پایان فصل</a></li>
                                        <li><a href="#" class="text-sm text-muted"><i
                                                    class="fad fa-gift-card"></i> کارت
                                                هدیه خرید از همتا</a></li>
                                        <li><a href="#" class="text-sm text-muted"><i
                                                    class="fad fa-box-alt"></i> تازه
                                                های فروشنده های جدید</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="col-5">
                            <a href="#">
                                <img src="{{url('frontend/images/mega-menu/amazing-offer.jpg')}}" class="rounded"
                                     alt="amazing-offer">
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fal fa-shield-check text-success"></i>کدیاد من</a>
                </li>
                <li>
                    <a href="#"><i></i>سوال دارید؟</a>
                </li>
            </ul>
        </nav>
    </div>
</header>
