<?php

namespace App\Livewire;

use App\Models\ApplicantVolunteerWork;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Exception;

class ApplicantVolunteerWorkTable extends Component
{
    use WithPagination;
    public $isOpenAdd = false;
    public $isOpenEdit = false;
    public $volunteerId;
    public $editVolunteer = null;
    public $organization_name;
    public $organization_address;
    public $start_date;
    public $end_date;
    public $hours_no;
    public $position;
    public $applicationId;
    public $userId;
    public $disabled;
    protected $defaultValues = [
        'organization_name' => '',
        'organization_address' => '',
        'start_date' => null,
        'end_date' => null,
        'hours_no' => null,
        'position' => '',
    ];

    public function openAddModal()
    {
        $this->fill($this->defaultValues);
        $this->isOpenAdd = true;
        $this->isOpenEdit = false;
    }

    public function openEditModal($id)
    {
        $this->editVolunteer = ApplicantVolunteerWork::findOrFail($id);

        $this->organization_name = $this->editVolunteer->organization_name;
        $this->organization_address = $this->editVolunteer->organization_address;
        $this->start_date = $this->editVolunteer->start_date->format('Y-m-d');
        $this->end_date = $this->editVolunteer->end_date->format('Y-m-d');
        $this->hours_no = $this->editVolunteer->hours_no;
        $this->position = $this->editVolunteer->position;

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
        $this->editVolunteer = null;
    }

    public function submit()
    {
        $this->validate([
            'organization_name' =>  'required|string|max:255',
            'organization_address' =>  'required|string|max:255',
            'start_date' =>  'required|date|date_format:Y-m-d',
            'end_date' =>  'required|date|date_format:Y-m-d',
            'hours_no' => 'required|numeric',
            'position' => 'required|string|max:255',
        ]);

        try {
            if (!Auth::user()->isApplicant()) abort(403);

            if($this->editVolunteer)
            {
                $volunteer = ApplicantVolunteerWork::find($this->editVolunteer->id);
                $volunteer->update([
                    'user_id' => Auth::user()->id,
                    'organization_name' => $this->organization_name,
                    'organization_address' => $this->organization_address,
                    'start_date' => $this->start_date,
                    'end_date' => $this->end_date,
                    'hours_no' => $this->hours_no,
                    'position' => $this->position,
                ]);
                session()->flash('message', 'Volunteer work information updated successfully!');
                session()->flash('message-type', 'success');
                session()->flash('action-type', 'update');
            }
            else 
            {
                $latestVersion = ApplicantVolunteerWork::orderBy('version', 'desc')->pluck('version')->first() ?? 1;
                ApplicantVolunteerWork::create([
                    'user_id' => Auth::user()->id,
                    'organization_name' => $this->organization_name,
                    'organization_address' => $this->organization_address,
                    'start_date' => $this->start_date,
                    'end_date' => $this->end_date,
                    'hours_no' => $this->hours_no,
                    'position' => $this->position,
                    'version' => $latestVersion,
                ]);
                session()->flash('message', 'New volunteer work information created successfully!');
                session()->flash('message-type', 'success');
                session()->flash('action-type', 'create');
            }

            return redirect()->route('pds.index', ['activeTab' => 'tab3', 'accordionVolunteerOpen' => true]);
        } catch (Exception $e) { 
            Session()->flash('message', 'Failed to save volunteer work information.');
            session()->flash('message-type', 'error');
            session()->flash('action-type', 'create');

            return redirect()->route('pds.index', ['activeTab' => 'tab3', 'accordionVolunteerOpen' => true]);
        }
    }

    public function delete($id)
    {
        try {
            $volunteer = ApplicantVolunteerWork::findOrFail($id);
            $volunteer->delete();

            session()->flash('message', 'Volunteer work information deleted successfully!');
            session()->flash('message-type', 'success');
            session()->flash('action-type', 'delete');

            return redirect()->route('pds.index', ['activeTab' => 'tab3', 'accordionVolunteerOpen' => true]);
        } catch (Exception $e) { 
            Session()->flash('message', 'Failed to delete volunteer work information.');
            session()->flash('message-type', 'error');
            session()->flash('action-type', 'delete');

            return redirect()->route('pds.index', ['activeTab' => 'tab3', 'accordionVolunteerOpen' => true]);
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

            $volunteerWorks = ApplicantVolunteerWork::where('user_id', $id)
                                ->where('is_latest', 1)    
                                ->orderBy('start_date','desc')
                                ->orderBy('end_date','desc')                
                                ->paginate(5);

        } else if (Auth::user()->isHR() || ($id === $this->userId && $this->disabled)) {

            $volunteerWorks = ApplicantVolunteerWork::where('user_id', $this->userId)
                                ->where('application_id', $this->applicationId)
                                ->orderBy('start_date','desc')
                                ->orderBy('end_date','desc')                
                                ->paginate(5);
        }

        return view('livewire.applicant-volunteer-work-table', [
            'volunteerWorks' => $volunteerWorks
        ]);
    }
}
