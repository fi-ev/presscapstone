<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- favico -->
    <link rel="icon" href="{{ asset('/favicon1.ico') }}" type="image/x-icon">
    
    <!-- scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- styles -->
    @livewireStyles
</head>
<body class="bg-gray-100 dark:bg-gray-900">
    <nav class="bg-white shadow-md dark:bg-gray-800">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <!-- logo -->
                <div class="flex items-center">
                    <a href="#" class="flex items-center space-x-2 text-gray-800">
                        <x-application-logo class="block h-8 w-auto" />
                        <span class="ml-2 font-semibold text-lg dark:text-gray-200">PReSS</span>
                    </a>
                </div>
                <!-- auth -->
                <div class="flex items-center ml-4">
                    <div class="relative mr-2">
                        <button aria-label="Toggle Dark Mode" onclick="toggleDarkMode()" class="p-2 rounded-full text-gray-600 dark:text-gray-200 bg-blue-200 dark:bg-gray-700">
                            <svg id="light-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 hidden dark:block">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" />
                            </svg>
                            <svg id="dark-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 dark:hidden">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.72 9.72 0 0 1 18 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 0 0 3 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 0 0 9.002-5.998Z" />
                            </svg>
                        </button>
                    </div>
                    @auth
                    <!-- settings dropdown -->
                    <div class="relative">
                        <x-dropdown width="48">
                            <!-- dropdown trigger -->
                            <x-slot name="trigger">
                                <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_path }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            </x-slot>
                            <!-- dropdown content -->
                            <x-slot name="content">
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Manage Account') }}
                                </div>
                                <x-dropdown-link href="{{ route('profile.show') }}">
                                    {{ __('Profile') }}
                                </x-dropdown-link>
                                <div class="border-t border-gray-200 dark:border-gray-400"></div>
                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf
                                    <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                    @endauth
                    @guest
                        <!-- auth links for guests -->
                        <div class="flex items-center space-x-2">
                            <a href="{{ route('login') }}" class="inline-flex items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150"
                            aria-label="Log in">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4 mr-1" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                                </svg>
                                <span class="hidden sm:inline">Log in</span>
                            </a>
                            <a href="{{ route('register') }}" class="inline-flex items-center px-4 py-2 bg-gray-50 dark:bg-gray-800 border dark:border-blue-200 dark:hover:bg-blue-800 border-blue-800 rounded-md font-semibold text-xs text-blue-800 dark:text-blue-300 uppercase tracking-widest shadow-sm hover:bg-blue-200 hover:text-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                                Register
                            </a>
                        </div>
                    @endguest
                </div>
            </div>
        </div>
    </nav>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 dark:text-gray-200 items-center px-4">
            <div class="bg-blue-100 text-gray-800 p-4 rounded-md mb-8 text-sm dark:bg-gray-600 dark:border-gray-600 dark:text-gray-200">
                <p><strong>NOTICE OF VACANCIES:</strong> The Office highly encourages all interested and qualified applicants, including persons with disability (PWD),
                members of indigenous communities, and those with diverse sexual orientation, gender identity and expression (SOGIE), to apply.
                </p>
            </div>
            @livewire('vacancies-card')
        </div>
    </div>
    @livewireScripts
    <script>
    function toggleDarkMode() {
        document.documentElement.classList.toggle('dark');
        localStorage.setItem('theme', document.documentElement.classList.contains('dark') ? 'dark' : 'light');
    }

    if (localStorage.getItem('theme') === 'dark') {
        document.documentElement.classList.add('dark');
    }
    </script>
</body>
</html>
