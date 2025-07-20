<?php

namespace App\Livewire;

use App\Models\Position;
use App\Models\Vacancy;
use App\Models\TypeCompetency;
use App\Models\TypeEligibility;
use App\Models\TypeTraining;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Exception;

class PositionsTable extends Component
{
    use WithPagination;

    public $positionId;
    public $editPosition = null;
    public $selected = [];
    public $search = '';
    public $selectAll = false;
    public $status = 'all';
    public $title;
    public $assignment_place;
    public $employment_type;
    public $plantilla_no;
    public $salary_grade;
    public $monthly_salary;
    public $description;
    public $education;
    public $work_experience;
    public $trainings = [];
    public $selectedTrainings = []; 
    public $searchTraining = '';
    public $eligibilities = [];
    public $selectedEligibilities = []; 
    public $searchEligibility = '';
    public $competencies = [];
    public $selectedCompetencies = []; 
    public $searchCompetency = '';
    public $isOpenAdd = false;
    public $isOpenEdit = false;
    protected $defaultValues = [
        'title' => '',
        'assignment_place' => '',
        'employment_type' => '',
        'plantilla_no' => '',
        'salary_grade' => '',
        'monthly_salary' => '',
        'description' => '',
        'education' => '',
        'work_experience' => ''
    ];

    public function mount()
    {
        $this->trainings = TypeTraining::all()->pluck('name','id')->toArray();
        $this->eligibilities = TypeEligibility::all()->pluck('name','id')->toArray();
        $this->competencies = TypeCompetency::all()->pluck('name','id')->toArray();
    }

    public function openAddModal()
    {
        $this->fill($this->defaultValues);
        $this->isOpenAdd = true;
        $this->isOpenEdit = false;
    }

    public function openEditModal($id)
    {
        $this->editPosition = Position::findOrFail($id);
        
        $this->title = $this->editPosition->title;
        $this->assignment_place = $this->editPosition->assignment_place;
        $this->employment_type = $this->editPosition->employment_type;
        $this->plantilla_no = $this->editPosition->plantilla_no;
        $this->salary_grade = $this->editPosition->salary_grade;
        $this->monthly_salary = $this->editPosition->monthly_salary;
        $this->description = $this->editPosition->description;
        $this->education = $this->editPosition->education;
        $this->work_experience = $this->editPosition->work_experience;

        $this->selectedTrainings = $this->editPosition->trainings;
        $this->selectedCompetencies = $this->editPosition->competencies;
        $this->selectedEligibilities = $this->editPosition->eligibilities;
        
        $this->selectedTrainings = json_decode($this->editPosition->trainings, true);
        $this->selectedCompetencies = json_decode($this->editPosition->competencies, true);
        $this->selectedEligibilities = json_decode($this->editPosition->eligibilities, true);
        
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
        $this->editPosition = null;
    }

    // all that is selected from current page
    public function updatedSelectAll($value)
    {
        if ($value) {
            $this->selected = Position::search($this->search)->pluck('id')->toArray();
        } else {
            $this->selected = [];
        }
    }

    // select all
    public function updatedSelected()
    {
        $totalItemsCount = Position::search($this->search)->count();
        $this->selectAll = count($this->selected) === $totalItemsCount;
    }

    // multiple delete
    public function deleteSelected()
    {
        try{
            Position::whereIn('id', $this->selected)->delete();
            $this->selected = [];
            $this->selectAll = false;

            flashMessage('Selected position(s) have been succesfully deleted!', 'success', 'delete');
            
        } catch (Exception $e) { 
            flashMessage('Failed to delete selected position(s).', 'error', 'delete');
        }
    }

    public function toggleActive($positionId)
    {
        try{
            $position = Position::find($positionId);
            if ($position) {
                $position->is_active = !$position->is_active;
                $position->save();
                
                flashMessage('Position status has been changed.', 'success', 'update');
            }

        } catch (Exception $e) { 
            flashMessage('Failed to update position status.', 'error', 'update');
        }
    }
    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function submit()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'assignment_place' => 'required|string|max:255',
            'employment_type' => 'required|string|max:255',
            'plantilla_no' => 'nullable|string|max:255',
            'salary_grade' => 'required|integer',
            'monthly_salary' => 'required|numeric',
            'description' => 'required|string',
            'education' => 'required|string|max:255',
            'work_experience' => 'required|string|max:255',
            'trainings' => 'required|array',
            'competencies' => 'required|array',
            'eligibilities' => 'required|array',
        ]);

        try {
            if (!Auth::user()->isHR()) abort(403);

            $trainingsJson = json_encode($this->selectedTrainings);
            $competenciesJson = json_encode($this->selectedCompetencies);
            $eligibilitiesJson = json_encode($this->selectedEligibilities);

            if($this->editPosition)
            {
                $position = Position::find($this->editPosition->id);
                $position->update([
                    'title' => $this->title,
                    'assignment_place' => $this->assignment_place,
                    'employment_type' => $this->employment_type,
                    'plantilla_no' => $this->plantilla_no,
                    'salary_grade' => $this->salary_grade,
                    'monthly_salary' => $this->monthly_salary,
                    'description' => $this->description,
                    'education' => $this->education,
                    'work_experience' => $this->work_experience,
                    'trainings' => $trainingsJson,
                    'competencies' => $competenciesJson,
                    'eligibilities' => $eligibilitiesJson,
                ]);
                session()->flash('message', 'Position updated successfully!');
                session()->flash('message-type', 'success');
                session()->flash('action-type', 'update');
            }
            else 
            {
                Position::create([
                    'title' => $this->title,
                    'assignment_place' => $this->assignment_place,
                    'employment_type' => $this->employment_type,
                    'plantilla_no' => $this->plantilla_no,
                    'salary_grade' => $this->salary_grade,
                    'monthly_salary' => $this->monthly_salary,
                    'description' => $this->description,
                    'education' => $this->education,
                    'work_experience' => $this->work_experience,
                    'trainings' => $trainingsJson,
                    'competencies' => $competenciesJson,
                    'eligibilities' => $eligibilitiesJson,
                ]);
                session()->flash('message', 'New position created successfully!');
                session()->flash('message-type', 'success');
                session()->flash('action-type', 'create');
            }
            return redirect()->route('positions.index');

        } catch (Exception $e) { 
            Session()->flash('message', 'Failed to save position.');
            session()->flash('message-type', 'error');
            session()->flash('action-type', 'create');

            return redirect()->route('positions.index');
        }
    }

    public function delete($id)
    {

        try {
            $position = Position::findOrFail($id);
            if(Vacancy::where('position_id', $this->positionId)->exists()) {
                session()->flash('message', 'Cannot delete item. Position is being used.');
                session()->flash('message-type', 'error');
                session()->flash('action-type', 'delete');

                return redirect()->route('positions.index');
            } else {
                $position->delete();
            }

            session()->flash('message', 'Position deleted successfully!');
            session()->flash('message-type', 'success');
            session()->flash('action-type', 'delete');

            return redirect()->route('positions.index');
        } catch (Exception $e) { 
            Session()->flash('message', 'Failed to delete position.');
            session()->flash('message-type', 'error');
            session()->flash('action-type', 'delete');

            return redirect()->route('positions.index');
        }
    }

    public function render()
    {        
        $filteredTrainings = array_filter($this->trainings, function($name, $id) {
            return str_contains(strtolower($name), strtolower($this->searchTraining));
        }, ARRAY_FILTER_USE_BOTH);

        $filteredEligibilities = array_filter($this->eligibilities, function($name) {
            return str_contains(strtolower($name), strtolower($this->searchEligibility));
        });

        $filteredCompetencies = array_filter($this->competencies, function($name) {
            return str_contains(strtolower($name), strtolower($this->searchCompetency));
        });
        

        return view('livewire.positions-table', [
            'positions' => Position::query()
                ->when($this->search, function($query) {
                    $query->where('title', 'like', '%' . $this->search . '%')
                        ->orWhere('plantilla_no', 'like', '%' . $this->search . '%')
                        ->orWhere('assignment_place', 'like', '%' . $this->search . '%')
                        ->orWhere('employment_type', 'like', '%' . $this->search . '%')
                        ->orWhere('salary_grade', 'like', '%' . $this->search . '%');
                })
                ->when($this->status !== 'all', function($query) {
                    $query->where('is_active', $this->status);
                })
                ->paginate(5),
            'filteredTrainings' => $filteredTrainings,
            'filteredEligibilities' => $filteredEligibilities,
            'filteredCompetencies' => $filteredCompetencies,
        ]);
        
    }
}
