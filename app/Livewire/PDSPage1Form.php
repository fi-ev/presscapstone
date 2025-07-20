<?php

namespace App\Livewire;

use Livewire\Component;

class PDSPage1Form extends Component
{
    public $profile;
    public $family;
    public $accordionProfileOpen;
    public $accordionFamilyOpen;
    public $accordionEducationOpen;
    public $applicationId;
    public $userId;
    public $disabled;
    public $readonly;
    
    public function mount($accordionProfileOpen = false, $accordionFamilyOpen = false, $accordionEducationOpen = false)
    {
        $this->accordionProfileOpen = $accordionProfileOpen;
        $this->accordionFamilyOpen = $accordionFamilyOpen;
        $this->accordionEducationOpen = $accordionEducationOpen;
    }

    public function render()
    {
        return view('livewire.p-d-s-page1-form');
    }
}
