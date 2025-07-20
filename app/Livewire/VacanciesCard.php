<?php

namespace App\Livewire;

use App\Models\Application;
use App\Models\Vacancy;
use Livewire\Component;
use Carbon\Carbon;


class VacanciesCard extends Component
{
    public $vacancies;
    public $applicantCount;
    public $vacancyId;
    public $showVacancy;
    public $positionTitle;
    public $employmentType;
    public $plantillaNo;
    public $startDate;
    public $endDate;
    public $assignmentPlace;
    public $salaryGrade;
    public $monthlySalary;
    public $description;
    public $education;
    public $work;
    public $trainings;
    public $competencies;
    public $eligibilities;
    public $remarks;
    public $position;
    public $filepath;
    public $filename;
    public $url;
    public $isOpenView = false;

    public function mount()
    {
        $this->vacancies = Vacancy::with('position')
                            ->withCount('applications as applicant_profiles_count')
                            ->where('status','Open')
                            ->where('posting_date','<=',Carbon::now()->format('Y-m-d'))
                            ->where('closing_date','>=',Carbon::now()->format('Y-m-d'))
                            ->orderBy('closing_date')
                            ->get();

        $this->applicantCount = Application::withCount('applicant_profile as applicant_profiles_count')
                                ->get();
    }
        
    public function openViewModal()
    {
        $this->showVacancy = Vacancy::with('position')
                            ->where('id', $this->vacancyId)
                            ->first();
        $this->positionTitle = $this->showVacancy->position->title;
        $this->employmentType = $this->showVacancy->position->employment_type;
        $this->plantillaNo = $this->showVacancy->position->plantilla_no;
        $this->startDate = $this->showVacancy->posting_date->format('F j, Y');
        $this->endDate = $this->showVacancy->closing_date->format('F j, Y');
        $this->assignmentPlace = $this->showVacancy->position->assignment_place;
        $this->salaryGrade = $this->showVacancy->position->salary_grade;
        $this->monthlySalary = $this->showVacancy->position->monthly_salary;
        $this->description = $this->showVacancy->position->description;
        $this->education = $this->showVacancy->position->education;
        $this->work = $this->showVacancy->position->work_experience;
        $this->trainings = $this->showVacancy->position->getTrainingsName();
        $this->competencies = $this->showVacancy->position->getCompetenciesName();
        $this->eligibilities = $this->showVacancy->position->getEligibilitiesName();
        $this->filepath = $this->showVacancy->filepath;
        $this->filename = $this->showVacancy->filename;
        $this->url = $this->showVacancy->url;
        $this->remarks = $this->showVacancy->position->remarks;

        $this->isOpenView = true;
    }

    public function closeViewModal()
    {
        $this->isOpenView = false;
        $this->showVacancy = null;
    }

    public function render()
    {
        return view('livewire.vacancies-card');
    }
}
