<div>
    @if(!$disabled)
        <div class="bg-blue-100 text-gray-800 p-4 rounded-md mb-5 text-sm dark:bg-gray-600 dark:text-gray-200">
            <p><strong>Instructions:</strong> Indicate <code>N/A</code> if not applicable. DO NOT ABBREVIATE.</p>
        </div> 
    @endif
    <!-- form -->
    <form wire:submit.prevent="submit" class="space-y-4">
        <div class="text-xs grid grid-cols-1 gap-x-6 gap-y-6 sm:grid-cols-6">
            <div class="sm:col-span-4">
                <label class="block text-xs leading-6 font-medium leading-6 text-gray-700 dark:text-blue-300">
                    <b>34. Are you related by consanguinity or affinity to the appointing or recommending authority,
                    or to the chief of bureau or office or the person who has immediate supervision over you in the Office,
                    Bureau or Department where you will be appointed, 
                    </b>
                </label>  
            </div>

            <div class="sm:col-span-2"></div>

            <div class="sm:col-span-4">
                <label class="block text-xs leading-6 font-medium leading-6 text-gray-700 dark:text-blue-300">
                    <b>a. within the third degree?*</b>
                </label>  
            </div>

            <div class="sm:col-span-2">
                <div class="flex gap-10">
                    <label class="flex items-center text-slate-600">
                        <input type="radio" wire:model.live="consanguinity_third" class="h-5 w-5 text-blue-600 dark:text-gray-200 border-gray-300 rounded-full focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-800 dark:border-gray-600" value="1" {{ $disabled ? 'disabled' : '' }}>
                        <span class="ml-2 text-gray-700 dark:text-gray-200">Yes</span>
                    </label>
                    <label class="flex items-center text-slate-600">
                        <input type="radio" wire:model.live="consanguinity_third" class="h-5 w-5 text-blue-600 dark:text-blue-300 border-gray-300 rounded-full focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-800 dark:border-gray-600" value="0" {{ $disabled ? 'disabled' : '' }}>
                        <span class="ml-2 text-gray-700 dark:text-gray-200">No</span>
                    </label>
                    @error('consanguinity_third') <span class="text-red-600 font-semibold">{{ $message }}</span> @enderror  
                </div>
            </div>

            <div class="sm:col-span-4">
                <label class="block text-xs leading-6 font-medium leading-6 text-gray-700 dark:text-blue-300">
                    <b>b. within the fourth degree (for Local Government Units - Career Employees)?*</b>
                </label>  
            </div>

            <div class="sm:col-span-2">
                <div class="flex gap-10 mt-1">
                    <label class="flex items-center text-slate-600">
                        <input type="radio" wire:model.live="consanguinity_fourth" class="h-5 w-5 text-blue-600 dark:text-blue-300 border-gray-300 rounded-full focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-800 dark:border-gray-600" value="1" {{ $disabled ? 'disabled' : '' }}>
                        <span class="ml-2 text-gray-700 dark:text-gray-200">Yes</span>
                    </label>
                    <label class="flex items-center text-slate-600">
                        <input type="radio" wire:model.live="consanguinity_fourth" class="h-5 w-5 text-blue-600 dark:text-blue-300 border-gray-300 rounded-full focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-800 dark:border-gray-600" value="0" {{ $disabled ? 'disabled' : '' }}>
                        <span class="ml-2 text-gray-700 dark:text-gray-200">No</span>
                    </label>
                    @error('consanguinity_fourth') <span class="text-red-600 font-semibold">{{ $message }}</span> @enderror  
                </div>
                <label for="consanguinity_details" class="leading-6 text-gray-700 dark:text-gray-200">If YES, give details</label>
                <div class="mt-2">
                    <input wire:model="consanguinity_details" type="text" name="consanguinity_details" id="consanguinity_details" autocomplete="consanguinity_details" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" {{ $disabled ? 'disabled' : '' }}>
                </div>
                @error('consanguinity_details') <span class="text-red-600 font-semibold">{{ $message }}</span> @enderror  
            </div>
            
            <div class="sm:col-span-full">
                 <hr class="dark:border-gray-800">
            </div>

            <div class="sm:col-span-4">
                <label class="block text-xs leading-6 font-medium leading-6 text-gray-700 dark:text-blue-300">
                    <b>35. a. Have you been found guilty of any administrative offense?*
                    </b>
                </label>  
            </div>

            <div class="sm:col-span-2">
                <div class="flex gap-10 mt-1">
                    <label for="admin_offense_yes" class="flex items-center text-slate-600">
                        <input type="radio" wire:model.live="admin_offense" id="admin_offense_yes" class="h-5 w-5 text-blue-600 dark:text-blue-300 border-gray-300 rounded-full focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-800 dark:border-gray-600" value="1" {{ $disabled ? 'disabled' : '' }}>
                        <span class="ml-2 text-gray-700 dark:text-gray-200">Yes</span>
                    </label>
                    <label for="admin_offense_no" class="flex items-center text-slate-600">
                        <input type="radio" wire:model.live="admin_offense" id="admin_offense_no" class="h-5 w-5 text-blue-600 dark:text-blue-300 border-gray-300 rounded-full focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-800 dark:border-gray-600" value="0" {{ $disabled ? 'disabled' : '' }}>
                        <span class="ml-2 text-gray-700 dark:text-gray-200">No</span>
                    </label>
                    @error('admin_offense') <span class="text-red-600 font-semibold">{{ $message }}</span> @enderror  
                </div>
                <label for="admin_offense_details" class="leading-6 text-gray-700 dark:text-gray-200">If YES, give details</label>
                <div class="mt-2">
                    <input wire:model="admin_offense_details" type="text" name="admin_offense_details" id="admin_offense_details" autocomplete="admin_offense_details" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" {{ $disabled ? 'disabled' : '' }}>
                </div>
                @error('admin_offense_details') <span class="text-red-600 font-semibold">{{ $message }}</span> @enderror  
            </div>

            <div class="sm:col-span-4">
                <label class="block text-xs leading-6 font-medium leading-6 text-gray-700 dark:text-blue-300">
                    <b>b. Have you been criminally charged before any court?*</b>
                </label>  
            </div>

            <div class="sm:col-span-2">
                <div class="flex gap-10 mt-1">
                    <label class="flex items-center text-slate-600">
                        <input type="radio" wire:model.live="criminal_court" class="h-5 w-5 text-blue-600 dark:text-blue-300 border-gray-300 rounded-full focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-800 dark:border-gray-600" value="1" {{ $disabled ? 'disabled' : '' }}>
                        <span class="ml-2 text-gray-700 dark:text-gray-200">Yes</span>
                    </label>
                    <label class="flex items-center text-slate-600">
                        <input type="radio" wire:model.live="criminal_court" class="h-5 w-5 text-blue-600 dark:text-blue-300 border-gray-300 rounded-full focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-800 dark:border-gray-600" value="0" {{ $disabled ? 'disabled' : '' }}>
                        <span class="ml-2 text-gray-700 dark:text-gray-200">No</span>
                    </label>
                    @error('criminal_court') <span class="text-red-600 font-semibold">{{ $message }}</span> @enderror  
                </div>
                <label for="criminal_court_details" class="leading-6 text-gray-700 dark:text-gray-200">If YES, give details</label>
                <div class="mt-2">
                    <input wire:model="criminal_court_details" type="text" name="criminal_court_details" id="criminal_court_details" autocomplete="criminal_court_details" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" {{ $disabled ? 'disabled' : '' }}>
                </div>
                @error('criminal_court_details') <span class="text-red-600 font-semibold">{{ $message }}</span> @enderror  
                <label for="criminal_court_filed" class="leading-6 text-gray-700 dark:text-gray-200">Date Filed</label>
                <div class="mt-2">
                    <input wire:model="criminal_court_filed" type="text" name="criminal_court_filed" id="criminal_court_filed" autocomplete="criminal_court_filed" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" {{ $disabled ? 'disabled' : '' }}>
                </div>
                @error('criminal_court_filed') <span class="text-red-600 font-semibold">{{ $message }}</span> @enderror  
                <label for="criminal_court_status" class="leading-6 text-gray-700 dark:text-gray-200">Status of Case/s</label>
                <div class="mt-2">
                    <input wire:model="criminal_court_status" type="text" name="criminal_court_status" id="criminal_court_status" autocomplete="criminal_court_status" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" {{ $disabled ? 'disabled' : '' }}>
                </div>
                @error('criminal_court_status') <span class="text-red-600 font-semibold">{{ $message }}</span> @enderror  
            </div>

            <div class="sm:col-span-full">
                <hr class="dark:border-gray-800">
            </div>

            <div class="sm:col-span-4">
                <label class="block text-xs leading-6 font-medium leading-6 text-gray-700 dark:text-blue-300">
                    <b>36. Have you ever been convicted of any crime or violation of any law, decree, ordinance or regulation by any court or tribunal?*</b>
                </label>  
            </div>

            <div class="sm:col-span-2">
                <div class="flex gap-10 mt-1">
                    <label for="convicted_crime_yes" class="flex items-center text-slate-600">
                        <input type="radio" wire:model.live="convicted_crime" id="convicted_crime_yes" class="h-5 w-5 text-blue-600 dark:text-blue-300 border-gray-300 rounded-full focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-800 dark:border-gray-600" value="1" {{ $disabled ? 'disabled' : '' }}>
                        <span class="ml-2 text-gray-700 dark:text-gray-200">Yes</span>
                    </label>
                    <label for="convicted_crime_no" class="flex items-center text-slate-600">
                        <input type="radio" wire:model.live="convicted_crime" id="convicted_crime_no" class="h-5 w-5 text-blue-600 dark:text-blue-300 border-gray-300 rounded-full focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-800 dark:border-gray-600" value="0" {{ $disabled ? 'disabled' : '' }}>
                        <span class="ml-2 text-gray-700 dark:text-gray-200">No</span>
                    </label>
                    @error('convicted_crime') <span class="text-red-600 font-semibold">{{ $message }}</span> @enderror 
                </div>
                <label for="convicted_crime_details" class="leading-6 text-gray-700 dark:text-gray-200">If YES, give details</label>
                <div class="mt-2">
                    <input wire:model="convicted_crime_details" type="text" name="fconvicted_crime_details" id="convicted_crime_details" autocomplete="convicted_crime_details" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" {{ $disabled ? 'disabled' : '' }}>
                </div>
                @error('convicted_crime_details') <span class="text-red-600 font-semibold">{{ $message }}</span> @enderror  
            </div>

            <div class="sm:col-span-full">
                 <hr class="dark:border-gray-800">
            </div>

            <div class="sm:col-span-4">
                <label class="block text-xs leading-6 font-medium leading-6 text-gray-700 dark:text-blue-300">
                    <b>37. Have you ever been separated from the service in any of the following modes: 
                    resignation, retirement, dropped from the rolls, dismissal, termination, end of term, finished contract
                    or phased out (abolition) in the public or private sector?*</b>
                </label>  
            </div>

            <div class="sm:col-span-2">
                <div class="flex gap-10 mt-1">
                    <label for="service_separated_yes" class="flex items-center text-slate-600">
                        <input type="radio" wire:model.live="service_separated" id="service_separated_yes" class="h-5 w-5 text-blue-600 dark:text-blue-300 border-gray-300 rounded-full focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-800 dark:border-gray-600" value="1" {{ $disabled ? 'disabled' : '' }}>
                        <span class="ml-2 text-gray-700 dark:text-gray-200">Yes</span>
                    </label>
                    <label for="service_separated_no" class="flex items-center text-slate-600">
                        <input type="radio" wire:model.live="service_separated" id="service_separated_no" class="h-5 w-5 text-blue-600 dark:text-blue-300 border-gray-300 rounded-full focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-800 dark:border-gray-600" value="0" {{ $disabled ? 'disabled' : '' }}>
                        <span class="ml-2 text-gray-700 dark:text-gray-200">No</span>
                    </label>
                    @error('service_separated') <span class="text-red-600 font-semibold">{{ $message }}</span> @enderror  
                </div>
                <label for="service_separated_details" class="leading-6 text-gray-700 dark:text-gray-200">If YES, give details</label>
                <div class="mt-2">
                    <input wire:model="service_separated_details" type="text" name="service_separated_details" id="service_separated_details" autocomplete="service_separated_details" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" {{ $disabled ? 'disabled' : '' }}>
                </div>
                @error('service_separated_details') <span class="text-red-600 font-semibold">{{ $message }}</span> @enderror  
            </div>   

            <div class="sm:col-span-full">
                 <hr class="dark:border-gray-800">
            </div>

            <div class="sm:col-span-4">
                <label class="block text-xs leading-6 font-medium leading-6 text-gray-700 dark:text-blue-300">
                    <b>38. a. Have you ever been a candidate in a national or local election held within the last year (except Barangay election)?*
                    </b>
                </label>  
            </div>

            <div class="sm:col-span-2">
                <div class="flex gap-10 mt-1">
                    <label class="flex items-center text-slate-600">
                        <input type="radio" wire:model.live="candidate" class="h-5 w-5 text-blue-600 dark:text-blue-300 border-gray-300 rounded-full focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-800 dark:border-gray-600" value="1" {{ $disabled ? 'disabled' : '' }}>
                        <span class="ml-2 text-gray-700 dark:text-gray-200">Yes</span>
                    </label>
                    <label class="flex items-center text-slate-600">
                        <input type="radio" wire:model.live="candidate" class="h-5 w-5 text-blue-600 dark:text-blue-300 border-gray-300 rounded-full focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-800 dark:border-gray-600" value="0" {{ $disabled ? 'disabled' : '' }}>
                        <span class="ml-2 text-gray-700 dark:text-gray-200">No</span>
                    </label>
                    @error('candidate') <span class="text-red-600 font-semibold">{{ $message }}</span> @enderror  
                </div>
                <label for="candidate_details" class="leading-6 text-gray-700 dark:text-gray-200">If YES, give details</span>
                <div class="mt-2">
                    <input wire:model="candidate_details" type="text" name="candidate_details" id="candidate_details" autocomplete="candidate_details" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" {{ $disabled ? 'disabled' : '' }}>
                </div>
                @error('candidate_details') <span class="text-red-600 font-semibold">{{ $message }}</span> @enderror  
            </div>

            <div class="sm:col-span-4">
                <label class="block text-xs leading-6 font-medium leading-6 text-gray-700 dark:text-blue-300">
                    <b>b. Have you resigned from the government service during the three (3)-month period before the last election to promote/actively
                    campaign for a national or local candidate?*
                    </b>
                </label>  
            </div>

            <div class="sm:col-span-2">
                <div class="flex gap-10 mt-1">
                    <label class="flex items-center text-slate-600">
                        <input type="radio" wire:model.live="campaign" class="h-5 w-5 text-blue-600 dark:text-blue-300 border-gray-300 rounded-full focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-800 dark:border-gray-600" value="1" {{ $disabled ? 'disabled' : '' }}>
                        <span class="ml-2 text-gray-700 dark:text-gray-200">Yes</span>
                    </label>
                    <label class="flex items-center text-slate-600">
                        <input type="radio" wire:model.live="campaign" class="h-5 w-5 text-blue-600 dark:text-blue-300 border-gray-300 rounded-full focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-800 dark:border-gray-600" value="0" {{ $disabled ? 'disabled' : '' }}>
                        <span class="ml-2 text-gray-700 dark:text-gray-200">No</span>
                    </label>
                    @error('campaign') <span class="text-red-600 font-semibold">{{ $message }}</span> @enderror  
                </div>
                <label for="campaign_details" class="leading-6 text-gray-700 dark:text-gray-200">If YES, give details</label>
                <div class="mt-2">
                    <input wire:model="campaign_details" type="text" name="campaign_details" id="campaign_details" autocomplete="campaign_details" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" {{ $disabled ? 'disabled' : '' }}>
                </div>
                @error('campaign_details') <span class="text-red-600 font-semibold">{{ $message }}</span> @enderror  
            </div>
  
            <div class="sm:col-span-full">
                 <hr class="dark:border-gray-800">
            </div>
            
            <div class="sm:col-span-4">
                <label class="block text-xs leading-6 font-medium leading-6 text-gray-700 dark:text-blue-300">
                    <b>39. Have you acquired the status of an immigrant or permanent resident of another country?*</b>
                </labe>  
            </div>

            <div class="sm:col-span-2">
                <div class="flex gap-10 mt-1">
                    <label class="flex items-center text-slate-600">
                        <input type="radio" wire:model.live="immigrant" class="h-5 w-5 text-blue-600 dark:text-blue-300 border-gray-300 rounded-full focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-800 dark:border-gray-600" value="1" {{ $disabled ? 'disabled' : '' }}>
                        <span class="ml-2 text-gray-700 dark:text-gray-200">Yes</span>
                    </label>
                    <label class="flex items-center text-slate-600">
                        <input type="radio" wire:model.live="immigrant" class="h-5 w-5 text-blue-600 dark:text-blue-300 border-gray-300 rounded-full focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-800 dark:border-gray-600" value="0" {{ $disabled ? 'disabled' : '' }}>
                        <span class="ml-2 text-gray-700 dark:text-gray-200">No</span>
                    </label>
                    @error('immigrant') <span class="text-red-600 font-semibold">{{ $message }}</span> @enderror  
                </div>
                <label for="immigrant_details" class="leading-6 text-gray-700 dark:text-gray-200">If YES, give details (country)</label>
                <div class="mt-2">
                    <input wire:model="immigrant_details" type="text" name="immigrant_details" id="immigrant_details" autocomplete="immigrant_details" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" {{ $disabled ? 'disabled' : '' }}>
                </div>
                @error('immigrant_details') <span class="text-red-600 font-semibold">{{ $message }}</span> @enderror  
            </div>          

            <div class="sm:col-span-full">
                 <hr class="dark:border-gray-800">
            </div>

            <div class="sm:col-span-4">
                <label class="block text-xs leading-6 font-medium leading-6 text-gray-700 dark:text-blue-300">
                    <b>40. Pursuant to: (a) Indigenous People's Act (RA 8371); (b) Magna Carta for Disabled Persons (RA 7277);
                    and (c) Solo Parents Welfare Act of 2000 (RA 8972), please answer the following items:
                    </b>
                </label>  
            </div>

            <div class="sm:col-span-2"></div>

            <div class="sm:col-span-4">
                <label class="block text-xs leading-6 font-medium leading-6 text-gray-700 dark:text-blue-300">
                    <b>a. Are you a member of any indigenous group?*
                    </b>
                </label>  
            </div>

            <div class="sm:col-span-2">
                <div class="flex gap-10 mt-1">
                    <label class="flex items-center text-slate-600">
                        <input type="radio" wire:model.live="ip" class="h-5 w-5 text-blue-600 dark:text-blue-300 border-gray-300 rounded-full focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-800 dark:border-gray-600" value="1" {{ $disabled ? 'disabled' : '' }}>
                        <span class="ml-2 text-gray-700 dark:text-gray-200">Yes</span>
                    </label>
                    <label class="flex items-center text-slate-600">
                        <input type="radio" wire:model.live="ip" class="h-5 w-5 text-blue-600 dark:text-blue-300 border-gray-300 rounded-full focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-800 dark:border-gray-600" value="0" {{ $disabled ? 'disabled' : '' }}>
                        <span class="ml-2 text-gray-700 dark:text-gray-200">No</span>
                    </label>
                    @error('ip') <span class="text-red-600 font-semibold">{{ $message }}</span> @enderror  
                </div>
                <label for="ip_details" class="leading-6 text-gray-700 dark:text-gray-200">If YES, give details</label>
                <div class="mt-2">
                    <input wire:model="ip_details" type="text" name="ip_details" id="ip_details" autocomplete="ip_details" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" {{ $disabled ? 'disabled' : '' }}>
                </div>
                @error('ip_details') <span class="text-red-600 font-semibold">{{ $message }}</span> @enderror 
            </div>

            <div class="sm:col-span-4">
                <label class="block text-xs leading-6 font-medium leading-6 text-gray-700 dark:text-blue-300">
                    <b>b. Are you a person with disability?*</b>
                </label>  
            </div>

            <div class="sm:col-span-2">
                <div class="flex gap-10 mt-1">
                    <label class="flex items-center text-slate-600">
                        <input type="radio" wire:model.live="pwd" class="h-5 w-5 text-blue-600 dark:text-blue-300 border-gray-300 rounded-full focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-800 dark:border-gray-600" value="1" {{ $disabled ? 'disabled' : '' }}>
                        <span class="ml-2 text-gray-700 dark:text-gray-200">Yes</span>
                    </label>
                    <label class="flex items-center text-slate-600">
                        <input type="radio" wire:model.live="pwd" class="h-5 w-5 text-blue-600 dark:text-blue-300 border-gray-300 rounded-full focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-800 dark:border-gray-600" value="0" {{ $disabled ? 'disabled' : '' }}>
                        <span class="ml-2 text-gray-700 dark:text-gray-200">No</span>
                    </label>
                    @error('pwd') <span class="text-red-600 font-semibold">{{ $message }}</span> @enderror  
                </div>
                <label for="pwd_details" class="leading-6 text-gray-700 dark:text-gray-200">If YES, please specify ID No.</label>
                <div class="mt-2">
                    <input wire:model="pwd_details" type="text" name="pwd_details" id="pwd_details" autocomplete="pwd_details" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" {{ $disabled ? 'disabled' : '' }}>
                </div>
                @error('pwd_details') <span class="text-red-600 font-semibold">{{ $message }}</span> @enderror  
            </div>

            <div class="sm:col-span-4">
                <label class="block text-xs leading-6 font-medium leading-6 text-gray-700 dark:text-blue-300">
                    <b>c. Are you a solo parent?*</b>
                </label>  
            </div>

            <div class="sm:col-span-2">
                <div class="flex gap-10 mt-1">
                    <label class="flex items-center text-slate-600">
                        <input type="radio" wire:model.live="solo_parent" class="h-5 w-5 text-blue-600 dark:text-blue-300 border-gray-300 rounded-full focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-800 dark:border-gray-600" value="1" {{ $disabled ? 'disabled' : '' }}>
                        <span class="ml-2 text-gray-700 dark:text-gray-200">Yes</span>
                    </label>
                    <label class="flex items-center text-slate-600">
                        <input type="radio" wire:model.live="solo_parent" class="h-5 w-5 text-blue-600 dark:text-blue-300 border-gray-300 rounded-full focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-800 dark:border-gray-600" value="0" {{ $disabled ? 'disabled' : '' }}>
                        <span class="ml-2 text-gray-700 dark:text-gray-200">No</span>
                    </label>
                    @error('solo_parent') <span class="text-red-600 font-semibold">{{ $message }}</span> @enderror  
                </div>
                <label for="solo_parent_details" class="leading-6 text-gray-700 dark:text-gray-200">If YES, please specify ID No.</label>
                <div class="mt-2">
                    <input wire:model="solo_parent_details" type="text" name="solo_parent_details" id="solo_parent_details" autocomplete="solo_parent_details" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" {{ $disabled ? 'disabled' : '' }}>
                </div>
                @error('solo_parent_details') <span class="text-red-600 font-semibold">{{ $message }}</span> @enderror  
            </div>

            <div class="sm:col-span-full">
                 <hr class="dark:border-gray-800">
            </div>

            <div class="sm:col-span-full">
                <label class="block text-xs leading-6 font-medium leading-6 text-gray-700 dark:text-blue-300">
                    <b>41. References*</b>
                    <span class="italic">(Person not related by consanguinity or affinity to applicant/appointee)</span>
                </label>  
            </div>
            
            <div class="sm:col-span-full grid grid-cols-1 sm:grid-cols-3 justify-center items-center font-bold text-gray-700 uppercase bg-gray-50 dark:bg-gray-800 dark:text-gray-200 h-8 gap-x-6 gap-y-6">
                <span class="text-center col-span-1">Name</span>
                <span class="text-center col-span-1">Address</span>
                <span class="text-center col-span-1">Tel. No.</span>
            </div>

            <div class="sm:col-span-full grid grid-cols-1 sm:grid-cols-3 justify-center items-center text-gray-700 ">
                <div class="mx-4 mt-1">
                    <label for="reference1_name" class="sr-only">Reference Name 1</label>
                    <input wire:model="reference1_name" type="text" name="reference1_name" id="reference1_name" autocomplete="reference1_name" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" {{ $disabled ? 'disabled' : '' }}>
                    @error('reference1_name') <span class="text-red-600 font-semibold">{{ $message }}</span> @enderror  
                </div>
                
                <div class="mx-4 mt-1">
                    <label for="reference1_address" class="sr-only">Reference Address 1</label>
                    <input wire:model="reference1_address" type="text" name="reference1_address" id="reference1_address" autocomplete="reference1_address" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" {{ $disabled ? 'disabled' : '' }}>
                    @error('reference1_address') <span class="text-red-600 font-semibold">{{ $message }}</span> @enderror  
                </div>
                
                <div class="mx-4 mt-1">
                    <label for="reference1_contact_no" class="sr-only">Reference Contact 1</label>
                    <input wire:model="reference1_contact_no" type="text" name="reference1_contact_no" id="reference1_contact_no" autocomplete="reference1_contact_no" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" {{ $disabled ? 'disabled' : '' }}>
                    @error('reference1_contact_no') <span class="text-red-600 font-semibold">{{ $message }}</span> @enderror  
                </div>
            </div>

            <div class="sm:col-span-full grid grid-cols-1 sm:grid-cols-3 justify-center items-center text-gray-700 ">
                <div class="mx-4 mt-1">
                    <label for="reference2_name" class="sr-only">Reference Name 2</label>
                    <input wire:model="reference2_name" type="text" name="reference2_name" id="reference2_name" autocomplete="reference2_name" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" {{ $disabled ? 'disabled' : '' }}>
                    @error('reference2_name') <span class="text-red-600 font-semibold">{{ $message }}</span> @enderror  
                </div>
                
                <div class="mx-4 mt-1">
                    <label for="reference2_address" class="sr-only">Reference Address 2</label>
                    <input wire:model="reference2_address" type="text" name="reference2_address" id="reference2_address" autocomplete="reference2_address" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" {{ $disabled ? 'disabled' : '' }}>
                    @error('reference2_address') <span class="text-red-600 font-semibold">{{ $message }}</span> @enderror  
                </div>
                
                <div class="mx-4 mt-1">
                    <label for="reference2_contact_no" class="sr-only">Reference Contact 2</label>
                    <input wire:model="reference2_contact_no" type="text" name="reference2_contact_no" id="reference2_contact_no" autocomplete="reference2_contact_no" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" {{ $disabled ? 'disabled' : '' }}>
                    @error('reference2_contact_no') <span class="text-red-600 font-semibold">{{ $message }}</span> @enderror  
                </div>
            </div>

            <div class="sm:col-span-full grid grid-cols-1 sm:grid-cols-3 justify-center items-center text-gray-700 ">
                <div class="mx-4 mt-1">
                    <label for="reference3_name" class="sr-only">Reference Name 3</label>
                    <input wire:model="reference3_name" type="text" name="reference3_name" id="reference3_name" autocomplete="reference3_name" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" {{ $disabled ? 'disabled' : '' }}>
                    @error('reference3_name') <span class="text-red-600 font-semibold">{{ $message }}</span> @enderror
                </div>  
                
                <div class="mx-4 mt-1">
                    <label for="reference3_address" class="sr-only">Reference Address 3</label>
                    <input wire:model="reference3_address" type="text" name="reference3_address" id="reference3_address" autocomplete="reference3_address" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" {{ $disabled ? 'disabled' : '' }}>
                    @error('reference3_address') <span class="text-red-600 font-semibold">{{ $message }}</span> @enderror  
                </div>
                
                <div class="mx-4 mt-1">
                    <label for="reference3_contact_no" class="sr-only">Reference Contact 3</label>
                    <input wire:model="reference3_contact_no" type="text" name="reference3_contact_no" id="reference3_contact_no" autocomplete="reference3_contact_no" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" {{ $disabled ? 'disabled' : '' }}>
                    @error('reference3_contact_no') <span class="text-red-600 font-semibold">{{ $message }}</span> @enderror  
                </div>
            </div>

            <div class="sm:col-span-full">
                 <hr class="dark:border-gray-800">
            </div>

            <div class="sm:col-span-full">
                <span class="leading-6 text-gray-700 font-bold">
                    42. I declare under oath that I have personally accomplished the Personal Data Sheet
                    which is a true, correct and complete statement.
                </span>
                <br>
                <span class="leading-6 text-gray-700 italic font-semibold">Please indicate ID Number and Date of Issuance</span>
                <div class="mt-2">
                    <label for="govt_id" class="leading-6 text-gray-700 dark:text-gray-200">Government Issued ID<span class="text-red-600">*</span></label>
                    <div class="mt-2">
                        <input wire:model="govt_id" type="text" name="govt_id" id="govt_id" autocomplete="govt_id" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" {{ $disabled ? 'disabled' : '' }}>
                    </div>
                    @error('govt_id') <span class="text-red-600 font-semibold">{{ $message }}</span> @enderror  
                </div>

                <div class="mt-2">
                    <label for="govt_id_no" class="leading-6 text-gray-700 dark:text-gray-200">ID/License/Passport No.<span class="text-red-600">*</span></label>
                    <div class="mt-2">
                        <input wire:model="govt_id_no" type="text" name="govt_id_no" id="govt_id_no" autocomplete="govt_id_no" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" {{ $disabled ? 'disabled' : '' }}>
                    </div>
                    @error('govt_id_no') <span class="text-red-600 font-semibold">{{ $message }}</span> @enderror  
                </div>

                <div class="mt-2">
                    <label for="govt_id_issuance" class="leading-6 text-gray-700 dark:text-gray-200">Date/Place of Issuance<span class="text-red-600">*</span></label>
                    <div class="mt-2">
                        <input wire:model="govt_id_issuance" type="text" name="govt_id_issuance" id="govt_id_issuance" autocomplete="govt_id_issuance" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" {{ $disabled ? 'disabled' : '' }}>
                    </div>
                    @error('govt_id_issuance') <span class="text-red-600 font-semibold">{{ $message }}</span> @enderror  
                </div>
            </div>

        </div>

        @if(!$disabled)
            <div class="mt-6 flex items-center justify-end gap-x-6">
                <x-button class="mt-4">Save</x-button>
            </div>
        @endif
    </form>
</div>
