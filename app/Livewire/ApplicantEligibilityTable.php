<?php

namespace App\Livewire;

use App\Models\ApplicantEligibility;
use App\Models\TypeEligibility;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Exception;


class ApplicantEligibilityTable extends Component
{
    use WithPagination;
    public $isOpenAdd = false;
    public $isOpenEdit = false;
    public $eligibilityId;
    public $editEligibility = null;
    public $type_eligibility_id;
    public $rating;
    public $date_taken;
    public $place_taken;
    public $license_no;
    public $validity;
    public $applicationId;
    public $userId;
    public $disabled;
    protected $defaultValues = [
        'type_eligibility_id' => null,
        'rating' => null,
        'date_taken' => null,
        'place_taken' => '',
        'license_no' => '',
        'validity' => null,
    ];

    public function openAddModal()
    {
        $this->fill($this->defaultValues);
        $this->isOpenAdd = true;
        $this->isOpenEdit = false;
    }

    public function openEditModal($id)
    {
        $this->editEligibility = ApplicantEligibility::findOrFail($id);

        $this->type_eligibility_id = $this->editEligibility->type_eligibility_id;
        $this->rating = $this->editEligibility->rating;
        $this->date_taken = $this->editEligibility->date_taken;
        $this->place_taken = $this->editEligibility->place_taken;
        $this->license_no = $this->editEligibility->license_no;
        $this->validity = $this->editEligibility->validity;

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
        $this->editEligibility = null;
    }

    public function submit()
    {
        $this->validate([
            'type_eligibility_id' => 'required|integer',
            'rating' => 'required|string|max:255',
            'date_taken' => 'required|date|date_format:Y-m-d|before_or_equal:today',
            'place_taken' => 'required|string|max:255',
            'license_no' => 'required|string|max:255',
            'validity' => [
            function ($attribute, $value, $fail) {
                if (strtolower(trim($this->license_no)) !== 'n/a') {
                    if (empty($value)) {
                        $fail('The license validity date is required when License No is not N/A.');
                    } elseif (!Carbon::hasFormat($value, 'Y-m-d')) {
                        $fail('The license validity date must be in the format Y-m-d.');
                    }
                }
            }
        ]
        ]);

        if (strtolower(trim($this->license_no)) === 'n/a') {
            $this->validity = null;
        }

        try {
            if (!Auth::user()->isApplicant()) abort(403);

            if($this->editEligibility)
            {
                $eligibility = ApplicantEligibility::find($this->editEligibility->id);
                $eligibility->update([
                    'user_id' => Auth::user()->id,
                    'type_eligibility_id' => $this->type_eligibility_id,
                    'rating' => $this->rating,
                    'date_taken' => $this->date_taken,
                    'place_taken' => $this->place_taken,
                    'license_no' => $this->license_no,
                    'validity' => $this->validity,
                ]);
                session()->flash('message', 'Eligibility information updated successfully!');
                session()->flash('message-type', 'success');
                session()->flash('action-type', 'update');
            }
            else 
            {
                $latestVersion = ApplicantEligibility::orderBy('version', 'desc')->pluck('version')->first() ?? 1;
                ApplicantEligibility::create([
                    'user_id' => Auth::user()->id,
                    'type_eligibility_id' => $this->type_eligibility_id,
                    'rating' => $this->rating,
                    'date_taken' => $this->date_taken,
                    'place_taken' => $this->place_taken,
                    'license_no' => $this->license_no,
                    'validity' => $this->validity,
                    'version' => $latestVersion,
                ]);
                session()->flash('message', 'New eligibility information created successfully!');
                session()->flash('message-type', 'success');
                session()->flash('action-type', 'create');
            }

            return redirect()->route('pds.index', ['activeTab' => 'tab2', 'accordionEligibilityOpen' => true]);
        } catch (Exception $e) { 
            dd($e);
            Session()->flash('message', 'Failed to save eligibility information.');
            session()->flash('message-type', 'error');
            session()->flash('action-type', 'create');

            return redirect()->route('pds.index', ['activeTab' => 'tab2', 'accordionEligibilityOpen' => true]);
        }
    }

    public function delete($id)
    {
        try {
            $eligibility = ApplicantEligibility::findOrFail($id);
            $eligibility->delete();

            session()->flash('message', 'Eligibility information deleted successfully!');
            session()->flash('message-type', 'success');
            session()->flash('action-type', 'delete');

            return redirect()->route('pds.index', ['activeTab' => 'tab2', 'accordionEligibilityOpen' => true]);
        } catch (Exception $e) { 
            Session()->flash('message', 'Failed to delete eligibility information.');
            session()->flash('message-type', 'error');
            session()->flash('action-type', 'delete');

            return redirect()->route('pds.index', ['activeTab' => 'tab2', 'accordionEligibilityOpen' => true]);
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

            $eligibilities = ApplicantEligibility::with('type_eligibility')
                                ->where('user_id', $id)
                                ->where('is_latest', 1)
                                ->orderBy('date_taken', 'desc')
                                ->paginate(5);

        } else if (Auth::user()->isHR() || ($id === $this->userId && $this->disabled)) {

            $eligibilities = ApplicantEligibility::with('type_eligibility')
                                ->where('user_id', $id)
                                ->where('application_id', $this->applicationId)
                                ->orderBy('date_taken', 'desc')
                                ->paginate(5);
        }

        $type_eligibilities = TypeEligibility::pluck('name','id');

        return view('livewire.applicant-eligibility-table', [
            'eligibilities' => $eligibilities,
            'type_eligibilities' => $type_eligibilities,
        ]);
    }
}
