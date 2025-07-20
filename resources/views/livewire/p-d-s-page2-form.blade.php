<div>
    @if(!$readonly)
        <div class="bg-blue-100 text-gray-800 p-4 rounded-md mb-5 text-sm dark:bg-gray-600 dark:text-gray-200">
            <p><strong>Instructions:</strong> Indicate <code>N/A</code> if not applicable. DO NOT ABBREVIATE.</p>
        </div>
    @endif

    @php
        // Include ALL potential accordion parameters for any accordion on this page
        $shouldOpenEligibilityBasedOnUrl = request()->query('accordionEligibilityOpen') === '1';
        $shouldOpenWorkBasedOnUrl = request()->query('accordionWorkOpen') === '1';

        $accordionSpecifiedInUrl = $shouldOpenEligibilityBasedOnUrl
                                   || $shouldOpenWorkBasedOnUrl;

        $readonlyCondition = ($readonly && $userId !== null);
    @endphp

    <div x-data="{ isOpen: @json($shouldOpenEligibilityBasedOnUrl) || (@json(!$accordionSpecifiedInUrl) && (@json($readonlyCondition) || !!@entangle('accordionEligibilityOpen')) ) }" id="eligibility-accordion">
        <h2 id="eligibility-heading">
            <button type="button"
                @click="isOpen = !isOpen"
                :aria-expanded="isOpen"
                aria-label="Toggle Eligibility Section"
                aria-controls="eligibility-body"
                class="flex items-center justify-between w-full p-5 font-semibold text-gray-700 border border-gray-200 hover:bg-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-200 dark:hover:bg-gray-600 dark:hover:text-blue-100 dark:bg-gray-800 gap-3">
                <span class="text-sm inline-block text-left">IV. Civil Service Eligibility</span>
                <svg :class="isOpen ? '' : 'rotate-180 shrink-0'" class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M9 5 5 1 1 5"/>
                </svg>
            </button>
        </h2>
        <div x-show="isOpen" id="eligibility-body" aria-labelledby="eligibility-heading" role="region">
            <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                @livewire('applicant-eligibility-table', ['applicationId' => $applicationId, 'userId' => $userId, 'readonly' => $readonly])
            </div>
        </div>
    </div>

    <div x-data="{ isOpen: @json($shouldOpenWorkBasedOnUrl) || (@json(!$accordionSpecifiedInUrl) && (@json($readonlyCondition) || !!@entangle('accordionWorkOpen')) ) }" id="work-experience-accordion">
        <h2 id="work-experience-heading">
            <button type="button"
                @click="isOpen = !isOpen"
                :aria-expanded="isOpen"
                aria-label="Toggle Work Experience Section"
                aria-controls="work-experience-body"
                class="flex items-center justify-between w-full p-5 font-semibold text-gray-700 border border-gray-200 hover:bg-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-200 dark:hover:bg-gray-600 dark:hover:text-blue-100 dark:bg-gray-800 gap-3">
                <span class="text-sm inline-block text-left">V. Work Experience</span>
                <svg :class="isOpen ? '' : 'rotate-180 shrink-0'" class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M9 5 5 1 1 5"/>
                </svg>
            </button>
        </h2>
        <div x-show="isOpen" id="work-experience-body" aria-labelledby="work-experience-heading" role="region">
            <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                @livewire('applicant-work-experience-table', ['applicationId' => $applicationId, 'userId' => $userId, 'readonly' => $readonly])
            </div>
        </div>
    </div>
</div>