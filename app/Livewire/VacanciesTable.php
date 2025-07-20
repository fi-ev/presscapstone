<?php

namespace App\Livewire;

use App\Models\Vacancy;
use App\Models\Position;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Exception;

class VacanciesTable extends Component
{
    use WithPagination;
    use WithFileUploads; 

    public $selected = [];
    public $search = '';
    public $selectAll = false;
    public $status = 'all';
    public $now = null;
    public $positions = [];
    public $selectedPositionId;
    public $selectedPosition;
    public $isOpenAdd = false;
    public $isOpenEdit = false;
    public $editVacancy = null;
    public $vacancyStatuses = [];
    public $vacancyId;
    public $vacancy_code;
    public $remarks;
    public $posting_date;
    public $closing_date;
    public $filepath;
    public $filename;
    public $attachment;
    public $url;

    protected $defaultValues = [
        'selectedPositionId' => '',
        'vacancy_code' => '',
        'remarks' => '',
        'posting_date' => null,
        'closing_date' => null,
        'attachment' => '',
        'url' => ''
    ];

    public function mount()
    {
        $this->now = Carbon::now()->format('Y-m-d');
        $this->positions = Position::all()->where('is_active', true)->pluck('title', 'id');
        $vacancies = Vacancy::all();
        foreach ($vacancies as $vacancy) {
            $this->vacancyStatuses[$vacancy->id] = $vacancy->status;
        }
    }

    public function openAddModal()
    {
        $this->fill($this->defaultValues);
        $this->isOpenAdd = true;
        $this->isOpenEdit = false;
    }

    public function openEditModal($id)
    {
        $this->editVacancy = Vacancy::findOrFail($id);
        $this->vacancy_code = $this->editVacancy->vacancy_code;
        $this->remarks = $this->editVacancy->remarks;
        $this->posting_date = $this->editVacancy->posting_date ? $this->editVacancy->posting_date->format('Y-m-d') : null;
        $this->closing_date = $this->editVacancy->closing_date ? $this->editVacancy->closing_date->format('Y-m-d') : null;
        $this->url = $this->editVacancy->url ?? null;

        $this->selectedPositionId = $this->editVacancy->position_id;
        $this->selectedPosition = Position::find($this->selectedPositionId);

        $this->isOpenEdit = true;
        $this->isOpenAdd = false; 
    }

    public function closeAddModal()
    {
        $this->isOpenAdd = false;
    }

    public function closeEditModal()
    {
        $this->editVacancy = null;
        $this->isOpenEdit = false;
        $this->selectedPosition = [];
        $this->selectedPositionId = null;
    }

    public function updatedSelectedPositionId($positionId)
    {
        $this->selectedPosition = Position::find($positionId);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatedSelectAll($value)
    {
        if ($value) {
            $this->selected = Vacancy::search($this->search)->pluck('id')->toArray();
        } else {
            $this->selected = [];
        }
    }

    public function updatedSelected()
    {
        $totalItemsCount = Vacancy::search($this->search)->count();
        $this->selectAll = count($this->selected) === $totalItemsCount;
    }

    public function deleteSelected()
    {
        try {
            Vacancy::whereIn('id', $this->selected)->delete();
            $this->selected = [];
            $this->selectAll = false;

            flashMessage('Selected vacancy(ies) have been successfully deleted!', 'success', 'delete');
        } catch (Exception $e) { 
            flashMessage('Failed to delete selected vacancy(ies).', 'error', 'delete');
        }
    }

    public function changeVacancyStatus($vacancyId)
    {
        try {
            $vStatus = $this->vacancyStatuses[$vacancyId];
            $vacancy = Vacancy::find($vacancyId);
            if ($vacancy) {
                $vacancy->status = $vStatus;
                $vacancy->save();
                
                session()->flash('message', 'Vacancy status updated successfully!');
                session()->flash('message-type', 'success');
                session()->flash('action-type', 'update');
            }
        } catch (Exception $e) { 
            session()->flash('message', 'Failed to update vacancy status.');
            session()->flash('message-type', 'error');
            session()->flash('action-type', 'update');
        }
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function submit()
    {
        $this->validate([
            'selectedPositionId' => 'required|integer',
            'vacancy_code' => 'nullable|string|max:255',
            'remarks' => 'nullable|string|max:255',
            'posting_date' => 'required|date',
            'closing_date' => 'required|date|after_or_equal:posting_date',
            'attachment' => $this->editVacancy && !$this->attachment ? 'nullable' : 'nullable|file|mimes:pdf|max:2048',
            'url' => 'nullable|string|max:255',
        ], [
            'selectedPositionId.required' => 'The position ID is required.',
            'closing_date.after_or_equal' => 'The closing date must be on or after the posting date.',
        ]);

        try {
            if (!Auth::user()->isHR()) abort(403);

            if ($this->attachment) {
                $name = $this->attachment->getClientOriginalName();
                $path = 'vacancies/' . $this->attachment->hashName();
                $this->attachment->storeAs('public/uploads/', $path);
            } else {
                $path = $this->editVacancy ? $this->editVacancy->filepath : '';
                $name = $this->editVacancy ? $this->editVacancy->filename : '';
            }

            if ($this->editVacancy) {
                $vacancy = Vacancy::find($this->editVacancy->id);
                $vacancy->update([
                    'position_id' => $this->selectedPositionId,
                    'vacancy_code' => $this->vacancy_code,
                    'remarks' => $this->remarks,
                    'posting_date' => $this->posting_date,
                    'closing_date' => $this->closing_date,
                    'filepath' => $path,
                    'filename' => $name,
                    'url' => $this->url
                ]);
                session()->flash('message', 'Vacancy updated successfully!');
            } else {
                Vacancy::create([
                    'position_id' => $this->selectedPositionId,
                    'vacancy_code' => $this->vacancy_code,
                    'remarks' => $this->remarks,
                    'posting_date' => $this->posting_date,
                    'closing_date' => $this->closing_date,
                    'filepath' => $path,
                    'filename' => $name,
                    'url' => $this->url
                ]);
                session()->flash('message', 'New vacancy created successfully!');
            }

            session()->flash('message-type', 'success');
            session()->flash('action-type', 'create');
            return redirect()->route('vacancies.index');
        } catch (Exception $e) {
            session()->flash('message', 'Failed to save vacancy.');
            session()->flash('message-type', 'error');
            session()->flash('action-type', 'create');
            return redirect()->route('vacancies.index');
        }
    }

    public function delete($id)
    {
        try {
            $vacancy = Vacancy::findOrFail($id);
            $vacancy->delete();

            session()->flash('message', 'Vacancy deleted successfully!');
            session()->flash('message-type', 'success');
            session()->flash('action-type', 'delete');

            return redirect()->route('vacancies.index');
        } catch (Exception $e) { 
            session()->flash('message', 'Failed to delete vacancy.');
            session()->flash('message-type', 'error');
            session()->flash('action-type', 'delete');

            return redirect()->route('vacancies.index');
        }
    }

    public function render()
    {
        return view('livewire.vacancies-table', [
            'vacancies' => Vacancy::query()
                ->withCount('applications')
                ->with('position')
                ->when($this->search, function ($query) {
                    $query->where(function ($query) {
                        $query->whereHas('position', function ($query) {
                            $query->where('title', 'like', '%' . $this->search . '%')
                                ->orWhere('plantilla_no', 'like', '%' . $this->search . '%');
                        })
                        ->orWhere('vacancy_code', 'like', '%' . $this->search . '%');
                    });
                })
                ->when($this->status !== 'all', function($query) {
                    $query->where('status', $this->status);
                })
                ->paginate(5),
            'now' => $this->now,
        ]);
    }
}
