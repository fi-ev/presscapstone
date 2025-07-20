<?php

namespace App\Livewire;

use App\Models\ApplicantFamily;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Exception;

class ApplicantFamilyForm extends Component
{
    public $editFamily;
    public $spouse_first_name;
    public $spouse_middle_name;
    public $spouse_last_name;
    public $spouse_name_ext;
    public $spouse_occupation;
    public $spouse_work_employer;
    public $spouse_work_address;
    public $spouse_work_phone;
    public $father_first_name;
    public $father_middle_name;
    public $father_last_name;
    public $father_name_ext;
    public $mother_first_name;
    public $mother_maiden_middle_name;
    public $mother_maiden_last_name;
    public $mother_name_ext;
    public $isChecked = false;
    public $disabled;

    public function mount($applicationId, $userId, $readonly)
    {
        $id = Auth::user()->id;
        if (Auth::user()->isApplicant() && !$readonly) {
            $user = $id;

            $this->editFamily = ApplicantFamily::where('user_id', $user)
                    ->where('is_latest', 1)
                    ->first();

        } else if (Auth::user()->isHR() || ($id === $userId && $readonly)) {
            $user = $userId;
            $this->disabled = true;

            $this->editFamily = ApplicantFamily::where('user_id', $user)
                    ->where('application_id', $applicationId)
                    ->first();
        }

        $this->spouse_first_name = $this->editFamily->spouse_first_name;
        $this->spouse_middle_name = $this->editFamily->spouse_middle_name;
        $this->spouse_last_name = $this->editFamily->spouse_last_name;
        $this->spouse_name_ext = $this->editFamily->spouse_name_ext;
        $this->spouse_occupation = $this->editFamily->spouse_occupation;
        $this->spouse_work_employer = $this->editFamily->spouse_work_employer;
        $this->spouse_work_address = $this->editFamily->spouse_work_address;
        $this->spouse_work_phone = $this->editFamily->spouse_work_phone;
        $this->father_first_name = $this->editFamily->father_first_name;
        $this->father_middle_name = $this->editFamily->father_middle_name;
        $this->father_last_name = $this->editFamily->father_last_name;
        $this->father_name_ext = $this->editFamily->father_name_ext;
        $this->mother_first_name = $this->editFamily->mother_first_name;
        $this->mother_maiden_middle_name = $this->editFamily->mother_maiden_middle_name;
        $this->mother_maiden_last_name = $this->editFamily->mother_maiden_last_name;
        $this->mother_name_ext = $this->editFamily->mother_name_ext;

    }

    public function submit()
    {
        $this->validate([
            'spouse_first_name' => 'required|string|max:255',
            'spouse_middle_name' => 'required|string|max:255',
            'spouse_last_name' => 'required|string|max:255',
            'spouse_name_ext' => 'required|string|max:255',
            'spouse_occupation' => 'required|string|max:255',
            'spouse_work_employer' => 'required|string|max:255',
            'spouse_work_address' => 'required|string|max:255',
            'spouse_work_phone' => 'required|string|max:255',
            'father_first_name' => 'required|string|max:255',
            'father_middle_name' => 'required|string|max:255',
            'father_last_name' => 'required|string|max:255',
            'father_name_ext' => 'required|string|max:255',
            'mother_first_name' => 'required|string|max:255',
            'mother_maiden_middle_name' => 'required|string|max:255',
            'mother_maiden_last_name' => 'required|string|max:255',
            'mother_name_ext' => 'required|string|max:255',
        ]);

        try {
            if (!Auth::user()->isApplicant()) abort(403);

            $family = ApplicantFamily::find($this->editFamily->id);
            $latestVersion = ApplicantFamily::orderBy('version', 'desc')->pluck('version')->first() ?? 1;
            $family->update([
                'user_id' => Auth::user()->id,
                'spouse_first_name' => $this->spouse_first_name,
                'spouse_middle_name' => $this->spouse_middle_name,
                'spouse_last_name' => $this->spouse_last_name,
                'spouse_name_ext' => $this->spouse_name_ext,
                'spouse_occupation' => $this->spouse_occupation,
                'spouse_work_employer' => $this->spouse_work_employer,
                'spouse_work_address' => $this->spouse_work_address,
                'spouse_work_phone' => $this->spouse_work_phone,
                'father_first_name' => $this->father_first_name,
                'father_middle_name' => $this->father_middle_name,
                'father_last_name' => $this->father_last_name,
                'father_name_ext' => $this->father_name_ext,
                'mother_first_name' => $this->mother_first_name,
                'mother_maiden_middle_name' => $this->mother_maiden_middle_name,
                'mother_maiden_last_name' => $this->mother_maiden_last_name,
                'mother_name_ext' => $this->mother_name_ext,
                'version' => $latestVersion,
            ]);
            session()->flash('message', 'New family information updated successfully!');
            session()->flash('message-type', 'success');
            session()->flash('action-type', 'create');

            return redirect()->route('pds.index', ['activeTab' => 'tab1', 'accordionFamilyOpen' => true]);
        } catch (Exception $e) { 
            Session()->flash('message', 'Failed to save family information.');
            session()->flash('message-type', 'error');
            session()->flash('action-type', 'create');

            return redirect()->route('pds.index', ['activeTab' => 'tab1', 'accordionFamilyOpen' => true]);
        }
    }

    public function toggleCheckbox()
    {
        $this->isChecked = !$this->isChecked;

        if ($this->isChecked) {
            $this->spouse_first_name = 'N/A';
            $this->spouse_middle_name = 'N/A';
            $this->spouse_last_name = 'N/A';
            $this->spouse_name_ext = 'N/A';
            $this->spouse_occupation= 'N/A';
            $this->spouse_work_employer = 'N/A';
            $this->spouse_work_address = 'N/A';
            $this->spouse_work_phone = 'N/A';
        } 
    }

    public function render()
    {
        return view('livewire.applicant-family-form');
    }
}
