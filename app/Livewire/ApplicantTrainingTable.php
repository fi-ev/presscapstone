<?php

namespace App\Livewire;

use App\Models\ApplicantTraining;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Exception;


class ApplicantTrainingTable extends Component
{
    use WithPagination;
    public $isOpenAdd = false;
    public $isOpenEdit = false;
    public $trainingId;
    public $editTraining = null;
    public $activity_title;
    public $start_date;
    public $end_date;
    public $hours_no;
    public $type;
    public $organizer;
    public $applicationId;
    public $userId;
    public $disabled;
    protected $defaultValues = [
        'activity_title' => '',
        'start_date' => null,
        'end_date' => null,
        'hours_no' => '',
        'type' => '',
        'organizer' => '',
    ];


    public function openAddModal()
    {
        $this->fill($this->defaultValues);
        $this->isOpenAdd = true;
        $this->isOpenEdit = false;
    }

    public function openEditModal($id)
    {
        $this->editTraining = ApplicantTraining::findOrFail($id);

        $this->activity_title = $this->editTraining->activity_title;
        $this->start_date = $this->editTraining->start_date->format('Y-m-d');
        $this->end_date = $this->editTraining->end_date->format('Y-m-d');
        $this->hours_no = $this->editTraining->hours_no;
        $this->type = $this->editTraining->type;
        $this->organizer = $this->editTraining->organizer;

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
        $this->editTraining = null;
    }

    public function submit()
    {
        $this->validate([
            'activity_title' =>  'required|string|max:255',
            'start_date' =>  'required|date|date_format:Y-m-d',
            'end_date' =>  'required|date|date_format:Y-m-d',
            'hours_no' => 'required|numeric',
            'type' => 'required|string|max:255',
            'organizer' => 'required|string|max:255',
        ]);

        try {
            if (!Auth::user()->isApplicant()) abort(403);

            if($this->editTraining)
            {
                $training = ApplicantTraining::find($this->editTraining->id);
                $training->update([
                    'user_id' => Auth::user()->id,
                    'activity_title' => $this->activity_title,
                    'start_date' => $this->start_date,
                    'end_date' => $this->end_date,
                    'hours_no' => $this->hours_no,
                    'type' => $this->type,
                    'organizer' => $this->organizer,
                ]);
                session()->flash('message', 'Training information updated successfully!');
                session()->flash('message-type', 'success');
                session()->flash('action-type', 'update');
            }
            else 
            {
                $latestVersion = ApplicantTraining::orderBy('version', 'desc')->pluck('version')->first() ?? 1;
                ApplicantTraining::create([
                    'user_id' => Auth::user()->id,
                    'activity_title' => $this->activity_title,
                    'start_date' => $this->start_date,
                    'end_date' => $this->end_date,
                    'hours_no' => $this->hours_no,
                    'type' => $this->type,
                    'organizer' => $this->organizer,
                    'version' => $latestVersion,
                ]);
                session()->flash('message', 'New training information created successfully!');
                session()->flash('message-type', 'success');
                session()->flash('action-type', 'create');
            }

            return redirect()->route('pds.index', ['activeTab' => 'tab3', 'accordionTrainingOpen' => true]);
        } catch (Exception $e) { 
            Session()->flash('message', 'Failed to save training information.');
            session()->flash('message-type', 'error');
            session()->flash('action-type', 'create');

            return redirect()->route('pds.index', ['activeTab' => 'tab3', 'accordionTrainingOpen' => true]);
        }
    }

    public function delete($id)
    {

        try {
            $training = ApplicantTraining::findOrFail($id);
            $training->delete();

            session()->flash('message', 'Training information deleted successfully!');
            session()->flash('message-type', 'success');
            session()->flash('action-type', 'delete');

            return redirect()->route('pds.index', ['activeTab' => 'tab3', 'accordionTrainingOpen' => true]);
        } catch (Exception $e) { 
            Session()->flash('message', 'Failed to delete training information.');
            session()->flash('message-type', 'error');
            session()->flash('action-type', 'delete');

            return redirect()->route('pds.index', ['activeTab' => 'tab3', 'accordionTrainingOpen' => true]);
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

            $trainings = ApplicantTraining::where('user_id',  $id)
                    ->where('is_latest', 1)
                    ->orderBy('start_date','desc')
                    ->orderBy('end_date','desc')   
                    ->paginate(5);

        } else if (Auth::user()->isHR() || ($id === $this->userId && $this->disabled)) {

            $trainings = ApplicantTraining::where('user_id',  $this->userId)
                    ->where('application_id', $this->applicationId)
                    ->orderBy('start_date','desc')
                    ->orderBy('end_date','desc')   
                    ->paginate(5);
        }

        return view('livewire.applicant-training-table', [
            'trainings' => $trainings
        ]);
    }
}
