<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class SmsTwoFactorIsVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        if (($user && $user->sms_two_factor_secret && $user->sms_two_factor_verified) || ($user && !$user->sms_two_factor_secret && !$user->sms_two_factor_verified)) {
            if ($request->is('two-factor-sms-challenge', 'two-factor-sms-send', 'two-factor-sms-verify')) {
                return redirect()->route('dashboard');
            }
        }

        return $next($request);
    }
}
