<form wire:submit="submit" class="w-full">
    <x-form.input wire:model="form.name" name="form.name" label="Nazwa"/>

    <div class="flex justify-between align-top gap-3" >
        <x-form.input wire:model="form.base_price" name="form.base_price" label="Cena" class="flex-1"/>

        @if($units)
        <x-form.select wire:model="form.unit_id" name="form.unit_id" label="Jednostka">
                <option >Wybierz</option>
                @foreach($units as $unit)
                    <option value="{{$unit->id}}">{{ $unit->name }}</option>
                @endforeach
        </x-form.select>
        @endif
    </div>
    <x-form.input type="textarea" wire:model="form.description" name="form.description" label="Opis" />

    @if($categories)
    <x-form.select wire:model="form.category_id" name="form.category_id" label="Kategoria">
            <option >Wybierz</option>
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{ $category->name }}</option>
            @endforeach
    </x-form.select>
    @endif

    <div class="mb-2 grid grid-cols-3 gap-3 max-w-full p-2 border rounded-md">
        @if($form->product)
        @foreach ($form->product->getMedia('attachments') as $media)
            <div class="">
                @if($media->type === 'video')
                <video width="320" height="240" controls>
                    <source src="{{$media->getFullUrl()}}" type="video/mp4">
                   
                    Your browser does not support the video tag.
                  </video>
                @else
                {{$media}}
                @endif
            </div>
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
 
       

