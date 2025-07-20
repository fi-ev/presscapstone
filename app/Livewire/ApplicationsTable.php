<?php

namespace App\Livewire;

use App\Models\Vacancy;
use Livewire\Component;
use Livewire\WithPagination;
use Carbon\Carbon;
use Auth;

class ApplicationsTable extends Component
{
    use WithPagination;
    public $status = 'all';
    public $search = '';
    public $now = null;

    public function mount()
    {
        $this->now = Carbon::now()->format('Y-m-d');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
    
    public function render()
    {
        if(!Auth::user()->isHR()) abort(403);

        return view('livewire.applications-table', [
            'vacancies' => Vacancy::query()
                ->with([
                    'position', 
                    'applications',
                    'applications.applicant_profile'
                ])
                ->withCount('applications')
                ->when($this->search, function ($query) {
                    $query->where(function ($query) {
                        $query->whereHas('position', function ($query) {
                            $query->where('title', 'like', '%' . $this->search . '%')
                                ->orWhere('plantilla_no', 'like', '%' . $this->search . '%');
                        })
                        ->orWhere('vacancy_code', 'like', '%' . $this->search . '%');
                    });
                })
                ->when($this->status !== 'all', function($query) {
                    $query->where('status', $this->status);
                })
                ->orderBy('created_at', 'desc')
                ->paginate(5)
        ]);     
    }
}
