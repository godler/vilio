@props(['attribute' => null, 'value' => null, 'label' => null])

<div {{ $attributes->merge(['class' => 'mb-3 ' ])}}>
    @isset($label)
        <label for="{{ $attribute }}"
            class="block text-sm font-medium mb-1 text-slate-700 dark:text-white bg-white px-2 @error($attribute) text-red-500 @enderror">
            {{ $label }}
        </label>
    @endisset

    <div
        class=" p-3 block group w-full border rounded-md 
                border-gray-300 shadow-sm focus-within:border-primary-400 
                focus-within:ring focus-within:ring-primary-200 
                focus-within:ring-opacity-50 disabled:cursor-not-allowed
                 disabled:bg-gray-50 disabled:text-gray-500
                 @error($attribute) border-red-500 @enderror
                 ">

        <input id="{{ $attribute }}" type="hidden" name="{{ $attribute }}" value="{{ $value }}">
        <div class="prose min-w-full margin-0 flex-1">
            <trix-editor class="border-0 " @trix-blur="$dispatch('input', {value: $event.target.value})"
                input="{{ $attribute }}"></trix-editor>
        </div>
    </div>

    
    @error($attribute)
    <span class="text-xs text-red-500 px-2">
    {{ $message }}
    </span>
    @enderror
</div>
