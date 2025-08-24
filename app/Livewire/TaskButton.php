<?php

namespace App\Livewire;

use App\Enums\Icon;

class TaskButton extends IconButton
{
    public bool $showModal = false;

    public function mount(): void
    {
        $this->label = 'Start Task';
        $this->icon_html = Icon::getIconHtml(Icon::ADD);
    }

    public function click(): void
    {
        $this->emit('open');
    }
}
