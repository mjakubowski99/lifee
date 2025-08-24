<?php

namespace App\Livewire\Pomodoro;

use Livewire\Component;

class TaskButton extends Component
{
    public string $label = '';
    public string $icon = 'icon';

    public ?string $task = null;

    public function mount(string $task = null): void
    {
        $this->task = $task;
        $this->label = $this->task ?? 'Add';
    }

    public function render()
    {
        return view('livewire.pomodoro.task-button');
    }

    public function updateOrCreateTask(string $task): void
    {
        $this->task = $task;
        $this->label = $task;
    }
}
