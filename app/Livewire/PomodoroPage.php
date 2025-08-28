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

    public const PINK = 'pink';
    public const GREEN = 'green';
    public const BLUE = 'blue';

    public ?int $task_id = null;
    public bool $timerStarted = false;

    public ?string $timer_started_at;
    public ?string $timer_stopped_at;

    public const TRIBES = [
        self::POMODORO,
        self::SHORT_BREAK,
        self::LONG_BREAK,
    ];

    public const TRIBE_COLORS = [
        self::POMODORO => self::PINK,
        self::SHORT_BREAK => self::GREEN,
        self::LONG_BREAK => self::BLUE,
    ];

    public const TRIBE_INITIAL_TIMES = [
        self::POMODORO => 25 * 60,
        self::SHORT_BREAK => 5 * 60,
        self::LONG_BREAK => 15 * 60,
    ];

    public string $tribe = self::POMODORO;

    public string $color = self::TRIBE_COLORS[self::POMODORO];

    public int $initialTime = self::TRIBE_INITIAL_TIMES[self::POMODORO];

    public function render()
    {
        return view('livewire.pomodoro-page');
    }

    #[On('taskUpdated')]
    public function updateTaskId(int $task_id): void
    {
        $this->task_id = $task_id;
    }

    public function saveFrame(?string $timer_started_at, ?string $timer_stopped_at): void
    {
        if (!$timer_stopped_at || !$timer_started_at) {
            return;
        }

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
