<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class EnsurePasswordIsChanged
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if (!$user) {
            return $next($request);
        }

        if ($user && $user->force_password_change) {
            if (!$request->is('force-update-password', 'update-password', 'logout')) {
                session()->flash('message', 'Update your password before proceeding');
                session()->flash('message-type', 'error');
                session()->flash('action-type', 'update');
                return redirect()->route('force-password.index');
            }
        }

        return $next($request);
    }
}
