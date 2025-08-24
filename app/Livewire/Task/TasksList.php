<?php

namespace App\Livewire\Task;

use Livewire\Component;

class TasksList extends Component
{
    public array $tasks = [
        ['id' => 1, 'name' => 'Clean room'],
        ['id' => 2, 'name' => 'Do laundry'],
        ['id' => 3, 'name' => 'Buy groceries'],
        ['id' => 4, 'name' => 'Prepare dinner'],
        ['id' => 5, 'name' => 'Read a book'],
        ['id' => 6, 'name' => 'Exercise'],
        ['id' => 7, 'name' => 'Call mom'],
        ['id' => 8, 'name' => 'Finish project'],
        ['id' => 9, 'name' => 'Attend meeting'],
        ['id' => 10, 'name' => 'Plan vacation'],
    ];

    public function render()
    {
        return view('livewire.task.tasks-list');
    }
}
