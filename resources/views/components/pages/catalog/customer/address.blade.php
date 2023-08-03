@props(['key' => 0])

<div class="border rounded-md mb-3 px-3 py-4 last:mb-0  relative">
    <x-tabler-x wire:click="removeAddress({{$key}})" 
        class="absolute cursor-pointer hover:bg-blue-600 hover:text-white -top-2 -right-1  p-1 rounded-full bg-white border shadow" 
        />
    <x-form.input wire:model="form.addresses.{{$key}}.address" name="form.addresses.{{$key}}.address" label="Adres" />
    <div class="flex gap-3">
        <x-form.input wire:model="form.addresses.{{$key}}.city" name="form.addresses.{{$key}}.city" class="w-2/3" label="Miejscowość" />
        <x-form.input wire:model="form.addresses.{{$key}}.post_code" name="form.addresses.{{$key}}.post_code" label="Kod pocztowy" />
    </div>
</div>