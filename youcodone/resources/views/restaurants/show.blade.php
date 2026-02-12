<x-app-layout>
    <div class="bg-[#0a0a0a] min-h-screen text-gray-200 font-serif pb-32" x-data="reservationHandler()">
        
        <!-- Hero Section Style Cibo -->
        <section class="relative h-[70vh] w-full overflow-hidden bg-black flex items-center border-b border-[#FF6B35]/10">
            <!-- Gradients -->
            <div class="absolute inset-0 z-10 pointer-events-none bg-gradient-to-r from-[#0a0a0a] via-transparent to-[#0a0a0a]"></div>
            <div class="absolute inset-0 z-10 pointer-events-none bg-gradient-to-t from-[#0a0a0a] via-transparent to-transparent"></div>
            
            <!-- Film Carousel -->
            <div class="animate-film h-full flex items-center">
                @php 
                    $allPhotos = $restaurant->photos->concat($restaurant->photos)->concat($restaurant->photos); 
                @endphp
                @foreach ($allPhotos as $photo)
                    <div class="h-[55vh] w-[70vw] md:w-[30vw] px-4 flex-shrink-0">
                        <div class="w-full h-full overflow-hidden rounded-2xl border border-white/10 shadow-2xl relative group">
                            <img src="{{ asset('storage/' . $photo->url_photo) }}" 
                                 class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-1000 scale-110 group-hover:scale-100">
                            <div class="absolute bottom-4 right-4 text-[9px] tracking-[0.3em] text-white/40 uppercase font-sans">Photo {{ $loop->iteration }}</div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Title Overlay -->
            <div class="absolute inset-0 z-20 flex flex-col items-center justify-center text-center pointer-events-none px-6">
                <span class="text-[#FF6B35] text-[10px] font-bold uppercase tracking-[0.5em] mb-6 animate-fade-in">Restaurant Gastronomique</span>
                <h1 class="text-5xl md:text-7xl lg:text-8xl font-serif font-bold italic text-white uppercase leading-none mb-6 animate-fade-in delay-100">
                    {{ $restaurant->nom_restaurant }}<span class="text-[#FF6B35]">.</span>
                </h1>
                <div class="flex items-center gap-4 animate-fade-in delay-200">
                    <div class="h-px w-12 bg-[#FF6B35]/30"></div>
                    <p class="text-gray-400 text-xs uppercase tracking-[0.3em] font-sans">{{ $restaurant->typeCuisine->nom_type_cuisine }}</p>
                    <div class="h-px w-12 bg-[#FF6B35]/30"></div>
                </div>
            </div>
        </section>

        <!-- Main Content -->
        <main class="max-w-7xl mx-auto px-6 md:px-12 mt-24">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-16">
                
                <!-- Left Column -->
                <div class="lg:col-span-7 space-y-24 py-12">
                    
                    <!-- Description -->
                    <article class="relative">
                        <div class="absolute -left-4 md:-left-8 top-0 text-[80px] md:text-[120px] font-serif font-bold text-white/[0.03] select-none uppercase leading-none -z-10">
                            {{ substr($restaurant->nom_restaurant, 0, 1) }}
                        </div>
                        
                        <h2 class="text-[#FF6B35] text-[10px] font-bold uppercase tracking-[0.4em] mb-8 flex items-center gap-4">
                            <span class="w-8 h-[1px] bg-[#FF6B35]"></span>
                            Notre Philosophie
                        </h2>
                        
                        <p class="text-2xl md:text-3xl leading-relaxed text-white font-serif italic first-letter:text-7xl first-letter:text-[#FF6B35] first-letter:font-bold first-letter:mr-3 first-letter:float-left first-letter:leading-none">
                            {{ $restaurant->description_restaurant }}
                        </p>
                    </article>

                    <!-- Menu Section -->
                    <section class="relative">
                        <h2 class="text-[#FF6B35] text-[10px] font-bold uppercase tracking-[0.4em] mb-12 flex items-center gap-4">
                            <span class="w-8 h-[1px] bg-[#FF6B35]"></span>
                            La Carte
                        </h2>
                        
                        @if ($restaurant->menus && $restaurant->menus->plats->isNotEmpty())
                            <div class="space-y-8">
                                @foreach ($restaurant->menus->plats as $plat)
                                    <div class="group relative bg-white/[0.02] border border-white/5 rounded-xl p-6 hover:border-[#FF6B35]/20 transition-all duration-500">
                                        <div class="flex justify-between items-start gap-4 mb-3">
                                            <h4 class="text-lg font-serif font-bold italic text-white group-hover:text-[#FF6B35] transition-colors">
                                                {{ $plat->nom_plat }}
                                            </h4>
                                            <span class="text-[#FF6B35] font-bold text-lg whitespace-nowrap">
                                                {{ number_format($plat->prix_plat, 0) }} <small class="text-[10px] uppercase">DH</small>
                                            </span>
                                        </div>
                                        <div class="h-px bg-gradient-to-r from-white/10 via-transparent to-transparent mb-3"></div>
                                        <p class="text-sm text-gray-500 font-sans font-light">Préparé avec des produits frais et de saison.</p>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="py-20 text-center border border-dashed border-white/10 rounded-2xl bg-white/[0.01]">
                                <p class="text-gray-600 font-serif italic">La carte sera bientôt disponible...</p>
                            </div>
                        @endif
                    </section>

                    <!-- Contact Info -->
                    <footer class="pt-12 border-t border-white/5 grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="space-y-4">
                            <p class="text-[#FF6B35] text-[10px] font-bold uppercase tracking-[0.3em] mb-2">Adresse</p>
                            <p class="text-gray-400 text-sm leading-relaxed font-sans">{{ $restaurant->adresse_restaurant }}</p>
                        </div>
                        <div class="space-y-4">
                            <p class="text-[#FF6B35] text-[10px] font-bold uppercase tracking-[0.3em] mb-2">Contact</p>
                            <p class="text-gray-400 text-sm font-sans">{{ $restaurant->telephone_restaurant }}</p>
                            <p class="text-gray-400 text-sm font-sans">{{ $restaurant->email_restaurant }}</p>
                        </div>
                    </footer>
                </div>

                <!-- Right Column - Reservation -->
                <div class="lg:col-span-5 lg:border-l lg:border-white/5 lg:pl-12 py-12">
                    <div class="sticky top-24 space-y-12">
                        
                        <!-- Reservation Card -->
                        <div class="bg-[#111] border border-white/10 rounded-2xl p-8 relative overflow-hidden">
                            <div class="absolute top-0 right-0 w-32 h-32 bg-[#FF6B35]/5 rounded-bl-full pointer-events-none"></div>
                            <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-[#FF6B35]/30 to-transparent"></div>
                            
                            <div class="text-center mb-10">
                                <h2 class="text-[#FF6B35] text-[10px] font-bold uppercase tracking-[0.4em] mb-2">Réservation</h2>
                                <p class="text-white font-serif italic text-xl">Réservez votre table</p>
                            </div>
                            
                            <form action="{{ route('client.reservations.store') }}" method="POST" class="space-y-8">
                                @csrf
                                <input type="hidden" name="restaurant_id" value="{{ $restaurant->id }}">

                                <!-- Date Input -->
                                <div class="space-y-3">
                                    <label class="text-[10px] text-gray-500 uppercase tracking-[0.2em] font-bold font-sans block">Date</label>
                                    <div class="relative">
                                        <input type="date" name="date_reservation" x-model="selectedDate" @change="updateHours()"
                                            min="{{ date('Y-m-d') }}" required
                                            class="w-full bg-transparent border border-white/10 rounded-xl px-4 py-4 text-white focus:border-[#FF6B35] focus:ring-1 focus:ring-[#FF6B35]/20 outline-none transition-all font-serif text-lg">
                                        <svg class="absolute right-4 top-1/2 -translate-y-1/2 w-5 h-5 text-[#FF6B35] pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                </div>

                                <!-- Time Input -->
                                <div class="space-y-3">
                                    <label class="text-[10px] text-gray-500 uppercase tracking-[0.2em] font-bold font-sans block">Heure</label>
                                    <div class="relative">
                                        <select name="heure_reservation" x-model="selectedHour" required
                                            class="w-full bg-[#0a0a0a] border border-white/10 rounded-xl px-4 py-4 text-white focus:border-[#FF6B35] focus:ring-1 focus:ring-[#FF6B35]/20 outline-none appearance-none cursor-pointer font-serif text-lg">
                                            <option value="" class="bg-[#0a0a0a]">Sélectionner une heure...</option>
                                            <template x-for="hour in availableHours" :key="hour">
                                                <option :value="hour" x-text="formatHour(hour)" class="bg-[#0a0a0a]"></option>
                                            </template>
                                        </select>
                                        <svg class="absolute right-4 top-1/2 -translate-y-1/2 w-5 h-5 text-[#FF6B35] pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </div>
                                    <p x-show="isClosed" class="text-[#FF6B35] text-xs font-bold uppercase tracking-wider flex items-center gap-2 mt-2">
                                        <span class="w-1.5 h-1.5 rounded-full bg-[#FF6B35] animate-pulse"></span>
                                        Fermé à cette date
                                    </p>
                                </div>

                                <!-- Submit Button -->
                                <button type="submit" :disabled="!selectedDate || availableHours.length === 0"
                                    class="w-full bg-[#FF6B35] text-black font-bold py-4 rounded-xl uppercase tracking-[0.2em] text-[11px] hover:bg-white transition-all duration-500 disabled:opacity-20 disabled:cursor-not-allowed shadow-lg shadow-[#FF6B35]/20 flex items-center justify-center gap-3 group">
                                    <span>Confirmer la réservation</span>
                                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                    </svg>
                                </button>
                            </form>
                        </div>

                        <!-- Opening Hours -->
                        <div class="bg-[#111] border border-white/10 rounded-2xl p-8">
                            <h2 class="text-[#FF6B35] text-[10px] font-bold uppercase tracking-[0.4em] mb-6 flex items-center gap-3">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Horaires
                            </h2>
                            
                            <div class="space-y-3">
                                @php
                                    $jours = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
                                    $currentDay = now()->locale('fr')->dayName;
                                @endphp
                                @foreach ($jours as $jour)
                                    @php 
                                        $h = $restaurant->horaires->firstWhere('jour', $jour);
                                        $isToday = strtolower($jour) === strtolower($currentDay);
                                    @endphp
                                    <div class="flex justify-between items-center py-2 {{ $isToday ? 'bg-white/5 -mx-2 px-2 rounded-lg' : '' }}">
                                        <span class="text-[11px] uppercase tracking-wider {{ $isToday ? 'text-[#FF6B35] font-bold' : 'text-gray-500' }} font-sans">{{ $jour }}</span>
                                        <span class="text-[11px] font-bold {{ $isToday ? 'text-white' : 'text-gray-400' }} font-sans">
                                            @if ($h && !$h->ferme)
                                                {{ substr($h->heure_ouverture,0,5) }} — {{ substr($h->heure_fermeture,0,5) }}
                                            @else
                                                <span class="text-gray-600 italic">Fermé</span>
                                            @endif
                                        </span>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Price Info -->
                        @if($restaurant->prix_reservation)
                            <div class="bg-[#FF6B35]/5 border border-[#FF6B35]/20 rounded-2xl p-6 text-center">
                                <p class="text-gray-400 text-[10px] uppercase tracking-widest mb-2">Prix de réservation</p>
                                <p class="text-3xl font-serif font-bold italic text-[#FF6B35]">{{ number_format($restaurant->prix_reservation, 0) }} <span class="text-sm">DH</span></p>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Styles -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700&family=Inter:wght@300;400;500;600&display=swap');
        
        .font-serif { font-family: 'Playfair Display', serif; }
        .font-sans { font-family: 'Inter', sans-serif; }

        @keyframes scroll-film {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        
        .animate-film {
            display: flex;
            width: max-content;
            animation: scroll-film 60s linear infinite;
        }
        
        .animate-film:hover { animation-play-state: paused; }

        @keyframes fade-in-up {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .animate-fade-in { 
            animation: fade-in-up 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards; 
            opacity: 0;
        }
        
        .delay-100 { animation-delay: 0.1s; }
        .delay-200 { animation-delay: 0.2s; }

        /* Custom Date Input */
        input[type="date"]::-webkit-calendar-picker-indicator {
            filter: invert(1);
            opacity: 0.5;
            cursor: pointer;
        }
        
        input[type="date"]::-webkit-calendar-picker-indicator:hover {
            opacity: 1;
        }
    </style>

    <!-- Scripts -->
    <script>
        function reservationHandler() {
            return {
                selectedDate: '',
                selectedHour: '',
                availableHours: [],
                isClosed: false,
                horaires: @json($restaurant->horaires),
                
                updateHours() {
                    this.availableHours = [];
                    this.selectedHour = '';
                    
                    if (!this.selectedDate) return;

                    const date = new Date(this.selectedDate);
                    const days = ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'];
                    const dayName = days[date.getDay()];
                    
                    const config = this.horaires.find(h => h.jour === dayName);

                    if (!config || config.ferme) {
                        this.isClosed = true;
                        return;
                    }

                    this.isClosed = false;
                    const start = parseInt(config.heure_ouverture.split(':')[0]);
                    const end = parseInt(config.heure_fermeture.split(':')[0]);
                    
                    for (let i = start; i <= (end - 2); i++) {
                        this.availableHours.push(i);
                    }
                },
                
                formatHour(h) {
                    return h.toString().padStart(2, '0') + ':00';
                }
            }
        }
    </script>
</x-app-layout>