<main class="page-content" wire:ignore.self>
    <div class="container">
        <div class="row mb-4">
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
                            <li>
                                <span>اتمام خرید و ارسال</span>
                            </li>
                        </ul>
                    </div>
                    <div class="checkout-section-content">
                        <div class="checkout-section-title">آدرس تحویل سفارش</div>
                        <div class="row mx-0">
                            @foreach($addresses as $user_address)
                                <div class="col-xl-3 col-lg-4 col-sm-6 mb-3">
                                    <div class="custom-control custom-radio">
                                        <input wire:model="selected_address" value="{{$user_address->id}}" type="radio" id="customRadio{{$user_address->id}}" name="customRadio"
                                               class="custom-control-input">
                                        <label class="custom-control-label address-select" for="customRadio{{$user_address->id}}">
                                            <span class="head-address-select">به این آدرس ارسال شود</span>
                                            <span>{{$user_address->address}}</span>
                                            <span>
                                                    <i class="fa fa-user"></i>
                                                    {{$user_address->name}}
                                                </span>
                                            <a href="#" class="link--with-border-bottom edit-address-btn"
                                               data-toggle="modal" data-target="#editAddressModal">
                                                ویرایش
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                            <div class="col-xl-3 col-lg-4 col-sm-6 mb-3">
                                <div class="custom-control custom-radio">
                                    <button class="add-address" data-toggle="modal"
                                            data-target="#addAddressModal">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="checkout-section-title">شیوه پرداخت</div>
                        <div class="payment-selection">
                            <div class="custom-control custom-radio custom-control-inline mb-3">
                                <input wire:model="payment_type" value="internet" type="radio" id="paymentSelection1" name="paymentSelection"
                                       class="custom-control-input" checked>
                                <label class="custom-control-label payment-select" for="paymentSelection1">
                                            <span class="d-flex align-items-center">
                                                <i class="fad fa-credit-card"></i>
                                                <span>
                                                    <span class="title">پرداخت اینترنتی</span>
                                                    <span class="subtitle">آنلاین با تمامی کارت‌های بانکی</span>
                                                </span>
                                            </span>
                                </label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-3">
                                <input wire:model="payment_type" value="cash" type="radio" id="paymentSelection2" name="paymentSelection"
                                       class="custom-control-input">
                                <label class="custom-control-label payment-select" for="paymentSelection2">
                                            <span class="d-flex align-items-center">
                                                <i class="fad fa-map-marker-alt"></i>
                                                <span>
                                                    <span class="title">پرداخت در محل</span>
                                                    <span class="subtitle">پرداخت درب منزل</span>
                                                </span>
                                            </span>
                                </label>
                            </div>
                        </div>
                        <hr>
                        <div class="row mx-0">
                            <div class="col-md-6">
                                <div class="checkout-section-title">کد تخفیف</div>
                                <form action="#">
                                    <div class="d-flex align-items-center">
                                        <div class="form-element-row flex-grow-1">
                                            <input type="text" class="input-element" id="phone-number"
                                                   placeholder="کد تخفیف را وارد کنید">
                                        </div>
                                        <div class="form-element-row mr-3">
                                            <button class="btn-element btn-info-element">
                                                <i class="fad fa-sync"></i>
                                                ثبت
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-section-title">کارت هدیه</div>
                                <form action="#">
                                    <div class="d-flex align-items-center">
                                        <div class="form-element-row flex-grow-1">
                                            <input type="text" class="input-element" id="phone-number"
                                                   placeholder="کد مربوط به کارت هدیه را وارد کنید">
                                        </div>
                                        <div class="form-element-row mr-3">
                                            <button class="btn-element btn-info-element">
                                                <i class="fad fa-sync"></i>
                                                ثبت
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
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
                        <a href="{{route('shipping')}}" class="btn btn-danger btn-block py-2">پرداخت نهایی</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="addAddressModal" tabindex="-1" aria-labelledby="addAddressModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addAddressModalLabel">آدرس جدید</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="#">
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <div class="text-sm text-muted mb-1">نام و نام خانوادگی:</div>
                                <div class="text-dark font-weight-bold">
                                    <div class="form-element-row mb-0">
                                        <input wire:model="name" type="text" class="input-element" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div class="text-sm text-muted mb-1">شماره موبایل:</div>
                                <div class="text-dark font-weight-bold">
                                    <div class="form-element-row mb-0">
                                        <input wire:model="mobile" type="text" class="input-element dir-ltr" value="09*********">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div class="text-sm text-muted mb-1">استان:</div>
                                <div class="text-dark font-weight-bold">
                                    <div class="form-element-row mb-0">
                                        <select wire:model="province_id" wire:change="changeProvince($event.target.value)" class="form-control">
                                            <option value="0">انتخاب استان</option>
                                            @foreach($provinces as $key=>$value)
                                                <option value="{{$key}}">{{$value}}</option>
                                            @endforeach
                                        </select>
                                        @error('province_id')
                                            <p class="alert alert-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div class="text-sm text-muted mb-1">شهر:</div>
                                <div class="text-dark font-weight-bold">
                                    <div class="form-element-row mb-0">
                                        <select  wire:model="city_id" class="form-control">
                                            <option value="0">انتخاب شهر</option>
                                            @foreach($cities as $key=>$value)
                                                <option value="{{$key}}">{{$value}}</option>
                                            @endforeach
                                        </select>
                                        @error('city_id')
                                        <p class="alert alert-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div class="text-sm text-muted mb-1">آدرس کامل:</div>
                                <div class="text-dark font-weight-bold">
                                    <div class="form-element-row mb-0">
                                            <textarea wire:model="address" name="address" id="address" cols="30" rows="10"
                                                      class="input-element"></textarea>
                                    </div>
                                    @error('address')
                                    <p class="alert alert-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" wire:click="createAddress" class="btn btn-primary">ذخیره تغییرات <i
                            class="fad fa-money-check-edit"></i></button>
                </div>
            </div>
        </div>
    </div>
</main>

@script
<script>
    $wire.on('close-modal', () => {
       $("#addAddressModal").modal('toggle');
    });
</script>

@endscript
