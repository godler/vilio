<x-layouts.settings>

        @foreach ($templates as $template)
            <div>
                <x-ui.link href="{{route('settings.template.editor', ['id' => $template->id])}}">
                    {{$template->name}}
                </x-ui.link>
            </div>
        @endforeach
   

</x-layouts.settings>
