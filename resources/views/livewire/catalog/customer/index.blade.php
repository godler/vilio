<x-layouts.page x-data="{
    isModal: false, 
    showConfirm: false,
    customer_id: null,
    editCustomer(customer_id) {
        this.isModal = true
        $wire.$dispatch('edit-customer', { id: customer_id })
    },
    createNewcustomer() {
        this.isModal = true
        $wire.$dispatch('clear-customer')
    },
    closeModal() {
        this.isModal = false
        $wire.$dispatch('clear-customer')
    },
    confirm(customer_id) {
        this.customer_id = customer_id
        this.showConfirm = true
    },
    closeConfirm() {
        this.customer_id = null
        this.showConfirm = false
    },
    removecustomer() {
        $wire.$dispatch('clear-customer')
        $wire.removeCategory(this.customer_id)
        this.showConfirm = false
    }
    }">

    <x-ui.card title="Klienci">

        <x-slot:actions>
            
                <div class="flex gap-3">
                    <x-form.input wire:model.live="search_name" placeholder="Szukaj" inline>
                        <x-slot:icon>
                            <x-tabler-search/>
                        </x-slot:icon>
                    </x-form.input>
                
                <x-ui.link look="button" @click.prevent="createNewcustomer">
                    Dodaj klienta
                </x-ui.link>
            </div>
        </x-slot:actions>



        @if($customers->count())
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700" wire:key="customers_table">
            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                @foreach ($customers as $customer )
                <tr class="hover:bg-gray-100 dark:hover:bg-gray-700" wire:key="{{$customer->id}}">
                    <td scope="col" class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                        {{$customer->name}}
                    </td>
                    <td scope="col" class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                     
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium flex gap-4 justify-end">
                        <a x-on:click="confirm({{$customer->id}})" class="text-blue-500 hover:text-blue-700 text-right" href="#">
                            <x-tabler-trash class="w-5 h-5"/>
                        </a>
                        <a x-on:click="editCustomer({{$customer->id}})" class="text-blue-500 hover:text-blue-700 text-right" href="#">
                            <x-tabler-pencil class="w-5 h-5"/>
                        </a>
                    </td>
                </tr>
             @endforeach
            </tbody>
        </table>
        @else
            <x-ui.no_data>Brak klientów</x-ui.no_data>
        @endif
    </x-ui.card>

    @teleport('body')
    <x-ui.modal title="Dodaj klienta" x-show="isModal" @close="closeModal"  >
        <livewire:catalog.customer.form />
    </x-ui.modal>


    <x-ui.modal title="Usuń klienta" x-show="showConfirm" @close="closeConfirm"  >
        <div class="flex justify-center gap-3">
            <x-ui.link look="danger" @click="removecustomer">Usuń</x-ui.link>
            <x-ui.link look="outlined" @click="closeConfirm">Anuluj</x-ui.link>
        </div>
    </x-ui.modal>
    @endteleport

</x-layouts.page>
