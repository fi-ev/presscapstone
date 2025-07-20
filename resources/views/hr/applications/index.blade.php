<x-app-layout>
    <div class="px-8 font-bold text-2xl text-blue-800">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 dark:text-gray-200">
            Applications
        </div>
    </div>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 dark:text-gray-200">
            <div class="bg-white overflow-hidden rounded sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200 dark:border-gray-900 dark:bg-gray-900">
                    @livewire('applications-table')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
