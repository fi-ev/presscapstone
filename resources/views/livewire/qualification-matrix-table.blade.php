<div class="relative overflow-x-auto sm:rounded-lg">
    <div class="flex items-center justify-between flex-column md:flex-row flex-wrap space-y-4 md:space-y-0 py-4 dark:bg-gray-900">
        <!-- search -->
        <label for="table-search" class="sr-only">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-700 dark:text-gray-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
            </div>
            <input type="text" id="table-search-applicants" wire:model.live.debounce.300ms="search" class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Name or Email">
        </div>
        <div>
            <x-button class="mt-4" 
            wire:click.prevent="exportExcel()">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m.75 12 3 3m0 0 3-3m-3 3v-6m-1.5-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                </svg>
                <span class="px-1 text-xs font-semibold uppercase">Download XLSX</span>
            </x-button>
        </div>
    </div>
    <!-- info -->
    <div class="mt-6">
        <dl class="divide-y divide-gray-100 dark:divide-gray-800">
            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-sm font-medium leading-6 text-gray-900 dark:text-blue-300">Education</dt>
                 <dd class="mt-1 text-sm leaπing-6 text-gray-700 sm:col-span-2 sm:mt-0 dark:text-gray-200">
                    {{ $vacancy->position->education }}
                </dd>
            </div>
            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-sm font-medium leading-6 text-gray-900 dark:text-blue-300">Experience</dt>
                 <dd class="mt-1 text-sm leaπing-6 text-gray-700 sm:col-span-2 sm:mt-0 dark:text-gray-200">
                    {{ $vacancy->position->work_experience }}
                </dd>
            </div>
            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-sm font-medium leading-6 text-gray-900 dark:text-blue-300">Training</dt>
                 <dd class="mt-1 text-sm leaπing-6 text-gray-700 sm:col-span-2 sm:mt-0 dark:text-gray-200">
                    <ul role="list" class="rounded-md">
                        @foreach($vacancy->position->getTrainings() as $training)
                            <li>{{ $training }}</li>
                        @endforeach
                    </ul>
                </dd>
            </div>
            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-sm font-medium leading-6 text-gray-900 dark:text-blue-300">Eligibility</dt>
                 <dd class="mt-1 text-sm leaπing-6 text-gray-700 sm:col-span-2 sm:mt-0 dark:text-gray-200">
                    <ul role="list" class="rounded-md">
                        @foreach($vacancy->position->getCompetencies() as $competency)
                            <li>{{ $competency }}</li>
                        @endforeach
                    </ul>
                </dd>
            </div>
        </dl>
    </div>
    <!-- table -->
    @if($vacancy->applications->isNotEmpty())
        <table class="w-full text-sm text-left rtl:text-right text-gray-700 dark:text-gray-200">
            <thead class="text-xs text-center text-gray-700 uppercase bg-gray-50 dark:bg-gray-800 dark:text-gray-200">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        #
                    </th>
                    <th scope="col" class="px-6 py-3">
                        NAME / POSITION / OFFICE / AGE / STATUS / ELIGIBILITY / IPCR
                    </th>
                    <th colspan="2" scope="col" class="px-6 py-3">
                        EDUCATION
                    </th>
                    <th scope="col" class="px-6 py-3">
                        TRAINING
                    </th>
                    <th scope="col" class="px-6 py-3">
                        OUTSTANDING ACCOMPLISHMENTS
                    </th>
                    <th colspan="2" scope="col" class="px-6 py-3">
                        EXPERIENCE
                    </th>
                </tr>
                <tr>
                    <th scope="col" class="px-6 py-3 italic"></th>
                    <th scope="col" class="px-6 py-3 italic"></th>
                    <th scope="col" class="px-6 py-3 italic">Relevant</th>
                    <th scope="col" class="px-6 py-3 italic">Additional Degree</th>
                    <th scope="col" class="px-6 py-3 italic"></th>
                    <th scope="col" class="px-6 py-3 italic"></th>
                    <th scope="col" class="px-6 py-3 italic">Minimum Relevant</th>
                    <th scope="col" class="px-6 py-3 italic">Excess Relevant</th>
                </tr>
            </thead>
            <tbody>
                @foreach($vacancy->applications as $applicant)
                    <tr class="align-text-top">
                        <td class="px-6 py-4">
                            {{ $loop->iteration }}
                        </td>
                        <td class="px-6 py-4">
                            <p class="font-bold">{{ $applicant->applicant_profile->full_name }}</p>
                            <p class="text-xs">
                                {{ $applicant->applicant_profile->age($applicant->created_at) }} Years Old<br>
                                Birthdate: {{ $applicant->applicant_profile->birthdate->format('F j, Y') }}<br>
                                Status: {{ $applicant->applicant_profile->civil_status }}<br>
                                Eligibility: 
                                @foreach ($applicant->applicant_eligibility as $eligibility)
                                    {{ $eligibility->type_eligibility->name }}
                                @endforeach    
                                <br><br>
                                Email: {{ $applicant->applicant_profile->email }}<br>
                                Mobile: {{ $applicant->applicant_profile->mobile_no }}<br>
                                <br>
                                Position Sought: {{ $vacancy->position->title }}<br>
                            </p>
                        </td>
                        <td class="px-6 py-4">
                            @foreach($applicant->applicant_education as $education)
                                {{ $education->min_education_info() }}
                            @endforeach
                        </td>
                        <td class="px-6 py-4">
                            @foreach($applicant->applicant_education as $education)
                                {{ $education->addtl_education_info() }}
                            @endforeach
                        </td>
                        <td class="px-6 py-4">
                            @foreach($applicant->applicant_training as $training)
                                {{ $training->activity_title }} ({{ $training->hours_no }} Hours)<br>
                            @endforeach
                        </td>
                        <td class="px-6 py-4">
                            @foreach($applicant->applicant_other as $other)
                                {{ $other->recognition_info() }}<br>
                            @endforeach
                        </td>
                        <td class="px-6 py-4">
                            @php
                                $latestWork = $applicant->applicant_work_experience->sortByDesc('end_date')->first();
                                $remainingWork = $applicant->applicant_work_experience->sortByDesc('end_date')->slice(1);
                            @endphp

                            {{ $latestWork->position }} / {{ $latestWork->company }} 
                            <br>From {{ $latestWork->start_date->format('F j, Y') }} 
                            to {{ $latestWork->end_date->format('F j, Y') }} 
                            ({{ $latestWork->start_date->diffInYears($latestWork->end_date) < 1 
                                ? round($latestWork->start_date->diffInMonths($latestWork->end_date),1) . ' months' 
                                : round($latestWork->start_date->diffInYears($latestWork->end_date),1) . ' years' }})
                        </td>
                        <td class="px-6 py-4">
                            @foreach($remainingWork as $work)
                                {{ $work->position }} / {{ $work->company }} 
                                <br>From {{ $work->start_date->format('F j, Y') }} 
                                to {{ $work->end_date->format('F j, Y') }} 
                                ({{ $work->start_date->diffInYears($work->end_date) < 1 
                                    ? round($work->start_date->diffInMonths($work->end_date),1) . ' months' 
                                    : round($work->start_date->diffInYears($work->end_date),1) . ' years' }})<br><br>
                            @endforeach
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="flex items-center space-x-2 text-gray-600 text-sm">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4 text-gray-700">
                <path stroke-linecap="round" stroke-linejoin="round" d="M18.364 18.364A9 9 0 0 0 5.636 5.636m12.728 12.728A9 9 0 0 1 5.636 5.636m12.728 12.728L5.636 5.636" />
            </svg>
            <span>No applications at the moment</span>
        </div>
    @endif
    <div class="mt-4">

    </div>
</div>