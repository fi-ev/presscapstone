<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600 dark:text-gray-200">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ $value }}
            </div>
        @endsession

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-label class="text-blue-700 dark:text-blue-300" for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                @error('email') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror 
            </div>

            <div class="flex items-center justify-between mt-4">
                <x-secondary-button class="inline-flex items-center px-2 py-2 text-gray-600 font-semibold bg-blue-200 hover:bg-blue-300 dark:bg-blue-200 dark:text-blue-800">
                    <a href="{{ route('login') }}" title="Back">Back</a>
                </x-secondary-button>
                <x-button>
                    {{ __('Email Password Reset Link') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
