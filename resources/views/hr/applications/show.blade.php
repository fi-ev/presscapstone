<x-app-layout>
    <div class="px-8 font-bold text-2xl text-blue-800">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 dark:text-gray-200">
          Application for {{ $application->vacancy->position->title }}
        </div>
    </div>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 dark:text-gray-200">
            <div class="bg-white overflow-hidden rounded sm:rounded-lg">
              <div class="p-6 lg:p-8 bg-white border-b border-gray-200 dark:border-gray-800 dark:bg-gray-900">
                  <div>
                    <div class="w-full">
                      <div class="flex justify-end">
                          <a class="mt-2 px-2 py-2 bg-blue-800 hover:bg-blue-700 text-white rounded flex items-center space-x-2"
                          href="{{ route('applicants.show', ['id' => hashid_encode($application->user->id)]) }}">
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
                          <dt class="text-sm font-medium leading-6 text-gray-900 dark:text-blue-300">Application Status</dt>
                          <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0 dark:text-gray-200">{{ $application->status }}</dd>
                        </div>
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                          <dt class="text-sm font-medium leading-6 text-gray-900 dark:text-blue-300">Date Applied</dt>
                          <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0 dark:text-gray-200">{{ $application->created_at->format('F j, Y') }}</dd>
                        </div>
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                          <dt class="text-sm font-medium leading-6 text-gray-900 dark:text-blue-300">Applicant Name</dt>
                          <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0 dark:text-gray-200">{{ $application->applicant_profile->first_name }} {{ $application->applicant_profile->middle_initial }} {{ $application->applicant_profile->last_name }}</dd>
                        </div>
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                          <dt class="text-sm font-medium leading-6 text-gray-900 dark:text-blue-300">Email</dt>
                          <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0 dark:text-gray-200">{{ $application->user->email }}</dd>
                        </div>
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                          <dt class="text-sm font-medium leading-6 text-gray-900 dark:text-blue-300">Mobile No.</dt>
                          <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $application->applicant_profile->mobile_no }}</dd>
                        </div>
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                          <dt class="text-sm font-medium leading-6 text-gray-900 dark:text-blue-300">Personal Data Sheet</dt>
                          <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                            <ul class="rounded-md">
                              <li class="flex items-center text-sm">
                                <a href="{{ url('pds/' . hashid_encode($application->applicant_profile->user_id) . '/' . hashid_encode($application->id)) }}" 
                                class="py-4 pl-4 pr-5 flex items-center space-x-2 text-blue-800 text-sm truncate font-medium text-blue-400 hover:text-blue-600 dark:text-blue-300 hover:font-bold">
                                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m5.231 13.481L15 17.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v16.5c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Zm3.75 11.625a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                  </svg> 
                                  <span>Encoded PDS</span>
                                </a>
                              </li>
                            </ul>
                          </dd>
                        </div>
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                          <dt class="text-sm font-medium leading-6 text-gray-900 dark:text-blue-300">Attachments</dt>
                          <dd class="mt-2 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                            <ul class="rounded-md">
                              @if ($application->attachment->isNotEmpty())
                                @foreach($application->attachment as $attachment)
                                  <li class="flex items-center justify-between py-4 pl-4 pr-5 text-sm leading-6">
                                    <div class="flex w-0 flex-1 items-center">
                                      <div class="flex min-w-0 flex-1 gap-2">
                                        <a href="{{ url($filepath . '' . $application->user_id . '/' . $attachment->path ) }}" target="_blank" rel="noopener noreferrer">
                                          <span class="mr-4 font-medium dark:text-gray-200">{{ $attachment->type }}</span>
                                          <span class="truncate font-medium text-blue-400 hover:text-blue-600 dark:text-blue-300 hover:font-bold">{{ $attachment->filename }}</span>
                                        </a>
                                      </div>
                                    </div>
                                  </li>
                                @endforeach
                              @else
                                <li class="py-4 pl-4 pr-5 flex items-center space-x-2 text-gray-600 text-sm">
                                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4 text-gray-700">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18.364 18.364A9 9 0 0 0 5.636 5.636m12.728 12.728A9 9 0 0 1 5.636 5.636m12.728 12.728L5.636 5.636" />
                                  </svg>
                                  <span>No attachments</span>
                                </li>
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
