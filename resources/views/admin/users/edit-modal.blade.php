<div class="overflow-y-auto fixed inset-0 z-50 flex items-center justify-center">
    <!-- modal bg -->
    <div class="fixed inset-0 bg-white bg-opacity-75 dark:bg-opacity-25" aria-hidden="true"></div>
    <!-- modal -->
    <div class="relative bg-white rounded-lg shadow dark:bg-gray-800 max-w-md mx-auto p-4 md:p-5 w-full max-h-screen overflow-y-auto">
        <!-- header -->
        <div class="flex items-center justify-between dark:border-gray-600">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-200">
                Edit User
            </h3>
            <button
                type="button"
                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                wire:click.prevent="closeEditModal()"
                aria-label="Close modal"
            >
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
        </div>
        <!-- body -->
        <div class="p-4 md:p-5">
        <form wire:submit.prevent="submit" class="space-y-4">
            @csrf
                <div>
                    <x-label class="text-blue-700 dark:text-blue-300" for="first_name" value="{{ __('First Name*') }}" />
                    <x-input id="first_name" wire:model="first_name" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" type="text" name="first_name" :value="old('first_name')" required autofocus autocomplete="first_name" />
                    @error('first_name') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror 
                </div>

                <div class="mt-4">
                    <x-label class="text-blue-700 dark:text-blue-300" for="last_name" value="{{ __('Last Name*') }}" />
                    <x-input id="last_name" wire:model="last_name" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" type="text" name="last_name" :value="old('last_name')" required autofocus autocomplete="last_name" />
                    @error('last_name') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror 
                </div>

                <div class="mt-4">
                    <x-label class="text-blue-700 dark:text-blue-300" for="email" value="{{ __('Email*') }}" />
                    <x-input id="email" wire:model="email" class="block w-full rounded-md border-0 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:bg-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600" type="email" name="email" :value="old('email')" required autocomplete="email" />
                    @error('email') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror 
                </div>

                <div class="mt-4">
                    <x-label class="text-blue-700 dark:text-blue-300" for="role" value="{{ __('Role*') }}" />
                    <select id="role" wire:model.live="role" name="role" autocomplete="role" class="block mt-1 w-full rounded-md border-0 py-1.5 shadow-sm ring-1 ring-inset ring-gray-300  focus:ring-2 focus:ring-inset focus:ring-blue-800 sm:text-sm sm:leading-6 text-gray-700 bg-white border border-gray-300 rounded-lg w-80 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:ring-gray-600">
                        <option value="" disabled>Select Role</option>
                        <option value="admin">Admin</option>
                        <option value="hr">HR</option>
                    </select>
                    @error('role') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror     
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-button class="mt-4">
                        {{ __('Create') }}
                    </x-button>
                </div>
            </div>

            </form>
        </div>
    </div>
</div>
