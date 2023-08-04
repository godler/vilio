@props(['label' => null])
<div class="flex align-middle gap-3 mb-3">
    <label for="example1" class="relative inline-flex cursor-pointer items-center">
        <input type="checkbox" id="example1" class="peer sr-only" {{$attributes}} />
        <div class="h-6 w-11 rounded-full bg-gray-100 after:absolute after:top-0.5 after:left-0.5 after:h-5 after:w-5 after:rounded-full after:bg-white after:shadow after:transition-all after:content-[''] hover:bg-gray-200 peer-checked:bg-primary-600 peer-checked:after:translate-x-full peer-checked:after:border-white peer-focus:ring-4 peer-focus:ring-primary-200 peer-disabled:cursor-not-allowed peer-disabled:bg-gray-100 peer-disabled:after:bg-gray-50"></div>
    </label>
    @if($label)
    <span>
        {{$label}}
    </span>
    @endif
</div>