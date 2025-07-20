<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Vacancy;
use App\Models\Application;

class HrStats extends Component
{
    public $vacanciesPosted;
    public $applicantsCount;
    public $vacanciesFilled;
    public $vacanciesUnfilled;

    public function mount()
    {
        $this->loadStats();
    }

    public function loadStats()
    {
        $this->vacanciesPosted = Vacancy::count();
        $this->applicantsCount = Application::count();
        $this->vacanciesFilled = Vacancy::where('status', 'Filled')->count();
        $this->vacanciesUnfilled = Vacancy::where('status', 'Open')->orWhere('status', 'Ongoing Deliberation')->count();
    }

    public function render()
    {
        return view('livewire.dashboard.hr-stats');
    }
}
