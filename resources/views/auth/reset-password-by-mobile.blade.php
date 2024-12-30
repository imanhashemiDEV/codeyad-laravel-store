@extends('auth.master')
@section('content')
    <div class="min-h-screen text-black main-container dark:text-white-dark">
        <!-- start main content section -->
        <div class="flex min-h-screen items-center justify-center bg-[url('../images/map.svg')] bg-cover bg-center dark:bg-[url('../images/map-dark.svg')]">
            <div class="panel m-6 w-full max-w-lg sm:w-[480px]">
                <h2 class="mb-3 text-2xl font-bold">تعیین رمز عبور جدید</h2>
                <form class="space-y-5" method="POST" action="{{ route('check.forget.password.mobile') }}">
                    @csrf
                    <div>
                        <label for="email">موبایل</label>
                        <input id="mobile" name="mobile" type="text" class="form-input" placeholder="موبایل را وارد کنید" />
                        @error('mobile')
                        <p class="mt-2 text-rose-500">{{$message}}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="email">کد دریافت شده</label>
                        <input id="code" name="code" type="text" class="form-input" placeholder="کد را وارد کنید" />
                        @error('code')
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
                    <button type="submit" class="w-full btn btn-primary">تغییر رمز عبور</button>
                </form>
            </div>
        </div>
        <!-- end main content section -->
    </div>
@endsection
