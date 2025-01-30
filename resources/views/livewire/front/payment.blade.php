<main class="page-content">
    <div class="container">
        <div class="row mb-4">
            @if($Status==="OK")
                <div class="col-xl-9 col-lg-8 col-md-8 mb-md-0 mb-3">
                    <div class="checkout-section shadow-around">
                        <div class="checkout-step">
                            <ul>
                                <li class="active">
                                    <a href="#"><span>سبد خرید</span></a>
                                </li>
                                <li class="active">
                                    <span>نحوه ارسال و پرداخت</span>
                                </li>
                                <li class="active">
                                    <span>اتمام خرید و ارسال</span>
                                </li>
                            </ul>
                        </div>
                        <div class="checkout-message">
                            <div class="checkout-message-success mb-3">
                                <div class="icon-message success-icon">
                                    <i class="fas fa-check"></i>
                                </div>
                                سفارش <span class="order-code">{{$order->order_code}}</span>
                                پرداخت انجام شد
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-4">
                    <div class="shadow-around pt-3">
                        <div class="d-flex justify-content-between px-3 py-2">
                            <span class="text-muted">نام تحویل گیرنده:</span>
                            <span class="text-muted">
                                    {{$order->address->name}}
                                </span>
                        </div>
                        <div class="d-flex justify-content-between px-3 py-2">
                            <span class="text-muted">شماره تماس :</span>
                            <span class="text-danger">
                                    {{$order->address->mobile}}
                                </span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between px-3 py-2">
                            <span class="font-weight-bold">مبلغ کل:</span>
                            <span class="font-weight-bold">
                                    {{$order->total_price - $order->total_discount}}
                                    <span class="text-sm">تومان</span>
                                </span>
                        </div>
                        <hr>
                        <div class="px-3 py-2">
                            <span class="text-muted d-block">آدرس :</span>
                            <span class="text-info">
                                    {{$order->address->address}}
                                </span>
                        </div>
                        <div class="px-3 py-4">
                            <a href="#"
                               class="d-flex align-items-center justify-content-center px-4 py-2 btn btn-primary">پیگیری
                                سفارش <i class="fad fa-clipboard-list mr-3"></i></a>
                        </div>
                    </div>
                </div>
            @else
                <div class="col-xl-9 col-lg-8 col-md-8 mb-md-0 mb-3">
                    <div class="checkout-section shadow-around">
                        <div class="checkout-step">
                            <ul>
                                <li class="active">
                                    <a href="#"><span>سبد خرید</span></a>
                                </li>
                                <li class="active">
                                    <span>نحوه ارسال و پرداخت</span>
                                </li>
                                <li class="active">
                                    <span>اتمام خرید و ارسال</span>
                                </li>
                            </ul>
                        </div>
                        <div class="checkout-message">
                            <div class="checkout-message-danger mb-3">
                                <div class="icon-message danger-icon">
                                    <i class="fas fa-check"></i>
                                </div>
                                سفارش <span class="order-code">{{$order->order_code}}</span>
                                پرداخت انجام نشد
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-4">
                    <div class="shadow-around pt-3">
                        <div class="d-flex justify-content-between px-3 py-2">
                            <span class="text-muted">نام تحویل گیرنده:</span>
                            <span class="text-muted">
                                    {{$order->address->name}}
                                </span>
                        </div>
                        <div class="d-flex justify-content-between px-3 py-2">
                            <span class="text-muted">شماره تماس :</span>
                            <span class="text-danger">
                                    {{$order->address->mobile}}
                                </span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between px-3 py-2">
                            <span class="font-weight-bold">مبلغ کل:</span>
                            <span class="font-weight-bold">
                                    {{$order->total_price - $order->total_discount}}
                                    <span class="text-sm">تومان</span>
                                </span>
                        </div>
                        <hr>
                        <div class="px-3 py-2">
                            <span class="text-muted d-block">آدرس :</span>
                            <span class="text-info">
                                    {{$order->address->address}}
                                </span>
                        </div>
                        <div class="px-3 py-4">
                            <a href="#"
                               class="d-flex align-items-center justify-content-center px-4 py-2 btn btn-primary">پیگیری
                                سفارش <i class="fad fa-clipboard-list mr-3"></i></a>
                        </div>
                    </div>
                </div>
            @endif

        </div>
        <section class="product-carousel">
            <div class="section-title">
                <i class="fad fa-retweet"></i>
                محصولات مرتبط
            </div>
            <div class="swiper-container slider-lg pb-0">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="product-box">
                            <div class="product-box--thumbnail-container">
                                <span class="product-box--specialSell"></span>
                                <img src="./assets/images/products/05.jpg" class="product-box--thumbnail"
                                     alt="product title">
                                <a href="#" class="product-box--link"></a>
                            </div>
                            <div class="product-box--detail">
                                <h3 class="product-box--title"><a href="#">گوشی موبایل آنر مدل 50 Lite دو سیم
                                        کارت ظرفیت 128گیگابایت و رم 6 گیگابایت</a></h3>
                                <div class="product-box--price-container">
                                    <div class="product-box--price-discount">5%</div>
                                    <div class="product-box--price">
                                                <span class="product-box--price-now">
                                                    <div class="product-box--price-value">5,145,000</div>
                                                    <div class="product-box--price-currency">تومان</div>
                                                </span>
                                        <span class="product-box--price-old">5,399,000</span>
                                    </div>
                                </div>
                                <div class="product-box--action">
                                    <a href="#" class="product-box--action-btn product-box--action-wishlist"><i
                                            class="fas fa-heart"></i></a>
                                    <a href="#" class="product-box--action-btn product-box--action-cart">اضافه
                                        سبد</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="product-box">
                            <div class="product-box--thumbnail-container">
                                <span class="product-box--specialSell"></span>
                                <img src="./assets/images/products/06.jpg" class="product-box--thumbnail"
                                     alt="product title">
                                <a href="#" class="product-box--link"></a>
                            </div>
                            <div class="product-box--detail">
                                <h3 class="product-box--title"><a href="#">گوشی موبایل هوآوی مدل nova Y70 دو
                                        سیم‌ کارت ظرفیت 128 گیگابایت و رم 4 گیگابایت</a></h3>
                                <div class="product-box--price-container">
                                    <div class="product-box--price-discount">6%</div>
                                    <div class="product-box--price">
                                                <span class="product-box--price-now">
                                                    <div class="product-box--price-value">3,949,000</div>
                                                    <div class="product-box--price-currency">تومان</div>
                                                </span>
                                        <span class="product-box--price-old">4,210,000</span>
                                    </div>
                                </div>
                                <div class="product-box--action">
                                    <a href="#" class="product-box--action-btn product-box--action-wishlist"><i
                                            class="fas fa-heart"></i></a>
                                    <a href="#" class="product-box--action-btn product-box--action-cart">اضافه
                                        سبد</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="product-box">
                            <div class="product-box--thumbnail-container">
                                <span class="product-box--specialSell"></span>
                                <img src="./assets/images/products/07.jpg" class="product-box--thumbnail"
                                     alt="product title">
                                <a href="#" class="product-box--link"></a>
                            </div>
                            <div class="product-box--detail">
                                <h3 class="product-box--title"><a href="#">گوشی موبایل جی پلاس مدل Q20 دو سیم
                                        کارت ظرفیت 64 گیگابایت و رم 4 گیگابایت</a></h3>
                                <div class="product-box--price-container">
                                    <div class="product-box--price-discount">3%</div>
                                    <div class="product-box--price">
                                                <span class="product-box--price-now">
                                                    <div class="product-box--price-value">3,299,000</div>
                                                    <div class="product-box--price-currency">تومان</div>
                                                </span>
                                        <span class="product-box--price-old">3,399,000</span>
                                    </div>
                                </div>
                                <div class="product-box--action">
                                    <a href="#" class="product-box--action-btn product-box--action-wishlist"><i
                                            class="fas fa-heart"></i></a>
                                    <a href="#" class="product-box--action-btn product-box--action-cart">اضافه
                                        سبد</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="product-box">
                            <div class="product-box--thumbnail-container">
                                <span class="product-box--specialSell"></span>
                                <img src="./assets/images/products/08.jpg" class="product-box--thumbnail"
                                     alt="product title">
                                <a href="#" class="product-box--link"></a>
                            </div>
                            <div class="product-box--detail">
                                <h3 class="product-box--title"><a href="#">گوشی موبایل شیائومی مدل Redmi Note
                                        11S 2201117SG دو سیم کارت ظرفیت 128 گیگابایت و رم 6 گیگابایت</a></h3>
                                <div class="product-box--price-container">
                                    <div class="product-box--price-discount">2%</div>
                                    <div class="product-box--price">
                                                <span class="product-box--price-now">
                                                    <div class="product-box--price-value">6,599,000</div>
                                                    <div class="product-box--price-currency">تومان</div>
                                                </span>
                                        <span class="product-box--price-old">6,735,000</span>
                                    </div>
                                </div>
                                <div class="product-box--action">
                                    <a href="#" class="product-box--action-btn product-box--action-wishlist"><i
                                            class="fas fa-heart"></i></a>
                                    <a href="#" class="product-box--action-btn product-box--action-cart">اضافه
                                        سبد</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="product-box">
                            <div class="product-box--thumbnail-container">
                                <span class="product-box--specialSell"></span>
                                <img src="./assets/images/products/01.jpg" class="product-box--thumbnail"
                                     alt="product title">
                                <a href="#" class="product-box--link"></a>
                            </div>
                            <div class="product-box--detail">
                                <h3 class="product-box--title"><a href="#">گوشی موبایل هوآوی مدل nova 9 NAM-LX9
                                        دو سیم کارت ظرفیت 128گیگابایت و 8 گیگابایت رم</a></h3>
                                <div class="product-box--price-container">
                                    <div class="product-box--price-discount">6%</div>
                                    <div class="product-box--price">
                                                <span class="product-box--price-now">
                                                    <div class="product-box--price-value">10,359,000</div>
                                                    <div class="product-box--price-currency">تومان</div>
                                                </span>
                                        <span class="product-box--price-old">10,990,000</span>
                                    </div>
                                </div>
                                <div class="product-box--action">
                                    <a href="#" class="product-box--action-btn product-box--action-wishlist"><i
                                            class="fas fa-heart"></i></a>
                                    <a href="#" class="product-box--action-btn product-box--action-cart">اضافه
                                        سبد</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="product-box">
                            <div class="product-box--thumbnail-container">
                                <span class="product-box--specialSell"></span>
                                <img src="./assets/images/products/02.jpg" class="product-box--thumbnail"
                                     alt="product title">
                                <a href="#" class="product-box--link"></a>
                            </div>
                            <div class="product-box--detail">
                                <h3 class="product-box--title"><a href="#">گوشی موبایل نوکیا مدل 2017 3310 FA دو
                                        سیم کارت ظرفیت 16 مگابایت</a></h3>
                                <div class="product-box--price-container">
                                    <div class="product-box--price-discount">8%</div>
                                    <div class="product-box--price">
                                                <span class="product-box--price-now">
                                                    <div class="product-box--price-value">1,620,000</div>
                                                    <div class="product-box--price-currency">تومان</div>
                                                </span>
                                        <span class="product-box--price-old">1,766,000</span>
                                    </div>
                                </div>
                                <div class="product-box--action">
                                    <a href="#" class="product-box--action-btn product-box--action-wishlist"><i
                                            class="fas fa-heart"></i></a>
                                    <a href="#" class="product-box--action-btn product-box--action-cart">اضافه
                                        سبد</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="product-box">
                            <div class="product-box--thumbnail-container">
                                <span class="product-box--specialSell"></span>
                                <img src="./assets/images/products/03.jpg" class="product-box--thumbnail"
                                     alt="product title">
                                <a href="#" class="product-box--link"></a>
                            </div>
                            <div class="product-box--detail">
                                <h3 class="product-box--title"><a href="#">گوشی موبایل آنر مدل X9 5G دو سیم کارت
                                        ظرفیت 256 گیگابایت و رم 8 گیگابایت</a></h3>
                                <div class="product-box--price-container">
                                    <div class="product-box--price-discount">5%</div>
                                    <div class="product-box--price">
                                                <span class="product-box--price-now">
                                                    <div class="product-box--price-value">7,959,000</div>
                                                    <div class="product-box--price-currency">تومان</div>
                                                </span>
                                        <span class="product-box--price-old">8,399,000</span>
                                    </div>
                                </div>
                                <div class="product-box--action">
                                    <a href="#" class="product-box--action-btn product-box--action-wishlist"><i
                                            class="fas fa-heart"></i></a>
                                    <a href="#" class="product-box--action-btn product-box--action-cart">اضافه
                                        سبد</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="product-box">
                            <div class="product-box--thumbnail-container">
                                <span class="product-box--specialSell"></span>
                                <img src="./assets/images/products/04.jpg" class="product-box--thumbnail"
                                     alt="product title">
                                <a href="#" class="product-box--link"></a>
                            </div>
                            <div class="product-box--detail">
                                <h3 class="product-box--title"><a href="#">گوشی موبایل موتورولا مدل MOTO E40
                                        XT2159-3 دو سیم کارت ظرفیت 64 گیگابایت و رم 4 گیگابای</a></h3>
                                <div class="product-box--price-container">
                                    <div class="product-box--price-discount">3%</div>
                                    <div class="product-box--price">
                                                <span class="product-box--price-now">
                                                    <div class="product-box--price-value">3,689,000</div>
                                                    <div class="product-box--price-currency">تومان</div>
                                                </span>
                                        <span class="product-box--price-old">3,799,000</span>
                                    </div>
                                </div>
                                <div class="product-box--action">
                                    <a href="#" class="product-box--action-btn product-box--action-wishlist"><i
                                            class="fas fa-heart"></i></a>
                                    <a href="#" class="product-box--action-btn product-box--action-cart">اضافه
                                        سبد</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Add Arrows -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </section>
    </div>
</main>
