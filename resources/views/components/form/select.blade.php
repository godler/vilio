@props(['name' => null,  'label'])

@php 
    $classes = "block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-300 focus:ring focus:ring-primary-200 focus:ring-opacity-50 disabled:cursor-not-allowed disabled:bg-gray-50";

    if($errors->get($name)){
        $classes .= ' border-red-500 text-red-500';
    }

@endphp
<div {{ $attributes->class([' mb-3 relative '])}}>
        @isset($label)
        <label for="{{$name}}" 
                class="block text-sm font-medium mb-1 text-slate-700 dark:text-white bg-white px-2 @error($name) text-red-500 @enderror">
            {{$label}}
        </label>
        @endisset

        <select id="{{$name}}" {{ $attributes }} class="{{$classes}}" >
                {{ $slot }}
        </select>

        @isset($icon)
        <div class="absolute top-0 py-3 right-4 text-gray-500">
            {{$icon}}
        </div>
        @endisset

        @error($name)
        <span class="text-xs text-red-500 px-2">
        {{ $message }}
        </span>
        @enderror
</div>
