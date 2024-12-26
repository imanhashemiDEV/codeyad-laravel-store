@extends('auth.master')
@section('content')
    <div class="min-h-screen text-black main-container dark:text-white-dark">
        <!-- start main content section -->
        <div class="flex min-h-screen items-center justify-center bg-[url('../images/map.svg')] bg-cover bg-center dark:bg-[url('../images/map-dark.svg')]">
            <div class="panel m-6 w-full max-w-lg sm:w-[480px]">
                <div class="flex items-center mb-10">
                    <div class="ltr:mr-4 rtl:ml-4">
                        <img src="{{url('panel/images/profile-1.jpeg')}}" class="object-cover w-16 h-16 rounded-full" alt="images" />
                    </div>

                    @if(session()->has('message'))
                        <p class="text-rose-500">{{session('message')}}</p>
                    @endif

                    <div class="flex-1">
                        <p class="text-blue-600 font-bold text-md">کد تایید خود را وارد کنید</p>
                    </div>
                </div>
                <form class="space-y-5" method="POST">
                    @csrf
                    <div>
                        <label for="password">کد تایید</label>
                        <input name="code" type="text" class="form-input" placeholder="کد تایید را وارد کنید" />
                    </div>
                    <button type="submit" class="w-full btn btn-primary">ارسال کد تایید</button>
                </form>
            </div>
        </div>
        <!-- end main content section -->
    </div>
@endsection
