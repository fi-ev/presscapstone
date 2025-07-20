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
            <input type="text" wire:model.live.debounce.300ms="search" class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Name or Email">
        </div>
    </div>
    <!-- table -->
    @if($applicants->applications->isNotEmpty())
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
                        Application Status
                    </th>
                    <th scope="col" class="px-6 py-3 text-center hidden md:table-cell">
                        Email Status
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Change Status & Send Email
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($applicants->applications as $applicant)
                    <tr>
                        <td class="px-6 py-4">{{ $applicant->user ? $applicant->user->full_name : 'User deleted' }}</td>
                        <td class="px-6 py-4">{{ $applicant->user ? $applicant->user->email : 'No email' }}</td>
                        <td class="px-6 py-4">{{ $applicant->status }}</td>
                        <td class="px-6 py-4 text-center hidden md:table-cell">
                            @if(isset($applicant->email))
                                @foreach($applicant->email as $email)
                                    {{ $email->email_type }} Email<p class="text-xs">Sent on {{ $email->updated_at->format('F j, Y g:i A') }}</p><br>
                                @endforeach
                            @else  
                                Notice not yet sent  
                            @endif
                        </td>
                        <td class="p-2 h-32 flex justify-center items-center">
                            @livewire('update-application-status', ['applicationId' => $applicant->id])
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


   