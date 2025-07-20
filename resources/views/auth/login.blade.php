<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
            <h2 class="mt-4 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900 dark:text-gray-200">Sign In to Apply for Vacancies</h2>
        </x-slot>

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ $value }}
            </div>
        @endsession

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label class="text-blue-700 dark:text-blue-300" for="email" value="{{ __('Email') }}" />
                <input id="email" class="block w-full rounded-md border-0 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" type="email" name="email" :value="old('email')" required autofocus autocomplete="email" />
                @error('email') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror 
            </div>

            <div class="mt-6 flex flex-col sm:flex-row sm:justify-between">
                <x-label class="text-blue-700 dark:text-blue-300" for="password" value="{{ __('Password') }}" />
                
            </div>

            <div x-data="{ showPassword: false }" class="relative">
                <input :type="showPassword ? 'text' : 'password'" id="password" class="block w-full rounded-md border-0 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" type="password" name="password" required autocomplete="current-password" />
                @error('password') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror 
                <button 
                type="button"
                @click="showPassword = !showPassword"
                class="absolute inset-y-0 right-0 flex items-center px-2"
                :aria-label="showPassword ? 'Hide password' : 'Show password'">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 stroke-current text-blue-600 dark:text-blue-300" x-show="showPassword">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 stroke-current text-blue-600 dark:text-blue-300" x-show="!showPassword">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                    </svg>
                    </button>
            </div>

            <div class="flex items-center justify-between mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox class="text-blue-600 dark:text-blue-300 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-800 dark:border-gray-600" id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-700 dark:text-gray-300">Remember me</span>
                </label>
                
                @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" 
                class="text-sm font-semibold text-blue-600 dark:text-blue-300 hover:text-blue-500">
                    {{ __('I forgot my password') }}
                </a>
                @endif
            </div>

            <div class="flex items-center justify-center mt-6">
            <x-button class="w-full inline-flex justify-center items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-sm text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150">
                    {{ __('Log In') }}
                </x-button>
            </div>

            <div>
                <div class="text-sm mt-2 dark:text-blue-300">
                    No account yet?
                    <a href="{{ route('register') }}" class="text-sm font-semibold text-blue-600 dark:text-blue-300 hover:text-blue-500">
                        {{ __('Register here') }}
                    </a>
                </div>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
