<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 py-2 bg-white border border-blue-800 rounded-md font-semibold text-xs text-blue-700 dark:bg-blue-800 dark:text-gray-200 dark:hover:bg-blue-700 uppercase tracking-widest shadow-sm hover:bg-blue-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
