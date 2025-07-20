<div>
    <div class="bg-blue-100 text-gray-800 p-4 rounded-md mb-5 text-sm dark:bg-gray-600 dark:text-gray-200">
        <p><strong>PDS and Work Experience Sheet References:</strong> 
            <a class="inline-flex items-center" href="https://www.csc.gov.ph/downloads/category/223-csc-form-212-revised-2017-personal-data-sheet">
                Guide from CSC<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-3 w-3 ml-1">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                </svg>
            </a>
        </p>
    </div>
    <form wire:submit.prevent="submit">
        <div class="grid grid-cols-1 gap-x-6 gap-y-6 sm:grid-cols-6">
            @foreach ($files as $index => $file)
                <div class="sm:col-span-3 flex flex-col">
                    <label for="{{ $file['model'] }}" class="text-sm text-gray-600 font-semibold mb-2 block dark:text-blue-300">
                        {{ $file['label'] }} 
                        <span class="font-semibold">{{ $file['required'] === 'true' ? '*' : '' }}</span>
                    </label>

                    <input type="file" id="{{ $file['model'] }}" wire:model="{{ $file['model'] }}" 
                        class="w-full text-gray-600 font-semibold text-xs bg-white border file:cursor-pointer cursor-pointer file:border-0 file:py-3 file:px-4 file:mr-4 file:bg-gray-100 file:hover:bg-gray-200 file:text-gray-600 dark:bg-gray-800 dark:file:bg-gray-200 dark:file:text-gray-800 dark:file:hover:bg-gray-400 dark:text-gray-200 dark:border dark:border-gray-500 rounded" />

                    <p class="text-xs text-gray-600 mt-2 dark:text-gray-200">{{ $file['helpText'] }}</p>

                    @error($file['model']) 
                        <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> 
                    @enderror
                </div>
                <div class="sm:col-span-3 flex items-center justify-start">
                    @foreach($attachments as $attachment)
                        @if($attachment['model'] === $file['model'])
                            <div class="sm:col-span-3 flex items-center justify-start mt-2">
                                <span class="flex items-center text-gray-600 text-xs hover:text-blue-800 hover:font-bold rounded-md p-2 dark:text-blue-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m9 12.75 3 3m0 0 3-3m-3 3v-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                    &nbsp;
                                    <a href="{{ asset($filePath . '/' . $userId . '/' . $attachment['path']) }}" target="_blank">{{ $attachment['filename'] }}</a>
                                </span>
                            </div>
                        @endif
                    @endforeach
                </div>
            @endforeach
        </div>
        <x-button type="submit" class="mt-4 btn btn-primary">Upload Files</x-button>
    </form>
</div>
