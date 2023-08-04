<x-layouts.page 
    x-data="{
        addProductModal:false,
        selectCustomerModal: false,
        selectCustomer(id) {
            $wire.setCustomer(id)
            this.selectCustomerModal = false
        }
    }"
>
    <x-ui.card title="Oferta {{$form->index}}">
        <x-slot:actions>
            <x-ui.link @click.prevent="selectCustomerModal = true" look="button" >
                Zapisz
            </x-ui.link>
            
        </x-slot:actions>

       <div class="flex justify-between gap-3">
            
            <x-ui.card title="Klient" class="w-1/2 border p-3 rounded-md mb-3" no-shadow>
                <x-slot:actions>
                    <x-ui.link @click.prevent="selectCustomerModal = true" >
                        <x-tabler-dots-vertical />
                    </x-ui.link>
                    
                </x-slot:actions>
                <div class="text-lg font-bold">
                    {{$form->customer?->name}}
                </div>
                @if($form->address)
                <div>
                    <div>
                        {{$form->address->address}}
                    </div>
                    <div>
                        {{$form->address->city}}
                    </div>
                    <div>
                        NIP: {{$form->customer->tax_number}}
                    </div>
                </div>
                @endif
            </x-ui.card>
       </div>

       <div>
            <x-ui.link @click="addProductModal = true" look="button">Dodaj produkt</x-ui.link>
       </div>
    </x-ui.card>

    @teleport('body')
    <div>
        <x-ui.modal 
        x-show="selectCustomerModal"
        title="Wybierz klienta" 
        @close="selectCustomerModal = false"
        @select="selectCustomer($event.detail.id)" 
        >
            <livewire:components.customer-selector />
        </x-ui.modal>

        <x-ui.modal x-show="addProductModal" @close="addProductModal = false">
            <div>Test</div>
        </x-ui.modal>
    </div>


    @endteleport
</x-layouts.page>
