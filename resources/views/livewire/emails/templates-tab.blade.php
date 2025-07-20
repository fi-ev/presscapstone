<div>
    <div class="md:flex">
        <ul class="flex-column space-y space-y-4 text-sm font-medium text-gray-700 dark:text-gray-800 md:me-4 mb-4 md:mb-0">
            <li class="me-2">
                <button wire:click="setActiveTab('tab1')"
                class="inline-flex items-center px-3 py-2
                {{ $activeTab === 'tab1' 
                ? 'bg-blue-100 text-blue-800 rounded-lg active w-full dark:bg-blue-600 dark:text-white cursor-not-allowed' 
                : 'bg-white rounded-lg w-full border-transparent hover:text-blue-800 hover:border-blue-200 hover:bg-blue-100 dark:text-blue-300 dark:bg-gray-800 dark:hover:text-gray-800 dark:hover:bg-blue-600' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5m6 4.125 2.25 2.25m0 0 2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                    </svg>
                    Rejection
                </button>
            </li>
            <li class="me-2">
                <button wire:click="setActiveTab('tab2')"
                class="inline-flex items-center px-3 py-2
                {{ $activeTab === 'tab2' 
                ? 'bg-blue-100 text-blue-800 rounded-lg active w-full dark:bg-blue-600 dark:text-white cursor-not-allowed' 
                : 'bg-white rounded-lg w-full border-transparent hover:text-blue-800 hover:border-blue-200 hover:bg-blue-100 dark:text-blue-300 dark:bg-gray-800 dark:hover:text-gray-800 dark:hover:bg-blue-600' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                    </svg>
                    Invitation
                </button>
            </li>
            <li class="me-2">
                <button wire:click="setActiveTab('tab3')"
                class="inline-flex items-center px-3 py-2
                {{ $activeTab === 'tab3' 
                ? 'bg-blue-100 text-blue-800 rounded-lg active w-full dark:bg-blue-600 dark:text-white cursor-not-allowed' 
                : 'bg-white rounded-lg w-full border-transparent hover:text-blue-800 hover:border-blue-200 hover:bg-blue-100 dark:text-blue-300 dark:bg-gray-800 dark:hover:text-gray-800 dark:hover:bg-blue-600' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.59 14.37a6 6 0 0 1-5.84 7.38v-4.8m5.84-2.58a14.98 14.98 0 0 0 6.16-12.12A14.98 14.98 0 0 0 9.631 8.41m5.96 5.96a14.926 14.926 0 0 1-5.841 2.58m-.119-8.54a6 6 0 0 0-7.381 5.84h4.8m2.581-5.84a14.927 14.927 0 0 0-2.58 5.84m2.699 2.7c-.103.021-.207.041-.311.06a15.09 15.09 0 0 1-2.448-2.448 14.9 14.9 0 0 1 .06-.312m-2.24 2.39a4.493 4.493 0 0 0-1.757 4.306 4.493 4.493 0 0 0 4.306-1.758M16.5 9a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                    </svg>
                    Acceptance
                </button>
            </li>
        </ul>
        <div class="flex-grow p-6 bg-white text-medium text-gray-700 dark:text-gray-200 dark:bg-gray-800 rounded-lg">
            @if ($activeTab === 'tab1')
                @livewire('emails.rejection-email', ['activeTab' => $activeTab])
            @elseif ($activeTab === 'tab2')
                @livewire('emails.invitation-email', ['activeTab' => $activeTab])
            @elseif ($activeTab === 'tab3')
                @livewire('emails.acceptance-email', ['activeTab' => $activeTab])
            @endif
        </div>
    </div>
</div>
