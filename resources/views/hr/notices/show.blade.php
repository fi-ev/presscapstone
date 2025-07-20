<div class="overflow-y-auto fixed inset-0 z-50 flex items-center justify-center">
    <!-- modal bg -->
    <div class="fixed inset-0 bg-white bg-opacity-75 dark:bg-opacity-25" aria-hidden="true"></div>
    <!-- modal -->
    <div class="relative bg-white rounded-lg shadow dark:bg-gray-800 max-w-md mx-auto p-4 md:p-5 w-full max-h-screen overflow-y-auto">
        <!-- header -->
        <div class="flex items-center justify-between dark:border-gray-600">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-200">
                Preview
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
            <!-- form -->
            <form class="space-y-4">
                <div>
                  Dear {{ $fullName }},
                  <br>
                  <br>
                  {!! $content !!}
                </div>

                <div class="flex items-center justify-end mt-4">
                    @if($type === 'Rejection')
                     <x-button wire:click="sendRejectionEmail()"
                      wire:confirm.prompt="Are you sure?\n\nType the last name in ALL CAPS to change the applicant status and continue sending the INVITATION EMAIL to Applicant {{ strtoupper($fullName) }} through {{ $email }}. \n\nWARNING: This cannot be undone. |{{ strtoupper($lastName) }}"
                      class="mt-4">
                          {{ __('Send Rejection') }}
                      </x-button>
                    @elseif($type === 'Invitation')
                      <x-button wire:click="sendInvitationEmail()"
                      wire:confirm.prompt="Are you sure?\n\nType the last name in ALL CAPS to change the applicant status and continue sending the INVITATION EMAIL to Applicant {{ strtoupper($fullName) }} through {{ $email }}. \n\nWARNING: This cannot be undone. |{{ strtoupper($lastName) }}"
                      class="mt-4">
                          {{ __('Send Invitation') }}
                      </x-button>
                    @elseif($type === 'Acceptance') 
                      <x-button wire:click="sendAcceptanceEmail()"
                      wire:confirm.prompt="Are you sure?\n\nType the last name in ALL CAPS to change the applicant status and continue sending the INVITATION EMAIL to Applicant {{ strtoupper($fullName) }} through {{ $email }}. \n\nWARNING: This cannot be undone. |{{ strtoupper($lastName) }}"
                      class="mt-4">
                          {{ __('Send Acceptance') }}
                      </x-button>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
