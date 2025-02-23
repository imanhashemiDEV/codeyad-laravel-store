<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Jobs\SendVerificationEmailJob;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     */
    public function store(Request $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(route('home', absolute: false));
        }

        //SendVerificationEmailJob::dispatch($request->user())->onQueue('sendEmailVerification');
        SendVerificationEmailJob::dispatch($request->user())->delay(
            now()->addMinutes(10)
        );

        return back()->with('status', 'verification-link-sent');
    }
}
