<?php

namespace App\Livewire\Template;

use App\Models\Template;
use Livewire\Component;

class Editor extends Component
{
    public $rules = [
        'content' => ['string']
    ];

    public $content = '';

    public $styles = '';

    public ?Template $template = null;

    public function save($content, $styles )
    {
        if(!$this->template) {
            $this->template = new Template();
            $this->template->name = 'Template';
        }
        
        $this->template->content = $this->parseData($content);
        $this->template->styles =  $this->parseData($styles);

        $this->template->save();
    }

    public function mount($id = null)
    {
        if($id && $id !== 'add') {
            $this->template = Template::find($id);
            $this->content = $this->template->content;
            $this->styles = $this->template->styles;
        }
    }

    private function parseData($data)
    {
        return  strip_tags($data, ['div', 'table','tbody','thead', 'tr', 'td', 'th', 
                                    'ul', 'ol', 'li', 'a', 'br', 'hr',
                                    'main', 'code', 'pre', 'span', 'p', 'i', 
                                     'style', 'html', 'body', 'head', '!DOCTYPE', 'title', 'nav',
                                      'svg', 'img', 'button', 'path', 'g',
                                     'h1', 'h2', 'h3', 'h4', 'h5', 'h6']);
    }


    public function render()
    {

        return view('livewire.template.editor');
    }
}
