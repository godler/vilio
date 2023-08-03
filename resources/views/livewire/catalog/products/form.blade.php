<form wire:submit="submit" class="w-full">

    <div class="flex gap-3">
        <x-form.input wire:model="form.name" name="form.name" label="Nazwa" class="flex-1" />
        <x-form.input wire:model="form.index" name="form.index" label="Index" class="w-1/4" />
    </div>

    <div class="flex justify-between align-top gap-3">
        <x-form.input wire:model="form.base_price" name="form.base_price" label="Cena" class="flex-1" />

        @if ($units)
            <x-form.select wire:model="form.unit_id" name="form.unit_id" label="Jednostka">
                <option>Wybierz</option>
                @foreach ($units as $unit)
                    <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                @endforeach
            </x-form.select>
        @endif
    </div>
    
    <x-form.trix  
        :value="$form->description" 
        attribute="form.description" 
        @input="$wire.set('form.description', $event.target.value, false)"
        label="Opis" />
  
    @if ($categories)
        <x-form.select wire:model="form.category_id" name="form.category_id" label="Kategoria">
            <option>Wybierz</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </x-form.select>
    @endif

    <div class="mb-2 grid grid-cols-7 gap-3 max-w-full p-2 border rounded-md">
        @if ($form->product)
            @foreach ($form->product->getMedia('attachments') as $media)
                <x-ui.media-thumb :media="$media" removable  @remove="$wire.removeAttachment($event.detail.id)"/>
            @endforeach
        @endif
    </div>

    <div>
        <x-form.fileupload wire:model="form.files" name="form.files" multiple />
    </div>

    <x-form.button wire:click="$dispatch('submit-contact-form')">
        Zapisz
    </x-form.button>

</form>
