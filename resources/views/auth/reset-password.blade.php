<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="block">
                <x-label class="text-blue-700 dark:text-blue-300" for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
                @error('email') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror 
            </div>

            <div class="mt-4">
                <x-label class="text-blue-700 dark:text-blue-300" for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                @error('password') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror 
            </div>

            <div class="mt-4">
                <x-label class="text-blue-700 dark:text-blue-300" for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                @error('password_confirmation') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror 
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Reset Password') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
