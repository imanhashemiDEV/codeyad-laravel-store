<div class="grid grid-cols-1 gap-6 p-4">
    <div class="panel p-5">
        @include('admin.layouts.alert')
        @include('admin.layouts.waiting')
        <div class="mb-5">
            <h1 class="my-4 text-xl font-semibold">ایجاد  تنوع قیمت</h1>
            <form  class="space-y-5">
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div>
                        <label for="price">قیمت</label>
                        <input wire:model="main_price" id="price" type="text" class="form-input">
                        @error('main_price')
                        <p class="text-danger mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="discount">درصد تخفیف</label>
                        <input wire:model="discount" id="discount" type="text" class="form-input">
                        @error('discount')
                        <p class="text-danger mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="count">تعداد</label>
                        <input wire:model="count" id="count" type="text" class="form-input">
                        @error('count')
                        <p class="text-danger mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="max_sell">حداکثر فروش</label>
                        <input wire:model="max_sell" id="max_sell" type="text" class="form-input">
                        @error('max_sell')
                        <p class="text-danger mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div wire:ignore>
                        <label for="category_id">رنگ</label>
                        <select  wire:model="color_id" id="color-select">
                            <option>انتخاب کنید</option>
                            @foreach($colors as $key=>$value)
                                <option value="{{$key}}">{{$value}}</option>
                            @endforeach
                        </select>
                        @error('color_id')
                        <p class="text-danger mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div wire:ignore>
                        <label for="guaranty_id">گارانتی</label>
                        <select  wire:model="guaranty_id" id="guaranty-select">
                            <option>انتخاب کنید</option>
                            @foreach($guaranties as $key=>$value)
                                <option value="{{$key}}">{{$value}}</option>
                            @endforeach
                        </select>
                        @error('guaranty_id')
                        <p class="text-danger mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div>
                        <button wire:click.prevent="createRow" class="btn btn-success !mt-6">ثبت</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
@assets
<link rel="stylesheet" type="text/css" href="{{url('panel/css/nice-select2.css')}}" />
<script src="{{url('panel/js/nice-select2.js')}}"></script>
@endassets
@script
<script>

    let els = document.querySelectorAll('.selectize');
    els.forEach(function (select) {
        NiceSelect.bind(select);
    });

    let options = {
        searchable: true,
    };
    NiceSelect.bind(document.getElementById('color-select'), options);
    NiceSelect.bind(document.getElementById('guaranty-select'), options);

    Livewire.on('error', (event) => {
        Swal.fire("برای این محصول با این رنگ و گارانتی یک رکورد ثبت شده است");
    });

</script>
@endscript







