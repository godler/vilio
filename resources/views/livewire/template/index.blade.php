<x-layouts.page>
    <x-ui.card title="Szablony">
        @foreach ($templates as $template)
            <div>
                {{$template->name}}
            </div>
        @endforeach
    </x-ui.card>

</x-layouts.page>
