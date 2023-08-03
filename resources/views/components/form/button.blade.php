@props(['type' => 'submit', 'action'=>null])

<button type="{{$type}}" class=" w-full py-2 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
    
    <span wire:loading.remove wire:target="{{$action}}">
        {{ $slot }}
    </span>
   

    <x-tabler-loader-2 wire:loading wire:target="{{$action}}" class="animate-spin"/>
</button>