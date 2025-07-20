<?php

namespace App\Livewire;

use App\Models\ApplicantEducation;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Exception;


class ApplicantEducationTable extends Component
{
    use WithPagination;
    public $isOpenAdd = false;
    public $isOpenEdit = false;
    public $educationId;
    public $editEducation = null;
    public $level;
    public $school_name;
    public $degree;
    public $start_date;
    public $end_date;
    public $units_earned;
    public $year_graduated;
    public $honors;
    public $applicationId;
    public $userId;
    public $disabled;
    protected $defaultValues = [
        'level' => '',
        'school_name' => '',
        'degree' => '',
        'start_date' => null,
        'end_date' => null,
        'units_earned' => '',
        'year_graduated' => '',
        'honors' => '',
    ];

    public function openAddModal()
    {
        $this->fill($this->defaultValues);
        $this->isOpenAdd = true;
        $this->isOpenEdit = false;
    }

    public function openEditModal($id)
    {
        $this->editEducation = ApplicantEducation::findOrFail($id);

        $this->level = $this->editEducation->level;
        $this->school_name = $this->editEducation->school_name;
        $this->degree = $this->editEducation->degree;
        $this->start_date = $this->editEducation->start_date->format('Y-m-d');
        $this->end_date = $this->editEducation->end_date->format('Y-m-d');
        $this->units_earned = $this->editEducation->units_earned;
        $this->year_graduated = $this->editEducation->year_graduated;
        $this->honors = $this->editEducation->honors;
        
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
        $this->editEducation = null;
    }

    public function submit()
    {
        $this->validate([
            'level' => 'required|string',
            'school_name' => 'required|string|max:255',
            'degree' => 'required|string|max:255',
            'start_date' => 'required|date|date_format:Y-m-d|before_or_equal:today',
            'end_date' => 'required|date|date_format:Y-m-d|before_or_equal:today',
            'units_earned' => 'required|string|max:255',
            'year_graduated' => 'required|string|max:100',
            'honors' => 'required|string|max:255',
        ]);

        try {
            if (!Auth::user()->isApplicant()) abort(403);

            if($this->editEducation)
            {
                $education = ApplicantEducation::find($this->editEducation->id);
                $education->update([
                    'user_id' => Auth::user()->id,
                    'level' => $this->level,
                    'school_name' => $this->school_name,
                    'degree' => $this->degree,
                    'start_date' => $this->start_date,
                    'end_date' => $this->end_date,
                    'units_earned' => $this->units_earned,
                    'year_graduated' => $this->year_graduated,
                    'honors' => $this->honors,
                ]);
                session()->flash('message', 'Education information updated successfully!');
                session()->flash('message-type', 'success');
                session()->flash('action-type', 'update');
            }
            else 
            {
                $latestVersion = ApplicantEducation::orderBy('version', 'desc')->pluck('version')->first() ?? 1;
                ApplicantEducation::create([
                    'user_id' => Auth::user()->id,
                    'level' => $this->level,
                    'school_name' => $this->school_name,
                    'degree' => $this->degree,
                    'start_date' => $this->start_date,
                    'end_date' => $this->end_date,
                    'units_earned' => $this->units_earned,
                    'year_graduated' => $this->year_graduated,
                    'honors' => $this->honors,
                    'version' => $latestVersion
                ]);
                session()->flash('message', 'New education information created successfully!');
                session()->flash('message-type', 'success');
                session()->flash('action-type', 'create');
            }

            return redirect()->route('pds.index', ['activeTab' => 'tab1', 'accordionEducationOpen' => true]);
        } catch (Exception $e) { 
            Session()->flash('message', 'Failed to save education information.');
            session()->flash('message-type', 'error');
            session()->flash('action-type', 'create');

            return redirect()->route('pds.index', ['activeTab' => 'tab1', 'accordionEducationOpen' => true]);
        }
    }

    public function delete($id)
    {

        try {
            $education = ApplicantEducation::findOrFail($id);
            $education->delete();

            session()->flash('message', 'Education information deleted successfully!');
            session()->flash('message-type', 'success');
            session()->flash('action-type', 'delete');

            return redirect()->route('pds.index', ['activeTab' => 'tab1', 'accordionEducationOpen' => true]);
        } catch (Exception $e) { 
            Session()->flash('message', 'Failed to delete education information.');
            session()->flash('message-type', 'error');
            session()->flash('action-type', 'delete');

            return redirect()->route('pds.index', ['activeTab' => 'tab1', 'accordionEducationOpen' => true]);
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

            $educations = ApplicantEducation::where('user_id', $id)
                        ->where('is_latest', 1)
                        ->orderBy('level','asc')
                        ->orderBy('start_date')
                        ->paginate(5);

        } else if (Auth::user()->isHR() || ($id === $this->userId && $this->disabled)) {

            $educations = ApplicantEducation::where('user_id', $this->userId)
                        ->where('application_id', $this->applicationId)
                        ->orderBy('level','asc')
                        ->orderBy('start_date')
                        ->paginate(5);
        }

        return view('livewire.applicant-education-table', [
            'educations' => $educations
        ]);
    }
}
