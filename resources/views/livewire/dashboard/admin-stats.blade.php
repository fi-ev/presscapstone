<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
    <div class="bg-white dark:bg-gray-900 shadow rounded-lg p-6 text-center">
        <div class="text-gray-500 dark:text-gray-400">Total Users</div>
        <div class="text-4xl font-extrabold text-blue-800 dark:text-white">{{ $totalUsers }}</div>
    </div>
    <div class="bg-white dark:bg-gray-900 shadow rounded-lg p-6 text-center">
        <div class="text-gray-500 dark:text-gray-400">Admin Users</div>
        <div class="text-4xl font-extrabold text-blue-500 dark:text-white">{{ $adminUsers }}</div>
    </div>
    <div class="bg-white dark:bg-gray-900 shadow rounded-lg p-6 text-center">
        <div class="text-gray-500 dark:text-gray-400">HR Users</div>
        <div class="text-4xl font-extrabold text-green-500 dark:text-green-700">{{ $hrUsers }}</div>
    </div>
    <div class="bg-white dark:bg-gray-900 shadow rounded-lg p-6 text-center">
        <div class="text-gray-500 dark:text-gray-400">Applicants</div>
        <div class="text-4xl font-extrabold text-red-500 dark:text-red-700">{{ $applicantUsers }}</div>
    </div>
</div>
