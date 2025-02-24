<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\MelipayamakService;
use App\Http\Controllers\Controller;
use App\Http\Requests\checkUserMobileCodeRequest;
use App\Models\VerificationCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MobileVerificationController extends Controller
{
    public function showVerificationCode()
    {
        return view('auth.send-mobile-code');
    }

    public function sendVerificationCode(): \Illuminate\Http\RedirectResponse
    {
        $code = rand(11111,99999);
        $user = auth()->user();
        VerificationCode::query()->create([
            'mobile'=>$user->mobile,
            'code'=>$code,
        ]);

       $response = MelipayamakService::sendSMS($user->mobile,$code);

         return redirect()->route('show.check.code');
    }


    public function showCheckCode()
    {
        return view('auth.check-mobile-code');
    }

    public function checkUserMobileCode(checkUserMobileCodeRequest $request): \Illuminate\Http\RedirectResponse
    {
       $code = $request->input('code');
       $user = auth()->user();

       $check = VerificationCode::query()
           ->latest()
           ->where('code',$code)
           ->where('mobile', $user->mobile)
           ->first();
       if ($check) {
           $user->update([
               'mobile_verified_at'=> now()
           ]);
           return redirect()->route('panel');
       }

       return redirect()->back()->with('message','کد تایید معتبر نمی باشد');


    }
}
