<?php

namespace App\Livewire;

use Livewire\Component;

class Homepage extends Component
{
    public $navigationCards;

    public function mount()
    {
        $this->navigationCards = [
            [
                'icon' => 'check-square',
                'title' => 'Zadania',
                'subtitle' => 'Organizuj swoje codzienne obowiązki',
                'color' => 'teal',
                'route' => 'tasks.index'
            ],
//            [
//                'icon' => 'calendar',
//                'title' => 'Kalendarz',
//                'subtitle' => 'Planuj swój dzień i tygodień',
//                'color' => 'blue',
//                'route' => 'calendar.index'
//            ],
            [
                'icon' => 'clock',
                'title' => 'Timer Focus',
                'subtitle' => 'Technika Pomodoro i zarządzanie czasem',
                'color' => 'indigo',
                'route' => 'pomodoro.timer'
            ],
//            [
//                'icon' => 'target',
//                'title' => 'Cele',
//                'subtitle' => 'Wyznaczaj i śledź swoje cele',
//                'color' => 'purple',
//                'route' => 'goals.index'
//            ],
//            [
//                'icon' => 'bell',
//                'title' => 'Przypomnienia',
//                'subtitle' => 'Nie zapomnij o ważnych rzeczach',
//                'color' => 'yellow',
//                'route' => 'reminders.index'
//            ],
//            [
//                'icon' => 'trending-up',
//                'title' => 'Postępy',
//                'subtitle' => 'Analizuj swoje osiągnięcia',
//                'color' => 'indigo',
//                'route' => 'progress.index'
//            ],
//            [
//                'icon' => 'book-open',
//                'title' => 'Notatki',
//                'subtitle' => 'Zapisuj pomysły i myśli',
//                'color' => 'teal',
//                'route' => 'notes.index'
//            ],
//            [
//                'icon' => 'heart',
//                'title' => 'Samopoczucie',
//                'subtitle' => 'Śledź swój nastrój i energię',
//                'color' => 'pink',
//                'route' => 'wellbeing.index'
//            ],
//            [
//                'icon' => 'brain',
//                'title' => 'Ćwiczenia',
//                'subtitle' => 'Treningi koncentracji i uwagi',
//                'color' => 'emerald',
//                'route' => 'exercises.index'
//            ],
//            [
//                'icon' => 'settings',
//                'title' => 'Ustawienia',
//                'subtitle' => 'Personalizuj aplikację',
//                'color' => 'red',
//                'route' => 'settings.index'
//            ]
        ];
    }

    public function navigateTo($route)
    {
        $this->dispatch('card-clicked', route: $route);
        return redirect()->route($route);
    }

    public function render()
    {
        return view('livewire.homepage');
    }
}
