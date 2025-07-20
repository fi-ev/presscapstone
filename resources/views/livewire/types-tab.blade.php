<div>
    <div class="md:flex">
        <ul class="flex-column space-y space-y-4 text-sm font-medium text-gray-700 dark:text-gray-800 md:me-4 mb-4 md:mb-0">
            <li class="me-2">
                <button href="#" 
                wire:click="setActiveTab('tab1')"
                class="inline-flex items-center px-3 py-2
                    {{ $activeTab === 'tab1' 
                    ? 'bg-blue-100 text-blue-800 rounded-lg active w-full dark:bg-blue-600 dark:text-blue-300 cursor-not-allowed' 
                    : 'bg-white rounded-lg w-full border-transparent hover:text-blue-800 hover:border-blue-200 hover:bg-blue-100 dark:text-blue-300 dark:bg-gray-800 dark:hover:text-gray-800 dark:hover:bg-blue-600' }}"
                    {{ $activeTab === 'tab1' ? 'disabled' : '' }}>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4 me-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.25 6.087c0-.355.186-.676.401-.959.221-.29.349-.634.349-1.003 0-1.036-1.007-1.875-2.25-1.875s-2.25.84-2.25 1.875c0 .369.128.713.349 1.003.215.283.401.604.401.959v0a.64.64 0 0 1-.657.643 48.39 48.39 0 0 1-4.163-.3c.186 1.613.293 3.25.315 4.907a.656.656 0 0 1-.658.663v0c-.355 0-.676-.186-.959-.401a1.647 1.647 0 0 0-1.003-.349c-1.036 0-1.875 1.007-1.875 2.25s.84 2.25 1.875 2.25c.369 0 .713-.128 1.003-.349.283-.215.604-.401.959-.401v0c.31 0 .555.26.532.57a48.039 48.039 0 0 1-.642 5.056c1.518.19 3.058.309 4.616.354a.64.64 0 0 0 .657-.643v0c0-.355-.186-.676-.401-.959a1.647 1.647 0 0 1-.349-1.003c0-1.035 1.008-1.875 2.25-1.875 1.243 0 2.25.84 2.25 1.875 0 .369-.128.713-.349 1.003-.215.283-.4.604-.4.959v0c0 .333.277.599.61.58a48.1 48.1 0 0 0 5.427-.63 48.05 48.05 0 0 0 .582-4.717.532.532 0 0 0-.533-.57v0c-.355 0-.676.186-.959.401-.29.221-.634.349-1.003.349-1.035 0-1.875-1.007-1.875-2.25s.84-2.25 1.875-2.25c.37 0 .713.128 1.003.349.283.215.604.401.96.401v0a.656.656 0 0 0 .658-.663 48.422 48.422 0 0 0-.37-5.36c-1.886.342-3.81.574-5.766.689a.578.578 0 0 1-.61-.58v0Z" />
                    </svg>Trainings
                </button>
            </li>
            <li class="me-2">
                <button href="#"
                wire:click="setActiveTab('tab2')"
                class="inline-flex items-center px-3 py-2
                    {{ $activeTab === 'tab2' 
                    ? 'bg-blue-100 text-blue-800 rounded-lg active w-full dark:bg-blue-600 dark:text-blue-300 cursor-not-allowed' 
                    : 'bg-white rounded-lg w-full border-transparent hover:text-blue-800 hover:border-blue-200 hover:bg-blue-100 dark:text-blue-300 dark:bg-gray-800 dark:hover:text-gray-800 dark:hover:bg-blue-600' }}"
                    {{ $activeTab === 'tab2' ? 'disabled' : '' }}>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4 me-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z" />
                    </svg>Eligibilities
                </button>
            </li>
            <li class="me-2">
                <button href="#" 
                wire:click="setActiveTab('tab3')"
                class="inline-flex items-center px-3 py-2
                    {{ $activeTab === 'tab3' 
                    ? 'bg-blue-100 text-blue-800 rounded-lg active w-full dark:bg-blue-600 dark:text-blue-300 cursor-not-allowed' 
                    : 'bg-white rounded-lg w-full border-transparent hover:text-blue-800 hover:border-blue-200 hover:bg-blue-100 dark:text-blue-300 dark:bg-gray-800 dark:hover:text-gray-800 dark:hover:bg-blue-600' }}"
                    {{ $activeTab === 'tab3' ? 'disabled' : '' }}>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4 me-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.362 5.214A8.252 8.252 0 0 1 12 21 8.25 8.25 0 0 1 6.038 7.047 8.287 8.287 0 0 0 9 9.601a8.983 8.983 0 0 1 3.361-6.867 8.21 8.21 0 0 0 3 2.48Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 18a3.75 3.75 0 0 0 .495-7.468 5.99 5.99 0 0 0-1.925 3.547 5.975 5.975 0 0 1-2.133-1.001A3.75 3.75 0 0 0 12 18Z" />
                    </svg>Competencies
                </button>
            </li>
        </ul>
        <div class="p-6 bg-white text-medium text-gray-700 dark:text-gray-200 dark:bg-gray-800 rounded-lg w-full">
            @if ($activeTab === 'tab1')
                @livewire('type-trainings-table')
            @elseif ($activeTab === 'tab2')
                @livewire('type-eligibilities-table')
            @elseif ($activeTab === 'tab3')
                @livewire('type-competencies-table')
            @endif
        </div>
    </div>
</div>
