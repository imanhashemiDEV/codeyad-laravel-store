<div class="grid grid-cols-1 gap-6 p-4">
    <div class="panel p-5">

        @include('admin.layouts.alert')
        @include('admin.layouts.waiting')

        <div class="mb-5">
            <h1 class="m-4 text-xl font-semibold">ایجاد کاربر</h1>
            <form  class="space-y-5">
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div>
                        <label for="name">نام و نام خانوادگی</label>
                        <input wire:model="name" id="name" type="text" class="form-input">
                        @error('name')
                        <p class="text-danger mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="email">ایمیل</label>
                        <input wire:model="email" id="email" type="text" class="form-input">
                        @error('email')
                        <p class="text-danger mt-1">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div>
                        <label for="mobile">موبایل</label>
                        <input wire:model="mobile" id="mobile" type="text" class="form-input">
                        @error('mobile')
                        <p class="text-danger mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="password">رمز عبور</label>
                        <input wire:model="password" id="password" type="Password" class="form-input" autocomplete="false">
                        @error('password')
                        <p class="text-danger mt-1">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                      @if($editIndex)
                    <button wire:click.prevent="updateRow" class="btn btn-primary !mt-6">ویرایش</button>
                      @else
                    <button wire:click.prevent="createRow" class="btn btn-success !mt-6">ثبت</button>
                      @endif
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
                        <th class="text-center">نام و نام خانوادگی</th>
                        <th class="text-center">ایمیل</th>
                        <th class="text-center">موبایل</th>
                        <th class="text-center">عملیات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($this->users as $index => $user)
                        <tr>
                            <td>{{$this->users->firstItem() + $index }}</td>
                            <td class="whitespace-nowrap">{{$user->name}}</td>
                            <td class="whitespace-nowrap">{{$user->email}}</td>
                            <td class="whitespace-nowrap">{{$user->mobile}}</td>
                            <td class="border-b border-[#ebedf2] p-3 text-center dark:border-[#191e3a]">
                                <button wire:click="editRow({{$user->id}})" type="button" x-tooltip="Edit">
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
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="flex flex-col justify-center w-full">
            {{$this->users->links('admin.layouts.admin_pagination')}}
        </div>
    </div>
</div>







