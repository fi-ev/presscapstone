<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use App\Models\User;

class AdminStats extends Component
{
    public $totalUsers;
    public $adminUsers;
    public $hrUsers;
    public $applicantUsers;

    public function mount()
    {
        $this->loadStats();
    }

    public function loadStats()
    {
        $this->totalUsers = User::count();
        $this->adminUsers = User::role('admin')->count();
        $this->hrUsers = User::role('hr')->count(); 
        $this->applicantUsers = User::role('applicant')->count(); 
    }

    public function render()
    {
        return view('livewire.dashboard.admin-stats');
    }
}
