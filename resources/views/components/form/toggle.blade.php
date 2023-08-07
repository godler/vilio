@props(['label' => null, 'attribute'])
<div class="">
    <label for="{{ $attribute }}" class="relative inline-flex cursor-pointer items-center">
        <input type="checkbox" id="{{ $attribute }}" class="peer sr-only" {{ $attributes }} checked/>
        <div
            class="
                block
                peer-checked:hidden"
             >
               {{$off}}
        </div>
        <div class="
            hidden
            peer-checked:block"
            >
            {{$on}}
        </div>
    </label>
</div>


