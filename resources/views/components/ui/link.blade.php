@props([ 'href' => null, 'look'=> null, 'action'=>null])

@php
$classes = 'inline-block ';

if ($look === 'button') {
    $classes .= 'rounded-lg border border-primary-500 bg-primary-500 px-5 py-2.5 text-center text-sm font-medium text-white shadow-sm transition-all hover:border-primary-700 hover:bg-primary-700 focus:ring focus:ring-primary-200 disabled:cursor-not-allowed disabled:border-primary-300 disabled:bg-primary-300';

}
if ($look === 'danger') {
    $classes .= 'rounded-lg border border-red-500 bg-red-500 px-5 py-2.5 text-center text-sm font-medium text-white shadow-sm transition-all hover:border-red-700 hover:bg-red-700 focus:ring focus:ring-red-200 disabled:cursor-not-allowed disabled:border-red-300 disabled:bg-red-300';
}

if ($look === 'outlined' ) {
    $classes .= 'rounded-lg border border-gray-300 bg-white px-5 py-2.5 text-center text-sm font-medium text-gray-700 shadow-sm transition-all hover:bg-gray-100 focus:ring focus:ring-gray-100 disabled:cursor-not-allowed disabled:border-gray-100 disabled:bg-gray-50 disabled:text-gray-400';
}


$classes .= ' cursor-pointer '
@endphp

<a 
{{ $attributes->merge(['class' => $classes]) }}
    @if($href != null) 
        href="{{ $href }}"  
        wire:navigate 
    @endif
   >
    <div wire:loading.remove wire:target="{{$action}}" class="flex space-x-3">
        {{ $slot }}
    </div>
 

    <x-tabler-loader-2 wire:loading wire:target="{{$action}}" class="animate-spin"/>
</a>