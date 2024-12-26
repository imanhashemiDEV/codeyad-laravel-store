<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\VerificationCode;
use Illuminate\Http\Request;

class MobileVerificationController extends Controller
{
    public function showVerificationCode()
    {
        return view('auth.send-mobile-code');
    }

    public function sendVerificationCode()
    {
        $code = rand(11111,99999);
        $user = auth()->user();
        VerificationCode::query()->create([
            'mobile'=>$user->mobile,
            'code'=>$code,
        ]);
        // todo send sms code

        // return


    }
}
