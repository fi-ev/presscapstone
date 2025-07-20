<!DOCTYPE html>
<html class="h-full" lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ darkMode: localStorage.getItem('theme') === 'dark' }" :class="{ 'dark': darkMode }">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        
        <!-- favico -->
        <link rel="icon" href="{{ asset('/favicon1.ico') }}" type="image/x-icon">

        <!-- fonts -->
        
        <!-- scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- styles -->
        @livewireStyles
    </head>
    <body class="h-full bg-gray-50 dark:bg-gray-900 relative">
        @yield('content')
        <div class="absolute right-4 top-4 z-10">
            <button aria-label="Toggle Dark Mode" onclick="toggleDarkMode()" class="p-2 rounded-full text-gray-600 dark:text-gray-200 bg-blue-200 dark:bg-gray-700">
                <svg id="light-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 hidden dark:block">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" />
                </svg>
                <svg id="dark-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 dark:hidden">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.72 9.72 0 0 1 18 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 0 0 3 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 0 0 9.002-5.998Z" />
                </svg>
            </button>
        </div>

        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>
        <!-- flash message -->
        <div>
            <x-toast-notification 
            :message="session('message')" 
            :messageType="session('message-type')" 
            :actionType="session('action-type')" 
            />
        </div>
        @livewireScripts
    </body>
</html>
<script>
function toggleDarkMode() {
    document.documentElement.classList.toggle('dark');
    localStorage.setItem('theme', document.documentElement.classList.contains('dark') ? 'dark' : 'light');
}

if (localStorage.getItem('theme') === 'dark') {
    document.documentElement.classList.add('dark');
}
</script>
