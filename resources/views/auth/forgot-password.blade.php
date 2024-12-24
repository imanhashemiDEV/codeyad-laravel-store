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
                    @if (session('status') )
                        <div class="mb-4 font-medium text-md text-green-600 dark:text-green-400">
                            <p>ایمیل بازآوری رمز عبور برای شما ارسال شد</p>
                        </div>
                    @else
                        <div class="flex-1">
                            <p class="text-blue-600 font-bold text-md">ایمیل خود را وارد کنید تا لینک بازآوری رمز عبور برای شما ارسال شود</p>
                        </div>
                    @endif
                </div>
                <form class="space-y-5" method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div>
                        <label for="password">ایمیل</label>
                        <input name="email" type="email" class="form-input" placeholder="رمز عبور را وارد کنید" />
                    </div>
                    <button type="submit" class="w-full btn btn-primary">ارسال ایمیل</button>
                </form>
            </div>
        </div>
        <!-- end main content section -->
    </div>
@endsection
