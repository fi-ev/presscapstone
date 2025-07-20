<div class="overflow-y-auto fixed inset-0 z-50 flex items-center justify-center">
    <!-- modal bg -->
    <div class="fixed inset-0 bg-white bg-opacity-75 dark:bg-opacity-25" aria-hidden="true"></div>
    <!-- modal -->
    <div class="relative bg-white rounded-lg shadow dark:bg-gray-800 max-w-md mx-auto p-4 md:p-5 w-full max-h-screen overflow-y-auto">
        <!-- header -->
        <div class="flex items-center justify-between dark:border-gray-600">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-200">
                Add Education
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
        <!-- body -->
        <div class="p-4 md:p-5">
            <!-- form -->
            <form wire:submit.prevent="submit" class="space-y-4">
                <div>
                    <x-label class="text-blue-700 dark:text-blue-300" for="level" value="{{ __('Level*') }}" />
                    <select id="level" wire:model="level" name="level" autocomplete="level" class="block mt-1 w-full rounded-md border-0 py-1.5 shadow-sm ring-1 ring-inset ring-gray-300  focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-700 bg-white border border-gray-300 rounded-lg w-80 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600">
                        <option value="">Select Level</option>
                        <option value="Elementary">Elementary</option>
                        <option value="Secondary" >Secondary</option>
                        <option value="Vocational">Vocational</option>
                        <option value="College">College</option>
                        <option value="Graduate Studies">Graduate Studies</option>
                    </select>   
                    @error('level') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror 
                </div>

                <div>
                    <x-label class="text-blue-700 dark:text-blue-300" for="school_name" value="{{ __('School Name*') }}" />
                    <x-input id="school_name" wire:model="school_name" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" type="text" name="school_name" :value="old('school_name')" autofocus autocomplete="school_name" required />
                    @error('school_name') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror 
                </div>

                <div>
                    <x-label class="text-blue-700 dark:text-blue-300" for="degree" value="{{ __('Basic Education / Degree / Course*') }}" />
                    <x-input id="degree" wire:model="degree" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" type="text" name="degree" :value="old('degree')" autofocus autocomplete="degree" required />
                    @error('degree') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror 
                </div>

                <div>
                    <x-label class="text-blue-700 dark:text-blue-300" for="start_date" value="{{ __('Attended From*') }}" />
                    <x-input id="start_date" wire:model="start_date" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" type="date" name="start_date" :value="old('start_date')" autofocus autocomplete="start_date" required />
                    @error('start_date') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror 
                </div>

                <div>
                    <x-label class="text-blue-700 dark:text-blue-300" for="end_date" value="{{ __('To*') }}" />
                    <x-input id="end_date" wire:model="end_date" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" type="date" name="end_date" :value="old('end_date')" autofocus autocomplete="end_date" required />
                    @error('end_date') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror 
                </div>

                <div>
                    <x-label class="text-blue-700 dark:text-blue-300" for="units_earned" value="{{ __('Highest Level / Units Earned*') }}" />
                    <x-input id="units_earned" wire:model="units_earned" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" type="text" name="units_earned" :value="old('units_earned')" autofocus autocomplete="units_earned" required />
                    @error('units_earned') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror 
                </div>

                <div>
                    <x-label class="text-blue-700 dark:text-blue-300" for="year_graduated" value="{{ __('Year Graduated*') }}" />
                    <x-input id="year_graduated" wire:model="year_graduated" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" type="text" name="year_graduated" :value="old('year_graduated')" autofocus autocomplete="year_graduated" required />
                    @error('year_graduated') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror 
                </div>

                <div>
                    <x-label class="text-blue-700 dark:text-blue-300" for="honors" value="{{ __('Scholarship / Academic Honors Received*') }}" />
                    <x-input id="honors" wire:model="honors" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" type="text" name="honors" :value="old('honors')" autofocus autocomplete="honors" required />
                    @error('honors') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror 
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-button class="mt-4">
                        {{ __('Add') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</div>
