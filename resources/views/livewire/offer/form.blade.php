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
    <x-ui.card title="Oferta {{$form->index}}" class="mb-3" >
        <x-slot:actions>
           <div class=" flex items-center gap-3 ">

            @if($form->offer)
            <x-ui.link look="outlined" class="mb-0" wire:click="generatePreview">
                <x-tabler-send class="w-5 h-5"/> 
                <div>
                    Wyślij ofertę
                </div>
            </x-ui.link>

            @endif
            
            <x-ui.link look="outlined" class="mb-0" wire:click="generatePreview">
                <x-tabler-eye class="w-5 h-5"/>
            </x-ui.link>
            
            <x-ui.link wire:click="saveOffer" look="button"   >
                <div class="flex">
                    <x-tabler-alert-triangle wire:dirty  wire:loading.remove class="w-5 h-5 mr-2"/>
                    <x-tabler-loader-2  wire:loading wire:target="saveOffer" class="animate-spin w-5 h-5 mr-2"/>
                    Zapisz
                </div>
            </x-ui.link>
           </div>
        </x-slot:actions>
        
        <div class="flex  flex-col md:flex-row justify-between md:space-x-3">
            <x-ui.card no-shadow title="Klient" class="md:w-1/3">
                <x-slot:actions>
                    <x-tabler-dots-vertical @click.prevent="selectCustomerModal = true" 
                    class="w-5 h-5 text-slate-500 cursor-pointer right-0 hover:text-slate-800"
                     />
                </x-slot:actions>
                <x-pages.offer.form.customer :form="$form"/>
            </x-ui.card>
            <x-ui.card no-shadow class="flex-1">
                <x-form.input wire:model="form.expire_date" type="date" label="Data obowiązywania" />
                <x-form.switch wire:model="form.hide_prices" attribute="form.hide_prices" type="date" label="Ukryj ceny poszczególnych produktów" />
            </x-ui.card>
       </div>
    </x-ui.card>

      
  

       <x-ui.card title="Produkty" class="mb-3">
            <x-slot:actions>
                <x-ui.link @click="addProductModal = true" look="outlined">Dodaj produkt</x-ui.link>
            </x-slot:actions>

            <div class="max=w-full overflow-y-auto">
                <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Nazwa</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Cena sprzedaży (netto)</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Ilość</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Jednostka</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">VAT</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Netto</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Brutto</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900 text-right">Akcje</th>
                          </tr>
                    </thead>
                    <tbody>
                        @foreach ($form->products as $key => $product)
                        <tr wire:key="{{$key}}" class="">
                           <td  class="font-medium text-gray-900 px-2 min-w-[200px]">
                                <x-form.input wire:model="form.products.{{$key}}.name"  no-border/>
                            </td>
                            
                            <td  class="font-medium text-gray-900 w-28 px-2">
                                <x-form.input wire:model.live="form.products.{{$key}}.price" no-border/>
                            </td>
                            <td  class="font-medium text-gray-900 w-28 px-2">
                                <x-form.input type="number" wire:model.live="form.products.{{$key}}.amount" no-border/>
                            </td>
                            <td  class="font-medium text-gray-900 w-28 px-2">
                                {{$product['unit']}}
                            </td>
                            <td  class="font-medium text-gray-900 w-28 px-2">
                                <x-form.input wire:model.live="form.products.{{$key}}.vat" no-border/>
                            </td>
                        
                            <td  class="font-medium text-gray-900 text-right px-4">
                                {{$product['total']}} PLN
                            </td>
                            <td  class="font-medium text-gray-900 text-right px-4">
                                {{$product['gross']}} PLN
                            </td>
                            <td class="" >
                                <div class="flex space-x-3 w-full justify-end px-3">
                                    <x-form.toggle wire:model="form.products.{{$key}}.hidden" attribute="form.products.{{$key}}.hidden">
                                        <x-slot:on>
                                            <x-tabler-eye-off class="w-4 h-4"/>
                                        </x-slot:on>
                                        <x-slot:off>
                                            <x-tabler-eye class="w-4 h-4"/>
                                        </x-slot:off>
                                    </x-form.toggle>
                                    <x-tabler-trash class="w-5 h-5 hover:text-slate-500 cursor-pointer" wire:click="removeProduct({{$key}})"/>
                                </div>
                            </td>
                            
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="5" class="text-2xl text-bold text-black p-3 text-right">Suma: </td>
                            <td  class="text-2xl text-bold text-black text-right px-4">{{$total}} PLN</td>
                            <td  class="text-2xl text-bold text-black text-right px-4">{{$gross_total}} PLN</td>
                            <td></td>
                        </tr>
                    </tbody>
                   
                </table>
            </div>
       </x-ui.card>

       <x-ui.card class="mb-3">
        <x-form.trix  
            :value="$form->description" 
            attribute="form.description" 
            @input="$wire.set('form.description', $event.target.value, false)"
            label="Opis" />
       </x-ui.card>

       <x-ui.card title="Załączniki">
            @foreach ($form->attachments as $attachment)
                <div class="flex gap-3 items-center mb-3">
                    <x-ui.media-thumb :media="$attachment"/> {{$attachment->name}}
                </div> 
            @endforeach
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

        @if($preview)
        <x-ui.modal 
       
            @close="$wire.hidePreview()"
            max-width="7xl"
        >
            <x-slot:actions>
                <a 
                    href="{{route('offer.preview', ['id' => $form->offer->id, 'print'=>true ]) }}"
                    target="blank"
                    >
                    <x-tabler-printer class="mr-3 color-satle-500"  />
                </a>
            </x-slot:actions>

            <iframe 
                src="{{route('offer.preview', ['id' => $form->offer->id ]) }}"
                class="w-full min-h-[500px]"
                height="100%" width="100%"
                ></iframe>
        </x-ui.modal>
        @endif
    </div>
    @endteleport
</x-layouts.page>
