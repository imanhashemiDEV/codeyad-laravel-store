<div class="grid grid-cols-1 gap-6 p-4">
    <div class="panel p-5">

        @include('admin.layouts.alert')
        @include('admin.layouts.waiting')

        <div class="mb-5">
            <h1 class="my-4 text-xl font-semibold">ایجاد ویژگی محصول</h1>
            <form  class="space-y-5">
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-4">
                    <div>
                        <label for="email">دسته بندی ویژگی</label>
                        <select  wire:model="category_attribute_id" id="ctnSelect1" class="form-select text-white-dark">
                            <option>انتخاب کنید</option>
                            @foreach($product->category->categoryAttributes as $attribute)
                                <option value="{{$attribute->id}}">{{$attribute->name}}</option>
                            @endforeach
                        </select>
                        @error('category_attribute_id')
                        <p class="text-danger mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="name">نام ویژگی</label>
                        <input wire:model="name" id="name" type="text" class="form-input">
                        @error('name')
                        <p class="text-danger mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div>
                        @if($editIndex)
                            <button wire:click.prevent="updateRow" class="btn btn-primary !mt-6">ویرایش</button>
                        @else
                            <button wire:click.prevent="createRow" class="btn btn-success !mt-6">ثبت</button>
                        @endif
                    </div>
                </div>
            </form>
        </div>

        <div class="table-responsive">
            <table>
                <thead>
                <tr>
                    <th class="text-center">نام دسته بندی ویژگی</th>
                    <th class="text-center">نام ویژگی</th>
                </tr>
                </thead>
                <tbody>
                @foreach($this->productProperties as $property)
                    <tr>
                        <td class="whitespace-nowrap">{{$property->categoryAttribute->name}}</td>
                        <td class="whitespace-nowrap">
                            <ul>
                                @foreach($property->where('category_attribute_id',
                                         $property->categoryAttribute->id)->get() as $attribute)
                                   <li>
                                       {{$attribute->name}}
                                       <button wire:click="$dispatch('delete-property', { property_id : {{$property->id}} })" type="button" x-tooltip="حذف">
                                           <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-rose-500">
                                               <path d="M20.5001 6H3.5" stroke="currentColor" stroke-width="1.5"
                                                     stroke-linecap="round"></path>
                                               <path
                                                   d="M18.8334 8.5L18.3735 15.3991C18.1965 18.054 18.108 19.3815 17.243 20.1907C16.378 21 15.0476 21 12.3868 21H11.6134C8.9526 21 7.6222 21 6.75719 20.1907C5.89218 19.3815 5.80368 18.054 5.62669 15.3991L5.16675 8.5"
                                                   stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                               <path opacity="0.5" d="M9.5 11L10 16" stroke="currentColor" stroke-width="1.5"
                                                     stroke-linecap="round"></path>
                                               <path opacity="0.5" d="M14.5 11L14 16" stroke="currentColor" stroke-width="1.5"
                                                     stroke-linecap="round"></path>
                                               <path opacity="0.5"
                                                     d="M6.5 6C6.55588 6 6.58382 6 6.60915 5.99936C7.43259 5.97849 8.15902 5.45491 8.43922 4.68032C8.44784 4.65649 8.45667 4.62999 8.47434 4.57697L8.57143 4.28571C8.65431 4.03708 8.69575 3.91276 8.75071 3.8072C8.97001 3.38607 9.37574 3.09364 9.84461 3.01877C9.96213 3 10.0932 3 10.3553 3H13.6447C13.9068 3 14.0379 3 14.1554 3.01877C14.6243 3.09364 15.03 3.38607 15.2493 3.8072C15.3043 3.91276 15.3457 4.03708 15.4286 4.28571L15.5257 4.57697C15.5433 4.62992 15.5522 4.65651 15.5608 4.68032C15.841 5.45491 16.5674 5.97849 17.3909 5.99936C17.4162 6 17.4441 6 17.5 6"
                                                     stroke="currentColor" stroke-width="1.5"></path>
                                           </svg>
                                       </button>
                                   </li>
                                @endforeach
                            </ul>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@script
<script>
    Livewire.on('delete-property',(event)=>{
        Swal.fire({
            title: "آیا از حذف مطمئن هستید",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "بله",
            cancelButtonText: "خیر",
        }).then((result) => {
            if (result.isConfirmed){
                Livewire.dispatch('destroy-property',{ property_id : event.property_id})
                Swal.fire({
                    title: "حذف انجام شد",
                    icon: "success"
                });
            }
        });
    })
</script>
@endscript








