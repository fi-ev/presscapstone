<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DashboardController extends Controller
{
    
    public function index()
    {
        $user = Auth::user();

        if ($user->isAdmin()) {
            $data = User::selectRaw("date_format(created_at, '%Y-%m-%d') as date, count(*) as aggregate")
                ->whereDate('created_at', '>=', now()->subDays(30))
                ->groupBy('date')
                ->orderBy('date')
                ->get();

            return view('admin.dashboard', compact('data'));
        } elseif ($user->isHR()) {
            $data = User::whereHas('applicant_profile')
                ->selectRaw("date_format(created_at, '%Y-%m-%d') as date, count(*) as aggregate")
                ->whereDate('created_at', '>=', now()->subDays(30))
                ->groupBy('date')
                ->orderBy('date')
                ->get();

            $users = User::with('applicant_profile')
                ->whereHas('applicant_profile', function ($query) {
                    $query->where('is_latest', 1);
                })
                ->where('is_active', 1)
                ->get();

            $groupedAge = $users->map(function ($user) {
                $birthdate = optional($user->applicant_profile)->birthdate;
                $age = Carbon::parse($birthdate)->age;
                return match (true) {
                    $age < 18 => 'Below 18',
                    $age >= 18 && $age <= 24 => '18 to 24',
                    $age >= 25 && $age <= 34 => '25 to 34',
                    $age >= 35 && $age <= 44 => '35 to 44',
                    $age >= 45 && $age <= 54 => '45 to 54',
                    $age >= 55 && $age <= 64 => '55 to 64',
                    $age >= 65 => '65 or over',
                    default => 'Unknown'
                };
            });

            $ageCounts = $groupedAge->countBy();
            $data2 = $ageCounts->toArray();

            return view('hr.dashboard', compact('data', 'data2'));
        } elseif ($user->isApplicant()) {
            return view('applicant.dashboard');
        }

        abort(403);
    }
}
