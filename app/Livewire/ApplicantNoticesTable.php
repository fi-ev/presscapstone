<?php

namespace App\Livewire;

use App\Models\Vacancy;
use Livewire\Component;
use Livewire\WithPagination;

class ApplicantNoticesTable extends Component
{
    use WithPagination;
    public $search = '';
    public $applicants;
    public $vacancyId;


    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount($vacancyId)
    {
        $this->applicants =  Vacancy::with('applications.user')
                    ->where('id',$vacancyId)
                    ->first();

    }

    public function render()
    {
        return view('livewire.applicant-notices-table');
    }
}
