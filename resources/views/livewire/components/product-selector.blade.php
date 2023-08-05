<div 
>
    <x-form.input wire:model.live="search">
        <x-slot:icon>
            <x-tabler-search/>
        </x-slot:icon>
    </x-form.input>
    

    <div class="rounded-md border ">
        @foreach ($products as $product)
           <div  
                class="px-3 py-2  
                        rounded-md
                        hover:bg-slate-100 border-b cursor-pointer last:border-b-0 
                        outline-0
                        focus:border-primary-400 focus:ring focus:ring-primary-200 focus:ring-opacity-50
                        "
                @keyup.enter="$dispatch('select', {id: {{$product->id}}})" wire:key="{{$product->id}}"
                x-on:click="$dispatch('select', {id: {{$product->id}}})" wire:key="{{$product->id}}"
                tabindex="0"
            >
                {{$product->name}} {{$product->email}}
            </div>
        @endforeach
    </div>
</div>
