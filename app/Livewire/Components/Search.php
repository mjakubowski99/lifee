<?php

namespace App\Livewire\Components;

use App\Enums\Icon;
use Livewire\Component;

class Search extends Component
{
    public $label = 'Search';
    public $placeholder = 'Search';
    public bool $required = true;
    public $icon = '';

    public function mount()
    {
        $this->icon = Icon::getIconHtml(Icon::SEARCH);
    }

    public function render()
    {
        return <<<'HTML'
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    {!! $icon !!}
                </div>
                <input type="search" id="default-search"
                       class="block w-full p-4 pl-10 pr-24 text-sm text-c-text rounded-lg bg-c-surface focus:ring-1 focus:ring-c-primary focus:outline-none"
                       placeholder="{{$placeholder}}"
                       @if($required) required @endif
                />
                <button type="submit"
                        class="text-white absolute top-2.5 right-2.5 bottom-2.5 bg-c-primary rounded p-2 flex items-center hover:bg-blue-600 focus:ring-1 focus:outline-none focus:ring-blue-300">
                    {{$label}}
                </button>
           </div>
        HTML;
    }
}
