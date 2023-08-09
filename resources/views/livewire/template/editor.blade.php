
    <div class=" flex flex-col flex-1 min-h-full w-3/4 mx-auto p-3 bg-slate-50  " x-data="{
        tab: 'code',
        save() {
            $wire.save(editor.doc.getValue(),styles.doc.getValue())
             
        }
    }"
    @keydown.ctrl.s.stop.prevent="save"
    wire:ignore>
        <div class="p-2  flex justify-between items-center mx-auto w-full text-right  ">
            <div class="flex gap-3 cursor-pointer">
                <div x-on:click="tab = 'code' " :class="{'border-b-2 border-purple-500': tab === 'code'}">Code</div>
                <div x-on:click="tab = 'css' " :class="{'border-b-2 border-purple-500': tab === 'css'}">Css</div>
            </div>
            <x-ui.link look="button" @click="save">
                <x-tabler-loader-2 wire:loading wire:target="save" class="animate-spin w-4 h-4"/>
                Zapisz
            </x-ui.link>
        </div>
        <div x-show="tab === 'code'" class="flex flex-col flex-1 min-h-full w-full mx-auto rounded-md overflow-hidden mb-3">
            <textarea  id="editor" class="min-h-full" >{{$content}}</textarea>
        </div>
        <div x-show="tab === 'css'" class="flex flex-col flex-1 min-h-full w-full mx-auto rounded-md overflow-hidden mb-3">
            <textarea  id="styles" class="min-h-full" >{{$styles}}</textarea>
        </div>
    </div>
