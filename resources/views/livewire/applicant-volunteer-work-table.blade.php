<div class="relative overflow-x-auto sm:rounded-lg">
    <div class="my-4 flex items-center justify-end gap-x-6">
        @if(!$disabled)
            <x-button class="mt-4" wire:click.prevent="openAddModal()">Add Voluntary Works</x-button>
        @endif
    </div>
    <!-- table -->
    <table class="w-full text-sm text-left rtl:text-right text-gray-700 dark:text-gray-200">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-800 dark:text-gray-200">
            <tr>
                <th scope="col" class="px-6 py-3">
                    <b>29.</b> Name & Address of Organization
                </th>
                <th scope="col" class="px-6 py-3">
                    Inclusive Dates (From and To)
                </th>
                <th scope="col" class="px-6 py-3">
                    Number of Hours
                </th>
                <th scope="col" class="px-6 py-3">
                    Position / Nature of Work
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    
                </th>
            </tr>
        </thead>
        <tbody>
        @foreach($volunteerWorks as $volunteerWork)
                <tr>
                    <td class="px-6 py-4">{{ $volunteerWork->organization_name }}<br />{{ $volunteerWork->organization_address }}</td>
                    <td class="px-6 py-4">{{ $volunteerWork->start_date->format('F j, Y') }} to {{ $volunteerWork->end_date->format('F j, Y') }}</td>
                    <td class="px-6 py-4">{{ $volunteerWork->hours_no }}</td>
                    <td class="px-6 py-4">{{ $volunteerWork->position }}</td>
                    <td class="p-2 h-32 flex items-center">
                        @if(!$disabled)
                        <button wire:click.prevent="openEditModal({{ $volunteerWork->id }})" 
                        title="Edit Entry" 
                        class="my-2 p-2 text-xs text-gray-400 hover:text-blue-600 rounded inline-flex items-center w-10 h-10">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>
                        </button>
                        <button  wire:click="delete({{ $volunteerWork->id }})"
                        wire:confirm="Are you sure you want to delete this entry?" 
                        title="Delete Entry"
                        class="my-2 p-2 text-xs text-gray-400 hover:text-red-600 rounded inline-flex items-center w-10 h-10">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                        </button>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        {{ $volunteerWorks->links() }}
    </div>
    <!-- livewire modal -->
    <div class="{{ $isOpenAdd || $isOpenEdit ? '' : 'hidden' }}">
        @if ($isOpenAdd)
            @include('applicant.volunteer.add-modal')
        @elseif($isOpenEdit)
            @include('applicant.volunteer.edit-modal')
        @endif
    </div>