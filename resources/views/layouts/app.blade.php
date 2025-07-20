<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ darkMode: localStorage.getItem('theme') === 'dark' }" :class="{ 'dark': darkMode }">
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
    <body class="font-sans antialiased dark:bg-gray-800">
        @yield('content')
        <div class="flex h-[100dvh] overflow-hidden">
            <x-sidebar />
            <div class="relative flex flex-col justify-between flex-1 overflow-y-auto overflow-x-hidden scrollbar">
                <x-banner />
                @livewire('navigation-menu')

                <!-- content -->
                <main class="grow flex justify-center p-2 bg-blue-50 dark:bg-gray-800">
                    <div class="w-full transition-all duration-700 mb-24">
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
                </main>
            </div>
        </div>
        @stack('modals')

        @livewireScripts
    </body>
</html>
