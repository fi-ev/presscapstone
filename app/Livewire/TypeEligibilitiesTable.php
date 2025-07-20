<?php

namespace App\Livewire;

use App\Models\TypeEligibility;
use App\Models\Position;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Exception;

class TypeEligibilitiesTable extends Component
{
    use WithPagination;

    public $selected = [];
    public $search = '';
    public $selectAll = false;
    public $status = 'all';
    public $isOpenAdd = false;
    public $isOpenEdit = false;
    public $editEligibility = null;
    public $eligibilityId;
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
        $this->editEligibility = TypeEligibility::findOrFail($id);
        $this->name = $this->editEligibility->name;

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
    
    public function updatingSearch()
    {
        $this->resetPage();
    }

    // all that is selected from current page
    public function updatedSelectAll($value)
    {
        if ($value) {
            $this->selected = TypeEligibility::search($this->search)->pluck('id')->toArray();
        } else {
            $this->selected = [];
        }
    }

    // select all
    public function updatedSelected()
    {
        $totalItemsCount = TypeEligibility::search($this->search)->count();
        $this->selectAll = count($this->selected) === $totalItemsCount;
    }

    public function deleteSelected()
    {
        TypeEligibility::whereIn('id', $this->selected)->delete();
        $this->selected = [];
        $this->selectAll = false;

        session()->flash('message', 'Selected eligibility(ies) have been succesfully deleted.');
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
            if($this->editEligibility)
            {
                $eligibility = TypeEligibility::findOrFail($this->editEligibility->id);
                $eligibility->update([
                    'name' => $this->name
                ]);
            
                session()->flash('message', 'Eligibility type updated successfully!');
                session()->flash('message-type', 'success');
                session()->flash('action-type', 'update');
                
            }
            else 
            {
                TypeEligibility::create([
                    'name' => $this->name
                ]);
                session()->flash('message', 'New eligibility type created successfully!');
                session()->flash('message-type', 'success');
                session()->flash('action-type', 'create');
            }

            return redirect()->route('types.index', ['activeTab' => 'tab2']);
    
        } catch (Exception $e) { 
            Session()->flash('message', 'Failed to add new eligibility type.');
            session()->flash('message-type', 'error');
            session()->flash('action-type', 'create');

            return redirect()->route('types.index', ['activeTab' => 'tab2']);
        }
    }

    public function delete($id)
    {
        try {
            $restricted = 0;

            $eligibility = TypeEligibility::findOrFail($id);
            $positions = Position::all()->pluck('eligibilities');
            foreach($positions as $position)
            {
                $decodedPosition = json_decode($position, true);
                if (in_array($this->eligibilityId, $decodedPosition)) {
                    $restricted++;
                }
            }

            if($restricted > 0) {
                session()->flash('message', 'Cannot delete item. Eligibility type is being used.');
                session()->flash('message-type', 'error');
                session()->flash('action-type', 'delete');
            } else if($positions->count() > 1 && $restricted === 0) {
                $eligibility->delete();

                session()->flash('message', 'Eligibility type deleted successfully!');
                session()->flash('message-type', 'success');
                session()->flash('action-type', 'delete');
            }

            return redirect()->route('types.index', ['activeTab' => 'tab2']);
            
        } catch (Exception $e) { 
            Session()->flash('message', 'Failed to delete eligibility type.');
            session()->flash('message-type', 'error');
            session()->flash('action-type', 'delete');

            return redirect()->route('types.index', ['activeTab' => 'tab2']);
        }
    }

    public function render()
    {
        return view('livewire.type-eligibilities-table', [
            'eligibilities' => TypeEligibility::query()
                ->when($this->search, function($query) {
                    $query->where('name', 'like', '%' . $this->search . '%');
                })
                ->paginate(5),
        ]);
        
    }
}
