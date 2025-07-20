<div class="relative overflow-x-auto sm:rounded-lg">
    <div class="flex items-center justify-between flex-column md:flex-row flex-wrap space-y-4 md:space-y-0 py-4 dark:bg-gray-900">
        <!-- dropdown -->
        <div>
            <div class="text-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg px-5 py-2.5 text-center dark:bg-gray-900 dark:focus:ring-blue-800 w-full">
                <label for="status" class="sr-only">Select View Option</label>
                <select id="status"
                wire:model.live="status"
                class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:max-w-xs sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600">
                    <option value="" disabled {{ $status === '' ? 'selected' : '' }}>Select View Option</option>
                    <option value="All" {{ $status === 'All' ? 'selected' : '' }}>All</option>
                    <option value="Open" {{ $status === 'Open' ? 'selected' : '' }}>Open</option>
                    <option value="Closed" {{ $status === 'Closed' ? 'selected' : '' }}>Closed</option>
                    <option value="Ongoing Deliberation" {{ $status === 'Ongoing Deliberation"' ? 'selected' : '' }}>Ongoing Deliberation</option>
                    <option value="Filled" {{ $status === 'Filled' ? 'selected' : '' }}>Filled</option>
                </select>
            </div>
        </div>
        <!-- search -->
        <label for="table-search" class="sr-only">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-700 dark:text-gray-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
            </div>
            <input type="text" id="table-search-vacancies" wire:model.live.debounce.300ms="search" class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search">
        </div>
    </div>
    <!-- table -->
    @if($vacancies->isNotEmpty())
        <table class="w-full text-sm text-left rtl:text-right text-gray-700 dark:text-gray-200">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-800 dark:text-gray-200">
                <tr>
                    <th scope="col" class="p-4 w-10">
                        <div class="flex items-center">
                            <label for="checkbox-all-search" class="sr-only">Select All</label>
                            <input type="checkbox" 
                                id="checkbox-all-search"
                                wire:model.live="selectAll"
                                class="w-4 h-4 text-blue-600 dark:text-blue-300 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-800 dark:border-gray-600">
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Position
                    </th>
                    <th scope="col" class="px-6 py-3 hidden md:table-cell">
                        Plantilla No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Posting Dates
                    </th>
                    <th scope="col" class="px-6 py-3 text-center hidden md:table-cell">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        
                    </th>
                </tr>
            </thead>
            <tbody>
            @foreach($vacancies as $vacancy)
                    <tr>
                        <td class="p-4">
                            <div class="flex items-center">
                                <label for="checkbox-{{ $vacancy->id }}" class="sr-only">Select {{ $vacancy->id }}</label>
                                <input type="checkbox" 
                                    id="checkbox-{{ $vacancy->id }}"
                                    value="{{ $vacancy->id }}"
                                    wire:model.live="selected"
                                    class="w-4 h-4 text-blue-600 dark:text-blue-300 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-800 dark:border-gray-600">
                            </div>
                        </td>
                        <td class="px-6 py-4 font-semibold">{{ $vacancy->position->title }}
                            <br/>
                            @if ($vacancy->position->employment_type)
                                <span class="uppercase bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-blue-900 dark:text-blue-300">{{ $vacancy->position->employment_type }}</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 hidden md:table-cell">{{ $vacancy->position->plantilla_no ? $vacancy->position->plantilla_no : 'N/A' }}</td>
                        <td class="px-6 py-4">{{ $vacancy->posting_date->format('F j, Y') }} to {{ $vacancy->closing_date->format('F j, Y') }}</td>
                        <td class="px-6 py-4 text-center hidden md:table-cell">
                            @if ($vacancy->closing_date < $now)
                                Expired
                            @else
                                {{ $vacancy->status }}
                            @endif
                            <br><span class="inline-flex items-center justify-center p-2 h-4 text-xs font-semibold">
                                {{ $vacancy->applications_count }} {{ $vacancy->applications_count == 1 ? 'Applicant' : 'Applicants' }}
                            </span>
                        </td>
                        <td class="p-2 h-32 flex items-center">
                            <a href="{{ url('vacancies/' . hashid_encode($vacancy->id) . '/qualification-matrix' ) }}" class="my-2 p-2 text-xs text-gray-400 hover:text-blue-600 dark:text-blue-300 dark:hover:text-blue-600 rounded-lg inline-flex items-center w-10 h-10" title="Qualification Matrix">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.375 19.5h17.25m-17.25 0a1.125 1.125 0 0 1-1.125-1.125M3.375 19.5h7.5c.621 0 1.125-.504 1.125-1.125m-9.75 0V5.625m0 12.75v-1.5c0-.621.504-1.125 1.125-1.125m18.375 2.625V5.625m0 12.75c0 .621-.504 1.125-1.125 1.125m1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125m0 3.75h-7.5A1.125 1.125 0 0 1 12 18.375m9.75-12.75c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125m19.5 0v1.5c0 .621-.504 1.125-1.125 1.125M2.25 5.625v1.5c0 .621.504 1.125 1.125 1.125m0 0h17.25m-17.25 0h7.5c.621 0 1.125.504 1.125 1.125M3.375 8.25c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125m17.25-3.75h-7.5c-.621 0-1.125.504-1.125 1.125m8.625-1.125c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125M12 10.875v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 10.875c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125M13.125 12h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125M20.625 12c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5M12 14.625v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 14.625c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125m0 1.5v-1.5m0 0c0-.621.504-1.125 1.125-1.125m0 0h7.5" />
                                </svg>
                            </a>
                            <a href="{{ url('vacancies/' . hashid_encode($vacancy->id) . '/notices') }}" class="my-2 p-2 text-xs text-gray-400 hover:text-blue-600 dark:text-blue-300 dark:hover:text-blue-600 rounded-lg inline-flex items-center w-10 h-10" title="Notify Applicants">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                                </svg>
                            </a>
                            <a href="{{ url('vacancies/' . hashid_encode($vacancy->id) ) }}" class="my-2 p-2 text-xs text-gray-400 hover:text-blue-600 dark:text-blue-300 dark:hover:text-blue-600 rounded-lg inline-flex items-center w-10 h-10" title="Applicants">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.042 21.672 13.684 16.6m0 0-2.51 2.225.569-9.47 5.227 7.917-3.286-.672ZM12 2.25V4.5m5.834.166-1.591 1.591M20.25 10.5H18M7.757 14.743l-1.59 1.59M6 10.5H3.75m4.007-4.243-1.59-1.59" />
                                </svg>
                            </a>
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
        {{ $vacancies->links() }}
    </div>   