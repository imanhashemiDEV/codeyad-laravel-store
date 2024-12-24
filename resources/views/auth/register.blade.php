@extends('auth.master')
@section('content')
    <div class="min-h-screen text-black main-container dark:text-white-dark">
        <!-- start main content section -->
        <div class="flex min-h-screen items-center justify-center bg-[url('../images/map.svg')] bg-cover bg-center dark:bg-[url('../images/map-dark.svg')]">
            <div class="panel m-6 w-full max-w-lg sm:w-[480px]">
                <h2 class="mb-3 text-2xl font-bold">ثبت نام</h2>
                <p class="mb-7">برای ثبت نام ایمیل و رمز عبور خود را وارد کنید</p>
                <form class="space-y-5" method="POST" action="{{ route('register') }}">
                    @csrf
                    <div>
                        <label for="name">نام</label>
                        <input id="name" name="name" type="text" class="form-input" placeholder="نام را وارد کنید" />
                        @error('name')
                          <p class="mt-2 text-rose-500">{{$message}}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="email">ایمیل</label>
                        <input id="email" name="email" type="email" class="form-input" placeholder="ایمیل را وارد کنید" />
                        @error('email')
                            <p class="mt-2 text-rose-500">{{$message}}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="password">رمزعبور</label>
                        <input id="password" name="password" type="password" class="form-input" placeholder="رمزعبور را وارد کنید" />
                        @error('password')
                           <p class="mt-2 text-rose-500">{{$message}}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="password">تکرار رمزعبور</label>
                        <input id="password" name="password_confirmation" type="password" class="form-input" placeholder="رمزعبور را وارد کنید" />
                        @error('password_confirmation')
                           <p class="mt-2 text-rose-500">{{$message}}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="cursor-pointer">
                            <input type="checkbox" class="form-checkbox" />
                            <span for="custom_checkbox" class="text-white-dark"
                            >موافقم با <a href="javascript:;" class="text-primary hover:underline">شرایط و ضوابط</a></span
                            >
                        </label>
                    </div>
                    <button type="submit" class="w-full btn btn-primary">ثبت نام</button>
                </form>

                <p class="text-center mt-4">
                    از قبل حساب کاربری دارید؟ <a href="{{route('login')}}" class="font-bold text-primary hover:underline">ورود</a>
                </p>
            </div>
        </div>
        <!-- end main content section -->
    </div>
@endsection
