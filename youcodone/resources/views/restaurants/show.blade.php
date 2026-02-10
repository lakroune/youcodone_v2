<x-app-layout>
    <section class="mt-4 px-4">
        <div class="flex gap-4 overflow-x-auto no-scrollbar snap-x h-[400px]">
            @foreach ($restaurant->photos as $photo)
                <div class="min-w-[70%] md:min-w-[40%] snap-center rounded-[2rem] overflow-hidden border border-white/5">
                    <img src="{{ asset('storage/' . $photo->url_photo) }}"
                        class="w-full h-full object-cover hover:scale-105 transition-transform duration-700"
                        alt="{{ $restaurant->nom_restaurant }}">
                </div>
            @endforeach
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-6 mt-12 grid grid-cols-1 lg:grid-cols-12 gap-12 mb-20">

        <div class="lg:col-span-8 space-y-16">

            <div>
                <span class="text-[#FF5F00] text-[10px] font-black uppercase tracking-[4px]">
                    {{ $restaurant->typeCuisine->nom_type_cuisine }}
                </span>
                <h2 class="text-6xl font-black uppercase italic tracking-tighter mt-2 mb-6">
                    {{ $restaurant->nom_restaurant }}<span class="text-[#FF5F00]">.</span>
                </h2>
                <p class="text-gray-400 text-sm leading-relaxed max-w-2xl">
                    {{ $restaurant->description_restaurant }}
                </p>

                <div class="mt-8 flex flex-wrap gap-6">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center">
                            <svg class="w-5 h-5 text-[#FF5F00]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-[9px] text-gray-500 uppercase tracking-widest">Adresse</p>
                            <p class="text-white text-sm font-bold">{{ $restaurant->adresse_restaurant }}</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center">
                            <svg class="w-5 h-5 text-[#FF5F00]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-[9px] text-gray-500 uppercase tracking-widest">Téléphone</p>
                            <p class="text-white text-sm font-bold">{{ $restaurant->telephone_restaurant }}</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center">
                            <svg class="w-5 h-5 text-[#FF5F00]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-[9px] text-gray-500 uppercase tracking-widest">Capacité</p>
                            <p class="text-white text-sm font-bold">{{ $restaurant->capacity }} Personnes</p>
                        </div>
                    </div>
                </div>
            </div>

            @if ($restaurant->menus && $restaurant->menus->plats->isNotEmpty())
                <div>
                    <h3 class="text-xl font-black uppercase italic mb-8 flex items-center gap-4">
                        Le Menu <div class="h-[1px] flex-1 bg-white/5"></div>
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-8">
                        @foreach ($restaurant->menus->plats as $plat)
                            <div class="flex justify-between items-end border-b border-white/5 pb-4 group">
                                <div class="flex-1">
                                    <h4 class="text-white font-bold text-sm uppercase group-hover:text-[#FF5F00] transition-colors">
                                        {{ $plat->nom_plat }}
                                    </h4>
                                </div>
                                <span class="text-[#FF5F00] font-black text-sm ml-4">{{ number_format($plat->prix_plat, 0) }} DH</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="border border-dashed border-white/10 rounded-2xl p-12 text-center">
                    <p class="text-gray-500 text-xs uppercase tracking-widest">Menu non disponible</p>
                </div>
            @endif

        </div>

        <div class="lg:col-span-4 space-y-8">

            @role('client')
            <div class="bg-white/5 border border-white/10 p-8 rounded-[2.5rem] backdrop-blur-md shadow-2xl">
                <h4 class="text-xs font-black uppercase tracking-[3px] mb-8 text-[#FF5F00] text-center">Réserver une table</h4>
                
                <form action="{{ route('client.reservations.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <input type="hidden" name="restaurant_id" value="{{ $restaurant->id }}">

                    <div>
                        <label class="text-[10px] text-gray-500 uppercase tracking-widest mb-2 block ml-1">Date de visite</label>
                        <input type="date" name="date_reservation" required
                            class="w-full bg-white/5 border border-white/10 rounded-2xl px-5 py-4 text-sm text-white focus:border-[#FF5F00] focus:ring-1 focus:ring-[#FF5F00] transition-all outline-none">
                    </div>

                    <div>
                        <label class="text-[10px] text-gray-500 uppercase tracking-widest mb-2 block ml-1">Heure</label>
                        <input type="time" name="heure_reservation" required
                            class="w-full bg-white/5 border border-white/10 rounded-2xl px-5 py-4 text-sm text-white focus:border-[#FF5F00] focus:ring-1 focus:ring-[#FF5F00] transition-all outline-none">
                    </div>

                    <div>
                        <label class="text-[10px] text-gray-500 uppercase tracking-widest mb-2 block ml-1">Nombre de personnes</label>
                        <input type="number" name="nb_personne" min="1" max="{{ $restaurant->capacity }}" placeholder="Combien serez-vous ?" required
                            class="w-full bg-white/5 border border-white/10 rounded-2xl px-5 py-4 text-sm text-white focus:border-[#FF5F00] focus:ring-1 focus:ring-[#FF5F00] transition-all outline-none">
                    </div>

                    <button type="submit" 
                        class="w-full bg-white text-black font-black py-5 rounded-2xl uppercase tracking-[3px] text-[11px] hover:bg-[#FF5F00] hover:text-white transition-all shadow-xl group flex items-center justify-center gap-2">
                        <span>Confirmer la réservation</span>
                        <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </button>
                </form>
            </div>
            @else
            <div class="bg-white/5 border border-white/10 p-8 rounded-[2.5rem] text-center italic text-gray-400 text-sm">
                Veuillez vous connecter en tant que client pour réserver.
            </div>
            @endrole

            <div class="bg-white/5 p-8 rounded-[2rem] border border-white/5">
                <h4 class="text-xs font-black uppercase tracking-[2px] mb-6 text-[#FF5F00]">Horaires d'ouverture</h4>
                <div class="space-y-3 text-[11px] font-bold uppercase tracking-widest text-gray-400">
                    @php
                        $jours = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
                        $currentDay = now()->locale('fr')->dayName;
                    @endphp

                    @foreach ($jours as $jour)
                        @php
                            $horaire = $restaurant->horaires->firstWhere('jour', $jour);
                        @endphp
                        <div class="flex justify-between border-b border-white/5 pb-2 {{ strtolower($jour) === strtolower($currentDay) ? 'text-[#FF5F00] italic' : '' }}">
                            <span>{{ $jour }}</span>
                            @if ($horaire && !$horaire->ferme)
                                <span class="{{ strtolower($jour) === strtolower($currentDay) ? 'text-[#FF5F00]' : 'text-white' }}">
                                    {{ \Carbon\Carbon::parse($horaire->heure_ouverture)->format('H:i') }} -
                                    {{ \Carbon\Carbon::parse($horaire->heure_fermeture)->format('H:i') }}
                                </span>
                            @else
                                <span class="text-red-500">Fermé</span>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>

            <a href="mailto:{{ $restaurant->email_restaurant }}"
                class="block w-full bg-white/5 border border-white/10 text-white font-black py-4 rounded-2xl uppercase tracking-[3px] text-[10px] hover:border-[#FF5F00] transition-all text-center">
                Nous Contacter par Email
            </a>
        </div>
    </section>
</x-app-layout>