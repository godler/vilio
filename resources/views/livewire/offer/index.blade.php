<x-layouts.page x-data="{
 
   showConfirm: false,

   confirm(offer_id) {
       this.offer_id = offer_id
       this.showConfirm = true
   },
   closeConfirm() {
       this.offer_id = null
       this.showConfirm = false
   },
   removeProduct() {
       $wire.$dispatch('clear-offer')
       $wire.removeProduct(this.offer_id)
       this.showConfirm = false
   }
   }">

   <x-ui.card title="Oferty">

       <x-slot:actions>
           <x-ui.link look="button" :href="route('offer.create')">
               Dodaj ofertę
           </x-ui.link>
       </x-slot:actions>
       <div class="flex gap-3 w-full">
           <x-form.input wire:model.live="search_name" placeholder="Szukaj" class="w-full">
               <x-slot:icon>
                   <x-tabler-search/>
               </x-slot:icon>
           </x-form.input>
   
       </div>

       @if($offers->count())
       <div class="overflow-y-auto">
           <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700" wire:key="offers_table">
               <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                   @foreach ($offers as $offer )
                   <tr class="hover:bg-gray-100 dark:hover:bg-gray-700" wire:key="{{$offer->id}}">
      
                       <td scope="col" class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                           <a href="{{route('offer.edit', ['offer'=>$offer->id])}}" wire:navigate>
                                {{$offer->index}}
                           </a>
                       </td>
                       
                       <td scope="col" class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                           {{$offer->base_price}}
                       </td>
                       <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium flex gap-4 justify-end">
                           <a x-on:click="confirm({{$offer->id}})" class="text-blue-500 hover:text-blue-700 text-right" href="#">
                               <x-tabler-trash class="w-5 h-5"/>
                           </a>
                           <a x-on:click="editProduct({{$offer->id}})" class="text-blue-500 hover:text-blue-700 text-right" href="#">
                               <x-tabler-pencil class="w-5 h-5"/>
                           </a>
                       </td>
                   </tr>
                @endforeach
               </tbody>
           </table>
       </div>
       @else
           <x-ui.no_data>Brak ofert</x-ui.no_data>
       @endif
   </x-ui.card>
  

  @teleport('body')
   <x-ui.modal title="Usuń ofertę" x-show="showConfirm" @close="closeConfirm"  >
       <div class="flex justify-center gap-3">
           <x-ui.link look="danger" @click="removeProduct">Usuń</x-ui.link>
           <x-ui.link look="outlined" @click="closeConfirm">Anuluj</x-ui.link>
       </div>
   </x-ui.modal>
   @endteleport
</x-layouts.page>
