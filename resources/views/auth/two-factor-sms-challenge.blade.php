<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <div>
            <div class="mb-4 text-sm text-gray-600 dark:text-gray-200">
                {{ __('Click the button below to receive an authentication code on your mobile phone ending with ' . $maskedPhone ) }}
            </div>
            <form id="formOTP" method="POST" action="{{ route('two-factor-sms.send') }}">
                @csrf
                <div>
                    <button id="sendOTPButton" type="submit" class="mt-2 px-1 py-2 rounded text-blue-800 dark:text-blue-300 hover:text-blue-600 dark:hover:text-blue-700 flex items-center space-x-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mr-1 h-4 w-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 1.5H8.25A2.25 2.25 0 0 0 6 3.75v16.5a2.25 2.25 0 0 0 2.25 2.25h7.5A2.25 2.25 0 0 0 18 20.25V3.75a2.25 2.25 0 0 0-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" />
                        </svg>
                        <span id="buttonText" class="px-1 text-sm font-semibold">Send OTP to Phone</span>
                    </button>
                    <span id="timer" class="hidden">Resend (<span id="countdown">300</span>)</span>
                </div>
            </form>

            <form method="POST" action="{{ route('two-factor-sms.verify') }}">
                @csrf

                <div class="mt-4">
                    <x-label class="text-blue-700 dark:text-blue-300" for="code" value="{{ __('Code') }}" />
                    <x-input id="code" maxlength="6" class="block mt-1 w-full" type="text" inputmode="numeric" name="code" autofocus x-ref="code" autocomplete="one-time-code" />
                    @error('code') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror 
                </div>

                <div class="flex justify-end mt-4">
                    <div class="flex items-center justify-end ms-4">
                        <x-button>
                            {{ __('Log In') }}
                        </x-button>
                    </div>
                </div>
            </form>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-button title="Logout" type="submit" class="inline-flex items-center mt-2 px-6 py-2 text-lg text-gray-50 font-semibold bg-red-800 hover:bg-red-700">
                    Logout
                </x-button>
            </form>
        </div>
    </x-authentication-card>
</x-guest-layout>