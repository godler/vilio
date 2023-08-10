<x-layouts.page>
    <div class="flex gap-3">
        <div class="w-1/4">
            <x-ui.card>
               <x-pages.settings.menu/>
            </x-ui.card>
        </div>
        <div class="flex-1">
            <x-ui.card>
                {{ $slot }}
            </x-ui.card>
        </div>
    </div>
</x-layouts.page>
