<?php

namespace App\Livewire\Media;

use Livewire\Component;

class Editable extends Component
{
    public $media;

    public $name;

    public function mount($media)
    {
        $this->media = $media;

        $this->name = $media->name;
    }

    public function removeMedia()
    {
        $this->media->delete();
        $this->media = null;
        $this->dispatch('media-removed');
    }

    public function save()
    {
        $this->media->name = $this->name;
        $this->media->save();
    }

    public function render()
    {
        return view('livewire.media.editable');
    }
}
