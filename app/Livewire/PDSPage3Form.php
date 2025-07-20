<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PDSPage3Form extends Component
{
    public $accordionVolunteerOpen;
    public $accordionTrainingOpen;
    public $accordionOtherOpen;
    public $applicationId;
    public $userId;
    public $disabled;
    public $readonly;

    public function mount($accordionVolunteerOpen = false, $accordionTrainingOpen = false, $accordionOtherOpen = false)
    {        
        $this->accordionVolunteerOpen = $accordionVolunteerOpen;
        $this->accordionTrainingOpen = $accordionTrainingOpen;
        $this->accordionOtherOpen = $accordionOtherOpen;
    }
    public function render()
    {
        return view('livewire.p-d-s-page3-form');
    }
}
