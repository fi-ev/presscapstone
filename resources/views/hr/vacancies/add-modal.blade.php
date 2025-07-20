<div class="overflow-y-auto fixed inset-0 z-50 flex items-center justify-center">
    <div class="fixed inset-0 bg-white bg-opacity-75 dark:bg-opacity-25" aria-hidden="true"></div>
    <div class="relative bg-white rounded-lg shadow dark:bg-gray-800 max-w-md mx-auto p-4 md:p-5 w-full max-h-screen overflow-y-auto">
        <div class="flex items-center justify-between dark:border-gray-600">
            <h3 id="modal-title" class="text-xl font-semibold text-gray-900 dark:text-gray-200">
                New Vacancy
            </h3>
            <button
                type="button"
                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                wire:click.prevent="closeAddModal()"
                aria-label="Close modal"
            >
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
        </div>
        <div class="p-4 md:p-5">
            <form wire:submit.prevent="submit" class="space-y-4">
                <div>
                    <x-label class="text-blue-700 dark:text-blue-300" for="position_id" value="{{ __('Position*') }}" />
                    <select wire:model.live.debounce.300ms="selectedPositionId" id="position_id" name="position_id" class="block mt-1 w-full rounded-md border-0 py-1.5 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-700 bg-white border border-gray-300 rounded-lg w-80 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600">
                        <option value="">Select Position</option>
                        @foreach($positions as $id => $title)
                            <option value="{{ $id }}">{{ $title }}</option>
                        @endforeach
                    </select>
                    @if ($selectedPosition)
                        <div class="my-2 p-2 text-xs rounded-md border border-dashed border-1">
                            Place of Assignment: <span class="font-semibold">{{ $selectedPosition->assignment_place }}</span>
                            <br>Plantilla No: <span class="font-semibold">{{ $selectedPosition->plantilla_no }}</span>
                            <br>Salary Grade: <span class="font-semibold">{{ $selectedPosition->salary_grade }}</span>
                            <br>Monthly Salary: <span class="font-semibold">{{ $selectedPosition->monthly_salary }}</span>
                            <br>Training: <span class="font-semibold">{{ $selectedPosition->training }}</span>
                            <br>Work Experience: <span class="font-semibold">{{ $selectedPosition->work_experience }}</span>
                            <br>Competencies: <span class="font-semibold">{{ $selectedPosition->competency_id }}</span>
                        </div> 
                    @endif
                    @error('selectedPositionId') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror
                </div>

                <div>
                    <x-label class="text-blue-700 dark:text-blue-300" for="vacancy_code" value="{{ __('Code (Optional)') }}" />
                    <x-input id="vacancy_code" wire:model="vacancy_code" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" type="text" name="vacancy_code" autofocus autocomplete="vacancy_code" />
                    @error('vacancy_code') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror
                </div>

                <div>
                    <x-label class="text-blue-700 dark:text-blue-300" for="remarks" value="{{ __('Remarks (Optional)') }}" />
                    <x-input id="remarks" wire:model="remarks" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" type="text" name="remarks" :value="old('remarks')" autofocus autocomplete="remarks" />
                    @error('remarks') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror
                </div>

                <div>
                    <x-label class="text-blue-700 dark:text-blue-300" for="posting_date" value="{{ __('Posting Date*') }}" />
                    <input 
                        id="posting_date" 
                        wire:model="posting_date"
                        type="date" 
                        name="posting_date" 
                        value="{{ old('posting_date') }}" 
                        class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600"
                        required
                    />
                    @error('posting_date') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror
                </div>

                <div>
                    <x-label class="text-blue-700 dark:text-blue-300" for="closing_date" value="{{ __('Closing Date*') }}" />
                    <input 
                        id="closing_date" 
                        wire:model="closing_date"
                        type="date" 
                        name="closing_date" 
                        value="{{ old('closing_date') }}" 
                        class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600"
                        required
                    />
                    @error('closing_date') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror
                </div>

                <div>
                    <x-label class="text-blue-700 dark:text-blue-300" for="attachment" value="{{ __('Attachment (Optional)') }}" />
                    <input type="file" wire:model="attachment" 
                    class="w-full text-gray-400 font-semibold text-xs bg-white border file:cursor-pointer cursor-pointer file:border-0 file:py-3 file:px-4 file:mr-4 file:bg-gray-100 file:hover:bg-gray-200 file:text-gray-600 dark:bg-gray-800 dark:file:bg-white dark:file:text-gray-200 dark:file:hover:bg-gray-400 dark:text-gray-200 dark:border dark:border-gray-500 rounded" />
                    @error('attachment') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror
                    <p class="text-xs text-gray-400 mt-2">One PDF file only</p>
                </div>

                <div>
                    <x-label class="text-blue-700 dark:text-blue-300" for="url" value="{{ __('URL (Optional)') }}" />
                    <x-input id="url" wire:model="url" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" type="text" name="url" :value="old('url')" autofocus autocomplete="url" />
                    @error('url') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-button class="mt-4">
                        {{ __('Create') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</div>
