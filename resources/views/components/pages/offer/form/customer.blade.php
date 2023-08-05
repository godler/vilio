<x-ui.card title="Klient" class="w-1/2 border p-3 rounded-md mb-3" no-shadow>
    <x-slot:actions>
        <x-ui.link @click.prevent="selectCustomerModal = true" >
            <x-tabler-dots-vertical />
        </x-ui.link>
        
    </x-slot:actions>
    @if($form->customer)
    <div class="text-lg font-bold">
        {{$form->customer?->name}}
    </div>
    @if($form->address)
    <div>
        <div>
            {{$form->address->address}}
        </div>
        <div>
            {{$form->address->post_code}} {{$form->address->city}} 
        </div>
        @if ($form->customer->is_company)
        <div>
            <b>NIP:</b> {{$form->customer->tax_number}}
        </div>
        @endif
    </div>
    @endif

    @else
        
        <x-ui.link  @click.prevent="selectCustomerModal = true" look="outlined" >
            Wybierz klienta 
        </x-ui.link>
    @endif
</x-ui.card>