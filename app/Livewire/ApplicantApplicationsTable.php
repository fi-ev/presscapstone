<?php

namespace App\Livewire;

use App\Models\Application;
use App\Models\Vacancy;
use Livewire\Component;
use Livewire\WithPagination;
use Auth;

class ApplicantApplicationsTable extends Component
{
    use WithPagination;
    public $status = 'all';
    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }
    
    public function render()
    {
        if(!Auth::user()->isApplicant()) abort(403);

        return view('livewire.applicant-applications-table', [
            'applications' => Application::query()
                ->with('user')
                ->with('vacancy.position')
                ->when($this->search, function ($query) {
                    $query->whereHas('vacancy.position', function ($query) {
                        $query->where('title', 'like', '%' . $this->search . '%');                   
                    });
                })
                ->whereHas('user', function ($query) {
                    $query->where('id', Auth::id());
                })
                ->orderBy('created_at', 'desc')
                ->paginate(5),
        ]);
    }
}
