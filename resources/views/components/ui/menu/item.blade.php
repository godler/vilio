@props(['href' => null])
<li class="basis-0 grow">
    <a class="w-full py-3 px-4 inline-flex  items-center gap-2 bg-transparent 
        text-sm font-medium text-center 
        text-gray-400 rounded-lg 
         dark:text-gray-600

        cursor-pointer
        "
        href="{{$href}}">
        {{$slot}}
    </a>
</li>