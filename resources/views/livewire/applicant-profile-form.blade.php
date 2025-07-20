<div>
    <!-- form -->
    <form wire:submit.prevent="submit" class="space-y-4">
        <div class="grid grid-cols-1 gap-x-6 gap-y-6 sm:grid-cols-6">
            
            <div class="sm:col-span-2">
                <label for="last_name" class="block text-xs font-medium leading-6 text-gray-700 dark:text-blue-300"><b>2.</b> Surname<span class="text-red-600">*</span></label>
                <div class="mt-2">
                    <input wire:model="last_name" type="text" name="last_name" id="last_name" autocomplete="last_name" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" {{ $disabled ? 'disabled' : '' }}>
                </div>
                @error('last_name') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror  
            </div>

            <div class="sm:col-span-3">
                <label for="first_name" class="block text-xs font-medium leading-6 text-gray-700 dark:text-blue-300">First name<span class="text-red-600">*</span></label>
                <div class="mt-2">
                    <input wire:model="first_name" type="text" name="first_name" id="first_name" autocomplete="first_name" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" {{ $disabled ? 'disabled' : '' }}>
                </div>
                @error('first_name') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror  
            </div>

            <div class="sm:col-span-1">
                <label for="name_ext" class="block text-xs font-medium leading-6 text-gray-700 dark:text-blue-300">Name Extension (JR/SR)<span class="text-red-600">*</span></label>
                <div class="mt-2">
                    <input wire:model="name_ext" type="text" name="name_ext" id="name_ext" autocomplete="name_ext" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" {{ $disabled ? 'disabled' : '' }}>
                </div>
                @error('name_ext') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror  
            </div>

            <div class="sm:col-span-2">
                <label for="middle_name" class="block text-xs font-medium leading-6 text-gray-700 dark:text-blue-300">Middle name<span class="text-red-600">*</span></label>
                <div class="mt-2">
                    <input wire:model="middle_name" type="text" name="middle_name" id="middle_name" autocomplete="middle_name" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" {{ $disabled ? 'disabled' : '' }}>
                </div>
                @error('middle_name') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror  
            </div>

            <div class="sm:col-span-2">
                <label for="birthdate" class="block text-xs font-medium leading-6 text-gray-700 dark:text-blue-300"><b>3.</b> Date of Birth<span class="text-red-600">*</span></label>
                <div class="mt-2">
                    <input wire:model="birthdate" id="birthdate" name="birthdate" type="date" autocomplete="birthdate" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" {{ $disabled ? 'disabled' : '' }}>
                </div>
                @error('birthdate') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror  
            </div>

            <div class="sm:col-span-2">
                <label for="birthplace" class="block text-xs font-medium leading-6 text-gray-700 dark:text-blue-300"><b>4.</b> Place of Birth<span class="text-red-600">*</span></label>
                <div class="mt-2">
                    <input wire:model="birthplace" id="birthplace" name="birthplace" type="text" autocomplete="birthplace" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" {{ $disabled ? 'disabled' : '' }}>
                </div>
                @error('birthplace') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror  
            </div>

            <div class="sm:col-span-1">
                <label for="sex" class="block text-xs font-medium leading-6 text-gray-700 dark:text-blue-300"><b>5.</b> Sex at Birth<span class="text-red-600">*</span></label>
                <div class="mt-2">
                    <select id="sex" wire:model.live="sex"  name="sex" autocomplete="sex" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:max-w-xs sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" {{ $disabled ? 'disabled' : '' }}>
                        <option value="">Select Sex</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                @error('sex') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror  
            </div>

            <div class="sm:col-span-1">
                <label for="civil_status" class="block text-xs font-medium leading-6 text-gray-700 dark:text-blue-300"><b>6.</b> Civil Status<span class="text-red-600">*</span></label>
                <div class="mt-2">
                    <select id="civil_status" wire:model.live="civil_status"  name="civil_status" autocomplete="civil_status" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:max-w-xs sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" {{ $disabled ? 'disabled' : '' }}>
                        <option value="">Select Civil Status</option>
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                        <option value="Widowed">Widowed</option>
                        <option value="Legally Separated">Legally Separated</option>
                        <option value="Divorced">Divorced</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                @error('civil_status') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror  
            </div>
            
            <div class="sm:col-span-1">
                <label for="height" class="block text-xs font-medium leading-6 text-gray-700 dark:text-blue-300"><b>7.</b> Height (m)<span class="text-red-600">*</span></label>
                <div class="mt-2">
                    <input wire:model="height" id="height" name="height" type="text" autocomplete="height" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" {{ $disabled ? 'disabled' : '' }}>
                </div>
                @error('height') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror  
            </div>

            <div class="sm:col-span-1">
                <label for="weight" class="block text-xs font-medium leading-6 text-gray-700 dark:text-blue-300"><b>8.</b> Weight (kg)<span class="text-red-600">*</span></label>
                <div class="mt-2">
                    <input wire:model="weight" id="weight" name="weight" type="text" autocomplete="weight" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" {{ $disabled ? 'disabled' : '' }}>
                </div>
                @error('weight') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror  
            </div>

            <div class="sm:col-span-2">
                <label for="blood_type" class="block text-xs font-medium leading-6 text-gray-700 dark:text-blue-300"><b>9.</b> Blood type<span class="text-red-600">*</span></label>
                <div class="mt-2">
                    <select id="blood_type" wire:model.live="blood_type" name="blood_type" autocomplete="blood_type" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:max-w-xs sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" {{ $disabled ? 'disabled' : '' }}>
                    <option value="">Select Blood Type</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                    </select>
                </div>
                @error('blood_type') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror  
            </div>

            <div class="sm:col-span-2">
                <label for="gsis_no" class="block text-xs font-medium leading-6 text-gray-700 dark:text-blue-300"><b>10.</b> GSIS ID No<span class="text-red-600">*</span></label>
                <div class="mt-2">
                    <input wire:model="gsis_no" id="gsis_no" name="gsis_no" type="text" autocomplete="gsis_no" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" {{ $disabled ? 'disabled' : '' }}>
                </div>
                @error('gsis_no') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror  
            </div>

            <div class="sm:col-span-2">
                <label for="pagibig_no" class="block text-xs font-medium leading-6 text-gray-700 dark:text-blue-300"><b>11.</b> PAGIBIG ID No<span class="text-red-600">*</span></label>
                <div class="mt-2">
                    <input wire:model="pagibig_no" id="pagibig_no" name="pagibig_no" type="text" autocomplete="pagibig_no" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" {{ $disabled ? 'disabled' : '' }}>
                </div>
                @error('pagibig_no') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror  
            </div>

            <div class="sm:col-span-2">
                <label for="philhealth_no" class="block text-xs font-medium leading-6 text-gray-700 dark:text-blue-300"><b>12.</b> PHILHEALTH No<span class="text-red-600">*</span></label>
                <div class="mt-2">
                    <input wire:model="philhealth_no" id="philhealth_no" name="philhealth_no" type="text" autocomplete="philhealth_no" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" {{ $disabled ? 'disabled' : '' }}>
                </div>
                @error('philhealth_no') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror  
            </div>

            <div class="sm:col-span-2">
                <label for="sss_no" class="block text-xs font-medium leading-6 text-gray-700 dark:text-blue-300"><b>13.</b> SSS ID No<span class="text-red-600">*</span></label>
                <div class="mt-2">
                    <input wire:model="sss_no" id="sss_no" name="sss_no" type="text" autocomplete="sss_no" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" {{ $disabled ? 'disabled' : '' }}>
                </div>
                @error('sss_no') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror  
            </div>

            <div class="sm:col-span-2">
                <label for="tin_no" class="block text-xs font-medium leading-6 text-gray-700 dark:text-blue-300"><b>14.</b> TIN<span class="text-red-600">*</span></label>
                <div class="mt-2">
                    <input wire:model="tin_no" id="tin_no" name="tin_no" type="text" autocomplete="tin_no" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" {{ $disabled ? 'disabled' : '' }}>
                </div>
                @error('tin_no') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror  
            </div>

            <div class="sm:col-span-2">
                <label for="employee_no" class="block text-xs font-medium leading-6 text-gray-700 dark:text-blue-300"><b>15.</b> Agency Employee No<span class="text-red-600">*</span></label>
                <div class="mt-2">
                    <input wire:model="employee_no" id="employee_no" name="employee_no" type="text" autocomplete="employee_no" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" {{ $disabled ? 'disabled' : '' }}>
                </div>
                @error('employee_no') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror  
            </div>

            <div class="sm:col-span-2">
                <label for="citizenship" class="block text-xs font-medium leading-6 text-gray-700 dark:text-blue-300"><b>16.</b> Citizenship</label>
                <div class="mt-2">
                    <select id="citizenship" wire:model.live="citizenship" name="citizenship" autocomplete="citizenship" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:max-w-xs sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" {{ $disabled ? 'disabled' : '' }}>
                        <option value="">Select Citizenship</option>
                        <option value="Filipino">Filipino</option>
                        <option value="Dual">Dual Citizenship</option>
                    </select>
                </div>
                @error('citizenship') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror  
            </div>

            @if($citizenship == 'Dual')
                <div class="sm:col-span-2">
                    <label for="dual_details" class="block text-xs font-medium leading-6 text-gray-700 dark:text-blue-300"><i>If dual citizen, indicate details</i></label>
                    <div class="mt-2">
                        <select id="dual_details" wire:model="dual_details" name="dual_details" autocomplete="dual_details" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:max-w-xs sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" {{ $disabled ? 'disabled' : '' }}>
                            <option value="">Details</option>
                            <option value="Birth">By Birth</option>
                            <option value="Dual">By Naturalization</option>
                        </select>
                    </div>
                    @error('dual_details') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror  
                </div>

                <div class="sm:col-span-2">
                    <label for="dual_country" class="block text-xs font-medium leading-6 text-gray-700 dark:text-blue-300"><i>Please indicate country</i></label>
                    <div class="mt-2">
                        <input 
                            list="countries" 
                            wire:model="dual_country" 
                            id="dual_country" 
                            name="dual_country" 
                            autocomplete="off"
                            class="block w-full appearance-none rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:max-w-xs sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600"
                            {{ $disabled ? 'disabled' : '' }}
                        >
                        <datalist id="countries">
                            @foreach($this->countries as $country)
                                <option value="{{ $country }}"></option>
                            @endforeach
                        </datalist>
                    </div>
                    @error('dual_country') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror  
                </div>
            @endif

            <div class="col-span-full"><span class="text-xs font-medium text-gray-700 dark:text-blue-300"><b>17.</b> Residential Address</span></div>
                <div class="sm:col-span-2">
                <label for="residential_house_no" class="block text-xs font-medium leading-6 text-gray-700 dark:text-blue-300">House / Block / Lot No<span class="text-red-600">*</span></label>
                <div class="mt-2">
                    <input wire:model="residential_house_no" id="residential_house_no" name="residential_house_no" type="text" autocomplete="residential_house_no" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" {{ $disabled ? 'disabled' : '' }}>
                </div>
                @error('residential_house_no') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror  
            </div>

            <div class="sm:col-span-2">
                <label for="residential_street" class="block text-xs font-medium leading-6 text-gray-700 dark:text-blue-300">Street<span class="text-red-600">*</span></label>
                <div class="mt-2">
                    <input wire:model="residential_street" id="residential_street" name="residential_street" type="text" autocomplete="residential_street" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" {{ $disabled ? 'disabled' : '' }}>
                </div>
                @error('residential_street') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror  
            </div>

            <div class="sm:col-span-2">
                <label for="residential_village" class="block text-xs font-medium leading-6 text-gray-700 dark:text-blue-300">Subdivision / Village<span class="text-red-600">*</span></label>
                <div class="mt-2">
                    <input wire:model="residential_village" id="residential_village" name="residential_village" type="text" autocomplete="residential_village" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" {{ $disabled ? 'disabled' : '' }}>
                </div>
                @error('residential_village') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror  
            </div>

            <div class="sm:col-span-2">
                <label for="selectedResidentialProvince" class="block text-xs font-medium leading-6 text-gray-700 dark:text-blue-300">Province<span class="text-red-600">*</span></label>
                <div class="mt-2">
                <select wire:model.live="selectedResidentialProvince" id="selectedResidentialProvince" name="selectedResidentialProvince"
                class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:max-w-xs sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600"
                {{ $disabled ? 'disabled' : '' }}>
                    <option value="">Select Province</option>
                    @foreach($this->provinces as $province)
                        <option value="{{ $province['name'] }}">{{ $province['label'] }}</option>
                    @endforeach
                </select>
                </div>
                @error('selectedResidentialProvince') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror  
            </div>

            <div class="sm:col-span-2">
                <label for="selectedResidentialMunicity" class="block text-xs font-medium leading-6 text-gray-700 dark:text-blue-300">City / Municipality<span class="text-red-600">*</span></label>
                <div class="mt-2">
                    <select wire:model.live="selectedResidentialMunicity" id="selectedResidentialMunicity" name="selectedResidentialMunicity"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:max-w-xs sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600 {{ $disabled || empty($this->selectedResidentialProvince) ? 'disabled' : '' }}"
                            wire:loading.class="opacity-50" wire:target="selectedResidentialProvince"
                            {{ $disabled || empty($this->selectedResidentialProvince) ? 'disabled' : '' }}>
                        <option value="">Select City/Municipality</option>
                        @foreach($this->residentialCities as $city)
                            <option value="{{ $city['name'] }}">{{ $city['label'] }}</option>
                        @endforeach
                    </select>
                    <div wire:loading wire:target="selectedResidentialProvince" class="text-xs text-gray-500 dark:text-gray-400 mt-1">Loading Cities...</div>
                </div>
                @error('selectedResidentialMunicity') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror  
            </div>

            <div class="sm:col-span-2">
                <label for="selectedResidentialBarangay" class="block text-xs font-medium leading-6 text-gray-700 dark:text-blue-300">Barangay<span class="text-red-600">*</span></label>
                <div class="mt-2">
                    <select wire:model.live="selectedResidentialBarangay" id="selectedResidentialBarangay" name="selectedResidentialBarangay"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:max-w-xs sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600 {{ $disabled || empty($this->selectedResidentialProvince) ? 'disabled' : '' }}"
                            wire:loading.class="opacity-50" wire:target="selectedResidentialProvince"
                            {{ $disabled || empty($this->selectedResidentialMunicity) ? 'disabled' : '' }}>
                        <option value="">Select Barangay</option>
                        @foreach($this->residentialBarangays as $barangay)
                            <option value="{{ $barangay['name'] }}">{{ $barangay['label'] }}</option>
                        @endforeach
                    </select>
                    <div wire:loading wire:target="selectedResidentialMunicity" class="text-xs text-gray-500 dark:text-gray-400 mt-1">Loading Barangays...</div>
                </div>
                @error('selectedResidentialBarangay') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror  
            </div>

            <div class="col-span-full">
                <span class="text-xs font-medium text-gray-700 dark:text-blue-300"><b>18.</b> Permanent Address
                    @if(!$disabled)
                    <input type="checkbox" wire:click="toggleCheckbox" {{ $isChecked ? 'checked' : '' }} id="address_copy" class="ml-4 w-4 h-4 text-blue-600 dark:text-blue-300 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-800 dark:border-gray-600">
                    <label for="address_copy" class="ml-1 text-xs font-medium text-gray-900 dark:text-gray-200 dark:text-blue-300"></label>Same as Residential Address</label>
                    @endif
                </span>
            </div>
            
            <div class="sm:col-span-2">
                <label for="permanent_house_no" class="block text-xs font-medium leading-6 text-gray-700 dark:text-blue-300">House / Block / Lot No<span class="text-red-600">*</span></label>
                <div class="mt-2">
                    <input wire:model="permanent_house_no" id="permanent_house_no" name="permanent_house_no" type="text" autocomplete="permanent_house_no" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" {{ $disabled ? 'disabled' : '' }}>
                </div>
                @error('permanent_house_no') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror  
            </div>

            <div class="sm:col-span-2">
                <label for="permanent_street" class="block text-xs font-medium leading-6 text-gray-700 dark:text-blue-300">Street<span class="text-red-600">*</span></label>
                <div class="mt-2">
                    <input wire:model="permanent_street" id="permanent_street" name="permanent_street" type="text" autocomplete="permanent_street" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" {{ $disabled ? 'disabled' : '' }}>
                </div>
                @error('permanent_street') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror  
            </div>

            <div class="sm:col-span-2">
                <label for="permanent_village" class="block text-xs font-medium leading-6 text-gray-700 dark:text-blue-300">Subdivision / Village<span class="text-red-600">*</span></label>
                <div class="mt-2">
                    <input wire:model="permanent_village" id="permanent_village" name="permanent_village" type="text" autocomplete="permanent_village" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" {{ $disabled ? 'disabled' : '' }}>
                </div>
                @error('permanent_village') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror  
            </div>

            <div class="sm:col-span-2">
                <label for="selectedPermanentProvince" class="block text-xs font-medium leading-6 text-gray-700 dark:text-blue-300">Province<span class="text-red-600">*</span></label>
                <div class="mt-2">
                <select wire:model.live="selectedPermanentProvince" id="selectedPermanentProvince" name="selectedPermanentProvince"
                class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:max-w-xs sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600"
                {{ $disabled ? 'disabled' : '' }}>
                    <option value="">Select Province</option>
                    @foreach($this->provinces as $province)
                        <option value="{{ $province['name'] }}">{{ $province['label'] }}</option>
                    @endforeach
                </select>
                </div>
                @error('selectedPermanentProvince') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror  
            </div>

            <div class="sm:col-span-2">
                <label for="selectedPermanentMunicity" class="block text-xs font-medium leading-6 text-gray-700 dark:text-blue-300">City / Municipality<span class="text-red-600">*</span></label>
                <div class="mt-2">
                    <select wire:model.live="selectedPermanentMunicity" id="selectedPermanentMunicity" name="selectedPermanentMunicity"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:max-w-xs sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600 {{ $disabled || empty($this->selectedPermanentProvince) ? 'disabled' : '' }}"
                            wire:loading.class="opacity-50" wire:target="selectedPermanentProvince"
                            {{ $disabled || empty($this->selectedPermanentProvince) ? 'disabled' : '' }}>
                        <option value="">Select City/Municipality</option>
                        @foreach($this->permanentCities as $city)
                            <option value="{{ $city['name'] }}">{{ $city['label'] }}</option>
                        @endforeach
                    </select>
                    <div wire:loading wire:target="selectedPermanentProvince" class="text-xs text-gray-500 dark:text-gray-400 mt-1">Loading Cities...</div>
                </div>
                @error('selectedPermanentMunicity') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror  
            </div>

            <div class="sm:col-span-2">
                <label for="selectedPermanentBarangay" class="block text-xs font-medium leading-6 text-gray-700 dark:text-blue-300">Barangay<span class="text-red-600">*</span></label>
                <div class="mt-2">
                    <select wire:model.live="selectedPermanentBarangay" id="selectedPermanentBarangay" name="selectedPermanentBarangay"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:max-w-xs sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600 {{ $disabled || empty($this->selectedPermanentProvince) ? 'disabled' : '' }}"
                            wire:loading.class="opacity-50" wire:target="selectedPermanentProvince"
                            {{ $disabled || empty($this->selectedPermanentMunicity) ? 'disabled' : '' }}>
                        <option value="">Select Barangay</option>
                        @foreach($this->permanentBarangays as $barangay)
                            <option value="{{ $barangay['name'] }}">{{ $barangay['label'] }}</option>
                        @endforeach
                    </select>
                    <div wire:loading wire:target="selectedPermanentMunicity" class="text-xs text-gray-500 dark:text-gray-400 mt-1">Loading Barangays...</div>
                </div>
                @error('selectedPermanentBarangay') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror  
            </div>

            <div class="sm:col-span-2">
                <label for="phone_no" class="block text-xs font-medium leading-6 text-gray-700 dark:text-blue-300"><b>19.</b> Telephone No<span class="text-red-600">*</span></label>
                <div class="mt-2">
                    <input wire:model="phone_no" id="phone_no" name="phone_no" type="text" autocomplete="phone_no" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" {{ $disabled ? 'disabled' : '' }}>
                </div>
                @error('phone_no') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror  
            </div>

            <div class="sm:col-span-2">
                <label for="mobile_no" class="block text-xs font-medium leading-6 text-gray-700 dark:text-blue-300"><b>20.</b> Mobile No<span class="text-red-600">*</span></label>
                <div class="mt-2">
                    <input wire:model="mobile_no" id="mobile_no" name="mobile_no" type="text" autocomplete="mobile_no" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" {{ $disabled ? 'disabled' : '' }}>
                </div>
                @error('mobile_no') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror  
            </div>

            <div class="sm:col-span-2">
                <label for="email" class="block text-xs font-medium leading-6 text-gray-700 dark:text-blue-300"><b>21.</b> Email Address<span class="text-red-600">*</span></label>
                <div class="mt-2">
                    <input wire:model="email" id="email" name="email" type="text" autocomplete="email" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" {{ $disabled ? 'disabled' : '' }}>
                </div>
                @error('email') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror  
            </div>

        </div>
        
        @if(!$disabled)
            <div class="mt-6 flex items-center justify-end gap-x-6">
                <x-button class="mt-4">Save Profile Information</x-button>
            </div>
        @endif
    </form>
</div>
