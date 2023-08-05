<div>
    <x-form.input wire:model.live="search">
        <x-slot:icon>
            <x-tabler-search />
        </x-slot:icon>
    </x-form.input>


    <div class="rounded-md border ">
        @foreach ($customers as $customer)
            <div class="px-3 py-2  hover:bg-slate-100 border-b cursor-pointer last:border-b-0 rouded-md
                        outline-0
                        focus:border-primary-400 focus:ring focus:ring-primary-200 focus:ring-opacity-50"
                x-on:click="$dispatch('select', {id: {{ $customer->id }}})" wire:key="{{ $customer->id }}"
                @keyup.enter="$dispatch('select', {id: {{ $customer->id }}})" wire:key="{{ $customer->id }}"
                tabindex="0">
                {{ $customer->name }} {{ $customer->email }}
            </div>
        @endforeach
    </div>
</div>
