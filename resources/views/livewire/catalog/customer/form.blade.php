<form wire:submit="submit" class="w-full">
    <x-form.input wire:model="form.name" name="form.name" label="Imię i Nazwisko / Nazwa Firmy"/>
    <x-form.input wire:model="form.phone_number" name="form.phone_number" label="Telefon"/>
    <x-form.input wire:model="form.email" name="form.email" label="Email"/>
    <x-form.input wire:model="form.notes" name="form.notes" label="Notatki" type="textarea"/>

    <div class="flex justify-between align-bottom gap-3">

        <div class="mt-8 mb-5">
            <x-form.switch wire:model="form.is_company" attribute="form.is_company" label="Firma"  />
        </div>
   
        <x-form.input x-show="$wire.form.is_company" wire:model="form.tax_number" name="form.tax_number" label="NIP" class="flex-1 mb-0"/>
    </div>
    
    <div class="mb-3 ">
        @foreach ($form->addresses as $key => $address)
           <x-pages.catalog.customer.address :key="$key"/>
        @endforeach
            
        <div>
            <x-ui.link look="button" size="sm" wire:click="addAddress" action="addAddress">Dodaj adres</x-ui.link>
        </div>
    </div>
    
    
    <div class="flex justify-end border-t pt-3">
        <x-form.button action="submit">
            Zapisz
        </x-form.button>
    </div>
</form>
 
       

