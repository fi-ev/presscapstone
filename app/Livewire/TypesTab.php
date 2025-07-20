<?php

namespace App\Livewire;

use Livewire\Component;

class TypesTab extends Component
{

    public $activeTab;

    public function mount($activeTab = 'tab1')
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
        return view('livewire.types-tab', [
            'activeTab' => $this->activeTab,
        ]);
    }
}
