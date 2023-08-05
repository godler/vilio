<x-layouts.page 
    x-data="{
        addProductModal:false,
        selectCustomerModal: false,
        selectCustomer(id) {
            $wire.setCustomer(id)
            this.selectCustomerModal = false
        },
        addProduct(id) {
            $wire.addProduct(id)
            this.addProductModal = false
        }
    }"
>
    <x-ui.card title="Oferta {{$form->index}}" class="mb-3" no-shadow>
        <x-slot:actions>
            <x-ui.link @click.prevent="selectCustomerModal = true" look="button" >
                Zapisz
            </x-ui.link>
            
        </x-slot:actions>
    </x-ui.card>
       <div class="flex justify-between gap-3">
            <x-pages.offer.form.customer :form="$form"/>           
       </div>
  

       <x-ui.card title="Produkty" no-shadow>
            <x-slot:actions>
                <x-ui.link @click="addProductModal = true" look="outlined">Dodaj produkt</x-ui.link>
            </x-slot:actions>

            <div>
                <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
                    <thead class="bg-gray-50">
                        <tr>
                            <th></th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Nazwa</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Cena</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Ilość</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">VAT</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Suma</th>
                          </tr>
                    </thead>
                    <tbody>
                        @foreach ($form->products as $key => $product)
                        <tr wire:key="{{$key}}">
                            <td  class="px-2 py-3 font-medium text-gray-900">
                                {{$loop->iteration}}
                            </td>
                            <td  class="px-6 py-4 font-medium text-gray-900">
                                <x-form.input wire:model="form.products.{{$key}}.name"/>
                            </td>
                            <td  class="px-6 py-4 font-medium text-gray-900">
                                <x-form.input wire:model="form.products.{{$key}}.price"/>
                            </td>
                            <td  class="px-6 py-4 font-medium text-gray-900">
                                <x-form.input wire:model="form.products.{{$key}}.amount"/>
                            </td>
                            <td  class="px-6 py-4 font-medium text-gray-900">
                                <x-form.input wire:model="form.products.{{$key}}.vat"/>
                            </td>
                        
                            <td  class="px-6 py-4 font-medium text-gray-900">
                                {{$product['total']}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                   
                </table>
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

        <x-ui.modal x-show="addProductModal" 
            @select="addProduct($event.detail.id)" 
            @close="addProductModal = false"
        >
            <livewire:components.product-selector />
        </x-ui.modal>
    </div>
    @endteleport
</x-layouts.page>
