<x-action-section>
    <x-slot name="title">
        {{ __('Two Factor Authentication using SMS') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Add additional security to your account using two factor sms authentication.') }}
    </x-slot>

    <x-slot name="content">
        <h3 class="text-lg font-medium text-gray-400">
            @if ($enabled)
                @if ($showingConfirmation)
                    @if (!$active2FA)
                        {{ __('Finish enabling two factor sms authentication.') }}
                    @else 
                        {{ __('Finish disabling two factor sms authentication.') }}
                    @endif
                @else
                    {{ __('You have enabled two factor sms authentication.') }}
                @endif
            @else
                {{ __('You have not enabled two factor sms authentication.') }}
            @endif
        </h3>


        @if ($enabled)
            @if ($sendOTP)
                <div class="mt-4 max-w-xl text-sm text-gray-600 dark:text-gray-200">
                    <p class="font-semibold">
                        @if ($showingConfirmation)
                            @if (!$active2FA)
                                {{ __('To finish enabling two factor sms authentication, input the OTP code sent to your phone ending with ' . $maskedPhone ) }}
                            @else
                                {{ __('To finish disabling two factor sms authentication, input the OTP code sent to your phone ending with ' . $maskedPhone ) }}
                            @endif
                        @endif
                    </p>
                </div>

                @if ($showingConfirmation)
                    <div class="mt-4">
                        <x-label class="dark:text-gray-200" for="code" value="{{ __('Code') }}" />

                        <x-input id="code" type="text" name="code" class="block mt-1 w-1/2" inputmode="numeric" autofocus autocomplete="one-time-code"
                            wire:model="code"
                            wire:keydown.enter="confirmTwoFactorAuthentication" />

                        <x-input-error for="code" class="mt-2" />
                    </div>
                @endif
            @endif
        @endif

        <div class="mt-5">
            @if (!$enabled)
                <x-button type="button" wire:click="toggleTwoFactorSMSAuthentication">
                    {{ __('Send OTP via SMS to Enable') }}
                </x-button>
            @else
                @if ($showingConfirmation)
                    <x-secondary-button>
                        {{ __('Cancel') }}
                    </x-secondary-button>
                @else
                    <x-danger-button type="button" wire:click="toggleTwoFactorSMSAuthentication">
                        {{ __('Disable SMS 2FA') }}
                    </x-danger-button>
                @endif
            @endif
        </div>
    </x-slot>

</x-action-section>
