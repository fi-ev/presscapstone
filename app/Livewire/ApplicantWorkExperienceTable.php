<?php

namespace App\Livewire;

use App\Models\ApplicantWorkExperience;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
Use Exception;


class ApplicantWorkExperienceTable extends Component
{
    use WithPagination;
    public $isOpenAdd = false;
    public $isOpenEdit = false;
    public $workId;
    public $editWork = null;
    public $start_date;
    public $end_date;
    public $position;
    public $company;
    public $monthly_salary;
    public $salary_grade;
    public $appointment_status;
    public $is_govt_service;
    public $applicationId;
    public $userId;
    public $disabled;
    protected $defaultValues = [
        'start_date'  => null,
        'end_date' => null,
        'position' => '',
        'company' => '',
        'monthly_salary' => null,
        'salary_grade' => '',
        'appointment_status' => '',
        'is_govt_service' => false,
    ];
    

    public function openAddModal()
    {
        $this->fill($this->defaultValues);
        $this->isOpenAdd = true;
        $this->isOpenEdit = false;
    }

    public function openEditModal($id)
    {
        $this->editWork = ApplicantWorkExperience::findOrFail($id);

        $this->start_date = $this->editWork->start_date->format('Y-m-d');
        $this->end_date = $this->editWork->end_date->format('Y-m-d');
        $this->position = $this->editWork->position;
        $this->company = $this->editWork->company;
        $this->monthly_salary = $this->editWork->monthly_salary;
        $this->salary_grade = $this->editWork->salary_grade;
        $this->appointment_status = $this->editWork->appointment_status;
        $this->is_govt_service = $this->editWork->is_govt_service;

        $this->isOpenEdit = true;
        $this->isOpenAdd = false; 
    }

    public function closeAddModal()
    {
        $this->isOpenAdd = false;
    }

    public function closeEditModal()
    {
        $this->isOpenEdit = false;
        $this->editWork = null;
    }

    public function submit()
    {
        $this->validate([
            'start_date' =>  'required|date|date_format:Y-m-d',
            'end_date' =>  'required|date|date_format:Y-m-d',
            'position' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'monthly_salary' => 'required|numeric',
            'salary_grade' => ['required', 'string', 'max:255', function ($attribute, $value, $fail) {
                if (!preg_match('/^(?:\d{2}-\d|N\/A)$/', $value)) {
                    $fail($attribute.' is not in the correct format (00-0 or N/A)');
                }
            }],
            'appointment_status' => 'required|string|max:255',
            'is_govt_service' => 'required|boolean',
        ]);

        try {
            if (!Auth::user()->isApplicant()) abort(403);

            if($this->editWork)
            {
                $workExperience = ApplicantWorkExperience::find($this->editWork->id);
                $workExperience->update([
                    'user_id' => Auth::user()->id,
                    'start_date' => $this->start_date,
                    'end_date' => $this->end_date,
                    'position' => $this->position,
                    'company' => $this->company,
                    'monthly_salary' => $this->monthly_salary,
                    'salary_grade' => $this->salary_grade,
                    'appointment_status' => $this->appointment_status,
                    'is_govt_service' => $this->is_govt_service,
                ]);
                session()->flash('message', 'Work experience information updated successfully!');
                session()->flash('message-type', 'success');
                session()->flash('action-type', 'update');
            }
            else 
            {
                $latestVersion = ApplicantWorkExperience::orderBy('version', 'desc')->pluck('version')->first() ?? 1;
                ApplicantWorkExperience::create([
                    'user_id' => Auth::user()->id,
                    'start_date' => $this->start_date,
                    'end_date' => $this->end_date,
                    'position' => $this->position,
                    'company' => $this->company,
                    'monthly_salary' => $this->monthly_salary,
                    'salary_grade' => $this->salary_grade,
                    'appointment_status' => $this->appointment_status,
                    'is_govt_service' => $this->is_govt_service,
                    'version' => $latestVersion,
                ]);
                session()->flash('message', 'New work experience information created successfully!');
                session()->flash('message-type', 'success');
                session()->flash('action-type', 'create');
            }

            return redirect()->route('pds.index', ['activeTab' => 'tab2', 'accordionWorkOpen' => true]);
        } catch (Exception $e) { 
            Session()->flash('message', 'Failed to save work experience information.');
            session()->flash('message-type', 'error');
            session()->flash('action-type', 'create');

            return redirect()->route('pds.index', ['activeTab' => 'tab2', 'accordionWorkOpen' => true]);
        }
    }

    public function delete($id)
    {
        try {
            $workExperience = ApplicantWorkExperience::findOrFail($id);
            
            $workExperience->delete();

            session()->flash('message', 'Work experience information deleted successfully!');
            session()->flash('message-type', 'success');
            session()->flash('action-type', 'delete');

            return redirect()->route('pds.index', ['activeTab' => 'tab2', 'accordionWorkOpen' => true]);
        } catch (Exception $e) { 
            Session()->flash('message', 'Failed to delete work experience information.');
            session()->flash('message-type', 'error');
            session()->flash('action-type', 'delete');

            return redirect()->route('pds.index', ['activeTab' => 'tab2', 'accordionWorkOpen' => true]);
        }
    }

    public function mount($applicationId, $userId, $readonly)
    {
        $this->applicationId = $applicationId;
        $this->userId = $userId;
        $this->disabled = $readonly;
    }

    public function render()
    {
        $id = Auth::user()->id;
        if (Auth::user()->isApplicant() && !$this->disabled) {

            $works = ApplicantWorkExperience::where('user_id', $id)
            ->where('is_latest', 1)
                    ->orderBy('start_date','desc')
                    ->orderBy('end_date','desc')
                    ->paginate(5);

        } else if (Auth::user()->isHR() || ($id === $this->userId && $this->disabled)) {

            $works = ApplicantWorkExperience::where('user_id', $this->userId)
                            ->where('application_id', $this->applicationId)
                            ->orderBy('start_date','desc')
                            ->orderBy('end_date','desc')
                            ->paginate(5);
        }

        return view('livewire.applicant-work-experience-table', [
            'works' => $works
        ]);
    }
}
