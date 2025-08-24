<?php

namespace App\Livewire;

use Livewire\Component;

class IconButton extends Component
{
    public string $name;
    public string $label;
    public ?string $icon_html;

    public function render(): string
    {
        return <<<'HTML'
            <button @click="$dispatch('button-clicked:{{$name}}')" class="flex bg-c-primary rounded p-2 gap-x-4 hover:bg-blue-600">
               <span>{{$label}}</span>
               <span>
                   {!!$icon_html!!}
               </span>
           </button>
        HTML;
    }
}
