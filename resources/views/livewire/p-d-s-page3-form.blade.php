<div>
    @if(!$readonly)
        <div class="bg-blue-100 text-gray-800 p-4 rounded-md mb-5 text-sm dark:bg-gray-600 dark:text-gray-200">
            <p><strong>Instructions:</strong> Indicate <code>N/A</code> if not applicable. DO NOT ABBREVIATE.</p>
        </div>
    @endif

    @php
        $shouldOpenVolunteerBasedOnUrl = request()->query('accordionVolunteerOpen') === '1';
        $shouldOpenTrainingBasedOnUrl = request()->query('accordionTrainingOpen') === '1';
        $shouldOpenOtherBasedOnUrl = request()->query('accordionOtherOpen') === '1';

        $accordionSpecifiedInUrl = $shouldOpenVolunteerBasedOnUrl || $shouldOpenTrainingBasedOnUrl || $shouldOpenOtherBasedOnUrl;

        $readonlyCondition = ($readonly && $userId !== null);
    @endphp

    <div x-data="{ isOpen: @json($shouldOpenVolunteerBasedOnUrl) || (@json(!$accordionSpecifiedInUrl) && (@json($readonlyCondition) || !!@entangle('accordionVolunteerOpen')) ) }" id="volunteer-work-accordion">
        <h2 id="volunteer-work-heading">
            <button type="button"
                @click="isOpen = !isOpen"
                :aria-expanded="isOpen"
                aria-label="Toggle Volunteer Work Section"
                aria-controls="volunteer-work-body"
                class="flex items-center justify-between w-full p-5 font-semibold text-gray-700 border border-gray-200 hover:bg-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-200 dark:hover:bg-gray-600 dark:hover:text-blue-100 dark:bg-gray-800 gap-3">
                <span class="text-sm inline-block text-left">VI. Volunteer Work in Civic / Non-Government / People / Volunteer Organizations</span>
                <svg :class="isOpen ? '' : 'rotate-180 shrink-0'" class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M9 5 5 1 1 5"/>
                </svg>
            </button>
        </h2>
        <div x-show="isOpen" id="volunteer-work-body" aria-labelledby="volunteer-work-heading" role="region">
            <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                @livewire('applicant-volunteer-work-table', ['applicationId' => $applicationId, 'userId' => $userId, 'readonly' => $readonly])
            </div>
        </div>
    </div>

    <div x-data="{ isOpen: @json($shouldOpenTrainingBasedOnUrl) || (@json(!$accordionSpecifiedInUrl) && (@json($readonlyCondition) || !!@entangle('accordionTrainingOpen')) ) }" id="learning-development-accordion">
        <h2 id="learning-development-heading">
            <button type="button"
                @click="isOpen = !isOpen"
                :aria-expanded="isOpen"
                aria-label="Toggle Learning and Development Section"
                aria-controls="learning-development-body"
                class="flex items-center justify-between w-full p-5 font-semibold text-gray-700 border border-gray-200 hover:bg-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-200 dark:hover:bg-gray-600 dark:hover:text-blue-100 dark:bg-gray-800 gap-3">
                <span class="text-sm inline-block text-left">VII. Learning and Development (L&D) Interventions / Training Programs Attended</span>
                <svg :class="isOpen ? '' : 'rotate-180 shrink-0'" class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M9 5 5 1 1 5"/>
                </svg>
            </button>
        </h2>
        <div x-show="isOpen" id="learning-development-body" aria-labelledby="learning-development-heading" role="region">
            <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                @livewire('applicant-training-table', ['applicationId' => $applicationId, 'userId' => $userId, 'readonly' => $readonly])
            </div>
        </div>
    </div>

    <div x-data="{ isOpen: @json($shouldOpenOtherBasedOnUrl) || (@json(!$accordionSpecifiedInUrl) && (@json($readonlyCondition) || !!@entangle('accordionOtherOpen')) ) }" id="other-information-accordion">
        <h2 id="other-information-heading">
            <button type="button"
                @click="isOpen = !isOpen"
                :aria-expanded="isOpen"
                aria-label="Toggle Other Information Section"
                aria-controls="other-information-body"
                class="flex items-center justify-between w-full p-5 font-semibold text-gray-700 border border-gray-200 hover:bg-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-200 dark:hover:bg-gray-600 dark:hover:text-blue-100 dark:bg-gray-800 gap-3">
                <span class="text-sm inline-block text-left">VIII. Other Information</span>
                <svg :class="isOpen ? '' : 'rotate-180 shrink-0'" class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M9 5 5 1 1 5"/>
                </svg>
            </button>
        </h2>
        <div x-show="isOpen" id="other-information-body" aria-labelledby="other-information-heading" role="region">
            <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                @livewire('other-information-dynamic-fields', ['applicationId' => $applicationId, 'userId' => $userId, 'readonly' => $readonly])
            </div>
        </div>
    </div>
</div>