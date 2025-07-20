<?php

namespace App\Livewire;

use Livewire\Component;

class PDSMainTab extends Component
{
    public $activeTab;
    public $accordionProfileOpen;
    public $accordionFamilyOpen;
    public $accordionEducationOpen;
    public $accordionEligibilityOpen;
    public $accordionWorkOpen;
    public $accordionVolunteerOpen;
    public $accordionTrainingOpen;
    public $accordionOtherOpen;
    public $applicationId;
    public $userId;
    public $readonly;

    public function mount( $activeTab = 'tab1', $applicationId, $userId, $readonly,
                        $accordionProfileOpen = false, $accordionFamilyOpen = false, $accordionEducationOpen = false,
                        $accordionEligibilityOpen = false, $accordionWorkOpen = false, 
                        $accordionVolunteerOpen = false, $accordionTrainingOpen = false, $accordionOtherOpen = false)
    {
        $this->activeTab = $activeTab;
        $this->readonly = $readonly;
        $this->applicationid = $applicationId;
        $this->userId = $userId;
        $this->accordionProfileOpen = $accordionProfileOpen;
        $this->accordionFamilyOpen = $accordionFamilyOpen;
        $this->accordionEducationOpen = $accordionEducationOpen;
        $this->accordionEligibilityOpen = $accordionEligibilityOpen;
        $this->accordionWorkOpen = $accordionWorkOpen;
        $this->accordionVolunteerOpen = $accordionVolunteerOpen;
        $this->accordionTrainingOpen = $accordionTrainingOpen;
        $this->accordionOtherOpen = $accordionOtherOpen;
    }
    
    public function setActiveTab($tab)
    {
        if ($this->activeTab !== $tab) {
            $this->activeTab = $tab;
        }
    }

    public function render()
    {
        return view('livewire.p-d-s-main-tab', [
            'activeTab' => $this->activeTab,
            'readonly' => $this->readonly,
            'applicationId' => $this->applicationId,
            'userId' => $this->userId,
            'accordionProfileOpen' => $this->accordionProfileOpen,
            'accordionFamilyOpen' => $this->accordionFamilyOpen,
            'accordionEducationOpen' => $this->accordionEducationOpen,
            'accordionEligibilityOpen' => $this->accordionEligibilityOpen,
            'accordionWorkOpen' => $this->accordionWorkOpen,
            'accordionVolunteerOpen' => $this->accordionVolunteerOpen,
            'accordionTrainingOpen' => $this->accordionTrainingOpen,
            'accordionOtherOpen' => $this->accordionOtherOpen,
        ]);
    }
}
