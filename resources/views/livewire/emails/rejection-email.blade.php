<div>
    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-200">
        Update Body Template for Rejection Email
    </label>
    <div class="bg-blue-100 text-gray-800 p-4 rounded-md mb-5 text-sm">
        <p><strong>Instructions:</strong> Use <code>[newline]</code> as a placeholder for inserting a line break, and <code><position>[position]</code> as a placeholder for the specified position.</p>
    </div>
    <form wire:submit.prevent="submit">
        <textarea id="message" rows="16" 
        class="block p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:ring-blue-500 dark:focus:border-blue-500"
        wire:model="message"></textarea>
        <x-button class="mt-4">
            APPLY CHANGES
        </x-button>
        <span class="ml-2 text-xs">Last updated on <i>{{ $updated_at }}</i></span>
    </form>
</div>
