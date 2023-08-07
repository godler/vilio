@props(['name' => null, 'type' => 'text', 'label', 'size' => 'md', 'inline' => false, 'noBorder' => false])

@php 
    $wrapper_classes = 'relative mx-auto ';
    $classes = "block w-full  ";

    if (!$noBorder) {
        $classes .= "rounded-md border-gray-300 shadow-sm focus:border-primary-400 focus:ring focus:ring-primary-200 focus:ring-opacity-50 disabled:cursor-not-allowed disabled:bg-gray-50 disabled:text-gray-500";
    } else {
        $classes .= "border-0 border-b-2 border-gray-200 focus:border-primary-500 focus:ring-0 disabled:cursor-not-allowed disabled:text-gray-500";
    }

    if($errors->get($name)){
        $classes .= ' border-red-500 text-red-500';
    }

    if($inline) {
        $wrapper_classes .= ' block-inline ';
    } else {
        $wrapper_classes .= ' mb-3 ';
    }

@endphp



<div {{$attributes->class($wrapper_classes)}}>
    @isset($label)
    <label for="{{$name}}" 
            class="block text-sm font-medium mb-1 text-slate-700 dark:text-white bg-white px-2 @error($name) text-red-500 @enderror">
        {{$label}}
    </label>
    @endisset

    @if($type !== 'textarea')
    <input 
        type="{{$type}}" 
        name="{{$name}}"
        class="{{$classes}}"
        {{ $attributes }}
    >
    @endif

    @if($type === 'textarea')
    <textarea
    name="{{$name}}"
    {{$attributes->merge(['class' => $classes])}}
    ></textarea>
    @endif

    @isset($icon)
        <div class="absolute inset-y-0 right-0 flex items-center pointer-events-none z-20 pr-4">
            {{$icon}}
        </div>
    @endisset

    @error($name)
    <span class="text-xs text-red-500 px-2">
    {{ $message }}
    </span>
    @enderror
</div>