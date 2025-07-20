<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
    <div class="bg-white dark:bg-gray-900 shadow rounded-lg p-6 text-center">
        <div class="text-gray-500 dark:text-gray-400">Vacancies Posted</div>
        <div class="text-4xl font-extrabold text-blue-500 dark:text-white">{{ $vacanciesPosted }}</div>
    </div>
    <div class="bg-white dark:bg-gray-900 shadow rounded-lg p-6 text-center">
        <div class="text-gray-500 dark:text-gray-400">Applicants</div>
        <div class="text-4xl font-extrabold text-blue-500 dark:text-white">{{ $applicantsCount }}</div>
    </div>
    <div class="bg-white dark:bg-gray-900 shadow rounded-lg p-6 text-center">
        <div class="text-gray-500 dark:text-gray-400">Vacancies Filled</div>
        <div class="text-4xl font-extrabold text-green-500 dark:text-green-700">{{ $vacanciesFilled }}</div>
    </div>
    <div class="bg-white dark:bg-gray-900 shadow rounded-lg p-6 text-center">
        <div class="text-gray-500 dark:text-gray-400">Vacancies Unfilled</div>
        <div class="text-4xl font-extrabold text-red-500 dark:text-red-700">{{ $vacanciesUnfilled }}</div>
    </div>
</div>
