<?php

namespace App\Livewire;

use App\Models\ApplicantChild;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Exception;


class ApplicantChildrenTable extends Component
{
    use WithPagination;
    public $isOpenAdd = false;
    public $isOpenEdit = false;
    public $childId;
    public $editChild = null;
    public $full_name;
    public $birthdate;
    public $disabled;
    public $userId;
    public $applicationId;
    protected $defaultValues = [
        'full_name' => '',
        'birthdate' => null,
    ];

    public function openAddModal()
    {
        $this->fill($this->defaultValues);
        $this->isOpenAdd = true;
        $this->isOpenEdit = false;
    }

    public function openEditModal($id)
    {
        $this->editChild = ApplicantChild::findOrFail($id);

        $this->full_name = $this->editChild->full_name;
        $this->birthdate = $this->editChild->birthdate->format('Y-m-d');
        
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
        $this->editChild = null;
    }

    public function submit()
    {
        $this->validate([
            'full_name' => 'required|string|max:255',
            'birthdate' => 'required|date|date_format:Y-m-d|before_or_equal:today',
        ]);

        try {
            if (!Auth::user()->isApplicant()) abort(403);

            if($this->editChild)
            {
                $child = ApplicantChild::find($this->editChild->id);
                $child->update([
                    'user_id' => Auth::user()->id,
                    'full_name' => $this->full_name,
                    'birthdate' => $this->birthdate,
                ]);
                session()->flash('message', 'Child information updated successfully!');
                session()->flash('message-type', 'success');
                session()->flash('action-type', 'update');
            }
            else 
            {
                $latestVersion = ApplicantChild::orderBy('version', 'desc')->pluck('version')->first() ?? 1;
                ApplicantChild::create([
                    'user_id' => Auth::user()->id,
                    'full_name' => $this->full_name,
                    'birthdate' => $this->birthdate,
                ]);
                session()->flash('message', 'New child information created successfully!');
                session()->flash('message-type', 'success');
                session()->flash('action-type', 'create');
            }

            return redirect()->route('pds.index', ['activeTab' => 'tab1', 'accordionFamilyOpen' => true]);
        } catch (Exception $e) { 
            Session()->flash('message', 'Failed to save child information.');
            session()->flash('message-type', 'error');
            session()->flash('action-type', 'create');

            return redirect()->route('pds.index', ['activeTab' => 'tab1', 'accordionFamilyOpen' => true]);
        }
    }

    public function delete($id)
    {

        try {
            $child = ApplicantChild::findOrFail($id);
            $child->delete();

            session()->flash('message', 'Child information deleted successfully!');
            session()->flash('message-type', 'success');
            session()->flash('action-type', 'delete');

            return redirect()->route('pds.index', ['activeTab' => 'tab1', 'accordionFamilyOpen' => true]);
        } catch (Exception $e) { 
            Session()->flash('message', 'Failed to delete child information.');
            session()->flash('message-type', 'error');
            session()->flash('action-type', 'delete');

            return redirect()->route('pds.index', ['activeTab' => 'tab1', 'accordionFamilyOpen' => true]);
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

            $children = ApplicantChild::where('user_id', $id)
                    ->where('is_latest', 1)
                    ->paginate(5);

        } else if (Auth::user()->isHR() || ($id === $this->userId && $this->disabled)) {

            $children = ApplicantChild::where('user_id', $this->userId)
                    ->where('application_id', $this->applicationId)
                    ->paginate(5);
        }

        return view('livewire.applicant-children-table', [
            'children' => $children
        ]);
    }
}
