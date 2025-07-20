<div class="relative">
    <x-input
        id="password"
        class="block mt-1 w-full pr-12"
        type="{{ $show_password ? 'text' : 'password' }}"
        name="password"
        wire:model="password"
        required
        autocomplete="current-password"
    />
    <button
        type="button"
        wire:click="togglePassword"
        class="absolute inset-y-0 right-0 flex items-center pr-3"
    >
        <svg
            class="h-5 w-5 text-gray-700"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
        >
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M12 3c4.418 0 8 3.582 8 8s-3.582 8-8 8-8-3.582-8-8 3.582-8 8-8zm0 2c-3.313 0-6 2.687-6 6s2.687 6 6 6 6-2.687 6-6-2.687-6-6-6zm-1 3h2v6h-2v-6z"
            />
        </svg>
    </button>
</div>
