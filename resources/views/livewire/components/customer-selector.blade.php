<div 
>
    <x-form.input wire:model.live="search">
        <x-slot:icon>
            <x-tabler-search/>
        </x-slot:icon>
    </x-form.input>
    

    <div class="rounded-md border ">
        @foreach ($customers as $customer)
           <div  
                class="px-3 py-2  hover:bg-slate-100 border-b cursor-pointer last:border-b-0"
                x-on:click="$dispatch('select', {id: {{$customer->id}}})" wire:key="{{$customer->id}}"
            >
                {{$customer->name}} {{$customer->email}}
            </div>
        @endforeach
    </div>
</div>
