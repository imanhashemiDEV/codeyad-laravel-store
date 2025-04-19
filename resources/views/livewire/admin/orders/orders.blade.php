<div class="grid grid-cols-1 gap-6 p-4">
    <div class="panel p-5">
        <div class="mb-5">

            <div class="flex flex-1 mb-4">
                <div class="flex items-center justify-center border border-[#e0e6ed] bg-[#eee] px-3 font-semibold ltr:rounded-l-md ltr:border-r-0 rtl:rounded-r-md rtl:border-l-0 dark:border-[#17263c] dark:bg-[#1b2e4b]">
                    جستجو
                </div>
                <input wire:model="search" @keyup.enter="$wire.searchData" type="text" class="form-input ltr:rounded-l-none rtl:rounded-r-none">
            </div>

            @include('admin.layouts.alert')
            @include('admin.layouts.waiting')

            <div class="table-responsive">
                <table>
                    <thead>
                    <tr>
                        <th class="text-center">ردیف</th>
                        <th class="text-center">نام کاربر</th>
                        <th class="text-center">کد سفارش</th>
                        <th class="text-center"> قیمت کل</th>
                        <th class="text-center">تخفیف </th>
                        <th class="text-center">تاریخ ایجاد</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($this->orders as $index => $order)
                        <tr>
                            <td>{{$this->orders->firstItem() + $index }}</td>
                            <td class="whitespace-nowrap">{{$order->user->name}}</td>
                            <td class="whitespace-nowrap">{{$order->order_code}}</td>
                            <td class="whitespace-nowrap">{{$order->total_price}}</td>
                            <td class="whitespace-nowrap">{{$order->total_discount}}</td>
                            <td class="whitespace-nowrap">{{ \Hekmatinasser\Verta\Verta::instance($order->created_at)->formatJalaliDate()}}</td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="flex flex-col justify-center w-full">
            {{$this->orders->links('admin.layouts.admin_pagination')}}
        </div>
    </div>
</div>










