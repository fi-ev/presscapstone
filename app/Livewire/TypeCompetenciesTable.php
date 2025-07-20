<?php

namespace App\Livewire;

use App\Models\TypeCompetency;
use App\Models\Position;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Exception;


class TypeCompetenciesTable extends Component
{
    use WithPagination;

    public $selected = [];
    public $search = '';
    public $selectAll = false;
    public $status = 'all';
    public $isOpenAdd = false;
    public $isOpenEdit = false;
    public $editCompetency = null;
    public $competencyId;
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
        $this->editCompetency = TypeCompetency::findOrFail($id);
        $this->name = $this->editCompetency->name;

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
        $this->editCompetency = null;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    // all that is selected from current page
    public function updatedSelectAll($value)
    {
        if ($value) {
            $this->selected = TypeCompetency::search($this->search)->pluck('id')->toArray();
        } else {
            $this->selected = [];
        }
    }

    // select all
    public function updatedSelected()
    {
        $totalItemsCount = TypeCompetency::search($this->search)->count();
        $this->selectAll = count($this->selected) === $totalItemsCount;
    }

    public function deleteSelected()
    {
        try {
            TypeCompetency::whereIn('id', $this->selected)->delete();
            $this->selected = [];
            $this->selectAll = false;

            session()->flash('message', 'Selected competency(ies) have been succesfully deleted.');
            session()->flash('message-type', 'success');
            session()->flash('action-type', 'delete');

            return redirect()->route('types.index', ['activeTab' => 'tab3']);
        } catch (Exception $e) { 
            Session()->flash('message', 'Failed to delete competency type.');
            session()->flash('message-type', 'error');
            session()->flash('action-type', 'delete');

            return redirect()->route('types.index', ['activeTab' => 'tab3']);
        }
    }

    public function submit()
    {
    
        $this->validate([
            'name' => 'required|string|max:255',
        ],[
            'name.required' => 'The name is required.',
        ]);

        try {
            if (!Auth::user()->isHR()) abort(403);


            if($this->editCompetency)
            {
                $competency = TypeCompetency::findOrFail($this->editCompetency->id);
                $competency->update([
                    'name' => $this->name
                ]);
            
                session()->flash('message', 'Education information updated successfully!');
                session()->flash('message-type', 'success');
                session()->flash('action-type', 'update');
                
            }
            else 
            {
                TypeCompetency::create([
                    'name' => $this->name
                ]);
                session()->flash('message', 'New competency type created successfully!');
                session()->flash('message-type', 'success');
                session()->flash('action-type', 'create');
            }

            return redirect()->route('types.index', ['activeTab' => 'tab3']);
        } catch (Exception $e) { 
            Session()->flash('message', 'Failed to add new competency type.');
            session()->flash('message-type', 'error');
            session()->flash('action-type', 'create');

            return redirect()->route('types.index', ['activeTab' => 'tab3']);
        }
    }

    public function delete($id) {
        try {
            $restricted = 0;

            $competency = TypeCompetency::findOrFail($id);
            $positions = Position::all()->pluck('competencies');
            foreach($positions as $position)
            {
                $decodedPosition = json_decode($position, true);
                if (in_array($this->competencyId, $decodedPosition)) {
                    $restricted++;
                }
            }

            if($restricted > 0) {
                session()->flash('message', 'Cannot delete item. Competency type is being used.');
                session()->flash('message-type', 'error');
                session()->flash('action-type', 'delete');
            } else if($positions->count() > 1 && $restricted === 0) {
                $competency->delete();

                session()->flash('message', 'Competency type deleted successfully!');
                session()->flash('message-type', 'success');
                session()->flash('action-type', 'delete');
            }

            return redirect()->route('types.index', ['activeTab' => 'tab3']);
        } catch (Exception $e) { 
            Session()->flash('message', 'Failed to delete competency type.');
            session()->flash('message-type', 'error');
            session()->flash('action-type', 'delete');

            return redirect()->route('types.index', ['activeTab' => 'tab3']);
        }
    }

    public function render()
    {
        return view('livewire.type-competencies-table', [
            'competencies' => TypeCompetency::query()
                ->when($this->search, function($query) {
                    $query->where('name', 'like', '%' . $this->search . '%');
                })
                ->paginate(5),
        ]);
        
    }
}
