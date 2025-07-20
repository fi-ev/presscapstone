<aside class="flex-col w-64 h-screen px-5 py-8 overflow-y-auto bg-white border-r rtl:border-r-0 rtl:border-l dark:bg-gray-900 dark:border-gray-900 hidden md:block">
    <x-application-logo class="block h-8 w-auto" />

    <div class="flex flex-col justify-between flex-1 mt-6">
        <nav class="-mx-3 space-y-6 ">

            @can('dashboard')
            <div class="space-y-3">
                <label class="px-3 text-xs text-gray-700 uppercase dark:text-gray-200">Home</label>
                <a class="flex items-center transition-colors duration-300 transform rounded-lg 
                {{ request()->routeIs('dashboard') ? 'bg-blue-100 text-blue-800 font-semibold dark:bg-blue-400 dark:text-gray-900' : 'text-gray-600 dark:bg-gray-900' }}  
                px-3 py-2 dark:hover:bg-blue-400 dark:hover:text-gray-900 dark:text-blue-300 
                hover:bg-blue-100 hover:text-blue-800"
                href="{{ url('dashboard') }}">
                     <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 006 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0118 16.5h-2.25m-7.5 0h7.5m-7.5 0l-1 3m8.5-3l1 3m0 0l.5 1.5m-.5-1.5h-9.5m0 0l-.5 1.5m.75-9l3-3 2.148 2.148A12.061 12.061 0 0116.5 7.605" />
                    </svg>
                    <span class="mx-2 text-sm font-medium">Dashboard</span>
                </a>
            </div>
            @endcan

            @can('users')
            <div class="space-y-3">
                <label class="px-3 text-xs text-gray-700 uppercase dark:text-gray-200">Accounts</label>
                <a class="flex items-center transition-colors duration-300 transform rounded-lg 
                {{ request()->routeIs('users.index') ? 'bg-blue-100 text-blue-800 font-semibold dark:bg-blue-400 dark:text-gray-900' : 'text-gray-600 dark:bg-gray-900' }}  
                px-3 py-2 dark:hover:bg-blue-700 dark:hover:text-gray-900 dark:text-blue-300
                hover:bg-blue-100 hover:text-blue-800" 
                href="{{ url('users') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                    </svg>
                    <span class="mx-2 text-sm font-medium">Manage Users</span>
                </a>
            </div>
            @endcan

            @can('requirements')
            <div class="space-y-3">
                <label class="px-3 text-xs text-gray-700 uppercase dark:text-gray-200">Requirements</label>
                <a class="flex items-center transition-colors duration-300 transform rounded-lg 
                {{ request()->routeIs('pds.index') ? 'bg-blue-100 text-blue-800 font-semibold dark:bg-blue-400 dark:text-gray-900' : 'text-gray-600 dark:bg-gray-900' }}  
                px-3 py-2 dark:hover:bg-blue-400 dark:hover:text-gray-900 dark:text-blue-300 
                hover:bg-blue-100 hover:text-blue-800" 
                href="{{ url('pds') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Zm6-10.125a1.875 1.875 0 1 1-3.75 0 1.875 1.875 0 0 1 3.75 0Zm1.294 6.336a6.721 6.721 0 0 1-3.17.789 6.721 6.721 0 0 1-3.168-.789 3.376 3.376 0 0 1 6.338 0Z" />
                    </svg>
                    <span class="mx-2 text-sm font-medium">Personal Data Sheet</span>
                </a>

                <a class="flex items-center transition-colors duration-300 transform rounded-lg 
                {{ request()->routeIs('attachments.index') ? 'bg-blue-100 text-blue-800 font-semibold dark:bg-blue-400 dark:text-gray-900' : 'text-gray-600 dark:bg-gray-900' }}  
                px-3 py-2 dark:hover:bg-blue-400 dark:hover:text-gray-900 dark:text-blue-300 
                hover:bg-blue-100 hover:text-blue-800" 
                href="{{ url('attachments') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.75V12A2.25 2.25 0 0 1 4.5 9.75h15A2.25 2.25 0 0 1 21.75 12v.75m-8.69-6.44-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                    </svg>
                    <span class="mx-2 text-sm font-medium">Files</span>
                </a>
            </div>
            @endcan

            @can('applications')
            <div class="space-y-3">
                <label class="px-3 text-xs text-gray-700 uppercase dark:text-gray-200">Applications</label>
                @can('manage-applications')
                <a class="flex items-center transition-colors duration-300 transform rounded-lg 
                {{ request()->routeIs('applications.index') ? 'bg-blue-100 text-blue-800 font-semibold dark:bg-blue-400 dark:text-gray-900' : 'text-gray-600 dark:bg-gray-900' }}  
                px-3 py-2 dark:hover:bg-blue-400 dark:hover:text-gray-900 dark:text-blue-300 
                hover:bg-blue-100 hover:text-blue-800" 
                href="{{ url('applications') }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.042 21.672 13.684 16.6m0 0-2.51 2.225.569-9.47 5.227 7.917-3.286-.672ZM12 2.25V4.5m5.834.166-1.591 1.591M20.25 10.5H18M7.757 14.743l-1.59 1.59M6 10.5H3.75m4.007-4.243-1.59-1.59" />
                    </svg>
                    <span class="mx-2 text-sm font-medium">Applications</span>
                </a>
                @endcan

                @can('view-applications')
                <a class="flex items-center transition-colors duration-300 transform rounded-lg 
                {{ request()->routeIs('applicants.index') ? 'bg-blue-100 text-blue-800 font-semibold dark:bg-blue-400 dark:text-gray-900' : 'text-gray-600 dark:bg-gray-900' }}  
                px-3 py-2 dark:hover:bg-blue-400 dark:hover:text-gray-900 dark:text-blue-300 
                hover:bg-blue-100 hover:text-blue-800" 
                href="{{ url('applicants') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.042 21.672 13.684 16.6m0 0-2.51 2.225.569-9.47 5.227 7.917-3.286-.672ZM12 2.25V4.5m5.834.166-1.591 1.591M20.25 10.5H18M7.757 14.743l-1.59 1.59M6 10.5H3.75m4.007-4.243-1.59-1.59" />
                    </svg>
                    <span class="mx-2 text-sm font-medium">Applicants</span>
                </a>

                <a class="flex items-center transition-colors duration-300 transform rounded-lg 
                {{ request()->routeIs('applications.index') ? 'bg-blue-100 text-blue-800 font-semibold dark:bg-blue-400 dark:text-gray-900' : 'text-gray-600 dark:bg-gray-900' }}  
                px-3 py-2 dark:hover:bg-blue-400 dark:hover:text-gray-900 dark:text-blue-300 
                hover:bg-blue-100 hover:text-blue-800" 
                href="{{ url('applications') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.242 5.992h12m-12 6.003H20.24m-12 5.999h12M4.117 7.495v-3.75H2.99m1.125 3.75H2.99m1.125 0H5.24m-1.92 2.577a1.125 1.125 0 1 1 1.591 1.59l-1.83 1.83h2.16M2.99 15.745h1.125a1.125 1.125 0 0 1 0 2.25H3.74m0-.002h.375a1.125 1.125 0 0 1 0 2.25H2.99" />
                    </svg>
                    <span class="mx-2 text-sm font-medium">Applications</span>
                </a>
                @endcan
            </div>
            @endcan

            @can('vacancies')
            <div class="space-y-3">
                <label class="px-3 text-xs text-gray-700 uppercase dark:text-gray-200">Vacancies</label>

                @can('view-vacancies')
                <a class="flex items-center transition-colors duration-300 transform rounded-lg 
                {{ request()->routeIs('vacancies.card') ? 'bg-blue-100 text-blue-800 font-semibold dark:bg-blue-400 dark:text-gray-900' : 'text-gray-600 dark:bg-gray-900' }}  
                px-3 py-2 dark:hover:bg-blue-400 dark:hover:text-gray-900 dark:text-blue-300 
                hover:bg-blue-100 hover:text-blue-800" 
                href="{{ url('vacancies') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m3.75 13.5 10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75Z" />
                    </svg>
                    <span class="mx-2 text-sm font-medium">Vacancies</span>
                </a>
                @endcan

                @can('manage-vacancies')
                <a class="flex items-center transition-colors duration-300 transform rounded-lg 
                {{ request()->routeIs('vacancies.index') ? 'bg-blue-100 text-blue-800 font-semibold dark:bg-blue-400 dark:text-gray-900' : 'text-gray-600 dark:bg-gray-900' }}  
                px-3 py-2 dark:hover:bg-blue-400 dark:hover:text-gray-900 dark:text-blue-300 
                hover:bg-blue-100 hover:text-blue-800" 
                href="{{ url('vacancies/list') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m3.75 13.5 10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75Z" />
                    </svg>
                    <span class="mx-2 text-sm font-medium">Vacancies</span>
                </a>
                @endcan

                @can('manage-positions')
                <a class="flex items-center transition-colors duration-300 transform rounded-lg 
                {{ request()->routeIs('positions.index') ? 'bg-blue-100 text-blue-800 font-semibold dark:bg-blue-400 dark:text-gray-900' : 'text-gray-600 dark:bg-gray-900' }}  
                px-3 py-2 dark:hover:bg-blue-400 dark:hover:text-gray-900 dark:text-blue-300 
                hover:bg-blue-100 hover:text-blue-800" 
                href="{{ url('positions') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z" />
                    </svg>
                    <span class="mx-2 text-sm font-medium">Positions</span>
                </a>
                @endcan
            </div>
            @endcan

            @can('types')
            <div class="space-y-3">
                <label class="px-3 text-xs text-gray-700 uppercase dark:text-gray-200">Settings</label>
                <a class="flex items-center transition-colors duration-300 transform rounded-lg 
                {{ request()->routeIs('types.index') ? 'bg-blue-100 text-blue-800 font-semibold dark:bg-blue-400 dark:text-gray-900' : 'text-gray-600 dark:bg-gray-900' }}  
                px-3 py-2 dark:hover:bg-blue-400 dark:hover:text-gray-900 dark:text-blue-300 
                hover:bg-blue-100 hover:text-blue-800" 
                href="{{ url('types') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 13.5V3.75m0 9.75a1.5 1.5 0 0 1 0 3m0-3a1.5 1.5 0 0 0 0 3m0 3.75V16.5m12-3V3.75m0 9.75a1.5 1.5 0 0 1 0 3m0-3a1.5 1.5 0 0 0 0 3m0 3.75V16.5m-6-9V3.75m0 3.75a1.5 1.5 0 0 1 0 3m0-3a1.5 1.5 0 0 0 0 3m0 9.75V10.5" />
                    </svg>
                    <span class="mx-2 text-sm font-medium">Types</span>
                </a>

                <a class="flex items-center transition-colors duration-300 transform rounded-lg 
                {{ request()->routeIs('templates.index') ? 'bg-blue-100 text-blue-800 font-semibold dark:bg-blue-400 dark:text-gray-900' : 'text-gray-600 dark:bg-gray-900' }}  
                px-3 py-2 dark:hover:bg-blue-400 dark:hover:text-gray-900 dark:text-blue-300 
                hover:bg-blue-100 hover:text-blue-800" 
                href="{{ url('templates') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                    </svg>
                    <span class="mx-2 text-sm font-medium">Letter Templates</span>
                </a>
            </div>
            @endcan
        </nav>
    </div>
</aside>