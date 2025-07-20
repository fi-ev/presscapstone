<nav x-data="{ open: false }" class="bg-blue-50 border-b border-gray-100 w-full flex flex-col sm:flex-row justify-start md:justify-end dark:bg-gray-800 dark:border-gray-800">
    <!-- nav menu -->
    <div class="max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex justify-start h-16">
            <div class="hidden md:flex md:items-center md:ms-6">
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

                <!-- settings -->
                <div class="relative">
                    <x-dropdown width="48">
                        <!-- dropdown triggers -->
                        <x-slot name="trigger">
                            <button class="flex text-sm border-2 border-white rounded-full focus:outline-none focus:border-gray-300 dark:focus:border-blue-300 transition">
                                <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profilePhotoUrl }}" alt="{{ Auth::user()->name }}" />
                            </button>
                        </x-slot>
                        <!-- dropdown items -->
                        <x-slot name="content">
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Account') }}
                            </div>
                            @if (!Auth::user()->isAdmin())
                            <x-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </x-dropdown-link>
                            @endif
                            <div class="border-t border-gray-200 dark:border-gray-600"></div>
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf
                                <x-dropdown-link class="dark:hover:text-red-600" href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>

            
            <!-- hamburger -->
            <div class="flex justify-start w-full md:hidden">
                <div class="flex items-center space-x-2">
                    <button aria-label="Toggle Dark Mode" onclick="toggleDarkMode()" class="p-2 rounded-full bg-blue-200 dark:bg-gray-700">
                        <svg id="light-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 hidden dark:block dark:text-gray-200">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" />
                        </svg>
                        <svg id="dark-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 dark:hidden">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21.752 15.002A9.72 9.72 0 0 1 18 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 0 0 3 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 0 0 9.002-5.998Z" />
                        </svg>
                    </button>

                    <button aria-label="Hamburger" @click="open = !open" class="p-2 rounded-md text-gray-400 hover:text-gray-600 focus:outline-none focus:text-gray-200 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
            
        </div>
    </div>

    <!-- responsive nav menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden md:hidden">
        <!-- main menu -->
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')" class="text-blue-700 dark:text-blue-300">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        @if (Auth::user()->isAdmin())
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link href="{{ route('users') }}" :active="request()->routeIs('users')" class="text-blue-700 dark:text-blue-300">
                    {{ __('Manage Users') }}
                </x-responsive-nav-link>
            </div>
        @endif

        @if (Auth::user()->isApplicant())
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link href="{{ route('pds.index') }}" :active="request()->routeIs('pds.index')" class="text-blue-700 dark:text-blue-300">
                    {{ __('Personal Data Sheet') }}
                </x-responsive-nav-link>
            </div>

            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link href="{{ route('attachments.index') }}" :active="request()->routeIs('attachments.index')" class="text-blue-700 dark:text-blue-300">
                    {{ __('Files') }}
                </x-responsive-nav-link>
            </div>

            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link href="{{ route('applications.index') }}" :active="request()->routeIs('applications.index')" class="text-blue-700 dark:text-blue-300">
                    {{ __('Applications') }}
                </x-responsive-nav-link>
            </div>

            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link href="{{ route('vacancies.card') }}" :active="request()->routeIs('vacancies.card')" class="text-blue-700 dark:text-blue-300">
                    {{ __('Vacancies') }}
                </x-responsive-nav-link>
            </div>
        @endif

        @if (Auth::user()->isHR())
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link href="{{ route('applicants.index') }}" :active="request()->routeIs('applicants.index')" class="text-blue-700 dark:text-blue-300">
                    {{ __('Applicants') }}
                </x-responsive-nav-link>
            </div>

            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link href="{{ route('applications.index') }}" :active="request()->routeIs('applications.index')" class="text-blue-700 dark:text-blue-300">
                    {{ __('Applications') }}
                </x-responsive-nav-link>
            </div>

            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link href="{{ route('vacancies.index') }}" :active="request()->routeIs('vacancies.index')" class="text-blue-700 dark:text-blue-300">
                    {{ __('Vacancies') }}
                </x-responsive-nav-link>
            </div>

            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link href="{{ route('positions.index') }}" :active="request()->routeIs('positions.index')" class="text-blue-700 dark:text-blue-300">
                    {{ __('Positions') }}
                </x-responsive-nav-link>
            </div>

            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link href="{{ route('types.index') }}" :active="request()->routeIs('types.index')" class="text-blue-700 dark:text-blue-300">
                    {{ __('Types') }}
                </x-responsive-nav-link>
            </div>

            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link href="{{ route('templates.index') }}" :active="request()->routeIs('templates.index')" class="text-blue-700 dark:text-blue-300">
                    {{ __('Letter Templates') }}
                </x-responsive-nav-link>
            </div>

        @endif

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-400">
        
            <div class="flex items-center px-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <div class="shrink-0 me-3">
                        <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profilePhotoUrl }}" alt="{{ Auth::user()->first_name }}" />
                    </div>
                @endif

                <div>
                    <div class="font-medium text-base text-gray-800 dark:text-blue-300">{{ Auth::user()->full_name }}</div>
                    <div class="font-medium text-sm text-gray-700 dark:text-gray-200">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- account -->
                <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')" class="text-blue-700 dark:text-blue-300">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- auth -->
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf
                    <x-responsive-nav-link href="{{ route('logout') }}"
                        @click.prevent="$root.submit();" class="text-blue-700 dark:text-blue-300">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
<script>
function toggleDarkMode() {
    document.documentElement.classList.toggle('dark');
    localStorage.setItem('theme', document.documentElement.classList.contains('dark') ? 'dark' : 'light');
}

if (localStorage.getItem('theme') === 'dark') {
    document.documentElement.classList.add('dark');
}
</script>