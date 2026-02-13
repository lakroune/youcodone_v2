<nav x-data="{ open: false, userMenu: false, scrolled: false }" @scroll.window="scrolled = (window.pageYOffset > 20)"
    class="fixed w-full z-50 transition-all duration-500"
    :class="scrolled ? 'bg-[#0a0a0a]/95 backdrop-blur-md border-b border-[#FF6B35]/10 py-4' : 'bg-transparent py-6'">

    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="flex justify-between items-center">

            <!-- Logo Style Cibo -->
            <div class="flex items-center">
                <a href="/" class="group relative">
                    <div class="flex items-center gap-3">
                        <!-- Icône/Logo stylisé -->
                        <div
                            class="w-10 h-10 rounded-full border-2 border-[#FF6B35]/30 flex items-center justify-center group-hover:border-[#FF6B35] transition-all duration-300">
                            <span class="text-[#FF6B35] font-bold text-lg italic">Y</span>
                        </div>
                        <div class="flex flex-col">
                            <span
                                class="text-white text-xl font-bold italic tracking-tight leading-none group-hover:text-[#FF6B35] transition-colors duration-300">
                                YOUCOD
                            </span>
                            <span
                                class="text-[#FF6B35] text-[10px] font-bold uppercase tracking-[0.3em] group-hover:text-white transition-colors duration-300">
                               ONE
                            </span>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Navigation Desktop -->
            <div class="hidden md:flex items-center gap-10">
                @role('client')
                    <a href="{{ route('home') }}"
                        class="group relative text-[11px] font-medium uppercase tracking-[0.2em] text-gray-300 hover:text-white transition-all duration-300 py-2">
                        Exploration
                        <span
                            class="absolute bottom-0 left-0 w-0 h-px bg-[#FF6B35] group-hover:w-full transition-all duration-300"></span>
                    </a>
                    <a href="{{ route('client.favoris') }}"
                        class="group relative text-[11px] font-medium uppercase tracking-[0.2em] text-gray-300 hover:text-white transition-all duration-300 py-2">
                        Ma Sélection
                        <span
                            class="absolute bottom-0 left-0 w-0 h-px bg-[#FF6B35] group-hover:w-full transition-all duration-300"></span>
                    </a>
                    <a href="{{ route('client.reservations') }}"
                        class="group relative text-[11px] font-medium uppercase tracking-[0.2em] text-gray-300 hover:text-white transition-all duration-300 py-2">
                        Mes Réservations
                        <span
                            class="absolute bottom-0 left-0 w-0 h-px bg-[#FF6B35] group-hover:w-full transition-all duration-300"></span>
                    </a>
                @endrole

                @role('restaurateur')
                    <a href="{{ route('restaurateur.dashboard') }}"
                        class="group relative text-[11px] font-medium uppercase tracking-[0.2em] text-gray-300 hover:text-white transition-all duration-300 py-2">
                        Mes Restaurants
                        <span
                            class="absolute bottom-0 left-0 w-0 h-px bg-[#FF6B35] group-hover:w-full transition-all duration-300"></span>
                    </a>
                    <a href="{{ route('restaurants.create') }}"
                        class="group relative text-[11px] font-medium uppercase tracking-[0.2em] text-gray-300 hover:text-white transition-all duration-300 py-2">
                        Ajouter
                        <span
                            class="absolute bottom-0 left-0 w-0 h-px bg-[#FF6B35] group-hover:w-full transition-all duration-300"></span>
                    </a>
                @endrole

                @role('admin')
                    <a href="{{ route('admin.gestion') }}"
                        class="group relative text-[11px] font-medium uppercase tracking-[0.2em] text-gray-300 hover:text-white transition-all duration-300 py-2">
                        Utilisateurs
                        <span
                            class="absolute bottom-0 left-0 w-0 h-px bg-[#FF6B35] group-hover:w-full transition-all duration-300"></span>
                    </a>
                    <a href="{{ route('admin.restaurants') }}"
                        class="group relative text-[11px] font-medium uppercase tracking-[0.2em] text-gray-300 hover:text-white transition-all duration-300 py-2">
                        Restaurants
                        <span
                            class="absolute bottom-0 left-0 w-0 h-px bg-[#FF6B35] group-hover:w-full transition-all duration-300"></span>
                    </a>
                @endrole
            </div>

            <!-- User Menu -->
            <div class="hidden md:flex items-center gap-6">

                @role('restaurateur')
                    <!-- Notification System -->
                    <div class="relative" x-data="{ showNotifs: false }">
                        <button @click="showNotifs = !showNotifs" @click.away="showNotifs = false"
                            class="relative group outline-none">
                            <div
                                class="w-10 h-10 rounded-full border border-white/10 flex items-center justify-center group-hover:border-[#FF6B35]/50 transition-all duration-300">
                                <svg class="w-4 h-4 text-gray-400 group-hover:text-[#FF6B35] transition-colors"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                </svg>
                            </div>

                            @if (auth()->user()->unreadNotifications->count() > 0)
                                <span
                                    class="absolute -top-1 -right-1 w-5 h-5 bg-[#FF6B35] text-black text-[10px] font-bold rounded-full flex items-center justify-center animate-pulse">
                                    {{ auth()->user()->unreadNotifications->count() }}
                                </span>
                            @endif
                        </button>

                        <!-- Dropdown الإشعارات -->
                        <div x-show="showNotifs" x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 translate-y-2"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            class="absolute right-0 mt-4 w-80 bg-[#111] border border-white/10 rounded-2xl shadow-2xl z-50 overflow-hidden">

                            <div class="px-4 py-3 border-b border-white/5 flex justify-between items-center">
                                <span class="text-[10px] font-bold text-gray-500 uppercase tracking-widest">Dernières
                                    Notifications</span>
                                <a href="{{ route('notifications.index') }}"
                                    class="text-[9px] text-[#FF6B35] hover:underline">Voir tout</a>
                            </div>

                            <div class="max-h-64 overflow-y-auto">
                                @forelse(auth()->user()->unreadNotifications->take(5) as $notification)
                                    <div
                                        class="px-4 py-3 hover:bg-white/5 border-b border-white/5 transition-colors relative group">
                                        <p class="text-xs text-gray-300">
                                            <span class="text-[#FF6B35] font-bold">Nouveau client:</span>
                                            {{ $notification->data['client_name'] }}
                                        </p>
                                        <p class="text-[10px] text-gray-500 mt-1 italic">
                                            {{ $notification->data['date'] }} à {{ $notification->data['time'] }}
                                        </p>

                                        <form action="{{ route('notifications.read', $notification->id) }}" method="POST"
                                            class="mt-2">
                                            @csrf
                                            <button type="submit"
                                                class="text-[9px] text-gray-400 hover:text-white flex items-center gap-1">
                                                <span class="w-1.5 h-1.5 bg-[#FF6B35] rounded-full"></span>
                                                Marquer comme lu
                                            </button>
                                        </form>
                                    </div>
                                @empty
                                    <div class="px-4 py-8 text-center">
                                        <p class="text-xs text-gray-500 italic">Aucune nouvelle notification</p>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                @endrole

                <!-- User Dropdown -->
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" @click.away="open = false"
                        class="flex items-center gap-4 group outline-none">
                        <div class="text-right hidden lg:block">
                            <p
                                class="text-xs font-bold text-white group-hover:text-[#FF6B35] transition-colors duration-300">
                                {{ Auth::user()->username }}
                            </p>
                            <p class="text-[9px] text-[#FF6B35] uppercase tracking-wider font-medium">
                                {{ Auth::user()->roles->first()->name ?? 'Guest' }}
                            </p>
                        </div>
                        <div class="relative">
                            <div
                                class="w-11 h-11 rounded-full p-0.5 border-2 border-white/10 group-hover:border-[#FF6B35] transition-all duration-300 overflow-hidden">
                                <img src="{{ Auth::user()->avatar ? asset('storage/' . Auth::user()->avatar) : 'https://ui-avatars.com/api/?name=' . Auth::user()->username . '&background=FF6B35&color=fff' }}"
                                    class="w-full h-full rounded-full object-cover grayscale group-hover:grayscale-0 transition-all duration-500"
                                    alt="Avatar">
                            </div>
                            <div
                                class="absolute bottom-0 right-0 w-3 h-3 bg-green-500 border-2 border-[#0a0a0a] rounded-full">
                            </div>
                        </div>
                        <svg class="w-4 h-4 text-gray-500 group-hover:text-[#FF6B35] transition-transform duration-300"
                            :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <!-- Dropdown Menu -->
                    <div x-show="open" x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 translate-y-2"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 translate-y-0"
                        x-transition:leave-end="opacity-0 translate-y-2"
                        class="absolute right-0 mt-4 w-64 bg-[#111] border border-white/10 rounded-2xl shadow-2xl py-4 z-50 overflow-hidden">

                        <!-- Header -->
                        <div class="px-6 py-3 border-b border-white/5 mb-2">
                            <p class="text-[10px] font-bold text-gray-500 uppercase tracking-widest">Mon Compte</p>
                        </div>

                        <a href="{{ route('profile.edit') }}"
                            class="flex items-center gap-4 px-6 py-3 text-sm text-gray-300 hover:text-[#FF6B35] hover:bg-white/5 transition-all duration-300 group">
                            <svg class="w-4 h-4 text-gray-500 group-hover:text-[#FF6B35] transition-colors"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            <span class="font-medium">Paramètres</span>
                        </a>

                        <div class="h-px bg-white/5 my-2 mx-6"></div>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="w-full flex items-center gap-4 px-6 py-3 text-sm text-red-400 hover:text-red-300 hover:bg-red-500/10 transition-all duration-300 group">
                                <svg class="w-4 h-4 text-red-500 group-hover:scale-110 transition-transform"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                                <span class="font-medium">Déconnexion</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Mobile Menu Button -->
            <div class="md:hidden flex items-center">
                <button @click="open = !open"
                    class="w-10 h-10 rounded-full border border-white/10 flex items-center justify-center text-white hover:text-[#FF6B35] hover:border-[#FF6B35]/30 transition-all duration-300">
                    <svg x-show="!open" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M4 8h16M4 16h16" />
                    </svg>
                    <svg x-show="open" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="open" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 -translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-4"
        class="md:hidden absolute top-full left-0 w-full bg-[#0a0a0a]/98 backdrop-blur-lg border-b border-[#FF6B35]/10 px-6 py-8 space-y-6 shadow-2xl">

        @role('client')
            <a href="{{ route('home') }}" class="flex items-center justify-between group">
                <span
                    class="text-2xl font-bold italic text-white group-hover:text-[#FF6B35] transition-colors">Exploration</span>
                <svg class="w-5 h-5 text-gray-600 group-hover:text-[#FF6B35] transition-colors" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>
            <a href="{{ route('client.favoris') }}" class="flex items-center justify-between group">
                <span class="text-2xl font-bold italic text-white group-hover:text-[#FF6B35] transition-colors">Ma
                    Sélection</span>
                <svg class="w-5 h-5 text-gray-600 group-hover:text-[#FF6B35] transition-colors" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>
            <a href="{{ route('client.reservations') }}" class="flex items-center justify-between group">
                <span
                    class="text-2xl font-bold italic text-white group-hover:text-[#FF6B35] transition-colors">Réservations</span>
                <svg class="w-5 h-5 text-gray-600 group-hover:text-[#FF6B35] transition-colors" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>
        @endrole

        @role('restaurateur')
            <a href="{{ route('restaurateur.dashboard') }}" class="flex items-center justify-between group">
                <span class="text-2xl font-bold italic text-white group-hover:text-[#FF6B35] transition-colors">Mes
                    Restaurants</span>
                <svg class="w-5 h-5 text-gray-600 group-hover:text-[#FF6B35] transition-colors" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>
        @endrole

        @role('admin')
            <a href="{{ route('admin.gestion') }}" class="flex items-center justify-between group">
                <span
                    class="text-2xl font-bold italic text-white group-hover:text-[#FF6B35] transition-colors">Utilisateurs</span>
                <svg class="w-5 h-5 text-gray-600 group-hover:text-[#FF6B35] transition-colors" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>
            <a href="{{ route('admin.restaurants') }}" class="flex items-center justify-between group">
                <span
                    class="text-2xl font-bold italic text-white group-hover:text-[#FF6B35] transition-colors">Restaurants</span>
                <svg class="w-5 h-5 text-gray-600 group-hover:text-[#FF6B35] transition-colors" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>
        @endrole

        <div class="h-px bg-white/10 w-full my-6"></div>

        <div class="flex items-center gap-4 pb-6">
            <img src="{{ Auth::user()->avatar ? asset('storage/' . Auth::user()->avatar) : 'https://ui-avatars.com/api/?name=' . Auth::user()->username . '&background=FF6B35&color=fff' }}"
                class="w-12 h-12 rounded-full border-2 border-[#FF6B35]/30" alt="Avatar">
            <div>
                <p class="text-white font-bold">{{ Auth::user()->username }}</p>
                <p class="text-[#FF6B35] text-xs uppercase tracking-wider">{{ Auth::user()->roles->first()->name }}
                </p>
            </div>
        </div>

        <a href="{{ route('profile.edit') }}"
            class="block text-sm font-medium uppercase tracking-widest text-gray-400 hover:text-[#FF6B35] transition-colors">
            Paramètres du profil
        </a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                class="w-full text-left text-sm font-medium uppercase tracking-widest text-red-400 hover:text-red-300 transition-colors flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
                Déconnexion
            </button>
        </form>
    </div>
</nav>

<!-- Spacer pour compenser la nav fixed -->
<div class="h-20"></div>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&family=Inter:wght@300;400;500;600&display=swap');

    .font-serif {
        font-family: 'Playfair Display', serif;
    }

    .font-sans {
        font-family: 'Inter', sans-serif;
    }

    /* Animation underline */
    .nav-link::after {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 0;
        width: 0;
        height: 1px;
        background: #FF6B35;
        transition: width 0.3s ease;
    }

    .nav-link:hover::after {
        width: 100%;
    }
</style>
