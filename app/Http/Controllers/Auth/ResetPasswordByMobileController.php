<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\MelipayamakService;
use App\Http\Controllers\Controller;
use App\Http\Requests\checkResetPasswordByMobileRequest;
use App\Http\Requests\sendForgetPasswordCodeRequest;
use App\Models\User;
use App\Models\VerificationCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ResetPasswordByMobileController extends Controller
{
    public function showForgetPasswordByMobile()
    {
        return view('auth.forgot-password-by-mobile');
    }

    public function sendForgetPasswordCode(sendForgetPasswordCodeRequest $request): \Illuminate\Http\RedirectResponse
    {
        $code = rand(11111,99999);
        $user = User::query()->where('mobile', $request->mobile)->first();
        if ($user) {
            VerificationCode::query()->create([
                'mobile'=>$request->mobile,
                'code'=>$code,
            ]);
            MelipayamakService::sendSMS($user->mobile,$code);
        }

       return redirect()->route('show.rest.password.mobile');
    }

    public function showResetPasswordByMobile()
    {
        return view('auth.reset-password-by-mobile');
    }

    public function checkResetPasswordByMobile(checkResetPasswordByMobileRequest $request): \Illuminate\Http\RedirectResponse
    {
        $code = $request->input('code');
        $mobile = $request->input('mobile');
        $password = $request->input('password');

        $check = VerificationCode::query()
            ->latest()
            ->where('code',$code)
            ->where('mobile', $mobile)
            ->first();
        if ($check) {
            $user = User::query()->where('mobile', $mobile)->first();
            $user->update([
                'password'=> Hash::make($password)
            ]);
            return redirect()->route('login.mobile');
        }

        return redirect()->back()->with('message','کد دریافت شده معتبر نمی باشد');
    }
}
