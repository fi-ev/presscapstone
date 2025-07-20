<x-app-layout>
    <div class="px-8 font-bold text-2xl text-blue-800">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 dark:text-gray-200">
            {{ $vacancy->position->title }} Vacancy
        </div>
        <div class="px-8">
            <span class="uppercase bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-blue-900 dark:text-blue-300">{{ $vacancy->position->employment_type }}</span>
            @if ($vacancy->closing_date >= $now)
              <span class="italic mt-1 max-w-2xl text-xs leading-6 text-gray-700">
                Closes on <span class="font-bold">{{ $vacancy->closing_date->format('l, F j, Y') }}</span>
              </span>
            @else
              <span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-800 dark:text-red-400">CLOSED</span>
            @endif
        </div>
    </div>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 dark:text-gray-200">
            <div class="bg-white overflow-hidden rounded sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200 dark:border-gray-900 dark:bg-gray-900">
                    <div>
                    <div class="w-full">
                      <!-- back button -->
                      <div class="flex justify-end">
                          <a class="mt-2 px-2 py-2 bg-blue-800 hover:bg-blue-700 text-white rounded flex items-center space-x-2"
                          href="{{ route('applications.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5" aria-hidden="true">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                            </svg>
                              <span class="px-1 text-xs font-semibold uppercase">Back</span>
                          </a>
                      </div>
                    </div>
                    <div class="mt-6">
                      <dl class="divide-y divide-gray-100 dark:divide-gray-800">
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                          <dt class="text-sm font-medium leading-6 text-gray-900 dark:text-blue-300">Position</dt>
                          <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0 dark:text-gray-200">{{ $vacancy->position->title }}</dd>
                        </div>
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                          <dt class="text-sm font-medium leading-6 text-gray-900 dark:text-blue-300">Employment Type</dt>
                          <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0 dark:text-gray-200">{{ $vacancy->position->employment_type }}</dd>
                        </div>
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                          <dt class="text-sm font-medium leading-6 text-gray-900 dark:text-blue-300">Plantilla No.</dt>
                          <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0 dark:text-gray-200">{{ $vacancy->position->plantilla_no ? $vacancy->position->plantilla_no : "N/A" }}</dd>
                        </div>
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                          <dt class="text-sm font-medium leading-6 text-gray-900 dark:text-blue-300">Salary</dt>
                          <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0 dark:text-gray-200">Salary Grade {{ $vacancy->position->salary_grade }} • ₱{{ number_format($vacancy->position->monthly_salary, 2) }}</dd>
                        </div>
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                          <dt class="text-sm font-medium leading-6 text-gray-900 dark:text-blue-300">Place of Assignment</dt>
                          <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0 dark:text-gray-200">{{ $vacancy->position->assignment_place }}</dd>
                        </div>
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                          <dt class="text-sm font-medium leading-6 text-gray-900 dark:text-blue-300">Description</dt>
                          <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0 dark:text-gray-200">{{ $vacancy->position->description }}</dd>
                        </div>
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                          <dt class="text-sm font-medium leading-6 text-gray-900 dark:text-blue-300">Education</dt>
                          <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0 dark:text-gray-200">{{ $vacancy->position->education }}</dd>
                        </div>
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                          <dt class="text-sm font-medium leading-6 text-gray-900 dark:text-blue-300">Work Experience</dt>
                          <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0 dark:text-gray-200">{{ $vacancy->position->work_experience }}</dd>
                        </div>
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                          <dt class="text-sm font-medium leading-6 text-gray-900 dark:text-blue-300">Trainings</dt>
                          <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0 dark:text-gray-200">
                            @foreach ($vacancy->position->getTrainings() as $id => $name)
                              &bull; {{ $name }}<br/>
                            @endforeach
                          </dd>
                        </div>
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                          <dt class="text-sm font-medium leading-6 text-gray-900 dark:text-blue-300">Eligibilities</dt>
                          <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0 dark:text-gray-200">
                            @foreach ($vacancy->position->getEligibilities() as $id => $name)
                              &bull; {{ $name }}<br/>
                            @endforeach
                          </dd>
                        </div>
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                          <dt class="text-sm font-medium leading-6 text-gray-900 dark:text-blue-300">Competencies</dt>
                          <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0 dark:text-gray-200">
                            @foreach ($vacancy->position->getCompetencies() as $id => $name)
                              &bull; {{ $name }}<br/>
                            @endforeach
                          </dd>
                        </div>
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                          <dt class="text-sm font-medium leading-6 text-gray-900 dark:text-blue-300">Remarks</dt>
                          <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0 dark:text-gray-200">{{ $remarks ?? 'None' }}</dd>
                        </div>
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                          <dt class="text-sm font-medium leading-6 text-gray-900 dark:text-blue-300">Attachment</dt>
                          <dd class="mt-1 text-sm leading-6 text-blue-700 font-semibold sm:col-span-2 sm:mt-0">
                            <a href="{{ asset('/storage/uploads/' . $vacancy->filepath) }}" target="_blank">
                                {{ $vacancy->filename }}
                            </a>
                          </dd>
                        </div>
                      </dl>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
