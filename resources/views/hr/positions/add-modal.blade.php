<div class="overflow-y-auto fixed inset-0 z-50 flex items-center justify-center">
    <!-- modal bg -->
    <div class="fixed inset-0 bg-white bg-opacity-75 dark:bg-opacity-25" aria-hidden="true"></div>
    <!-- modal -->
    <div class="relative bg-white rounded-lg shadow dark:bg-gray-800 max-w-md mx-auto p-4 md:p-5 w-full max-h-screen overflow-y-auto ">
        <!-- header -->
        <div class="flex items-center justify-between dark:border-gray-600">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-200">
                New Position
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
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 p-4">
            <!-- form -->
            <form wire:submit.prevent="submit" class="space-y-4 col-span-1 md:col-span-2">
                <div>
                    <x-label class="text-blue-700 dark:text-blue-300" for="title" value="{{ __('Title*') }}" />
                    <x-input id="title" wire:model="title" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" type="text" name="title" :value="old('title')" autofocus autocomplete="title" />
                    @error('title') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror 
                </div>

                <div>
                    <x-label class="text-blue-700 dark:text-blue-300" for="assignment_place" value="{{ __('Place of Assignment*') }}" />
                    <x-input id="assignment_place" wire:model="assignment_place" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" type="text" name="assignment_place" :value="old('assignment_place')" autofocus autocomplete="assigment_place" />
                    @error('assignment_place') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror 
                </div>

                <div>
                    <x-label class="text-blue-700 dark:text-blue-300" for="employment_type" value="{{ __('Employment Type*') }}" />
                    <select id="employment_type" wire:model="employment_type" name="employment_type" autocomplete="employment_type" class="block mt-1 w-full rounded-md border-0 py-1.5 shadow-sm ring-1 ring-inset ring-gray-300  focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-700 bg-white border border-gray-300 rounded-lg w-80 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600">
                        <option value="">Select Employment Type</option>
                        <option value="COS">Contract of Service</option>
                        <option value="Plantilla" >Plantilla</option>
                        <option value="JO">Job Order</option>
                    </select>   
                    @error('employment_type') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror 
                </div>

                <div>
                    <x-label class="text-blue-700 dark:text-blue-300" for="plantilla_no" value="{{ __('Plantilla No (Optional)') }}" />
                    <x-input id="plantilla_no" wire:model="plantilla_no" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" type="text" name="plantilla_no" autofocus autocomplete="plantilla_no" />
                    @error('plantilla_no') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror 
                </div>

                <div>
                    <x-label class="text-blue-700 dark:text-blue-300" for="salary_grade" value="{{ __('Salary Grade*') }}" />
                    <x-input id="salary_grade" wire:model="salary_grade" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600 placeholder:text-gray-400" placeholder="1" type="number" name="salary_grade" autofocus autocomplete="salary_grade" />
                    @error('salary_grade') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror 
                </div>

                <div>
                    <x-label class="text-blue-700 dark:text-blue-300" for="monthly_salary" value="{{ __('Monthly Salary*') }}" />
                    <x-input id="monthly_salary" wire:model="monthly_salary" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600 placeholder:text-gray-400" placeholder="0.00" type="text" name="monthly_salary" autofocus autocomplete="monthly_salary" />
                    @error('monthly_salary') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror 
                </div>

                <div>
                    <x-label class="text-blue-700 dark:text-blue-300" for="description" value="{{ __('Description (Optional)') }}" />
                    <textarea id="message" rows="16" 
                    class="block p-2.5 w-full text-sm text-gray-900 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    wire:model="description"></textarea>
                    @error('description') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror 
                </div>

                <div>
                    <x-label class="text-blue-700 dark:text-blue-300" for="education" value="{{ __('Education*') }}" />
                    <x-input id="education" wire:model="education" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600 placeholder:text-gray-400" type="text" name="education" autofocus autocomplete="education" />
                    @error('education') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror 
                </div>

                <div>
                    <x-label class="text-blue-700 dark:text-blue-300" for="work_experience" value="{{ __('Work Experience*') }}" />
                    <x-input id="work_experience" wire:model="work_experience" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600 placeholder:text-gray-400" type="text" name="work_experience" autofocus autocomplete="work_experience" />
                    @error('work_experience') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror                
                </div>

                <div>
                    <x-label class="text-blue-700 dark:text-blue-300" for="training" value="{{ __('Trainings*') }}" />
                    <input id="training" type="text" wire:model.live.debounce.300ms="searchTraining" placeholder="Search Trainings" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600 placeholder:text-gray-400">
                    @if ($searchTraining)
                        <ul class="max-h-60 overflow-auto">
                            @forelse($filteredTrainings as $id => $name)
                                <li>
                                    <label class="block p-2 text-xs hover:bg-gray-100 rounded-md cursor-pointer">
                                        <input type="checkbox" wire:model.live="selectedTrainings" value="{{ $id }}" class="mr-2 rounded-md">
                                        {{ $name }}
                                    </label>
                                </li>
                            @empty
                                <li class="p-2 text-xs text-red-800">No results found</li>
                            @endforelse
                        </ul>
                    @endif
                    @error('searchTraining') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror 
                </div>
                @if (!empty($selectedTrainings))
                    <div class="text-xs p-2 rounded-md border border-dashed border-1">
                        <h3 class="font-semibold">Selected Trainings:</h3>
                        <ul>
                            @foreach ($selectedTrainings as $id)
                                <li>{{ $trainings[$id] ?? 'Unknown Training' }}</li>
                                <input type="hidden" name="trainings[]" value="{{ $id }}">
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div>
                    <x-label class="text-blue-700 dark:text-blue-300" for="eligibility" value="{{ __('Eligibilities*') }}" />
                    <input id="eligibility" type="text" wire:model.live.debounce.300ms="searchEligibility" placeholder="Search Eligibilities" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600 placeholder:text-gray-400">
                    @if ($searchEligibility)
                        <ul class="max-h-60 overflow-auto">
                            @forelse($filteredEligibilities as $id => $name)
                                <li>
                                    <label class="block p-2 text-xs hover:bg-gray-100 cursor-pointer">
                                        <input type="checkbox" wire:model.live="selectedEligibilities" value="{{ $id }}" class="mr-2 rounded-md">
                                        {{ $name }}
                                    </label>
                                </li>
                            @empty
                                <li class="p-2 text-xs text-red-800">No results found</li>
                            @endforelse
                        </ul>
                    @endif
                    @error('searchEligibility') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror 
                </div>
                @if (!empty($selectedEligibilities))
                    <div class="text-xs p-2 rounded-md border border-dashed border-1">
                        <h3 class="font-semibold">Selected Eligibilities:</h3>
                        <ul>
                            @foreach ($selectedEligibilities as $id)
                                <li>{{ $eligibilities[$id] ?? 'Unknown Eligibility' }}</li>
                                <input type="hidden" name="eligibilities[]" value="{{ $id }}">
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div>
                    <x-label class="text-blue-700 dark:text-blue-300" for="competency" value="{{ __('Competencies*') }}" />
                    <input id="competency" type="text" wire:model.live.debounce.300ms="searchCompetency" placeholder="Search Competencies" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600 placeholder:text-gray-400">
                    @if ($searchCompetency)
                        <ul class="max-h-60 overflow-auto">
                            @forelse($filteredCompetencies as $id => $name)
                                <li>
                                    <label class="block p-2 text-xs hover:bg-gray-100 cursor-pointer">
                                        <input type="checkbox" wire:model.live="selectedCompetencies" value="{{ $id }}" class="mr-2 rounded-md">
                                        {{ $name }}
                                    </label>
                                </li>
                            @empty
                                <li class="p-2 text-xs text-red-800">No results found</li>
                            @endforelse
                        </ul>
                    @endif
                    @error('searchCompetency') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror 
                </div>
                @if (!empty($selectedCompetencies))
                    <div class="text-xs p-2 rounded-md border border-dashed border-1">
                        <h3 class="font-semibold">Selected Competencies:</h3>
                        <ul>
                            @foreach ($selectedCompetencies as $id)
                                <li>{{ $competencies[$id] ?? 'Unknown Competency' }}</li>
                                <input type="hidden" name="competencies[]" value="{{ $id }}">
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="flex items-center justify-end mt-4">
                    <x-button class="mt-4">
                        {{ __('Create') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/js/select2.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/css/select2.min.css" rel="stylesheet" />
<script>
    document.addEventListener('livewire:load', function () {
        $('#trainings-select').select2({
            placeholder: 'Select trainings',
            width: '100%'
        });

        Livewire.on('refreshSelect2', () => {
            $('#trainings-select').val(@this.selectedTrainings).trigger('change');
        });

        $('#trainings-select').on('change', function () {
            @this.set('selectedTrainings', $(this).val());
        });
    });
</script>
