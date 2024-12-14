<div class="grid grid-cols-1 gap-6 p-4">
    <div class="panel p-5">

        @include('admin.layouts.alert')
        @include('admin.layouts.waiting')

        <div class="mb-5">
            <h1 class="my-4 text-xl font-semibold">ایجاد نقش</h1>
            <form  class="space-y-5">
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-4">
                    <div>
                        <label for="name">نام نقش</label>
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
    </div>
    <div class="panel p-5">

        <div class="mb-5">
            <div class="flex flex-1 mb-4">
                <div class="flex items-center justify-center border border-[#e0e6ed] bg-[#eee] px-3 font-semibold ltr:rounded-l-md ltr:border-r-0 rtl:rounded-r-md rtl:border-l-0 dark:border-[#17263c] dark:bg-[#1b2e4b]">
                    جستجو
                </div>
                <input wire:model="search" @keyup.enter="$wire.searchData" type="text" class="form-input ltr:rounded-l-none rtl:rounded-r-none">
            </div>

            <div class="table-responsive">
                <table>
                    <thead>
                    <tr>
                        <th class="text-center">ردیف</th>
                        <th class="text-center">نام نقش</th>
                        <th class="text-center">تاریخ ایجاد</th>
                        <th class="text-center">عملیات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($this->roles as $index => $role)
                        <tr>
                            <td>{{$this->roles->firstItem() + $index }}</td>
                            <td class="whitespace-nowrap">{{$role->name}}</td>
                            <td class="whitespace-nowrap">{{ \Hekmatinasser\Verta\Verta::instance($role->created_at)->formatJalaliDate()}}</td>
                            <td class="border-b border-[#ebedf2] p-3 text-center dark:border-[#191e3a]">
                                <button wire:click="editRow({{$role->id}})" type="button" x-tooltip="ویرایش">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                         xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5 ltr:mr-2 rtl:ml-2 text-blue-500">
                                        <path
                                            d="M15.2869 3.15178L14.3601 4.07866L5.83882 12.5999L5.83881 12.5999C5.26166 13.1771 4.97308 13.4656 4.7249 13.7838C4.43213 14.1592 4.18114 14.5653 3.97634 14.995C3.80273 15.3593 3.67368 15.7465 3.41556 16.5208L2.32181 19.8021L2.05445 20.6042C1.92743 20.9852 2.0266 21.4053 2.31063 21.6894C2.59466 21.9734 3.01478 22.0726 3.39584 21.9456L4.19792 21.6782L7.47918 20.5844L7.47919 20.5844C8.25353 20.3263 8.6407 20.1973 9.00498 20.0237C9.43469 19.8189 9.84082 19.5679 10.2162 19.2751C10.5344 19.0269 10.8229 18.7383 11.4001 18.1612L11.4001 18.1612L19.9213 9.63993L20.8482 8.71306C22.3839 7.17735 22.3839 4.68748 20.8482 3.15178C19.3125 1.61607 16.8226 1.61607 15.2869 3.15178Z"
                                            stroke="currentColor" stroke-width="1.5"></path>
                                        <path opacity="0.5"
                                              d="M14.36 4.07812C14.36 4.07812 14.4759 6.04774 16.2138 7.78564C17.9517 9.52354 19.9213 9.6394 19.9213 9.6394M4.19789 21.6777L2.32178 19.8015"
                                              stroke="currentColor" stroke-width="1.5"></path>
                                    </svg>
                                </button>
                                <button wire:click="$dispatch('delete-role', { role_id : {{$role->id}} })" type="button" x-tooltip="حذف">
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
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="flex flex-col justify-center w-full">
            {{$this->roles->links('admin.layouts.admin_pagination')}}
        </div>
    </div>
</div>
@script
<script>
    Livewire.on('delete-role',(event)=>{
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
                Livewire.dispatch('destroy-role',{ role_id : event.role_id})
                Swal.fire({
                    title: "حذف انجام شد",
                    icon: "success"
                });
            }
        });
    })
</script>
@endscript










