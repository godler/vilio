<x-layouts.page x-data="{
    isModal: false, 
    showConfirm: false,
    product_id: null,
    editProduct(product_id) {
        this.isModal = true
        $wire.$dispatch('edit-product', { id: product_id })
    },
    createNewProduct() {
        this.isModal = true
        $wire.$dispatch('clear-product')
    },
    closeModal() {
        this.isModal = false
        $wire.$dispatch('clear-product')
    },
    confirm(product_id) {
        this.product_id = product_id
        this.showConfirm = true
    },
    closeConfirm() {
        this.product_id = null
        this.showConfirm = false
    },
    removeProduct() {
        $wire.$dispatch('clear-product')
        $wire.removeProduct(this.product_id)
        this.showConfirm = false
    }
    }">

    <x-ui.card title="{{__('messages.products')}}">

        <x-slot:actions>
            <x-ui.link look="button" @click.prevent="createNewProduct">
                {{ __('messages.add').' '.__('messages.product') }}
            </x-ui.link>
        </x-slot:actions>
        <div class="flex gap-3 w-full">
            <x-form.input wire:model.live="search_name" placeholder="Szukaj" class="w-full">
                <x-slot:icon>
                    <x-tabler-search/>
                </x-slot:icon>
            </x-form.input>
            <x-form.select  wire:model.live='category_id' >
                <option value="">Wybierz kategorię</option>
                @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </x-form.select>
          
            
        </div>

        @if($products->count())
        <div class="overflow-y-auto">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700" wire:key="products_table">
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach ($products as $product )
                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-700" wire:key="{{$product->id}}">
                        <td class="w-24">
                            <img src="{{$product->getMedia('attachments')->first()?->getFullUrl()}}" class="w-20"/>
                        </td>
                        <td scope="col" class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                            {{$product->name}}
                        </td>
                        
                        <td scope="col" class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                            {{$product->base_price}}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium flex gap-4 justify-end">
                            <a x-on:click="confirm({{$product->id}})" class="text-blue-500 hover:text-blue-700 text-right" href="#">
                                <x-tabler-trash class="w-5 h-5"/>
                            </a>
                            <a x-on:click="editProduct({{$product->id}})" class="text-blue-500 hover:text-blue-700 text-right" href="#">
                                <x-tabler-pencil class="w-5 h-5"/>
                            </a>
                        </td>
                    </tr>
                 @endforeach
                </tbody>
            </table>
        </div>
        @else
            <x-ui.no_data>Brak produków</x-ui.no_data>
        @endif
    </x-ui.card>
    @teleport('body')
    <x-ui.modal title="Dodaj produkt" x-show="isModal" @close="closeModal"  >
        <livewire:catalog.products.form />
    </x-ui.modal>
    @endteleport

   @teleport('body')
    <x-ui.modal title="Usuń produkt" x-show="showConfirm" @close="closeConfirm"  >
        <div class="flex justify-center gap-3">
            <x-ui.link look="danger" @click="removeProduct">Usuń</x-ui.link>
            <x-ui.link look="outlined" @click="closeConfirm">Anuluj</x-ui.link>
        </div>
    </x-ui.modal>
    @endteleport
</x-layouts.page>
