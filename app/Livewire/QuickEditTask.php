<?php

namespace App\Livewire;

use App\Enums\Icon;
use App\Models\Task;
use Livewire\Component;

class QuickEditTask extends Component
{
    public bool $open = false;
    public ?int $task_id = null;
    public ?int $selected_task_id = null;

    public ?string $button_content = null;
    public string $content;
    public string $icon_html;
    public array $suggestions = [];

    public function mount(): void
    {
        $this->setIcon();
    }

    public function setIcon(): void
    {
        if ($this->task_id) {
            $this->icon_html = Icon::getIconHtml(Icon::EDIT);
        } else {
            $this->icon_html = Icon::getIconHtml(Icon::ADD);
        }
    }

    public function updatedContent(): void
    {
        $this->selected_task_id = null;

        $this->loadSuggestions();
    }

    public function loadSuggestions(): void
    {
        $this->suggestions = Task::query()
            ->when(!empty($this->content), fn($q) => $q->where('name', 'like', '%' . $this->content . '%'))
            ->latest()
            ->take(5)
            ->get()
            ->select('id', 'name')
            ->all();
    }

    public function save(): void
    {
        $validated = $this->validate([
            'content' => 'required|min:3',
        ]);

        if ($task = Task::query()->where('user_id', auth()->id())->where('name', $validated['content'])->first()) {

        } else if (!$this->selected_task_id) {
            $task = Task::create([
                'user_id' => auth()->id(),
                'name' => $validated['content'],
            ]);
        } else {
            $task = Task::query()->find($this->selected_task_id);
        }

        $this->selected_task_id = null;

        $this->task_id = $task->id;

        $this->button_content = $task->name;

        $this->content = $task->name;

        $this->suggestions = [];

        $this->setIcon();

        $this->open = false;

        $this->dispatch('taskUpdated', task_id: $this->task_id);
    }


    public function render()
    {
        return view('livewire.quick-edit-task');
    }
}
