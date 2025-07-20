<div class="overflow-y-auto fixed inset-0 z-50 flex items-center justify-center">
    <!-- modal bg -->
    <div class="fixed inset-0 bg-white bg-opacity-75 dark:bg-opacity-25" aria-hidden="true"></div>
    <!-- modal -->
    <div class="relative bg-white rounded-lg shadow dark:bg-gray-800 max-w-md mx-auto p-4 md:p-5 w-full max-h-screen overflow-y-auto">
        <!-- header -->
        <div class="flex items-center justify-between dark:border-gray-600">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-200">
                Edit Work Experience
            </h3>
            <button
                type="button"
                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                wire:click.prevent="closeEditModal()"
                aria-label="Close modal"
            >
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
        </div>
        <!-- body -->
        <div class="p-4 md:p-5">
            <!-- form -->
            <form wire:submit.prevent="submit" class="space-y-4">
                <div>
                    <x-label class="text-blue-700 dark:text-blue-300" for="start_date" value="{{ __('From*') }}" />
                    <x-input id="start_date" wire:model="start_date" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" type="date" name="start_date" autofocus autocomplete="start_date" required />
                    @error('start_date') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror     
                </div>

                <div>
                    <x-label class="text-blue-700 dark:text-blue-300" for="end_date" value="{{ __('To*') }}" />
                    <x-input id="end_date" wire:model="end_date" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" type="date" name="end_date" autofocus autocomplete="end_date" required />
                    @error('end_date') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror     
                </div>

                <div>
                    <x-label class="text-blue-700 dark:text-blue-300" for="position" value="{{ __('Position Title (Write in full / Do not abbreviate)*') }}" />
                    <x-input id="position" wire:model="position" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" type="text" name="position" autofocus autocomplete="position" required />
                    @error('position') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror     
                </div>

                <div>
                    <x-label class="text-blue-700 dark:text-blue-300" for="company" value="{{ __('Department / Agency / Office / Company (Write in full / Do not abbreviate)*') }}" />
                    <x-input id="company" wire:model="company" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" type="text" name="company" autofocus autocomplete="company" required />
                    @error('company') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror     
                </div>

                <div>
                    <x-label class="text-blue-700 dark:text-blue-300" for="monthly_salary" value="{{ __('Monthly Salary*') }}" />
                    <x-input id="monthly_salary" wire:model="monthly_salary" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" type="text" name="monthly_salary" autofocus autocomplete="monthly_salary" required />
                    @error('monthly_salary') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror     
                </div>

                <div>
                    <x-label class="text-blue-700 dark:text-blue-300" for="salary_grade" value="{{ __('Salary / Job / Pay Grade (if applicable) and Step / Increment*') }}" />
                    <x-input id="salary_grade" wire:model="salary_grade" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" type="text" name="salary_grade" autofocus autocomplete="salary_grade" required />
                    @error('salary_grade') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror     
                </div>

                <div>
                    <x-label class="text-blue-700 dark:text-blue-300" for="appointment_status" value="{{ __('Status of Appointment*') }}" />
                    <select id="appointment_status" wire:model="appointment_status" name="appointment_status" autocomplete="appointment_status" class="block mt-1 w-full rounded-md border-0 py-1.5 shadow-sm ring-1 ring-inset ring-gray-300  focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-700 bg-white border border-gray-300 rounded-lg w-80 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600">
                        <option value="" disabled>Select Level</option>
                        <option value="N/A">N/A</option>
                        <option value="Job Order">Job Order</option>
                        <option value="Contractual">Contractual</option>
                        <option value="Temporary">Temporary</option>
                        <option value="Permanent">Permanent</option>
                    </select>    
                    @error('appointment_status') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror     
                </div>

                <div class="flex">
                    <x-label class="text-blue-700 dark:text-blue-300" for="is_govt_service" value="{{ __('Government Service?*') }}" />
                    <div class="flex items-center mx-4">
                        <input id="yes-radio" wire:model="is_govt_service" type="radio" value="1" name="is_govt_service" class="w-4 h-4 text-blue-600 dark:text-blue-300 border-gray-300 rounded-full focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-800 dark:border-gray-600" required>
                        <label for="yes-radio" class="ms-2 text-sm font-medium">Yes</label>
                    </div>
                    <div class="flex items-center">
                        <input id="no-radio" wire:model="is_govt_service" type="radio" value="0" name="is_govt_service" class="w-4 h-4 text-blue-600 dark:text-blue-300 border-gray-300 rounded-full focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-800 dark:border-gray-600" required>
                        <label for="no-radio" class="ms-2 text-sm font-medium">No</label>
                    </div>
                    @error('is_govt_service') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror     
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-button class="mt-4">
                        {{ __('Update') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</div>
