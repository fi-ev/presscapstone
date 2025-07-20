<?php

namespace App\Livewire\Emails;

use Livewire\Component;

class TemplatesTab extends Component
{
    public $activeTab;

    public function mount($activeTab)
    {
        $this->activeTab = $activeTab;
    }
    
    public function setActiveTab($tab)
    {
        if ($this->activeTab !== $tab) {
            $this->activeTab = $tab;
        }
    }
    public function render()
    {
        return view('livewire.emails.templates-tab', ['activeTab' => $this->activeTab]);
    }
}
