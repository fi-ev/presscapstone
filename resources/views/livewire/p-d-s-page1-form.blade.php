<div>
    @if(!$readonly)
        <div class="bg-blue-100 text-gray-800 p-4 rounded-md mb-5 text-sm dark:bg-gray-600 dark:text-gray-200">
            <p><strong>Instructions:</strong> Indicate <code>N/A</code> if not applicable. DO NOT ABBREVIATE.</p>
        </div>
    @endif

    @php
        $shouldOpenProfileBasedOnUrl = request()->query('accordionProfileOpen') === '1';
        $shouldOpenFamilyBasedOnUrl = request()->query('accordionFamilyOpen') === '1';
        $shouldOpenEducationBasedOnUrl = request()->query('accordionEducationOpen') === '1';

        $accordionSpecifiedInUrl = $shouldOpenProfileBasedOnUrl
                                   || $shouldOpenFamilyBasedOnUrl
                                   || $shouldOpenEducationBasedOnUrl;

        $readonlyCondition = ($readonly && $userId !== null);
    @endphp

    <div x-data="{ isOpen: @json($shouldOpenProfileBasedOnUrl) || (@json(!$accordionSpecifiedInUrl) && (@json($readonlyCondition) || !!@entangle('accordionProfileOpen')) ) }" id="profile-accordion">
        <h2 id="profile-heading">
            <button type="button" @click="isOpen = !isOpen"
                :aria-expanded="!!isOpen"
                x-bind:data-debug="isOpen"
                aria-label="Toggle Personal Information Section"
                aria-controls="profile-body"
                class="flex items-center justify-between w-full p-5 font-semibold text-gray-700 border border-gray-200 hover:bg-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-200 dark:hover:bg-gray-600 dark:hover:text-blue-100 dark:bg-gray-800 gap-3">
                <span class="text-sm inline-block text-left">I. Personal Information</span>
                <svg :class="isOpen ? '' : 'rotate-180 shrink-0'" class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M9 5 5 1 1 5"/>
                </svg>
            </button>
        </h2>
        <div x-show="isOpen" id="profile-body" aria-labelledby="profile-heading">
            <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                @livewire('applicant-profile-form', ['applicationId' => $applicationId, 'userId' => $userId, 'readonly' => $readonly])
            </div>
        </div>
    </div>

    <div x-data="{ isOpen: @json($shouldOpenFamilyBasedOnUrl) || (@json(!$accordionSpecifiedInUrl) && (@json($readonlyCondition) || !!@entangle('accordionFamilyOpen')) ) }" id="family-accordion">
        <h2 id="family-heading">
            <button type="button" @click="isOpen = !isOpen"
                :aria-expanded="!!isOpen"
                x-bind:data-debug="isOpen"
                aria-label="Toggle Family Information Section"
                aria-controls="family-body"
                class="flex items-center justify-between w-full p-5 font-semibold text-gray-700 border border-gray-200 hover:bg-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-200 dark:hover:bg-gray-600 dark:hover:text-blue-100 dark:bg-gray-800 gap-3">
                <span class="text-sm inline-block text-left">II. Family Background</span>
                <svg :class="isOpen ? '' : 'rotate-180 shrink-0'" class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M9 5 5 1 1 5"/>
                </svg>
            </button>
        </h2>
        <div x-show="isOpen" id="family-body" aria-labelledby="family-heading">
            <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                @livewire('applicant-family-form', ['applicationId' => $applicationId, 'userId' => $userId, 'readonly' => $readonly])
                @livewire('applicant-children-table', ['applicationId' => $applicationId, 'userId' => $userId, 'readonly' => $readonly])
            </div>
        </div>
    </div>

    <div x-data="{ isOpen: @json($shouldOpenEducationBasedOnUrl) || (@json(!$accordionSpecifiedInUrl) && (@json($readonlyCondition) || !!@entangle('accordionEducationOpen')) ) }" id="education-accordion">
        <h2 id="education-heading">
            <button type="button" @click="isOpen = !isOpen"
                :aria-expanded="!!isOpen"
                x-bind:data-debug="isOpen"
                aria-controls="education-body"
                aria-label="Toggle Education Information Section"
                class="flex items-center justify-between w-full p-5 font-semibold text-gray-700 border border-gray-200 hover:bg-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-200 dark:hover:bg-gray-600 dark:hover:text-blue-100 dark:bg-gray-800 gap-3">
                <span class="text-sm inline-block text-left">III. Educational Background</span>
                <svg :class="isOpen ? '' : 'rotate-180 shrink-0'" class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M9 5 5 1 1 5"/>
                </svg>
            </button>
        </h2>
        <div x-show="isOpen" id="education-body" aria-labelledby="education-heading">
            <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                @livewire('applicant-education-table', ['applicationId' => $applicationId, 'userId' => $userId, 'readonly' => $readonly])
            </div>
        </div>
    </div>
</div>