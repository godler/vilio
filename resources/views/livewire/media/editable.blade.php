<div>
    @if ($media)
        <div class="flex w-full gap-3 items-center border-b last:border-0 mb-3 last:mb-0">
            <x-ui.media-thumb :media="$media" />
            <div class="flex-1">
                <x-form.input no-border wire:model="name" />
            </div>
            <div>
                <x-tabler-device-floppy wire:dirty wire:click="save"
                    class="w-5 h-5 cursor-pointer hover:text-slate-500" />
            </div>
            <div>
                <x-tabler-trash wire:click="removeMedia" class="w-5 h-5 cursor-pointer hover:text-slate-500" />
            </div>
        </div>
    @endif
</div>
