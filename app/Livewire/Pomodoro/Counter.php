<?php

namespace App\Livewire\Pomodoro;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class Counter extends Component
{
    public const AVAILABLE_COLORS = [
        'pink' => [
            'stop1' => '#FF66BB',
            'stop2' => '#EB0083',
            'stop3' => '#EB0083',
        ],
        'green' => [
            'stop1' => '#66BB6A',
            'stop2' => '#00C853',
            'stop3' => '#00C853',
        ],
        'blue' => [
            'stop1' => '#42A5F5',
            'stop2' => '#2962FF',
            'stop3' => '#2962FF',
        ]
    ];

    public int $initialTime;

    public string $color;

    public array $colors = [];

    public function mount($initialTime = 60*15, $color = 'pink'): void
    {
        $this->initialTime = $initialTime;
        $this->color = $color;
        $this->colors = self::AVAILABLE_COLORS[$color] ?? self::AVAILABLE_COLORS['pink'];
    }

    public function render(): View
    {
        return view('livewire.pomodoro.counter');
    }
}
