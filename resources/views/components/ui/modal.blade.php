@props([
    'maxWidth' => '2xl',
    'title' => '',
])

@php
    $maxWidth = [
        'sm' => 'sm:max-w-sm',
        'md' => 'sm:max-w-md',
        'lg' => 'sm:max-w-lg',
        'xl' => 'sm:max-w-xl',
        '2xl' => 'sm:max-w-2xl',
    ][$maxWidth];
@endphp

<div {{ $attributes->merge(['class' => 'fixed top-0 m-0 mx-auto w-full h-full p-0 m-0 flex flex-col justify-center align-middle' ]) }}
    x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
    x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
    x-cloak>
    <div class="fixed inset-0 transform transition-all" x-on:click="$dispatch('close')">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    </div>

    <div class="p-5 {{ $maxWidth }} bg-white rounded-lg overflow-hidden shadow-xl transform transition-all   w-full sm:mx-auto max-h-full flex flex-col justify-between">
        <div class="flex justify-between items-center pb-4 mb-1 rounded-t border-b  dark:border-gray-600">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                {{ $title }}
            </h3>
            <div class="flex justify-end align-middle">
                @isset($actions)
                    {{ $actions }}
                @endisset
                <x-tabler-x class="cursor-pointer hover:text-gray-600" x-on:click="$dispatch('close')" />
            </div>
        </div>
        <div class="flex-1 overflow-y-auto py-2 px-1">
            {{ $slot }}
        </div>
        @isset($footer)
        <div class="flex justify-end border-t pt-3 gap-3">
            {{$footer}}
        </div>
        @endisset
    </div>


</div>
