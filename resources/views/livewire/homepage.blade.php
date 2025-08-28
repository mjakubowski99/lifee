{{-- resources/views/livewire/homepage.blade.php --}}
<div class="min-h-screen relative overflow-hidden" style="background: linear-gradient(90deg, rgba(42, 42, 64, 0.8) 0%, rgba(38, 38, 38, 0.7) 100%); border-color: hsl(227,54%,33%);">
    <!-- Uspokajające animacje tła -->
    <div class="fixed inset-0 pointer-events-none overflow-hidden">
        <!-- Płynące kule -->
        <div class="floating-orb floating-orb-1"></div>
        <div class="floating-orb floating-orb-2"></div>
        <div class="floating-orb floating-orb-3"></div>
        <div class="floating-orb floating-orb-4"></div>
        <div class="floating-orb floating-orb-5"></div>

        <!-- Delikatne fale -->
        <div class="wave wave-1"></div>
        <div class="wave wave-2"></div>
        <div class="wave wave-3"></div>

        <!-- Subtelne cząsteczki -->
        <div class="particle particle-1"></div>
        <div class="particle particle-2"></div>
        <div class="particle particle-3"></div>
        <div class="particle particle-4"></div>
        <div class="particle particle-5"></div>
        <div class="particle particle-6"></div>
        <div class="particle particle-7"></div>
        <div class="particle particle-8"></div>

        <!-- Delikatny gradient mesh -->
        <div class="gradient-mesh"></div>
    </div>

    <!-- Reszta zawartości -->
    <!-- Header -->
    <header class="relative overflow-hidden backdrop-blur-sm border-b" style="background: linear-gradient(90deg, rgba(42, 42, 64, 0.8) 0%, rgba(38, 38, 38, 0.7) 100%); border-color: hsl(227,54%,33%)">
        <div class="container mx-auto px-6 py-8">
            <div class="text-center">
                <div class="flex items-center justify-center mb-4">
                    <div class="p-3 rounded-full mr-4" style="background: linear-gradient(135deg, #6C77FF 0%, #9ABCFF 100%)">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2a3 3 0 0 0-3 3c0 1.5-.5 2.5-1.5 3.5C6.5 9.5 6 10.5 6 12s.5 2.5 1.5 3.5c1 1 1.5 2 1.5 3.5a3 3 0 0 0 6 0c0-1.5.5-2.5 1.5-3.5c1-1 1.5-2 1.5-3.5s-.5-2.5-1.5-3.5C14.5 7.5 14 6.5 14 5a3 3 0 0 0-2-3z"/>
                            <path d="M12 16v-4"/>
                            <path d="M8 12h8"/>
                        </svg>
                    </div>
                    <h1 class="text-4xl font-bold" style="background: linear-gradient(135deg, #6C77FF 0%, #9ABCFF 100%); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent; color: transparent;">
                        Daily focus
                    </h1>
                </div>
                <p class="text-lg" style="color: #E6E6F0">
                    Twój osobisty asystent do zarządzania uwagą i produktywnością
                </p>
            </div>
        </div>

        <!-- Dekoracyjne elementy w headerze -->
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none">
            <div class="absolute top-4 left-1/4 w-2 h-2 rounded-full animate-pulse" style="background-color: #6C77FF; opacity: 0.4;"></div>
            <div class="absolute top-8 right-1/3 w-1 h-1 rounded-full animate-ping" style="background-color: #9ABCFF; opacity: 0.6;"></div>
            <div class="absolute bottom-6 left-1/2 w-3 h-3 rounded-full animate-bounce" style="background-color: #FFD479; opacity: 0.3;"></div>
        </div>
    </header>

    <!-- Main Navigation Grid -->
    <main class="container mx-auto px-6 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 gap-6">
            @foreach($navigationCards as $card)
                <div
                    wire:click="navigateTo('{{ $card['route'] }}')"
                    class="navigation-card {{ $card['color'] }} relative overflow-hidden rounded-2xl p-6 cursor-pointer transform transition-all duration-300 hover:scale-105 hover:shadow-2xl shadow-lg border border-white/10 backdrop-blur-sm group"
                >
                    <div class="relative z-10 flex flex-col items-center text-center space-y-4">
                        <div class="p-4 rounded-full bg-white/20 backdrop-blur-sm group-hover:bg-white/30 transition-colors duration-300">
                            @switch($card['icon'])
                                @case('check-square')
                                    <svg class="w-12 h-12 text-white drop-shadow-lg" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    @break
                                @case('calendar')
                                    <svg class="w-12 h-12 text-white drop-shadow-lg" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    @break
                                @case('clock')
                                    <svg class="w-12 h-12 text-white drop-shadow-lg" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <circle cx="12" cy="12" r="10"/>
                                        <polyline points="12,6 12,12 16,14"/>
                                    </svg>
                                    @break
                                @case('target')
                                    <svg class="w-12 h-12 text-white drop-shadow-lg" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <circle cx="12" cy="12" r="10"/>
                                        <circle cx="12" cy="12" r="6"/>
                                        <circle cx="12" cy="12" r="2"/>
                                    </svg>
                                    @break
                                @case('bell')
                                    <svg class="w-12 h-12 text-white drop-shadow-lg" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/>
                                        <path d="M13.73 21a2 2 0 0 1-3.46 0"/>
                                    </svg>
                                    @break
                                @case('trending-up')
                                    <svg class="w-12 h-12 text-white drop-shadow-lg" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <polyline points="22,7 13.5,15.5 8.5,10.5 2,17"/>
                                        <polyline points="16,7 22,7 22,13"/>
                                    </svg>
                                    @break
                                @case('book-open')
                                    <svg class="w-12 h-12 text-white drop-shadow-lg" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/>
                                        <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/>
                                    </svg>
                                    @break
                                @case('heart')
                                    <svg class="w-12 h-12 text-white drop-shadow-lg" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/>
                                    </svg>
                                    @break
                                @case('brain')
                                    <svg class="w-12 h-12 text-white drop-shadow-lg" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2a3 3 0 0 0-3 3c0 1.5-.5 2.5-1.5 3.5C6.5 9.5 6 10.5 6 12s.5 2.5 1.5 3.5c1 1 1.5 2 1.5 3.5a3 3 0 0 0 6 0c0-1.5.5-2.5 1.5-3.5c1-1 1.5-2 1.5-3.5s-.5-2.5-1.5-3.5C14.5 7.5 14 6.5 14 5a3 3 0 0 0-2-3z"/>
                                        <path d="M12 16v-4"/>
                                        <path d="M8 12h8"/>
                                    </svg>
                                    @break
                                @case('settings')
                                    <svg class="w-12 h-12 text-white drop-shadow-lg" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <circle cx="12" cy="12" r="3"/>
                                        <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1 1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"/>
                                    </svg>
                                    @break
                            @endswitch
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-white mb-1 drop-shadow-md">{{ $card['title'] }}</h3>
                            @if(isset($card['subtitle']))
                                <p class="text-white/80 text-sm drop-shadow-sm">{{ $card['subtitle'] }}</p>
                            @endif
                        </div>
                    </div>

                    <!-- Efekt świetlny -->
                    <div class="absolute inset-0 bg-gradient-to-r from-white/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                    <!-- Animowane kropki w tle -->
                    <div class="absolute top-2 right-2 w-2 h-2 bg-white/30 rounded-full animate-pulse"></div>
                    <div class="absolute bottom-4 left-4 w-1 h-1 bg-white/20 rounded-full animate-ping"></div>
                </div>
            @endforeach
        </div>

        <!-- Sekcja motywacyjna -->
        <div class="mt-16 text-center">
            <div class="backdrop-blur-sm rounded-2xl p-8 border" style="background: linear-gradient(135deg, rgba(42, 42, 64, 0.6) 0%, rgba(38, 38, 38, 0.4) 100%); border-color: hsl(227,54%,33%)">
                <h2 class="text-2xl font-bold mb-4" style="color: #E6E6F0">
                    "Każdy mały krok to postęp"
                </h2>
                <p class="max-w-2xl mx-auto" style="color: #a3a3a3">
                    ADHD nie definiuje Ciebie - to tylko jedna z Twoich cech.
                    Ta aplikacja pomoże Ci wykorzystać Twoje mocne strony i poradzić sobie z wyzwaniami.
                </p>
            </div>
        </div>
    </main>

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
        /* Uspokajające animacje tła */
        @keyframes float {
            0%, 100% { transform: translateY(0px) translateX(0px) scale(1); }
            25% { transform: translateY(-20px) translateX(10px) scale(1.05); }
            50% { transform: translateY(-10px) translateX(-15px) scale(0.95); }
            75% { transform: translateY(-30px) translateX(5px) scale(1.02); }
        }

        @keyframes wave {
            0%, 100% { transform: translateX(-100%) scaleY(1); opacity: 0.1; }
            50% { transform: translateX(100vw) scaleY(1.2); opacity: 0.05; }
        }

        @keyframes drift {
            0% { transform: translateX(-10px) translateY(0px); }
            25% { transform: translateX(10px) translateY(-10px); }
            50% { transform: translateX(-5px) translateY(-20px); }
            75% { transform: translateX(15px) translateY(-10px); }
            100% { transform: translateX(-10px) translateY(0px); }
        }

        @keyframes pulse-soft {
            0%, 100% { opacity: 0.2; transform: scale(1); }
            50% { opacity: 0.05; transform: scale(1.1); }
        }

        @keyframes gradient-shift {
            0%, 100% {
                background: radial-gradient(circle at 20% 20%, rgba(108, 119, 255, 0.05) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(154, 188, 255, 0.03) 0%, transparent 50%);
            }
            33% {
                background: radial-gradient(circle at 60% 30%, rgba(110, 231, 183, 0.04) 0%, transparent 50%),
                radial-gradient(circle at 40% 70%, rgba(255, 212, 121, 0.03) 0%, transparent 50%);
            }
            66% {
                background: radial-gradient(circle at 30% 60%, rgba(255, 102, 187, 0.04) 0%, transparent 50%),
                radial-gradient(circle at 70% 40%, rgba(108, 119, 255, 0.03) 0%, transparent 50%);
            }
        }

        /* Płynące kule */
        .floating-orb {
            position: absolute;
            border-radius: 50%;
            pointer-events: none;
            filter: blur(1px);
        }

        .floating-orb-1 {
            width: 120px;
            height: 120px;
            background: radial-gradient(circle, rgba(108, 119, 255, 0.08) 0%, rgba(108, 119, 255, 0.02) 70%, transparent 100%);
            top: 10%;
            left: 10%;
            animation: float 10s ease-in-out infinite;
        }

        .floating-orb-2 {
            width: 80px;
            height: 80px;
            background: radial-gradient(circle, rgba(154, 188, 255, 0.06) 0%, rgba(154, 188, 255, 0.01) 70%, transparent 100%);
            top: 60%;
            right: 15%;
            animation: float 12.5s ease-in-out infinite 2.5s;
        }

        .floating-orb-3 {
            width: 100px;
            height: 100px;
            background: radial-gradient(circle, rgba(110, 231, 183, 0.05) 0%, rgba(110, 231, 183, 0.01) 70%, transparent 100%);
            bottom: 20%;
            left: 20%;
            animation: float 15s ease-in-out infinite 5s;
        }

        .floating-orb-4 {
            width: 60px;
            height: 60px;
            background: radial-gradient(circle, rgba(255, 212, 121, 0.07) 0%, rgba(255, 212, 121, 0.01) 70%, transparent 100%);
            top: 30%;
            right: 40%;
            animation: float 11s ease-in-out infinite 4s;
        }

        .floating-orb-5 {
            width: 90px;
            height: 90px;
            background: radial-gradient(circle, rgba(255, 102, 187, 0.04) 0%, rgba(255, 102, 187, 0.01) 70%, transparent 100%);
            bottom: 40%;
            right: 30%;
            animation: float 13.5s ease-in-out infinite 7.5s;
        }

        /* Delikatne fale */
        .wave {
            position: absolute;
            width: 200%;
            height: 150px;
            background: linear-gradient(90deg,
            transparent 0%,
            rgba(108, 119, 255, 0.02) 25%,
            rgba(154, 188, 255, 0.03) 50%,
            rgba(108, 119, 255, 0.02) 75%,
            transparent 100%);
            border-radius: 50px;
        }

        .wave-1 { top: 20%; animation: wave 20s linear infinite; }
        .wave-2 {
            top: 60%;
            animation: wave 17.5s linear infinite 5s;
            background: linear-gradient(90deg,
            transparent 0%,
            rgba(110, 231, 183, 0.02) 25%,
            rgba(255, 212, 121, 0.02) 50%,
            rgba(110, 231, 183, 0.01) 75%,
            transparent 100%);
        }
        .wave-3 {
            bottom: 15%;
            animation: wave 22.5s linear infinite 10s;
            background: linear-gradient(90deg,
            transparent 0%,
            rgba(255, 102, 187, 0.01) 25%,
            rgba(154, 188, 255, 0.02) 50%,
            rgba(255, 102, 187, 0.01) 75%,
            transparent 100%);
        }

        /* Subtelne cząsteczki */
        .particle {
            position: absolute;
            width: 3px;
            height: 3px;
            background: rgba(230, 230, 240, 0.4);
            border-radius: 50%;
            animation: drift 7.5s ease-in-out infinite, pulse-soft 1.5s ease-in-out infinite;
        }

        .particle-1 { top: 15%; left: 25%; animation-delay: 0s, 0s; }
        .particle-2 { top: 45%; right: 20%; animation-delay: 1.5s, 0.25s; }
        .particle-3 { bottom: 30%; left: 15%; animation-delay: 3s, 0.5s; }
        .particle-4 { top: 70%; left: 60%; animation-delay: 4.5s, 0.75s; }
        .particle-5 { bottom: 50%; right: 35%; animation-delay: 6s, 1s; }
        .particle-6 { top: 25%; right: 45%; animation-delay: 1s, 1.25s; }
        .particle-7 { bottom: 15%; left: 45%; animation-delay: 4s, 0.4s; }
        .particle-8 { top: 80%; right: 60%; animation-delay: 2.5s, 0.9s; }

        /* Delikatny gradient mesh */
        .gradient-mesh { position: absolute; top:0; left:0; right:0; bottom:0; animation: gradient-shift 30s ease-in-out infinite; opacity:0.6; }


        /* Kolory dla kart nawigacyjnych - dostosowane do custom palette */
        .navigation-card.blue {
            background: linear-gradient(135deg, #6C77FF 0%, #9ABCFF 100%);
        }
        .navigation-card.blue:hover {
            background: linear-gradient(135deg, #8A94FF 0%, #B8CFFF 100%);
        }

        .navigation-card.green {
            background: linear-gradient(135deg, #6EE7B7 0%, #34D399 100%);
        }
        .navigation-card.green:hover {
            background: linear-gradient(135deg, #86EFCA 0%, #6EE7B7 100%);
        }

        .navigation-card.purple {
            background: linear-gradient(135deg, #6C77FF 0%, #A855F7 100%);
        }
        .navigation-card.purple:hover {
            background: linear-gradient(135deg, #8A94FF 0%, #C084FC 100%);
        }

        .navigation-card.orange {
            background: linear-gradient(135deg, #FFD479 0%, #F59E0B 100%);
        }
        .navigation-card.orange:hover {
            background: linear-gradient(135deg, #FFE0A3 0%, #FFD479 100%);
        }

        .navigation-card.pink {
            background: linear-gradient(135deg, #FF66BB 0%, #EC4899 100%);
        }
        .navigation-card.pink:hover {
            background: linear-gradient(135deg, #FF88CC 0%, #F472B6 100%);
        }

        .navigation-card.indigo {
            background: linear-gradient(135deg, #6C77FF 0%, #6366F1 100%);
        }
        .navigation-card.indigo:hover {
            background: linear-gradient(135deg, #8A94FF 0%, #818CF8 100%);
        }

        .navigation-card.yellow {
            background: linear-gradient(135deg, #FFD479 0%, #EAB308 100%);
        }
        .navigation-card.yellow:hover {
            background: linear-gradient(135deg, #FFE0A3 0%, #FFD479 100%);
        }

        .navigation-card.red {
            background: linear-gradient(135deg, #FF66BB 0%, #EF4444 100%);
        }
        .navigation-card.red:hover {
            background: linear-gradient(135deg, #FF88CC 0%, #F87171 100%);
        }

        .navigation-card.teal {
            background: linear-gradient(135deg, #6EE7B7 0%, #14B8A6 100%);
        }
        .navigation-card.teal:hover {
            background: linear-gradient(135deg, #86EFCA 0%, #5EEAD4 100%);
        }

        .navigation-card.emerald {
            background: linear-gradient(135deg, #6EE7B7 0%, #10B981 100%);
        }
        .navigation-card.emerald:hover {
            background: linear-gradient(135deg, #86EFCA 0%, #6EE7B7 100%);
        }

        /* Dostosowane kolory powierzchni i obramowań */
        .navigation-card {
            background-color: #2A2A40; /* fallback do --color-c-surface */
            border-color: hsl(227,54%,33%); /* --color-c-border */
            color: #E6E6F0; /* --color-c-text */
        }

        .navigation-card h3 {
            color: #E6E6F0; /* --color-c-text */
        }

        .navigation-card p {
            color: rgba(230, 230, 240, 0.8); /* --color-c-text z opacity */
        }
    </style>
</div>


@push('scripts')
    <script>
        // Opcjonalne: Obsługa dodatkowych eventów
        document.addEventListener('livewire:initialized', function () {
            Livewire.on('card-clicked', function (data) {
                console.log('Kliknięto kartę:', data.route);
                // Możesz tutaj dodać dodatkową logikę
            });
        });
    </script>
@endpush
