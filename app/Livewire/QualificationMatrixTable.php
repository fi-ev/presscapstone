<?php

namespace App\Livewire;

use App\Models\Vacancy;
use Livewire\Component;
use Livewire\WithPagination;
use App\Exports\QualificationMatrixExcelExport;
use Maatwebsite\Excel\Facades\Excel;

class QualificationMatrixTable extends Component
{
    use WithPagination;
    public $search = '';
    public $vacancy;
    public $vacancyId;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function exportExcel() 
    {
        return Excel::download(new QualificationMatrixExcelExport($this->vacancyId), 'qualification-matrix.xlsx');
    }

    public function mount($vacancyId)
    {
        $this->vacancyId = $vacancyId;
        $this->vacancy = Vacancy::with([
                            'position',
                            'applications',
                            'applications.applicant_profile',
                            'applications.applicant_education',
                            'applications.applicant_eligibility',
                            'applications.applicant_training',
                            'applications.applicant_volunteer_work',
                            'applications.applicant_work_experience',
                            'applications.applicant_other',
                            ])
                            ->where('id',$vacancyId)
                            ->first();
    }

    public function render()
    {
        return view('livewire.qualification-matrix-table');
    }
}
