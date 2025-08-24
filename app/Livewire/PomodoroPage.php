<?php

namespace App\Livewire;

use App\Models\TrackerFrame;
use Carbon\Carbon;
use Livewire\Attributes\On;
use Livewire\Component;

class PomodoroPage extends Component
{
    public const POMODORO = 'Pomodoro';
    public const SHORT_BREAK = 'Short Break';
    public const LONG_BREAK = 'Long Break';

    public ?int $task_id = null;
    public bool $timer_started = false;
    public ?string $timer_started_at;
    public ?string $timer_stopped_at;

    public const TRIBES = [
        self::POMODORO,
        self::SHORT_BREAK,
        self::LONG_BREAK,
    ];

    public const TRIBE_INITIAL_TIME = [
        self::POMODORO => 25 * 60,
        self::SHORT_BREAK => 5 * 60,
        self::LONG_BREAK => 15 * 60,
    ];

    public string $tribe = self::POMODORO;

    public string $color = 'pink';

    public function render()
    {
        return view('livewire.pomodoro-page');
    }

    #[On('taskUpdated')]
    public function updateTaskId(int $task_id): void
    {
        $this->task_id = $task_id;
    }

    #[On('stopTimer')]
    public function saveFrame(string $timer_started_at, string $timer_stopped_at): void
    {
        if (TrackerFrame::query()
            ->where('user_id', auth()->id())
            ->where('started_at', Carbon::parse($timer_started_at))
            ->where('stopped_at', Carbon::parse($timer_stopped_at))
            ->exists()) {
            return;
        }

        TrackerFrame::create([
            'user_id' => auth()->id(),
            'task_id' => $this->task_id,
            'frame_type' => $this->tribe,
            'started_at' => Carbon::parse($timer_started_at),
            'stopped_at' => Carbon::parse($timer_stopped_at),
        ]);
    }
}
