<?php

use App\Models\Application;


if (!function_exists('flashMessage')) {
    function flashMessage($message, $type, $actionType = null)
    {
        session()->flash('message', $message);
        session()->flash('message-type', $type);
        if ($actionType) {
            session()->flash('action-type', $actionType);
        }
    }
}

if (!function_exists('hasApplied')) {
    function hasApplied($user_id, $vacancy_id)
    {
        $applied = Application::where('user_id', $user_id)
                    ->where('vacancy_id', $vacancy_id)
                    ->first();
        
        return $applied;
    }
}