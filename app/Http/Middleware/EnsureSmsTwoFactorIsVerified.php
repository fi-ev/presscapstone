<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureSmsTwoFactorIsVerified
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if (!$user) {
            return $next($request);
        }

        if ($user->sms_two_factor_secret && !$user->sms_two_factor_verified) {
            if (!$request->is('two-factor-sms-challenge', 'two-factor-sms-send', 'two-factor-sms-verify', 'logout')) {
                session()->flash('message', 'Verify SMS before proceeding');
                session()->flash('message-type', 'error');
                session()->flash('action-type', 'update');
                return redirect()->route('two-factor-sms.index');
            }
        }

        return $next($request);
    }
}
