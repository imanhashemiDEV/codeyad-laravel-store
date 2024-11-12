<div class="grid grid-cols-1 gap-6 p-4">
    <div class="panel p-5">

        @include('admin.layouts.alert')
        @include('admin.layouts.waiting')

        <div class="mb-5">
            <h1 class="my-4 text-xl font-semibold">ایجاد محصول</h1>
            <form  class="space-y-5">
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div>
                        <label for="name">نام محصول</label>
                        <input wire:model="name" id="name" type="text" class="form-input">
                        @error('name')
                        <p class="text-danger mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="e_name">نام انگلیسی محصول</label>
                        <input wire:model="e_name" id="e_name" type="text" class="form-input">
                        @error('e_name')
                        <p class="text-danger mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="price">قیمت</label>
                        <input wire:model="price" id="price" type="text" class="form-input">
                        @error('price')
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
                    <div>
                        <label for="category_id">دسته بندی</label>
                        <select  wire:model="category_id" id="ctnSelect1" class="form-select text-white-dark">
                            <option>انتخاب کنید</option>
                            @foreach($categories as $key=>$value)
                                <option value="{{$key}}">{{$value}}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <p class="text-danger mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="brand_id">برند</label>
                        <select  wire:model="brand_id" id="ctnSelect1" class="form-select text-white-dark">
                            <option>انتخاب کنید</option>
                            @foreach($brands as $key=>$value)
                                <option value="{{$key}}">{{$value}}</option>
                            @endforeach
                        </select>
                        @error('brand_id')
                        <p class="text-danger mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="image">عکس محصول</label>
                        <input wire:model="image" id="ctnFile" type="file" class="p-0 rtl:file-ml-5 form-input file:border-0 file:bg-primary/90 file:py-2 file:px-4 file:font-semibold file:text-white file:hover:bg-primary ltr:file:mr-5" required="">
                        @error('image')
                        <p class="text-danger mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="description">توضیحات محصول</label>
                        <textarea wire:model="description" id="description" rows="3" class="form-textarea"></textarea>
                        @error('description')
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









