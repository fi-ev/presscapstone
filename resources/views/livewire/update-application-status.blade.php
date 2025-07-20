<div class="relative flex items-center space-x-2">
    <!-- rejection -->
    <button wire:click="openViewModal('Rejection')" wire:loading.class="opacity-50 cursor-not-allowed"
            class="m-2 p-2 text-xs text-gray-400 hover:text-red-600 rounded-lg inline-flex items-center justify-center w-10 h-10"
            title="Reject Applicant and Send Email">
        <span wire:loading.remove wire:target="sendRejectionEmail" class="flex flex-col items-center justify-center text-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>
            Reject
        </span>
        <span wire:loading wire:target="sendRejectionEmail" class="flex flex-col items-center justify-center text-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 animate-spin">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
            Loading
        </span>
    </button>
    
    <!-- invitation -->
    <button wire:click="openViewModal('Invitation')" wire:loading.class="opacity-50 cursor-not-allowed"
            class="m-2 p-2 text-xs text-gray-400 hover:text-blue-600 rounded-lg inline-flex items-center justify-center w-10 h-10"
            title="Invite Applicant and Send Email">
        <span wire:loading.remove wire:target="sendInvitationEmail" class="flex flex-col items-center justify-center text-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 0 1-2.555-.337A5.972 5.972 0 0 1 5.41 20.97a5.969 5.969 0 0 1-.474-.065 4.48 4.48 0 0 0 .978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25Z" />
            </svg>
            Invite
        </span>
        <span wire:loading wire:target="sendInvitationEmail" class="flex flex-col items-center justify-center text-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 animate-spin">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
            Loading
        </span>
    </button>

    <!-- acceptance -->
    <button wire:click="openViewModal('Acceptance')" wire:loading.class="opacity-50 cursor-not-allowed"
            class="m-2 p-2 text-xs text-gray-400 hover:text-green-600 rounded-lg inline-flex items-center justify-center w-10 h-10"
            title="Accept Applicant and Send Email">
        <span wire:loading.remove wire:target="sendAcceptanceEmail" class="flex flex-col items-center justify-center text-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
            </svg>
            Accept
        </span>
        <span wire:loading wire:target="sendAcceptanceEmail">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 animate-spin">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
            Loading
        </span>
    </button>
    <!-- livewire modal -->
    <div class="{{ $isOpenView ? '' : 'hidden' }}">
        @if ($isOpenView)
            @include('hr.notices.show')
        @endif
    </div>
</div>
