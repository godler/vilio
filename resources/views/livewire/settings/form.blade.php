<x-layouts.settings>
   <div>
      <h1 class="mb-3 text-lg">Ustawienia</h1>
   </div>

   <div>
      <form wire:submit="save">
         <div>
            <x-form.input wire:model="company_name" label="Nazwa firmy"/>
            <div class="md:flex space-x-3">
               <x-form.input wire:model="address" label="Adres" class="w-full"/>
               <x-form.input wire:model="city" label="Miejscowość" class="w-full"/>
               <x-form.input wire:model="post_code" label="Kod pocztowy" class="w-full md:w-1/4"/>
            </div>
            <x-form.input wire:model="tax_number" label="NIP"/>
            <x-form.button>
               Zapisz
            </x-form.button>
         </div>
      </form>
   </div>
</x-layouts.settings>
