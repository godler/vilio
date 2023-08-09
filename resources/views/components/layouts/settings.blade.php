<x-layouts.page>
    <div class="flex gap-3">
        <div class="w-1/4">
            <x-ui.card>
                <x-ui.menu>
                    <x-ui.menu.item href="" >Ustawienia</x-ui.menu.item>
                    <x-ui.menu.item href="/template/1" >Szablon</x-ui.menu.item>
                </x-ui.menu>
            </x-ui.card>
        </div>
        <div class="flex-1">
            <x-ui.card>
                {{ $slot }}
            </x-ui.card>
        </div>
    </div>
</x-layouts.page>
