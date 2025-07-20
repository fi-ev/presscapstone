<div class="relative overflow-x-auto sm:rounded-lg">
    <div class="flex items-center justify-between flex-column md:flex-row flex-wrap space-y-4 md:space-y-0 py-4 dark:bg-gray-900">
        <!-- add user -->
        <div class="w-full flex justify-end">
            <button class="mt-2 px-2 py-2 bg-blue-800 hover:bg-blue-700 text-white rounded flex items-center space-x-2"
            title="Add Entry"
            wire:click.prevent="openAddModal()">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <span class="px-1 text-xs font-semibold uppercase">Add Vacancy</span>
            </button>
        </div>
        <!-- dropdown -->
        <div>
            <div class="text-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg px-5 py-2.5 text-center dark:bg-gray-900 dark:focus:ring-blue-800 w-full">
                <label for="status" class="sr-only">Select View Option</label>
                <select id="status"
                wire:model.live="status"
                class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:max-w-xs sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600">
                    <option value="" disabled {{ $status === '' ? 'selected' : '' }}>Select View Option</option>
                    <option value="all" {{ $status === 'all' ? 'selected' : '' }}>All</option>
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
                        <td class="px-6 py-4">
                            {{ $vacancy->posting_date->format('F j, Y') }} to {{ $vacancy->closing_date->format('F j, Y') }}    
                        </td>
                        <td class="px-6 py-4 text-center hidden md:table-cell">
                            <span class="items-center justify-center">
                                <label for="set-status-{{ $vacancy->id }}" class="sr-only">Select Status {{ $vacancy->id }}</label>
                                <select id="set-status-{{ $vacancy->id }}" 
                                wire:model.live="vacancyStatuses.{{ $vacancy->id }}"  wire:change="changeVacancyStatus({{ $vacancy->id }})" 
                                    wire:confirm="This will change the status of the vacancy. Do you want to continue?"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:max-w-xs sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600">
                                        <option value="" disabled {{ $vacancy->status === '' ? 'selected' : '' }}>Select Status</option>
                                        <option value="Open" {{ $vacancy->status === 'Open' ? 'selected' : '' }}>{{ $vacancy->closing_date < $now ? 'Expired' : 'Open' }}</option>
                                        <option value="Closed" {{ $vacancy->status === 'Closed' ? 'selected' : '' }}>Closed</option>
                                        <option value="Ongoing Deliberation" {{ $vacancy->status === 'Ongoing Deliberation' ? 'selected' : '' }}>Ongoing Deliberation</option>
                                        <option value="Filled" {{ $vacancy->status === 'Filled' ? 'selected' : '' }}>Filled</option>
                                </select>
                            </span>
                        </td>
                        <td class="p-2 h-32 flex items-center">
                            <div class="relative flex items-center space-x-2">
                                <button wire:click.prevent="openEditModal({{ $vacancy->id }})" 
                                title="Edit Entry" class="my-2 p-2 text-xs text-gray-400 hover:text-red-600 rounded inline-flex items-center w-10 h-10" title="Edit Vacancy">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                    </svg>
                                </button>
                                <button  wire:click="delete({{ $vacancy->id }})"
                                wire:confirm="Are you sure you want to delete this entry?"
                                title="Delete Entry"
                                class="my-2 p-2 text-xs text-gray-400 hover:text-red-600 rounded inline-flex items-center w-10 h-10" title="Delete Vacancy">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>
                                </button>
                            </div>
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
            <span>No vacancies posted at the moment</span>
        </div>
    @endif
    <div class="mt-4">
        {{ $vacancies->links() }}
    </div>
    <!-- delete button -->
    @if (count($selected) > 0)
        <button class="mt-4 px-4 py-2 bg-red-600 text-white rounded"
            wire:click.prevent="deleteSelected" 
            wire:confirm.prompt="Are you sure?\n\nType DELETE to confirm removal of selected vacancies|DELETE">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
            </svg>
        </button>
    @endif
   
    <!-- livewire modal -->
    <div class="{{ $isOpenAdd || $isOpenEdit ? '' : 'hidden' }}">
        @if ($isOpenAdd)
            @include('hr.vacancies.add-modal')
        @elseif($isOpenEdit)
            @include('hr.vacancies.edit-modal')
        @endif
    </div>