<div x-data="countdownTimer({ timeLimit: @js($initialTime) })">
    <div
        class="w-90 h-90 md:w-120 md:h-120 relative"
    >
        <svg class="w-full h-full transform -rotate-90" viewBox="0 0 100 100">
            <defs>
                <linearGradient id="gradientStroke" x1="0%" y1="0%" x2="100%" y2="0%">
                    <stop offset="0%" :stop-color="colors['stop1']" />
                    <stop offset="50%" :stop-color="colors['stop2']" />
                    <stop offset="100%" :stop-color="colors['stop3']" />
                </linearGradient>
            </defs>

            <circle cx="50" cy="50" r="45" stroke-width="10" stroke="#D1D5DB" fill="none"/>

            <path
                :stroke-dasharray="`${circleDasharray} 283`"
                :stroke="pathStroke"
                stroke-width="10"
                fill="none"
                d=" M 50, 50 m -45, 0 a 45,45 0 1,0 90,0 a 45,45 0 1,0 -90,0 "
            />
        </svg>

        <div class="absolute inset-0 flex items-center justify-center text-xl font-bold">
            <span x-text="formattedTime"></span>
        </div>
    </div>
</div>

@script
    <script>
        Alpine.data('countdownTimer', ({ timeLimit }) => ({
            availableColors: {
                'pink': {
                    stop1: '#F472B6',
                    stop2: '#EC4899',
                    stop3: '#DB2777',
                },
                'green': {
                    stop1: '#34D399',
                    stop2: '#10B981',
                    stop3: '#059669',
                },
                'blue': {
                    stop1: '#60A5FA',
                    stop2: '#3B82F6',
                    stop3: '#2563EB',
                },
            },
            timeLimit,
            timeLeft: timeLimit,
            startTime: null,
            started: false,
            animationFrame: null,
            startedAt: null,
            stoppedAt: null,
            color: 'pink',
            colors: null,

            init() {
                this.colors = this.availableColors[this.color];

                Livewire.on('timerToggled', () => {
                    this.playOrPause();
                });

                Livewire.on('setTribe', (props) => {
                    console.log(props);
                    this.color = props.color;
                    this.colors = this.availableColors[props.color] || this.availableColors['pink'];
                    this.timeLimit = props.tribeInitialTime;
                    this.resetTimer();
                })
            },

            get formattedTime() {
                const minutes = Math.floor(this.timeLeft / 60);
                const seconds = Math.floor(this.timeLeft % 60);
                return `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
            },

            get buttonText() {
                return this.started ? 'Pause' : 'Start';
            },

            get circleDasharray() {
                const progress = this.timeLeft / this.timeLimit;
                return (progress * 283).toFixed(1);
            },

            get pathStroke() {
                if (this.timeLeft <= 5) return '#EF4444';
                if (this.timeLeft <= 10) return '#FB923C';
                return 'url(#gradientStroke)';
            },

            playOrPause() {
                if (this.started) {
                    this.stopTimer();
                } else {
                    this.startTimer();
                }
            },

            startTimer() {
                if (!this.started) {
                    this.started = true;
                    this.startTime = performance.now() - (this.timeLimit - this.timeLeft) * 1000;

                    this.startedAt = (new Date()).toISOString();

                    const tick = (now) => {
                        const elapsed = (now - this.startTime) / 1000;
                        this.timeLeft = Math.max(this.timeLimit - elapsed, 0);

                        if (this.timeLeft > 0) {
                            this.animationFrame = requestAnimationFrame(tick);
                        } else {
                            this.timeLeft = 0;
                            this.started = false;
                            cancelAnimationFrame(this.animationFrame);

                            this.stoppedAt = (new Date()).toISOString();
                            Livewire.dispatch('timerFinished', {
                                'startedAt': this.startedAt,
                                'stoppedAt': this.stoppedAt,
                            });

                            this.timeLeft = this.timeLimit;
                        }
                    };

                    this.animationFrame = requestAnimationFrame(tick);

                    Livewire.dispatch('timerStarted', {
                        'startedAt': this.startedAt,
                    });
                }
            },

            stopTimer() {
                this.started = false;
                if (this.animationFrame) {
                    cancelAnimationFrame(this.animationFrame);

                    this.stoppedAt = (new Date()).toISOString();
                    this.animationFrame = null;
                }

                Livewire.dispatch('timerStopped', {
                    'startedAt': this.startedAt,
                    'stoppedAt': this.stoppedAt,
                });
            },

            resetTimer() {
                this.started = false;

                if (this.animationFrame) {
                    this.timeLeft = 0;
                    this.started = false;
                    cancelAnimationFrame(this.animationFrame);
                    this.stoppedAt = (new Date()).toISOString();
                    this.timeLeft = this.timeLimit;
                } else {
                    this.timeLeft = this.timeLimit;
                }

                Livewire.dispatch('timerFinished', {
                    'startedAt': this.startedAt,
                    'stoppedAt': this.stoppedAt,
                });
            }
        }));

    </script>
@endscript
