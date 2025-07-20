<div wire:click.prevent="closeViewModal()"
     class="overflow-y-auto fixed inset-0 z-50 flex items-center justify-center">
    <!-- modal bg -->
    <div class="fixed inset-0 bg-white bg-opacity-75 dark:bg-opacity-25" aria-hidden="true"></div>
    <!-- modal -->
    <div @click.stop class="relative bg-white rounded-lg shadow dark:bg-gray-800 max-w-lg mx-auto p-4 md:p-5 max-h-screen overflow-y-auto">
        <!-- header -->
        <div class="flex items-center justify-between dark:border-gray-600">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-200">
                {{ $positionTitle }}
            </h3>
            <button
                type="button"
                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                wire:click.prevent="closeViewModal()"
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
            <div class="mt-2">
                <dl class="divide-y divide-gray-100 dark:divide-gray-800">
                    <div class="px-2 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-xs font-medium leading-6 text-gray-900 dark:text-gray-200">Employment Type</dt>
                        <dd class="mt-1 text-xs leading-6 text-gray-700 sm:col-span-2 sm:mt-0 dark:text-gray-200 dark:text-gray-200">{{ $employmentType }}</dd>
                    </div>
                </dl>
                <dl class="divide-y divide-gray-100 dark:divide-gray-800">
                    <div class="px-2 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-xs font-medium leading-6 text-gray-900 dark:text-gray-200">Plantilla No</dt>
                        <dd class="mt-1 text-xs leading-6 text-gray-700 sm:col-span-2 sm:mt-0 dark:text-gray-200">{{ $plantillaNo ?? 'N/A' }}</dd>
                    </div>
                </dl>
                <dl class="divide-y divide-gray-100 dark:divide-gray-800">
                    <div class="px-2 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-xs font-medium leading-6 text-gray-900 dark:text-gray-200">Place of Assignment</dt>
                        <dd class="mt-1 text-xs leading-6 text-gray-700 sm:col-span-2 sm:mt-0 dark:text-gray-200">{{ $assignmentPlace }}</dd>
                    </div>
                </dl>
                <dl class="divide-y divide-gray-100 dark:divide-gray-800">
                    <div class="px-2 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-xs font-medium leading-6 text-gray-900 dark:text-gray-200">Posting Dates</dt>
                        <dd class="mt-1 text-xs leading-6 text-gray-700 sm:col-span-2 sm:mt-0 dark:text-gray-200">{{ $startDate }} to {{ $endDate }}</dd>
                    </div>
                </dl>
                <dl class="divide-y divide-gray-100 dark:divide-gray-800">
                    <div class="px-2 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-xs font-medium leading-6 text-gray-900 dark:text-gray-200">Monthly Salary</dt>
                        <dd class="mt-1 text-xs leading-6 text-gray-700 sm:col-span-2 sm:mt-0 dark:text-gray-200">{{ number_format((float) $monthlySalary, 2, '.', ',') }} (SG{{ $salaryGrade }})</dd>
                    </div>
                </dl>
                <dl class="divide-y divide-gray-100 dark:divide-gray-800">
                    <div class="px-2 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-xs font-medium leading-6 text-gray-900 dark:text-gray-200">Description</dt>
                        <dd class="mt-1 text-xs leading-6 text-gray-700 sm:col-span-2 sm:mt-0 dark:text-gray-200">{{ $description }}</dd>
                    </div>
                </dl>
                <dl class="divide-y divide-gray-100 dark:divide-gray-800">
                    <div class="px-2 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-xs font-medium leading-6 text-gray-900 dark:text-gray-200">Education</dt>
                        <dd class="mt-1 text-xs leading-6 text-gray-700 sm:col-span-2 sm:mt-0 dark:text-gray-200">{{ $education }}</dd>
                    </div>
                </dl>
                <dl class="divide-y divide-gray-100 dark:divide-gray-800">
                    <div class="px-2 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-xs font-medium leading-6 text-gray-900 dark:text-gray-200">Work</dt>
                        <dd class="mt-1 text-xs leading-6 text-gray-700 sm:col-span-2 sm:mt-0 dark:text-gray-200">{{ $work }}</dd>
                    </div>
                </dl>
                <dl class="divide-y divide-gray-100 dark:divide-gray-800">
                    <div class="px-2 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-xs font-medium leading-6 text-gray-900 dark:text-gray-200">Trainings</dt>
                        <dd class="mt-1 text-xs leading-6 text-gray-700 sm:col-span-2 sm:mt-0 dark:text-gray-200">
                            {{ $trainings }}
                        </dd>
                    </div>
                </dl>
                <dl class="divide-y divide-gray-100 dark:divide-gray-800">
                    <div class="px-2 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-xs font-medium leading-6 text-gray-900 dark:text-gray-200">Competencies</dt>
                        <dd class="mt-1 text-xs leading-6 text-gray-700 sm:col-span-2 sm:mt-0 dark:text-gray-200">
                            {{ $competencies }}
                        </dd>
                    </div>
                </dl>
                <dl class="divide-y divide-gray-100 dark:divide-gray-800">
                    <div class="px-2 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-xs font-medium leading-6 text-gray-900 dark:text-gray-200">Eligibilities</dt>
                        <dd class="mt-1 text-xs leading-6 text-gray-700 sm:col-span-2 sm:mt-0 dark:text-gray-200">
                            {{ $eligibilities }}
                        </dd>
                    </div>
                </dl>
                <dl class="divide-y divide-gray-100 dark:divide-gray-800">
                    <div class="px-2 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-xs font-medium leading-6 text-gray-900 dark:text-gray-200">Remarks</dt>
                        <dd class="mt-1 text-xs leading-6 text-gray-700 sm:col-span-2 sm:mt-0 dark:text-gray-200">{{ $remarks ?? 'None' }}</dd>
                    </div>
                </dl>
                <dl class="divide-y divide-gray-100 dark:divide-gray-800">
                    <div class="px-2 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-xs font-medium leading-6 text-gray-900 dark:text-gray-200">Attachment</dt>
                        <dd class="mt-1 text-xs leading-6 text-blue-700 font-semibold sm:col-span-2 sm:mt-0 dark:text-gray-200">
                            <a href="{{ asset('/storage/uploads/' . $filepath) }}" target="_blank">
                                {{ $filename }}
                            </a>
                        </dd>
                    </div>
                </dl>
                @if($url)
                <dl class="divide-y divide-gray-100 dark:divide-gray-800">
                    <div class="px-2 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-xs font-medium leading-6 text-gray-900 dark:text-gray-200">URL</dt>
                        <dd class="mt-1 text-xs leading-6 text-blue-700 font-semibold sm:col-span-2 sm:mt-0 dark:text-gray-200">
                            <a href="{{ $url }}" target="_blank">
                                {{ $url }}
                            </a>
                        </dd>
                    </div>
                </dl>
                @endif
            </div>
        </div>
    </div>
</>
