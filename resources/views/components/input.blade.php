@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-blue-500 focus:ring-blue-500 focus:bg-blue-100 rounded-md shadow-sm bg-gray-50 dark:bg-gray-600 dark:text-gray-200 text-gray-800']) !!}>
