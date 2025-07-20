<div>
    <ul class="flex flex-wrap text-sm font-medium text-center text-gray-700 border-b border-gray-200 dark:border-gray-700 dark:text-gray-200">
        <li class="me-2">
            <button href="#" 
            wire:click="setActiveTab('tab1')"
            class="inline-block p-4
                {{ $activeTab === 'tab1' 
                ? 'inline-block p-4 text-gray-800 font-bold bg-gray-100 rounded-t-lg active dark:bg-gray-800 dark:text-gray-200 cursor-not-allowed' 
                : 'rounded-t-lg hover:text-gray-600 hover:bg-white dark:hover:bg-gray-800 dark:hover:text-gray-300' }}"
                {{ $activeTab === 'tab1' ? 'disabled' : '' }}>
                Page 1
            </button>
        </li>
        <li class="me-2">
            <button href="#"
            wire:click="setActiveTab('tab2')"
            class="inline-block p-4 
                {{ $activeTab === 'tab2' 
                ? 'inline-block p-4 text-gray-800 font-bold bg-gray-100 rounded-t-lg active dark:bg-gray-800 dark:text-gray-200 cursor-not-allowed' 
                : 'rounded-t-lg hover:text-gray-600 hover:bg-white dark:hover:bg-gray-800 dark:hover:text-gray-300' }}"
                {{ $activeTab === 'tab2' ? 'disabled' : '' }}>
                Page 2
            </button>
        </li>
        <li class="me-2">
            <button href="#" 
            wire:click="setActiveTab('tab3')"
            class="inline-block p-4 
                {{ $activeTab === 'tab3' 
                ? 'inline-block p-4 text-gray-800 font-bold bg-gray-100 rounded-t-lg active dark:bg-gray-800 dark:text-gray-200 cursor-not-allowed' 
                : 'rounded-t-lg hover:text-gray-600 hover:bg-white dark:hover:bg-gray-800 dark:hover:text-gray-300' }}"
                {{ $activeTab === 'tab3' ? 'disabled' : '' }}>
                Page 3
            </button>
        </li>
        <li class="me-2">
            <button href="#" 
            wire:click="setActiveTab('tab4')"
            class="inline-block p-4 
                {{ $activeTab === 'tab4' 
                ? 'inline-block p-4  text-gray-800 font-bold bg-gray-100 rounded-t-lg active dark:bg-gray-800 dark:text-gray-200 cursor-not-allowed' 
                : 'rounded-t-lg hover:text-gray-600 hover:bg-white dark:hover:bg-gray-800 dark:hover:text-gray-300' }}"
                {{ $activeTab === 'tab4' ? 'disabled' : '' }}>
                Page 4
            </button>
        </li>
    </ul>
    <div class="mt-4">
        @if ($activeTab === 'tab1')
            @livewire('p-d-s-page1-form', [
                    'readonly' => $readonly,
                    'applicationId' => $applicationId,
                    'userId' => $userId,
                    'accordionProfileOpen' => $accordionProfileOpen,
                    'accordionFamilyOpen' => $accordionFamilyOpen,
                    'accordionEducationOpen' => $accordionEducationOpen
                    ])
        @elseif ($activeTab === 'tab2')
            @livewire('p-d-s-page2-form', [
                    'readonly' => $readonly,
                    'applicationId' => $applicationId,
                    'userId' => $userId,
                    'accordionEligibilityOpen' => $accordionEligibilityOpen,
                    'accordionWorkOpen' => $accordionWorkOpen
                    ])
        @elseif ($activeTab === 'tab3')
            @livewire('p-d-s-page3-form', [
                    'readonly' => $readonly,
                    'applicationId' => $applicationId,
                    'userId' => $userId,
                    'accordionVolunteerOpen' => $accordionVolunteerOpen,
                    'accordionTrainingOpen' => $accordionTrainingOpen,
                    'accordionOtherOpen' => $accordionOtherOpen
                    ])
        @elseif ($activeTab === 'tab4')
            @livewire('p-d-s-page4-form', [
                    'readonly' => $readonly,
                    'userId' => $userId,
                ])
        @endif
    </div>
</div>
