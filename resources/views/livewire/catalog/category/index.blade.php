<x-layouts.page x-data="{
    isModal: false, 
    showConfirm: false,
    category_id: null,
    editcategory(category_id) {
        this.isModal = true
        $wire.$dispatch('edit-category', { id: category_id })
    },
    createNewcategory() {
        this.isModal = true
        $wire.$dispatch('clear-category')
    },
    closeModal() {
        this.isModal = false
        $wire.$dispatch('clear-category')
    },
    confirm(category_id) {
        this.category_id = category_id
        this.showConfirm = true
    },
    closeConfirm() {
        this.category_id = null
        this.showConfirm = false
    },
    removecategory() {
        $wire.$dispatch('clear-category')
        $wire.removeCategory(this.category_id)
        this.showConfirm = false
    }
    }">

    <x-ui.card title="Kategorie produktów">

        <x-slot:actions>
            <x-ui.link look="button" @click.prevent="createNewcategory">
                Dodaj kategorię
            </x-ui.link>
        </x-slot:actions>

        @if($categories->count())
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700" wire:key="categorys_table">
            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                @foreach ($categories as $category )
                <tr class="hover:bg-gray-100 dark:hover:bg-gray-700" wire:key="{{$category->id}}">
                    <td scope="col" class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                        {{$category->name}}
                    </td>
                    <td scope="col" class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                     
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium flex gap-4 justify-end">
                        <a x-on:click="confirm({{$category->id}})" class="text-blue-500 hover:text-blue-700 text-right" href="#">
                            <x-tabler-trash class="w-5 h-5"/>
                        </a>
                        <a x-on:click="editcategory({{$category->id}})" class="text-blue-500 hover:text-blue-700 text-right" href="#">
                            <x-tabler-pencil class="w-5 h-5"/>
                        </a>
                    </td>
                </tr>
             @endforeach
            </tbody>
        </table>
        @else
            <x-ui.no_data>Brak produków</x-ui.no_data>
        @endif
    </x-ui.card>
    <x-ui.modal title="Dodaj produkt" x-show="isModal" @close="closeModal"  >
        <livewire:catalog.category.form />
    </x-ui.modal>

    <x-ui.modal title="Usuń kategorię" x-show="showConfirm" @close="closeConfirm"  >
        <div class="flex justify-center gap-3">
            <x-ui.link look="danger" @click="removecategory">Usuń</x-ui.link>
            <x-ui.link look="outlined" @click="closeConfirm">Anuluj</x-ui.link>
        </div>
    </x-ui.modal>

</x-layouts.page>
