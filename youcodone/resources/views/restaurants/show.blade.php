<x-app-layout>
    <div class="bg-[#050505] min-h-screen text-gray-200 font-serif pb-32" x-data="reservationHandler()">
        
        <section class="relative h-[65vh] w-full overflow-hidden bg-black flex items-center border-b-4 border-double border-white/10">
            <div class="absolute inset-0 z-10 pointer-events-none bg-gradient-to-r from-[#050505] via-transparent to-[#050505]"></div>
            
            <div class="animate-film h-full flex items-center">
                @php 
                    $allPhotos = $restaurant->photos->concat($restaurant->photos)->concat($restaurant->photos); 
                @endphp
                @foreach ($allPhotos as $photo)
                    <div class="h-[50vh] w-[70vw] md:w-[35vw] px-6 flex-shrink-0">
                        <div class="w-full h-full overflow-hidden rounded-sm border border-white/10 shadow-2xl relative">
                            <img src="{{ asset('storage/' . $photo->url_photo) }}" 
                                 class="w-full h-full object-cover grayscale hover:grayscale-0 transition-all duration-1000 scale-110 hover:scale-100">
                            <div class="absolute bottom-4 right-4 text-[8px] tracking-[3px] text-white/30 uppercase italic">Planche {{ $loop->iteration }}</div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="absolute inset-0 z-20 flex flex-col items-center justify-center text-center pointer-events-none">
                <h1 class="text-6xl md:text-9xl font-black italic tracking-tighter text-white mix-blend-difference uppercase">
                    {{ $restaurant->nom_restaurant }}<span class="text-[#FF5F00]">.</span>
                </h1>
                <p class="text-[#FF5F00] text-[9px] font-black tracking-[1em] uppercase mt-4">Volume I — Gastronomie</p>
            </div>
        </section>

        <main class="max-w-7xl mx-auto px-6 md:px-16 mt-24">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 border-l border-r border-white/5 px-4 md:px-12">
                
                <div class="lg:col-span-7 space-y-32 py-12">
                    
                    <article class="prose prose-invert max-w-none">
                        <h2 class="text-[#FF5F00] text-[10px] font-black tracking-[0.5em] uppercase mb-12 flex items-center gap-6">
                            Chapitre I <span class="h-[1px] flex-1 bg-white/10"></span> La Philosophie
                        </h2>
                        <p class="text-3xl md:text-4xl leading-relaxed text-white italic font-serif first-letter:text-6xl first-letter:text-[#FF5F00] first-letter:font-black first-letter:mr-3 first-letter:float-left">
                            {{ $restaurant->description_restaurant }}
                        </p>
                    </article>

                    <section class="relative">
                        <div class="absolute -left-12 top-0 text-[60px] font-black text-white/5 select-none uppercase vertical-text">Menu</div>
                        <h2 class="text-[#FF5F00] text-[10px] font-black tracking-[0.5em] uppercase mb-16 flex items-center gap-6">
                            Chapitre II <span class="h-[1px] flex-1 bg-white/10"></span> La Carte du Chef
                        </h2>
                        
                        @if ($restaurant->menus && $restaurant->menus->plats->isNotEmpty())
                            <div class="grid grid-cols-1 gap-14">
                                @foreach ($restaurant->menus->plats as $plat)
                                    <div class="group relative">
                                        <div class="flex justify-between items-baseline gap-4 mb-3">
                                            <h4 class="text-xl font-bold text-white uppercase tracking-[2px] group-hover:text-[#FF5F00] transition-colors">
                                                {{ $plat->nom_plat }}
                                            </h4>
                                            <div class="flex-1 border-b border-dotted border-white/20"></div>
                                            <span class="text-[#FF5F00] font-black italic text-lg">{{ number_format($plat->prix_plat, 0) }} <small class="text-[10px] tracking-tighter">DH</small></span>
                                        </div>
                                        <p class="text-xs text-gray-500 font-serif italic tracking-wide">Sélection de produits frais, préparée à la minute par notre brigade.</p>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="py-20 text-center italic text-gray-600 border border-double border-white/5">
                                La carte est en cours d'impression...
                            </div>
                        @endif
                    </section>

                    <footer class="pt-20 border-t border-double border-white/10 grid grid-cols-2 gap-8 text-[10px] tracking-[2px] uppercase text-gray-500">
                        <div>
                            <p class="text-[#FF5F00] mb-4">Emplacement</p>
                            <p class="leading-loose">{{ $restaurant->adresse_restaurant }}</p>
                        </div>
                        <div>
                            <p class="text-[#FF5F00] mb-4">Correspondance</p>
                            <p>{{ $restaurant->telephone_restaurant }}</p>
                            <p>{{ $restaurant->email_restaurant }}</p>
                        </div>
                    </footer>
                </div>

                <div class="lg:col-span-5 border-l border-white/5 py-12 pl-0 lg:pl-16">
                    <div class="sticky top-12 space-y-16">
                        
                        <div class="bg-white/[0.02] border border-white/10 p-10 rounded-sm relative overflow-hidden">
                            <div class="absolute top-0 right-0 w-16 h-16 bg-[#FF5F00]/10 rounded-bl-full pointer-events-none"></div>
                            
                            <h2 class="text-[#FF5F00] text-[10px] font-black tracking-[0.5em] uppercase mb-12 text-center">Registre des Tables</h2>
                            
                            <form action="{{ route('client.reservations.store') }}" method="POST" class="space-y-12">
                                @csrf
                                <input type="hidden" name="restaurant_id" value="{{ $restaurant->id }}">

                                <div class="space-y-4">
                                    <label class="text-[9px] text-gray-500 uppercase tracking-[3px] font-black">Date de la séance</label>
                                    <input type="date" name="date_reservation" x-model="selectedDate" @change="updateHours()"
                                        min="{{ date('Y-m-d') }}" required
                                        class="w-full bg-transparent border-0 border-b-2 border-white/5 px-0 py-3 text-white focus:border-[#FF5F00] focus:ring-0 outline-none transition-all font-serif italic text-lg">
                                </div>

                                <div class="space-y-4">
                                    <label class="text-[9px] text-gray-500 uppercase tracking-[3px] font-black">Heure du service</label>
                                    <div class="relative">
                                        <select name="heure_reservation" x-model="selectedHour" required
                                            class="w-full bg-transparent border-0 border-b-2 border-white/5 px-0 py-3 text-white focus:border-[#FF5F00] focus:ring-0 outline-none appearance-none cursor-pointer font-serif italic text-lg">
                                            <option value="" class="bg-[#0A0A0A]">Sélectionner...</option>
                                            <template x-for="hour in availableHours" :key="hour">
                                                <option :value="hour" x-text="formatHour(hour)" class="bg-[#0A0A0A]"></option>
                                            </template>
                                        </select>
                                    </div>
                                    <p x-show="isClosed" class="text-[#FF5F00] text-[9px] font-black uppercase tracking-widest italic animate-pulse">L'établissement est fermé à cette date.</p>
                                </div>

                                <button type="submit" :disabled="!selectedDate || availableHours.length === 0"
                                    class="w-full border border-white/20 text-white font-black py-6 uppercase tracking-[0.5em] text-[10px] hover:bg-white hover:text-black transition-all duration-700 disabled:opacity-5">
                                    Confirmer l'invitation
                                </button>
                            </form>
                        </div>

                        <div class="space-y-8">
                            <h2 class="text-[#FF5F00] text-[10px] font-black tracking-[0.5em] uppercase flex items-center gap-4">
                                Horaires de Service <span class="h-[1px] flex-1 bg-white/10"></span>
                            </h2>
                            <div class="space-y-5">
                                @php
                                    $jours = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
                                    $currentDay = now()->locale('fr')->dayName;
                                @endphp
                                @foreach ($jours as $jour)
                                    @php 
                                        $h = $restaurant->horaires->firstWhere('jour', $jour);
                                        $isToday = strtolower($jour) === strtolower($currentDay);
                                    @endphp
                                    <div class="flex justify-between items-center text-[11px] uppercase tracking-[2px] {{ $isToday ? 'text-white' : 'text-gray-600' }}">
                                        <span class="{{ $isToday ? 'font-black italic text-[#FF5F00]' : '' }}">{{ $jour }}</span>
                                        <div class="flex-1 border-b border-white/5 mx-4 mb-1"></div>
                                        <span class="font-bold">
                                            @if ($h && !$h->ferme)
                                                {{ substr($h->heure_ouverture,0,5) }} — {{ substr($h->heure_fermeture,0,5) }}
                                            @else
                                                <span class="text-red-900/40 italic">Clos</span>
                                            @endif
                                        </span>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </main>
    </div>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;0,900;1,400;1,700&display=swap');
        .font-serif { font-family: 'Playfair Display', serif; }
        .no-scrollbar::-webkit-scrollbar { display: none; }
        
        @keyframes scroll-film {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        .animate-film {
            display: flex;
            width: max-content;
            animation: scroll-film 80s linear infinite;
        }
        .animate-film:hover { animation-play-state: paused; }

        .vertical-text {
            writing-mode: vertical-rl;
            transform: rotate(180deg);
        }
    </style>

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