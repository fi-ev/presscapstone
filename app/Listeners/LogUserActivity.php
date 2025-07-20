<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use App\Models\UserLog;
use Carbon\Carbon;

class LogUserActivity
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        //
    }

    public function handleLogin(Login $event)
    {
        $recentLogin = UserLog::where('user_id', $event->user->id)
                            ->where('action', 'login')
                            ->where('created_at', '>=', Carbon::now()->subMinute()) 
                            ->exists();

        if (!$recentLogin) {
            UserLog::create([
                'user_id' => $event->user->id,
                'action' => 'login',
            ]);
        }
    }

    public function handleLogout(Logout $event)
    {
        $recentLogin = UserLog::where('user_id', $event->user->id)
        ->where('action', 'logout')
        ->where('created_at', '>=', Carbon::now()->subMinute()) 
        ->exists();

        if (!$recentLogin) {
            UserLog::create([
                'user_id' => $event->user->id,
                'action' => 'logout',
            ]);
        }
    }
}
