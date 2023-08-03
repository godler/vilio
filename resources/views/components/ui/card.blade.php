<div {{$attributes->merge(['class' =>  "p-3 px-4  items-center justify-between rounded relative bg-white shadow-md dark:bg-gray-800 sm:rounded-lg "])}}>


    @isset($title)
    <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
        <h3 class="text-xl font-semibold text-gray-900 dark:text-white ml-3">
            {{ $title }}
        </h3>
        @isset($actions)
            {{$actions}}
        @endisset
       
    </div>
    @endisset
    <div>
        {{ $slot }}
    </div>
    
</div>