@php use App\Livewire\PomodoroPage; @endphp
<div>
    <nav class="relative overflow-hidden backdrop-blur-sm border-b" style="background: linear-gradient(90deg, rgba(42, 42, 64, 0.8) 0%, rgba(38, 38, 38, 0.7) 100%); border-color: hsl(227,54%,33%)">
        <div class="mx-auto flex items-center justify-between px-6 py-6">
            <!-- Logo -->
            <a class="flex items-center space-x-4" href="/homepage">
                <div class="p-1 rounded-full" style="background: linear-gradient(135deg, #6C77FF 0%, #9ABCFF 100%)">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2a3 3 0 0 0-3 3c0 1.5-.5 2.5-1.5 3.5C6.5 9.5 6 10.5 6 12s.5 2.5 1.5 3.5c1 1 1.5 2 1.5 3.5a3 3 0 0 0 6 0c0-1.5.5-2.5 1.5-3.5c1-1 1.5-2 1.5-3.5s-.5-2.5-1.5-3.5C14.5 7.5 14 6.5 14 5a3 3 0 0 0-2-3z"/>
                        <path d="M12 16v-4"/>
                        <path d="M8 12h8"/>
                    </svg>
                </div>
                <h1 class="text-2xl font-bold"
                    style="background: linear-gradient(135deg, #6C77FF 0%, #9ABCFF 100%);
                       -webkit-background-clip: text;
                       background-clip: text;
                       -webkit-text-fill-color: transparent;
                       color: transparent;">
                    Daily focus
                </h1>
            </a>

            <!-- Menu (desktop) -->
            <ul class="hidden md:flex items-center space-x-6 text-gray-100 text-lg mr-2">
                <li><a href="#" class="hover:text-c-primary font-bold">Pomodoro</a></li>
                <li><a href="#" class="hover:text-c-primary font-bold">Tasks</a></li>
                <li><a href="#" class="hover:text-c-primary font-bold">Profile</a></li>
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
                <livewire:pomodoro.counter :initialTime="$initialTime"/>
            </div>

            <button
                x-on:click="$wire.dispatch('timerToggled')"
                :class="{'animate-bounce-custom': !$wire.timerStarted}"
                class="timer-button mx-auto mt-6 flex rounded px-4 py-4 transition-all duration-300 transform relative overflow-hidden group"
                style="background: linear-gradient(135deg, #545CFF 0%, #7A8CFF 100%);"
            >
                <!-- Animowany efekt tła (tylko gdy nie started) -->
                <div x-show="!$wire.timerStarted" class="absolute inset-0 bg-gradient-to-r from-white/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 animate-pulse"></div>

                <!-- Pulsujące kółko (tylko gdy nie started) -->
                <div x-show="!$wire.timerStarted" class="absolute -inset-1 bg-gradient-to-r from-blue-400 to-purple-400 rounded opacity-20 blur-sm animate-ping group-hover:animate-pulse"></div>

                <!-- Tekst z ikoną -->
                <div class="relative z-10 flex items-center">
                    <div class="play-pause-icon">
                        <svg x-show="!$wire.timerStarted" class="w-8 h-8 text-white transition-transform duration-200" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M8 5v14l11-7z"/>
                        </svg>
                        <svg x-show="$wire.timerStarted" class="w-8 h-8 text-white transition-transform duration-200" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/>
                        </svg>
                    </div>
                </div>

                <!-- Iskierki (tylko gdy nie started) -->
                <template x-if="!$wire.timerStarted">
                    <div>
                        <div class="sparkle sparkle-1"></div>
                        <div class="sparkle sparkle-2"></div>
                        <div class="sparkle sparkle-3"></div>
                        <div class="sparkle sparkle-4"></div>
                    </div>
                </template>
            </button>
        </div>

    </div>

    <footer class="fixed bottom-0 left-0 w-full z-50 py-4 text-center backdrop-blur-lg border-t shadow-[0_-4px_20px_rgba(0,0,0,0.4)]"
            style="
            background: linear-gradient(90deg, rgba(35, 35, 55, 0.9) 0%, rgba(30, 30, 30, 0.85) 100%);
            border-color: rgba(255, 255, 255, 0.08);
            box-shadow: inset 0 1px 0 rgba(255,255,255,0.05);
        ">
        <div class="container mx-auto px-6">
            <p style="
            font-size: 15px;
            font-weight: 500;
            letter-spacing: 0.6px;
            text-shadow: 0 0 8px rgba(108, 119, 255, 0.3);
            background: linear-gradient(135deg, #6C77FF 0%, #9ABCFF 100%);
           -webkit-background-clip: text;
           background-clip: text;
           -webkit-text-fill-color: transparent;
           color: transparent;">
                Every day is a new challenge.
            </p>
        </div>
    </footer>

    <style>
        /* Główne style buttona */
        .timer-button {
            background: linear-gradient(135deg, #545CFF 0%, #7A8CFF 100%);
            box-shadow: 0 4px 15px rgba(84, 92, 255, 0.3);
        }

        /* Hover – lekko rozjaśniamy */
        .timer-button:hover {
            background: linear-gradient(135deg, #5E66FF 0%, #8DA0FF 100%);
            transform: translateY(-2px) scale(1.05);
            box-shadow: 0 8px 25px rgba(84, 92, 255, 0.4);
        }

        /* Klasa animacji tylko gdy nie started */
        .animate-bounce-custom {
            animation: gentle-bounce 2s ease-in-out infinite, pulse-glow 3s ease-in-out infinite;
        }

        @keyframes gentle-bounce {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-3px); }
        }

        @keyframes pulse-glow {
            0%, 100% { box-shadow: 0 0 20px rgba(84, 92, 255, 0.3); }
            50% { box-shadow: 0 0 30px rgba(84, 92, 255, 0.6); }
        }
    </style>

</div>

@script

    <script>
        const TRIBES = @json(PomodoroPage::TRIBES);
        const TRIBE_COLORS = @json(PomodoroPage::TRIBE_COLORS);
        const TRIBE_INITIAL_TIMES = @json(PomodoroPage::TRIBE_INITIAL_TIMES);

        const POMODORO = '{{PomodoroPage::POMODORO}}';
        const SHORT_BREAK = '{{PomodoroPage::SHORT_BREAK}}';
        const LONG_BREAK = '{{PomodoroPage::LONG_BREAK}}';

        $js('setTribe', (tribe) => {
            $wire.tribe = tribe;
            $wire.color = TRIBE_COLORS[tribe];

            $wire.dispatch('setTribe', {
                'color': $wire.color,
                'tribeInitialTime': TRIBE_INITIAL_TIMES[tribe]
            });
        });

        Livewire.on('timerStarted', () => {
            $wire.timerStarted = true;
        });

        Livewire.on('timerStopped', (props) => {
            $wire.timerStarted = false;

            $wire.saveFrame(props.startedAt, props.stoppedAt);
        });

        Livewire.on('timerFinished', (props) => {
            if ($wire.tribe === POMODORO) {
                $js.setTribe(SHORT_BREAK);
            } else {
                $js.setTribe(POMODORO);
            }

            $wire.saveFrame(props.startedAt, props.stoppedAt);
        });

        Livewire.on('timerReset', (props) => {
            $wire.saveFrame(props.startedAt, props.stoppedAt);
            $wire.timerStarted = false;
        });


        const hamburger = document.getElementById('hamburger');
        const mobileMenu = document.getElementById('mobileMenu');

        hamburger.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>
@endscript
