<x-app-layout>
    <div class="px-8 font-bold text-2xl text-blue-800">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 dark:text-gray-200">
          Applicant Overview
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
                          href="{{ route('applicants.index') }}">
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
                          <dt class="text-sm font-medium leading-6 text-gray-900 dark:text-blue-300">Account Name</dt>
                          <dd class="mt-1 text-sm leaπing-6 text-gray-700 sm:col-span-2 sm:mt-0 font-bold dark:text-gray-200">{{ $applicant->first_name }} {{ $applicant->middle_initial }} {{ $applicant->last_name }}</dd>
                        </div>
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                          <dt class="text-sm font-medium leading-6 text-gray-900 dark:text-blue-300">Account Email</dt>
                          <dd class="mt-1 text-sm leaπing-6 text-gray-700 sm:col-span-2 sm:mt-0 font-bold dark:text-gray-200">{{ $applicant->email }}</dd>
                        </div>
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                          <dt class="text-sm font-medium leading-6 text-gray-900 dark:text-blue-300">Applications</dt>
                          <dd class="mt-2 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                            <ul role="list" class="divide-y divide-gray-100 dark:divide-gray-800 rounded-md border border-gray-200 dark:border-gray-800">
                              @if ($applicant->applications->isNotEmpty())
                                @foreach($applicant->applications as $application)
                                  <li class="flex items-center justify-between py-4 pl-4 pr-5 text-sm leading-6 dark:text-gray-200">
                                    <div class="flex w-0 flex-1 items-center">
                                      <div class="ml-4 flex min-w-0 flex-1 gap-2">
                                        <span class="truncate font-medium">{{ $application->vacancy->position->title}} <span class="text-xs font-thin">(Applied on {{ $application->created_at->format('F j, Y') }})</span></span>
                                      </div>
                                    </div>
                                    <div class="ml-4 flex-shrink-0">
                                      <a href="{{ url('applications/' . hashid_encode($application->id) ) }}" class="my-2 p-2 text-xs text-gray-400 hover:text-blue-600 dark:text-blue-300 dark:hover:text-blue-600 rounded-lg inline-flex items-center w-10 h-10" title="View Application">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m12.75 15 3-3m0 0-3-3m3 3h-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                      </a>
                                    </div>
                                  </li>
                                @endforeach
                              @else
                                <div class="py-4 pl-4 pr-5  flex items-center space-x-2 text-gray-600 text-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4 text-gray-700">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M18.364 18.364A9 9 0 0 0 5.636 5.636m12.728 12.728A9 9 0 0 1 5.636 5.636m12.728 12.728L5.636 5.636" />
                                    </svg>
                                    <span>No application yet</span>
                                </div>
                              @endif
                            </ul>
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

