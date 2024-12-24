@extends('auth.master')
@section('content')
    <div class="min-h-screen text-black main-container dark:text-white-dark">
        <!-- start main content section -->
        <div class="flex min-h-screen items-center justify-center bg-[url('{{url('panel/images/map.svg')}}')] bg-cover bg-center dark:bg-[url('{{url('panel/images/map-dark.svg')}}')]">
            <div class="panel m-6 w-full max-w-lg sm:w-[480px]">
                <h2 class="mb-3 text-2xl font-bold">ورود</h2>
                <p class="mb-7">برای ورود ایمیل و رمز عبور خود را وارد کنید</p>
                <form class="space-y-5" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div>
                        <label for="email">ایمیل</label>
                        <input id="email" type="email" name="email" class="form-input" placeholder="ایمیل وارد کنید" />
                        @error('email')
                           <p class="mt-2 text-rose-500">{{$message}}</p>
                        @enderror

                    </div>
                    <div>
                        <label for="password">رمزعبور</label>
                        <input id="password" type="password" name="password" class="form-input" placeholder="رمزعبور  وارد کنید" />
                        @error('password')
                            <p class="mt-2 text-rose-500">{{$message}}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="cursor-pointer">
                            <input type="checkbox" class="form-checkbox" name="remember" />
                            <span class="text-white-dark">من را به خاطر بسپار</span>
                        </label>
                    </div>
                    <button type="submit" class="w-full btn btn-primary">ورود</button>
                </form>

                <p class="text-center mt-4">
                    حساب کاربری ندارید؟ <a href="{{ route('password.request') }}" class="font-bold text-primary hover:underline">ثبت نام</a>
                </p>
                <p class="text-center mt-4">
                     <a href="{{ route('password.request') }}" class="font-bold text-primary hover:underline">فراموشی رمز عبور</a>
                </p>
            </div>
        </div>
        <!-- end main content section -->
    </div>
@endsection
