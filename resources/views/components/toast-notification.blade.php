<div>
    @if (session()->has('message'))
        <div x-data="{ open: true }" 
            x-show="open" 
            x-init="setTimeout(() => open = false, 6000)" 
            class="fixed bottom-4 right-4 p-4 max-w-xs text-white rounded-lg shadow-lg"
            :class="{
                'bg-red-600': '{{ session('message-type') }}' === 'error',
                'bg-green-600': '{{ session('message-type') }}' === 'success',
                'bg-blue-600': '{{ session('message-type') }}' === 'info',
                'bg-orange-600': '{{ session('message-type') }}' === 'pending'
            }">
            <div class="flex justify-between items-center">
                <!-- Icon -->
                <div class="mr-3">
                    <template x-if="'{{ session('action-type') }}' === 'delete'">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                    </template>
                    <template x-if="'{{ session('action-type') }}' === 'send'">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5" />
                        </svg>
                    </template>
                    <template x-if="'{{ session('action-type') }}' === 'create'">
                        <svg class="w-6 h-6" xxmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                    </template>
                    <template x-if="'{{ session('action-type') }}' === 'update'">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                    </template>
                </div>
                <span>{{ session('message') }}</span>
                <button @click="open = false" class="ml-4 text-lg font-bold">
                    &times;
                </button>
            </div>
        </div>
    @endif
</div>