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
            wire:click.prevent="exportExcel">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m.75 12 3 3m0 0 3-3m-3 3v-6m-1.5-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                </svg>
                <span class="px-1 text-xs font-semibold uppercase">Download XLSX</span>
            </x-button>
        </div>
    </div>
    <!-- table -->
    @if($applicants->isNotEmpty())
        <table class="w-full text-sm text-left rtl:text-right text-gray-700 dark:text-gray-200">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-800 dark:text-gray-200">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Date Joined
                    </th>
                    <th scope="col" class="px-6 py-3">
                        No of Applications
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        
                    </th>
                </tr>
            </thead>
            <tbody>
            @foreach($applicants as $applicant)
                    <tr>
                        <td class="px-6 py-4">{{ $applicant->full_name }}</td>
                        <td class="px-6 py-4">{{ $applicant->email }}</td>
                        <td class="px-6 py-4">{{ $applicant->created_at->format('F j, Y') }}</td>
                        <td class="px-6 py-4">{{ $applicant->applications_count }}</td>
                        <td class="p-2 h-32 flex items-center">
                            <a href="{{ url('applicants/' . hashid_encode($applicant->id) ) }}" class="my-2 p-2 text-xs text-gray-400 hover:text-blue-600 dark:text-blue-300 dark:hover:text-blue-600 rounded-lg inline-flex items-center w-10 h-10" title="View Applicants">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m12.75 15 3-3m0 0-3-3m3 3h-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
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
            <span>No applicants at the moment</span>
        </div>
    @endif
    <div class="mt-4">
        {{ $applicants->links() }}
    </div>
</div>