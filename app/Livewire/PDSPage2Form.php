<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PDSPage2Form extends Component
{
    public $accordionEligibilityOpen;
    public $accordionWorkOpen;
    public $applicationId;
    public $userId;
    public $disabled;
    public $readonly;

    public function mount($accordionEligibilityOpen = false, $accordionWorkOpen = false)
    {        
        $this->accordionEligibilityOpen = $accordionEligibilityOpen;
        $this->accordionWorkOpen = $accordionWorkOpen;
    }
    public function render()
    {
        return view('livewire.p-d-s-page2-form');
    }
}
