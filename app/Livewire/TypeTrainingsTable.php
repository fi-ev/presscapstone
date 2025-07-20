<?php

namespace App\Livewire;

use App\Models\TypeTraining;
use App\Models\Position;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Exception;

class TypeTrainingsTable extends Component
{
    use WithPagination;

    public $selected = [];
    public $search = '';
    public $selectAll = false;
    public $status = 'all';
    public $isOpenAdd = false;
    public $isOpenEdit = false;
    public $editTraining = null;
    public $trainingId;
    public $name;
    protected $defaultValues = [
        'name' => '',
    ];

    public function openAddModal()
    {
        $this->fill($this->defaultValues);
        $this->isOpenAdd = true;
        $this->isOpenEdit = false;
    }

    public function openEditModal($id)
    {
        $this->editTraining = TypeTraining::findOrFail($id);
        $this->name = $this->editTraining->name;

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

    public function updatingSearch()
    {
        $this->resetPage();
    }

    // all that is selected from current page
    public function updatedSelectAll($value)
    {
        if ($value) {
            $this->selected = TypeTraining::search($this->search)->pluck('id')->toArray();
        } else {
            $this->selected = [];
        }
    }

    // select all
    public function updatedSelected()
    {
        $totalItemsCount = TypeTraining::search($this->search)->count();
        $this->selectAll = count($this->selected) === $totalItemsCount;
    }

    public function deleteSelected()
    {
        TypeTraining::whereIn('id', $this->selected)->delete();
        $this->selected = [];
        $this->selectAll = false;

        session()->flash('message', 'Selected training(s) have been succesfully deleted.');
        session()->flash('message-type', 'success');
        session()->flash('action-type', 'delete');
    }

    public function submit()
    {
        $this->validate([
            'name' => 'required|string'
        ],[
            'name.required' => 'The name is required.',
        ]);

        try {

            if($this->editTraining)
            {
                $training = TypeTraining::findOrFail($this->editTraining->id);
                $training->update([
                    'name' => $this->name
                ]);
            
                session()->flash('message', 'Training type updated successfully!');
                session()->flash('message-type', 'success');
                session()->flash('action-type', 'update');
                
            }
            else 
            {
                TypeTraining::create([
                    'name' => $this->name
                ]);
                session()->flash('message', 'New training type created successfully!');
                session()->flash('message-type', 'success');
                session()->flash('action-type', 'create');
            }

            return redirect()->route('types.index', ['activeTab' => 'tab1']);

        } catch (Exception $e) { 
            Session()->flash('message', 'Failed to add new training type.');
            session()->flash('message-type', 'error');
            session()->flash('action-type', 'create');

            return redirect()->route('types.index', ['activeTab' => 'tab1']);
        }
    }

    public function delete($id)
    {
        try {
            $restricted = 0;

            $training = TypeTraining::findOrFail($id);
            $positions = Position::all()->pluck('trainings','id');
            foreach($positions as $position)
            {
                $decodedPosition = json_decode($position, true);
                if (in_array($this->trainingId, $decodedPosition)) {
                    $restricted++;
                }
            }

            if($restricted > 0) {
                session()->flash('message', 'Cannot delete item. Training type is being used.');
                session()->flash('message-type', 'error');
                session()->flash('action-type', 'delete');
            } else if($positions->count() > 1 && $restricted === 0) {
                $training->delete();

                session()->flash('message', 'Training type deleted successfully!');
                session()->flash('message-type', 'success');
                session()->flash('action-type', 'delete');
            }

            return redirect()->route('types.index', ['activeTab' => 'tab1']);
        } catch (Exception $e) { 
            Session()->flash('message', 'Failed to delete training type.');
            session()->flash('message-type', 'error');
            session()->flash('action-type', 'delete');

            return redirect()->route('types.index', ['activeTab' => 'tab1']);
        }
    }

    public function render()
    {
        return view('livewire.type-trainings-table', [
            'trainings' => TypeTraining::query()
                ->when($this->search, function($query) {
                    $query->where('name', 'like', '%' . $this->search . '%');
                })
                ->paginate(5),
        ]);
        
    }
}
