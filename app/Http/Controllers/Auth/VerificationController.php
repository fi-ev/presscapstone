<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    /**
     * Mark the authenticated user's email as verified.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function verify(Request $request)
    {
        if ($request->hasValidSignature()) {
            $user = $request->user();

            if ($user->hasVerifiedEmail()) {
                return redirect()->route('dashboard');
            }

            $user->markEmailAsVerified();

            event(new Verified($user));

            return redirect()->route('dashboard')->with('verified', true);
        }

        return redirect()->route('verification.notice');
    }
}
