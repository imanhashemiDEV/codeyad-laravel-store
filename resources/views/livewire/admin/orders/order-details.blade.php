<div class="grid grid-cols-1 gap-6 p-4 h-full">
    @include('admin.layouts.waiting')
    <div class="panel p-5">
        <div class="mb-5">
            <div class="table-responsive">
                <table>
                    <thead>
                    <tr>
                        <th class="text-center">ردیف</th>
                        <th class="text-center">نام محصول</th>
                        <th class="text-center">نام گارانتی</th>
                        <th class="text-center">رنگ</th>
                        <th class="text-center">قیمت اصلی</th>
                        <th class="text-center">قیمت</th>
                        <th class="text-center">تخفیف </th>
                        <th class="text-center">تعداد </th>
                        <th class="text-center">وضعیت</th>
                        <th class="text-center">تاریخ ایجاد</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($order_details as $index => $order)
                        <tr>
                            <td>{{$order_details->firstItem() + $index }}</td>
                            <td class="whitespace-nowrap">{{$order->product->name}}</td>
                            <td class="whitespace-nowrap">{{$order->guaranty?->name}}</td>
                            <td class="whitespace-nowrap">{{$order->color?->name}}</td>
                            <td class="whitespace-nowrap">{{$order->main_price}}</td>
                            <td class="whitespace-nowrap">{{$order->price}}</td>
                            <td class="whitespace-nowrap">{{$order->discount}}</td>
                            <td class="whitespace-nowrap">{{$order->count}}</td>
                            <td class="whitespace-nowrap cursor-pointer" wire:click="changeStatus('{{$order->status}}',{{$order->id}})">
                                @if($order->status === \App\Enums\OrderDetailStatus::Received->value)
                                   <span class="badge bg-success">دریافت شد</span>
                                @elseif($order->status === \App\Enums\OrderDetailStatus::Rejected->value)
                                    <span class="badge bg-danger">مرجوع شد</span>
                                @elseif($order->status === \App\Enums\OrderDetailStatus::Send->value)
                                    <span class="badge bg-info">ارسال شد</span>
                                @elseif($order->status === \App\Enums\OrderDetailStatus::InProgress->value)
                                    <span class="badge bg-warning">در حال پردازش</span>
                                @endif
                            </td>
                            <td class="whitespace-nowrap">{{ \Hekmatinasser\Verta\Verta::instance($order->created_at)->formatJalaliDate()}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="flex flex-col justify-center w-full">
            {{$order_details->links('admin.layouts.admin_pagination')}}
        </div>
    </div>
</div>











