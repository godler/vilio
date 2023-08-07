<form wire:submit="submit" class="w-full"
x-data="{ uploading: false, progress: 0 }"
x-on:livewire-upload-start="uploading = true"
x-on:livewire-upload-finish="uploading = false"
x-on:livewire-upload-error="uploading = false"
x-on:livewire-upload-progress="progress = $event.detail.progress"
>

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

    <div>
        <div class="block text-sm font-medium mb-1 text-slate-700 dark:text-white bg-white px-2">
            Załączniki
         </div>
        <div class="mb-2  max-w-full p-2 border rounded-md">
            
            @if ($form->product)
                @foreach ($form->product->getMedia('attachments') as $key => $media)
                   <livewire:media.editable :media="$media" @media-removed="console.log('removed')"/>
                @endforeach
            @endif
        </div>
    </div>

    <div>
        <x-form.fileupload  x-show="!uploading" wire:model="form.files" name="form.files" multiple />
        <div x-show="uploading" class="mb-3">
            <div class="flex w-full h-4 bg-gray-200 rounded-full overflow-hidden dark:bg-gray-700">
                <div class="flex flex-col justify-center overflow-hidden bg-blue-500 text-xs text-white text-center" 
                role="progressbar"  
                :style="{  width: progress+'%' }"
               aria-valuenow="57" aria-valuemin="0" aria-valuemax="100" x-text="progress"></div>
              </div>
        </div>
    </div>

    <x-form.button wire:click="$dispatch('submit-contact-form')">
        <x-tabler-alert-triangle wire:dirty class="w-5 h-5"/> Zapisz
    </x-form.button>

</form>
