@php use App\Livewire\PomodoroPage; @endphp
<div>


    <nav class="bg-c-background border-b border-c-border/50">
        <div class="max-w-screen-xl mx-auto flex items-center justify-between px-6 py-2 md:py-4">
            <!-- Logo -->
            <a href="#" class="flex items-center space-x-2">
                <span class="font-semibold text-2xl">Focus</span>
            </a>

            <!-- Menu (desktop) -->
            <ul class="hidden md:flex items-center space-x-6 text-gray-100 text-lg">
                <li><a href="#" class="hover:text-c-primary">Pomodoro</a></li>
                <li><a href="#" class="hover:text-c-primary">Tasks</a></li>
                <li><a href="#" class="hover:text-c-primary">Profile</a></li>
            </ul>

            <!-- Hamburger mobile -->
            <button id="hamburger" class="md:hidden p-2 rounded-lg hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>

        <!-- Mobile Menu -->
        <ul id="mobileMenu" class="md:hidden hidden flex-col px-6 pb-4 space-y-3 text-gray-100 text-lg">
            <li><a href="#" class="hover:text-c-primary">Hot</a></li>
            <li><a href="#" class="hover:text-c-primary">Trending</a></li>
            <li><a href="#" class="hover:text-c-primary">Launches</a></li>
        </ul>
    </nav>


    <div class="flex items-center mt-5">
        <div class="mx-auto w-[95%] pt-4">
            <div class="flex justify-center mb-4">
                <div class="w-[90%] md:w-[40%]">
                    <livewire:quick-edit-task/>
                </div>
            </div>
            <div class="flex justify-center gap-2 mb-2">
                <div x-show="$wire.tribe === '{{PomodoroPage::POMODORO}}'">
                    <button wire:click="$js.setTribe('{{PomodoroPage::LONG_BREAK}}')" class="border border-c-primary shadow p-2 md:p-4 rounded hover:bg-c-primary">Long break</button>
                    <button wire:click="$js.setTribe('{{PomodoroPage::SHORT_BREAK}}')"
                            class="border border-c-primary shadow p-2 md:p-4 rounded hover:bg-c-primary">Short break
                    </button>
                </div>

                <div x-show="$wire.tribe !== '{{PomodoroPage::POMODORO}}'">
                    <button wire:click="$js.setTribe('{{PomodoroPage::POMODORO}}')" class="border border-c-primary shadow p-2 md:p-4 rounded hover:bg-c-primary">Pomodoro</button>
                </div>
            </div>

            <div class="flex justify-center mb-6 mt-6">
                <div class="text-center">
                    <div x-show="$wire.tribe === '{{PomodoroPage::POMODORO}}'" class="text-2xl font-semibold text-c-warning flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"/>
                        </svg>
                        Time to Focus
                    </div>

                    <div x-show="$wire.tribe !== '{{PomodoroPage::POMODORO}}'" class="text-2xl font-semibold text-c-success flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        Time for a Break
                    </div>
                </div>
            </div>

            <div class="flex justify-center mb-2 mt-6">
                <livewire:pomodoro.counter :initialTime="25*60"/>
            </div>

            <button x-on:click="$js.playOrPause" class="mx-auto mt-3 flex bg-c-primary rounded px-2 py-4 gap-x-4 hover:bg-blue-600">
                <span x-text="$wire.timer_started ? 'Pause' : 'Play'"></span>
            </button>
        </div>

    </div>
</div>

@script

    <script>
        $js('getTimerColor', function(tribe) {
            switch (tribe) {
                case '{{PomodoroPage::SHORT_BREAK}}':
                    return 'green';
                case '{{PomodoroPage::LONG_BREAK}}':
                    return 'blue';
                default:
                    return 'pink';
            }
        });

        $js('getTribeInitialTime', function(tribe) {
            switch (tribe) {
                case '{{PomodoroPage::SHORT_BREAK}}':
                    return 60 * 5;
                case '{{PomodoroPage::LONG_BREAK}}':
                    return 60 * 15;
                case '{{PomodoroPage::POMODORO}}':
                    return 60 * 25;
            }
        });

        $js('playOrPause', function () {
            Livewire.dispatch('timerToggled');
        });

        $js('setTribe', (tribe) => {
            $wire.tribe = tribe;
            $wire.color = $js.getTimerColor(tribe);

            Livewire.dispatch('setTribe', {
                'color': $wire.color,
                'tribeInitialTime': $js.getTribeInitialTime(tribe)
            });
        });

        Livewire.on('timerStarted', () => {
            $wire.timer_started = true;
        });

        Livewire.on('timerStopped', (props) => {
            $wire.timer_started = false;

            if (props.startedAt && props.stoppedAt) {
                $wire.dispatch('stopTimer', {
                    timer_started_at: props.startedAt,
                    timer_stopped_at: props.stoppedAt
                });
            }
        });

        Livewire.on('timerFinished', (props) => {
            if ($wire.tribe === '{{PomodoroPage::POMODORO}}') {
                $js.setTribe('{{PomodoroPage::SHORT_BREAK}}');
            } else {
                $js.setTribe('{{PomodoroPage::POMODORO}}');
            }

            if (props.startedAt && props.stoppedAt) {
                $wire.dispatch('stopTimer', {
                    timer_started_at: props.startedAt,
                    timer_stopped_at: props.stoppedAt
                });
            }
        });

        const hamburger = document.getElementById('hamburger');
        const mobileMenu = document.getElementById('mobileMenu');

        hamburger.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>
@endscript
