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
                        @if (session('status'))
                            <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                                <p>کد تایید برای شما ارسال شد</p>
                            </div>
                        @else
                            <div class="flex-1">
                                <p>آیا کد تایید برای شما ارسال شود؟</p>
                            </div>
                        @endif
                </div>

                <form class="space-y-5"  method="POST" action="{{route('send.mobile.verification')}}">
                     @csrf
                    <button type="submit" class="w-full btn btn-primary">ارسال کد تایید</button>
                </form>
            </div>
        </div>
        <!-- end main content section -->
    </div>
@endsection
