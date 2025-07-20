<div class="relative overflow-x-auto sm:rounded-lg">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        @if ($vacancies->isNotEmpty())
            @foreach($vacancies as $vacancy)
                <div class="p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex flex-col justify-between">
                    <a href="#">
                        <h5 class="text-xl font-bold tracking-tight text-gray-900 dark:text-gray-200">{{ $vacancy->position->title }}</h5>
                        @if ($vacancy->position->employment_type == 'Plantilla')
                            <span class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-blue-900 dark:text-blue-300">Permanent</span>
                        @elseif ($vacancy->position->employment_type == 'COS')
                            <span class="bg-gray-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-gray-600 dark:text-gray-200">Contractual</s>
                        @endif
                    </a>
                    <p class="my-3 text-gray-700 dark:text-gray-200">{{ $vacancy->remarks }}</p>
                    <p class="text-gray-600 text-sm mt-2 leading-none dark:text-blue-300">Salary Grade {{ $vacancy->position->salary_grade }} • ₱{{ number_format($vacancy->position->monthly_salary, 2) }}/mo</p>
                    <p class="text-gray-600 text-xs mt-2 dark:text-blue-300">Closes on <span class="font-semibold">{{ $vacancy->closing_date->format('l, F j, Y') }}</span></p>
                    <!-- actions enabled only for HR user -->
                    @if (Auth::user() && Auth::user()->isHR())
                        <div class="px-2 flex justify-end">
                            <a href="{{ url('vacancies/' . hashid_encode($vacancy->id) . '/edit') }}" class="my-2 p-2 text-xs text-gray-400 hover:text-blue-600 dark:text-blue-300 dark:hover:text-blue-600 rounded-lg inline-flex items-center w-10 h-10" title="Edit Vacancy">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                </svg>
                            </a>
                            <div class="relative inline-block">
                                <a href="{{ url('vacancies/' . hashid_encode($vacancy->id) ) }}" class="my-2 p-2 text-xs text-gray-400 hover:text-blue-600 dark:text-blue-300 dark:hover:text-blue-600 rounded-lg inline-flex items-center w-10 h-10" title="View Applicants">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                    </svg>
                                    <span class="absolute top-2 -right-1 inline-flex items-center justify-center w-4 h-4 mb-4 text-xs font-semibold  {{ $vacancy->applicant_profiles_count ? 'bg-blue-200 text-blue-600 dark:text-blue-300 ' : 'bg-gray-200  text-gray-400 ' }}  rounded-full">
                                        {{ $vacancy->applicant_profiles_count}}
                                    </span>
                                </a>
                            </div>
                        </div>
                    @else
                        <!-- apply button for applicants -->
                        <div class="mt-4 flex justify-end">
                                @if (Auth::check())
                                    <div class="flex items-center space-x-2">
                                        <button wire:click="openViewModal" wire:click.prevent="$set('vacancyId', {{ $vacancy->id }})" 
                                        class="flex items-center px-4 py-2 text-blue-700 dark:text-blue-300 hover:text-blue-800 hover:bg-blue-200 dark:hover:text-blue-800 focus:ring-blue-800 rounded-md font-semibold text-xs uppercase tracking-widest focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 mr-1">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m5.231 13.481L15 17.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v16.5c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Zm3.75 11.625a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                            </svg>VIEW
                                        </button>
                                        @if (hasApplied(Auth::user()->id, $vacancy->id))
                                            <span class="flex items-center px-2 py-2 bg-gray-100 dark:bg-gray-600 dark:text-gray-200 text-gray-600 rounded-md font-semibold text-xs uppercase tracking-widest">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 mr-1">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                                </svg>
                                                <span>APPLIED</span>
                                            </span>
                                            <form action="{{ route('applications.destroy', hasApplied(Auth::user()->id, $vacancy->id)->id) }}" method="POST" onsubmit="return confirm('Confirming this will cancel your {{ $vacancy->position->title }} application.');">
                                            @csrf
                                            @method('DELETE')
                                                <button class="flex items-center px-2 py-2 bg-red-100 hover:bg-red-300 text-red-700 rounded-md font-semibold text-xs uppercase tracking-widest">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 mr-1">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                                    </svg>
                                                    <span>CANCEL</span>
                                                </button>
                                            </form>
                                        @else
                                            <form action="{{ route('applications.store') }}" method="POST" onsubmit="return confirm('Confirming this will submit your application. You can still withdraw it before the vacancy closes.');">
                                            @csrf
                                            @method('POST')
                                                <input type="hidden" name="vacancy_id" value="{{ $vacancy->id }}" />
                                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />
                                                <button class="flex items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 dark:hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 mr-1">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.042 21.672 13.684 16.6m0 0-2.51 2.225.569-9.47 5.227 7.917-3.286-.672ZM12 2.25V4.5m5.834.166-1.591 1.591M20.25 10.5H18M7.757 14.743l-1.59 1.59M6 10.5H3.75m4.007-4.243-1.59-1.59" />
                                                    </svg>
                                                    <span>APPLY</span>
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                @else
                                    <div class="flex items-center space-x-2">
                                        <button wire:click="openViewModal" wire:click.prevent="$set('vacancyId', {{ $vacancy->id }})" 
                                        class="flex items-center px-4 py-2 text-blue-700 dark:text-blue-300 hover:text-blue-800 hover:bg-blue-200 dark:hover:text-blue-800 focus:ring-blue-800 rounded-md font-semibold text-xs uppercase tracking-widest focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 mr-1">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m5.231 13.481L15 17.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v16.5c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Zm3.75 11.625a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                            </svg>VIEW
                                        </button>
                                        <a href="{{route('vacancies.card')}}">
                                            <button class="flex items-center px-4 py-2 bg-gray-50 dark:bg-gray-800 border dark:hover:bg-blue-800 dark:border-blue-200 border-blue-800 rounded-md font-semibold text-xs text-blue-800 dark:text-blue-300 uppercase tracking-widest shadow-sm hover:bg-blue-200 hover:text-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 mr-1">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.042 21.672 13.684 16.6m0 0-2.51 2.225.569-9.47 5.227 7.917-3.286-.672ZM12 2.25V4.5m5.834.166-1.591 1.591M20.25 10.5H18M7.757 14.743l-1.59 1.59M6 10.5H3.75m4.007-4.243-1.59-1.59" />
                                                </svg>
                                                <span>APPLY</span>
                                            </button>
                                        </a>
                                    </div>
                                @endif
                            </form>
                        </div>
                    @endif
                </div>             
            @endforeach
        @else
            <div class="flex items-center space-x-2 text-gray-600 text-sm">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4 text-gray-700">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M18.364 18.364A9 9 0 0 0 5.636 5.636m12.728 12.728A9 9 0 0 1 5.636 5.636m12.728 12.728L5.636 5.636" />
                </svg>
                <span>No vacancies at this time</span>
            </div>
        @endif
    </div>

    <!-- livewire modal -->
    <div class="{{ $isOpenView ? '' : 'hidden' }}">
        @include('applicant.vacancy.info')
    </div>
</div>