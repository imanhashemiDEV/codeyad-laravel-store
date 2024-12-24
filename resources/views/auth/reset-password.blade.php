@extends('auth.master')
@section('content')
    <div class="min-h-screen text-black main-container dark:text-white-dark">
        <!-- start main content section -->
        <div class="flex min-h-screen items-center justify-center bg-[url('../images/map.svg')] bg-cover bg-center dark:bg-[url('../images/map-dark.svg')]">
            <div class="panel m-6 w-full max-w-lg sm:w-[480px]">
                <h2 class="mb-3 text-2xl font-bold">تعیین رمز عبور جدید</h2>
                <form class="space-y-5" method="POST" action="{{ route('password.store') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
                    <div>
                        <label for="email">ایمیل</label>
                        <input value="{{old('email', $request->email)}}" id="email" name="email" type="email" class="form-input" placeholder="ایمیل را وارد کنید" />
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
                    <button type="submit" class="w-full btn btn-primary">تغییر رمز عبور</button>
                </form>
            </div>
        </div>
        <!-- end main content section -->
    </div>
@endsection
