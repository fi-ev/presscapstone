<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use App\Exports\ApplicantsExport;
use Maatwebsite\Excel\Facades\Excel;

class ApplicantsTable extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function exportExcel() 
    {
        return Excel::download(new ApplicantsExport, 'applicants.xlsx');
    }
    
    public function render()
    {
        return view('livewire.applicants-table', [
            'applicants' => User::query()
                ->whereHas('applications')
                ->withCount('applications')
                ->when($this->search, function ($query) {
                    $query->where(function ($query) {
                        $query->where('first_name', 'like', '%' . $this->search . '%')
                                ->orWhere('last_name', 'like', '%' . $this->search . '%')
                                ->orWhere('email', 'like', '%' . $this->search . '%'); 
                    });  
                })
                ->orderBy('last_name', 'asc')
                ->orderBy('first_name', 'asc')
                ->paginate(5),
        ]);
        
    }
}
