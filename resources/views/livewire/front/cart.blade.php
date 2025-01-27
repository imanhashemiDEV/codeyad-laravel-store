<main class="page-content">
    <div class="container">
        <div class="row mb-4">
            <div class="col-xl-9 col-lg-8 col-md-8 mb-md-0 mb-3">
                <div class="checkout-section shadow-around">
                    <div class="checkout-step">
                        <ul>
                            <li class="active"><span>سبد خرید</span></li>
                            <li>
                                <span>نحوه ارسال و پرداخت</span>
                            </li>
                            <li>
                                <span>اتمام خرید و ارسال</span>
                            </li>
                        </ul>
                    </div>
                    <div class="checkout-section-content">
                        <div class="cart-items p-3">
                            @foreach($carts as $cart)
                                <div class="cart-item py-4 px-3">
                                    <div class="item-thumbnail">
                                        <a href="#">
                                            <img src="{{url('images/products/'. $cart->product->image)}}" alt="item">
                                        </a>
                                    </div>
                                    <div class="item-info flex-grow-1">
                                        <div class="item-title">
                                            <h2>
                                                <a href="{{route('single.product',$cart->product->id)}}">
                                                     {{$cart->product->name}}</a>
                                            </h2>
                                        </div>
                                        <div class="item-detail">
                                            <ul>
                                                <li>
                                                    <span class="color" style="background-color: {{$cart->color->code}};"></span>
                                                    <span>{{$cart->color->name}}</span>
                                                </li>
                                                <li>
                                                    <i class="far fa-shield-check text-muted"></i>
                                                    <span>{{$cart->guaranty->name}}</span>
                                                </li>
                                                <li>
                                                    <i class="far fa-clipboard-check text-primary"></i>
                                                    <span>موجود در انبار</span>
                                                </li>
                                            </ul>
                                            <div class="item-quantity--item-price">
                                                <div class="item-quantity">
                                                    <div class="num-block">
                                                        <div class="num-in">
                                                            <span class="plus"></span>
                                                            <input type="text" value="{{$cart->count}}" readonly>
                                                            <span class="minus dis"></span>
                                                        </div>
                                                    </div>
                                                    <button class="item-remove-btn mr-3">
                                                        <i class="far fa-trash-alt"></i>
                                                        حذف
                                                    </button>
                                                </div>
                                                <div>
                                                    @php
                                                        $selected_product = $cart->product->productPrices->where('color_id', $cart->color_id)->where('guaranty_id',$cart->guaranty_id)->first();
                                                        $discount_price = $selected_product->price - (($selected_product->price * $selected_product->discount)/100);
                                                    @endphp
                                                    @if($selected_product->discount)
                                                        <div>
                                                            <span class="text-success">{{$selected_product->discount}}% تخفیف</span>
                                                            <div style="text-decoration: line-through; font-size: 15px; color: red;">
                                                                {{$cart->product->productPrices->where('color_id', $cart->color_id)->where('guaranty_id',$cart->guaranty_id)->first()->price}}<span class="text-sm mr-1">تومان</span>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    <div class="item-price">
                                                        {{$discount_price}}<span class="text-sm mr-1">تومان</span>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-4">
                <div class="shadow-around pt-3">
                    <div class="d-flex justify-content-between px-3 py-2">
                        <span class="text-muted">قیمت کالاها ({{count($carts)}})</span>
                        <span class="text-muted">
                                    {{$total_price}}
                                    <span class="text-sm">تومان</span>
                                </span>
                    </div>
                    @if($total_discount)
                        <div class="d-flex justify-content-between px-3 py-2">
                            <span class="text-muted">تخفیف کالاها</span>
                            <span class="text-danger">
                                    {{$total_discount}}
                                    <span class="text-sm">تومان</span>
                                </span>
                        </div>
                    @endif
                    <hr>
                    <div class="d-flex justify-content-between px-3 py-2">
                        <span class="font-weight-bold">مبلغ قابل پرداخت</span>
                        <span class="font-weight-bold">
                                    {{$total_price - $total_discount}}
                                    <span class="text-sm">تومان</span>
                                </span>
                    </div>
                    <hr>
                    <div class="d-flex px-3 py-4">
                        <a href="#" class="btn btn-danger btn-block py-2">ادامه فرایند خرید</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
