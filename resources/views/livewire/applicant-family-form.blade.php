<div>
    <!-- form -->
    <form wire:submit.prevent="submit" class="space-y-4">
        <div class="grid grid-cols-1 gap-x-6 gap-y-6 sm:grid-cols-6">
            <div class="sm:col-span-2">
                <span class="text-xs font-medium text-gray-700 dark:text-blue-300"><b>22.</b> Spouse's Surname*
                    @if(!$disabled)
                    <input type="checkbox" wire:click="toggleCheckbox" {{ $isChecked ? 'checked' : '' }} id="checkbox" class="ml-4 w-4 h-4 text-blue-600 dark:text-blue-300 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-800 dark:border-gray-600">
                    <label for="checkbox" class="ml-1 text-xs font-medium text-gray-900 dark:text-gray-200">Set N/A to Fields</label>
                    @endif
                </span>

                <div class="mt-2">
                    <input wire:model="spouse_last_name" id="spouse_last_name" name="spouse_last_name" type="text" autocomplete="spouse_last_name" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" {{ $disabled ? 'disabled' : '' }}>
                </div>
                @error('spouse_last_name') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror  
            </div>

            <div class="sm:col-span-2">
                <label for="spouse_first_name" class="block text-xs font-medium leading-6 text-gray-700 dark:text-blue-300">Spouse's First Name<span class="text-red-600">*</span></label>
                <div class="mt-2">
                    <input wire:model="spouse_first_name" type="text" name="spouse_first_name" id="spouse_first_name" autocomplete="spouse_first_name" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" {{ $disabled ? 'disabled' : '' }}>
                    @error('spouse_first_name') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror  
                </div>
            </div>

            <div class="sm:col-span-1">
                <label for="spouse_name_ext" class="block text-xs font-medium leading-6 text-gray-700 dark:text-blue-300">Spouse's Ext Name<span class="text-red-600">*</span></label>
                <div class="mt-2">
                    <input wire:model="spouse_name_ext" type="text" name="spouse_name_ext" id="spouse_name_ext" autocomplete="spouse_name_ext" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" {{ $disabled ? 'disabled' : '' }}>
                </div>
                @error('spouse_name_ext') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror  
            </div>

            <div class="sm:col-span-1">
                <label for="spouse_middle_name" class="block text-xs font-medium leading-6 text-gray-700 dark:text-blue-300">Spouse's Middle Name<span class="text-red-600">*</span></label>
                <div class="mt-2">
                    <input wire:model="spouse_middle_name" type="text" name="spouse_middle_name" id="spouse_middle_name" autocomplete="spouse_middle_name" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" {{ $disabled ? 'disabled' : '' }}>
                </div>
                @error('spouse_middle_name') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror  
            </div>

            <div class="sm:col-span-2">
                <label for="spouse_occupation" class="block text-xs font-medium leading-6 text-gray-700 dark:text-blue-300">Spouse's Occupation<span class="text-red-600">*</span></label>
                <div class="mt-2">
                    <input wire:model="spouse_occupation" type="text" name="spouse_occupation" id="spouse_occupation" autocomplete="spouse_occupation" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" {{ $disabled ? 'disabled' : '' }}>
                </div>
                @error('spouse_occupation') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror  
            </div>

            <div class="sm:col-span-2">
                <label for="spouse_work_employer" class="block text-xs font-medium leading-6 text-gray-700 dark:text-blue-300">Spouse's Employer / Business Name<span class="text-red-600">*</span></label>
                <div class="mt-2">
                    <input wire:model="spouse_work_employer" type="text" name="spouse_work_employer" id="spouse_work_employer" autocomplete="spouse_work_employer" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" {{ $disabled ? 'disabled' : '' }}>
                </div>
                @error('spouse_work_employer') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror  
            </div>

            <div class="sm:col-span-1">
                <label for="spouse_work_address" class="block text-xs font-medium leading-6 text-gray-700 dark:text-blue-300">Business Address<span class="text-red-600">*</span></label>
                <div class="mt-2">
                    <input wire:model="spouse_work_address" type="text" name="spouse_work_address" id="spouse_work_address" autocomplete="spouse_work_address" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" {{ $disabled ? 'disabled' : '' }}>
                </div>
                @error('spouse_work_address') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror  
            </div>

            <div class="sm:col-span-1">
                <label for="spouse_work_phone" class="block text-xs font-medium leading-6 text-gray-700 dark:text-blue-300">Phone No<span class="text-red-600">*</span></label>
                <div class="mt-2">
                    <input wire:model="spouse_work_phone" type="text" name="spouse_work_phone" id="spouse_work_phone" autocomplete="spouse_work_phone" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" {{ $disabled ? 'disabled' : '' }}>
                </div>
                @error('spouse_work_phone') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror  
            </div>

            <div class="sm:col-span-2">
                <label for="father_last_name" class="block text-xs font-medium leading-6 text-gray-700 dark:text-blue-300"><b>24.</b> Father's Surname<span class="text-red-600">*</span></label>
                <div class="mt-2">
                    <input wire:model="father_last_name" type="text" name="father_last_name" id="father_last_name" autocomplete="father_last_name" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" {{ $disabled ? 'disabled' : '' }}>
                </div>
                @error('father_last_name') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror  
            </div>

            <div class="sm:col-span-1">
                <label for="father_first_name" class="block text-xs font-medium leading-6 text-gray-700 dark:text-blue-300">Father's First Name<span class="text-red-600">*</span></label>
                <div class="mt-2">
                    <input wire:model="father_first_name" type="text" name="father_first_name" id="father_first_name" autocomplete="father_first_name" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" {{ $disabled ? 'disabled' : '' }}>
                </div>
                @error('father_first_name') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror  
            </div>

            <div class="sm:col-span-2">
                <label for="father_middle_name" class="block text-xs font-medium leading-6 text-gray-700 dark:text-blue-300">Father's Middle Name<span class="text-red-600">*</span></label>
                <div class="mt-2">
                    <input wire:model="father_middle_name" type="text" name="father_middle_name" id="father_middle_name" autocomplete="father_middle_name" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" {{ $disabled ? 'disabled' : '' }}>
                </div>
                @error('father_middle_name') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror  
            </div>

            <div class="sm:col-span-1">
                <label for="father_name_ext" class="block text-xs font-medium leading-6 text-gray-700 dark:text-blue-300">Father's Name Ext<span class="text-red-600">*</span></label>
                <div class="mt-2">
                    <input wire:model="father_name_ext" type="text" name="father_name_ext" id="father_name_ext" autocomplete="father_name_ext" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" {{ $disabled ? 'disabled' : '' }}>
                </div>
                @error('father_name_ext') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror  
            </div>

            <div class="sm:col-span-2">
                <label for="mother_maiden_last_name" class="block text-xs font-medium leading-6 text-gray-700 dark:text-blue-300"><b>25.</b> Mother's Maiden Surname<span class="text-red-600">*</span></label>
                <div class="mt-2">
                    <input wire:model="mother_maiden_last_name" type="text" name="mother_maiden_last_name" id="mother_maiden_last_name" autocomplete="mother_maiden_last_name" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" {{ $disabled ? 'disabled' : '' }}>
                </div>
                @error('mother_maiden_last_name') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror  
            </div>

            <div class="sm:col-span-1">
                <label for="mother_first_name" class="block text-xs font-medium leading-6 text-gray-700 dark:text-blue-300"><b>25.</b> Mother's First Name<span class="text-red-600">*</span></label>
                <div class="mt-2">
                    <input wire:model="mother_first_name" type="text" name="mother_first_name" id="mother_first_name" autocomplete="mother_first_name" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" {{ $disabled ? 'disabled' : '' }}>
                </div>
                @error('mother_first_name') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror  
            </div>

            <div class="sm:col-span-2">
                <label for="mother_maiden_middle_name" class="block text-xs font-medium leading-6 text-gray-700 dark:text-blue-300"><b>25.</b> Mother's Maiden Middle Name<span class="text-red-600">*</span></label>
                <div class="mt-2">
                    <input wire:model="mother_maiden_middle_name" type="text" name="mother_maiden_middle_name" id="mother_maiden_middle_name" autocomplete="mother_maiden_middle_name" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" {{ $disabled ? 'disabled' : '' }}>
                </div>
                @error('mother_maiden_middle_name') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror  
            </div>

            <div class="sm:col-span-1">
                <label for="mother_name_ext" class="block text-xs font-medium leading-6 text-gray-700 dark:text-blue-300">Mother's Name Ext<span class="text-red-600">*</span></label>
                <div class="mt-2">
                    <input wire:model="mother_name_ext" type="text" name="mother_name_ext" id="mother_name_ext" autocomplete="mother_name_ext" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" {{ $disabled ? 'disabled' : '' }}>
                </div>
                @error('mother_name_ext') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror  
            </div>
        </div>

        @if(!$disabled)
            <div class="mt-6 flex items-center justify-end gap-x-6">
                <x-button class="mt-4">Save Family Information</x-button>
            </div>
        @endif
    </form>
</div>
