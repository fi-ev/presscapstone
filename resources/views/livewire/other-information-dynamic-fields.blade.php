<div>
    <div class="grid grid-cols-1 gap-x-6 gap-y-6 sm:grid-cols-6">
        <div class="sm:col-span-2">
            @if (count($skillFields) >= 0)
                @foreach ($skillFields as $index => $skillField)
                    <div class="flex items-center gap-2 mt-1">
                        <div>
                             @error("skillFields.$index.information")
                                <span class="text-red-600 text-xs font-semibold">{{ $message }}</span>
                             @enderror
                             <label for="skill-information-{{ $index }}" class="sr-only">Skill {{ $index + 1 }}</label>
                             <input type="text"  name="skill-information-{{ $index }}" id="skill-information-{{ $index }}" wire:model.defer="skillFields.{{ $index }}.information" value="{{ $skillField['information'] ?? '' }}" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" {{ $disabled ? 'disabled' : '' }}>
                        </div>

                        @if(!$disabled)
                            <button wire:click="removeSkillField({{ $index }})"
                                    wire:confirm="Are you sure you want to delete this entry?"
                                    title="Delete Entry {{ $index + 1 }}"
                                    class="px-2 py-1 rounded border border-gray-600 text-gray-600 hover:text-red-600 hover:border-red-600 text-xs flex items-center justify-center h-7 w-7">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-3 w-3">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                            </button>
                            @if($loop->last)
                                    <button wire:click="addSkillField"
                                    title="Add Entry"
                                    class="px-2 py-1 rounded border border-gray-600 text-gray-600 hover:text-blue-600 hover:border-blue-600 text-xs flex items-center justify-center h-7 w-7">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-3 w-3">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                        </svg>
                                    </button>
                            @endif
                        @endif
                    </div>
                @endforeach

                @if(!$disabled)
                    <div class="flex w-full mb-4 items-center justify-start">
                        <x-button wire:click="saveSkills" class="mt-4">Save Skills</x-button>
                    </div>
                @endif
            @endif
        </div>

        <div class="sm:col-span-2">
            @if (count($recognitionFields) > 0)
                @foreach ($recognitionFields as $index => $recognitionField)
                    <div class="flex items-center gap-2 mt-1">
                        <div>
                            @error("recognitionFields.$index.information")
                                <span class="text-red-600 text-xs font-semibold">{{ $message }}</span>
                            @enderror
                            <label for="recognition-information-{{ $index }}" class="sr-only">Recognition {{ $index + 1 }}</label>
                            <input type="text" name="recognition-information-{{ $index }}" id="recognition-information-{{ $index }}" wire:model.defer="recognitionFields.{{ $index }}.information" value="{{ $recognitionField['information'] ?? '' }}" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" {{ $disabled ? 'disabled' : '' }}>
                        </div>
                         @if(!$disabled)
                            <button wire:click="removeRecognitionField({{ $index }})"
                                    wire:confirm="Are you sure you want to delete this entry?"
                                    title="Delete Entry {{ $index + 1 }}"
                                    class="px-2 py-1 rounded border border-gray-600 text-gray-600 hover:text-red-600 hover:border-red-600 text-xs flex items-center justify-center h-7 w-7">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-3 w-3">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                            </button>
                            @if($loop->last)
                                    <button wire:click="addRecognitionField"
                                    title="Add Entry"
                                    class="px-2 py-1 rounded border border-gray-600 text-gray-600 hover:text-blue-600 hover:border-blue-600 text-xs flex items-center justify-center h-7 w-7">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-3 w-3">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                        </svg>
                                    </button>
                            @endif
                        @endif
                    </div>
                @endforeach
                @if(!$disabled)
                    <div class="flex w-full mb-4 items-center justify-start">
                        <x-button wire:click="saveRecognitions" class="mt-4">Save Recognitions</x-button>
                    </div>
                @endif
            @endif
        </div>

        <div class="sm:col-span-2">
            @if (count($membershipFields) > 0)
                @foreach ($membershipFields as $index => $membershipField)
                    <div class="flex items-center gap-2 mt-1">
                        <div>
                            @error("membershipFields.$index.information")
                                <span class="text-red-600 text-xs font-semibold">{{ $message }}</span>
                            @enderror
                            <label for="membership-information-{{ $index }}" class="sr-only">Membership {{ $index + 1 }}</label>
                            <input type="text" name="membership-information-{{ $index }}" id="membership-information-{{ $index }}" wire:model.defer="membershipFields.{{ $index }}.information" value="{{ $membershipField['information'] ?? '' }}" class="block mt-1 w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" {{ $disabled ? 'disabled' : '' }}>
                        </div>
                        @if(!$disabled)
                            <button wire:click="removeMembershipField({{ $index }})"
                                    wire:confirm="Are you sure you want to delete this entry?"
                                    title="Delete Entry {{ $index + 1 }}"
                                    class="px-2 py-1 rounded border border-gray-600 text-gray-600 hover:text-red-600 hover:border-red-600 text-xs flex items-center justify-center h-7 w-7">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-3 w-3">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                            </button>
                            @if($loop->last)
                                    <button wire:click="addMembershipField"
                                    title="Add Entry"
                                    class="px-2 py-1 rounded border border-gray-600 text-gray-600 hover:text-blue-600 hover:border-blue-600 text-xs flex items-center justify-center h-7 w-7">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-3 w-3">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                        </svg>
                                    </button>
                            @endif
                        @endif
                    </div>
                @endforeach
                @if(!$disabled)
                    <div class="flex w-full mb-4 items-center justify-start">
                        <x-button wire:click="saveMemberships" class="mt-4">Save Memberships</x-button>
                    </div>
                @endif
            @endif
        </div>
    </div>
</div>