<x-app-layout>
    <div class="bg-[#050505] min-h-screen text-gray-200 font-serif pb-32" x-data="reservationHandler()">
        
        <section class="relative h-[70vh] w-full overflow-hidden border-b border-white/5 bg-black">
            <div class="absolute inset-0 z-10 pointer-events-none bg-gradient-to-r from-[#050505] via-transparent to-[#050505]"></div>
            
            <div class="animate-film h-full flex items-center">
                @php $allPhotos = $restaurant->photos->concat($restaurant->photos); @endphp
                @foreach ($allPhotos as $photo)
                    <div class="h-[60vh] w-[80vw] md:w-[40vw] px-4 flex-shrink-0">
                        <div class="w-full h-full overflow-hidden rounded-[2rem] border border-white/10 shadow-2xl">
                            <img src="{{ asset('storage/' . $photo->url_photo) }}" 
                                 class="w-full h-full object-cover grayscale hover:grayscale-0 transition-all duration-1000 scale-110 hover:scale-100">
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="absolute inset-0 z-20 flex flex-col items-center justify-center text-center pointer-events-none">
                <h1 class="text-7xl md:text-9xl font-black italic tracking-tighter text-white mix-blend-difference uppercase">
                    {{ $restaurant->nom_restaurant }}<span class="text-[#FF5F00]">.</span>
                </h1>
                <p class="text-[#FF5F00] text-[10px] font-black tracking-[0.8em] uppercase mt-4">Experience Gastronomique</p>
            </div>
        </section>

        <main class="max-w-7xl mx-auto px-8 md:px-16 mt-32">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-24">
                
                <div class="lg:col-span-7 space-y-32">
                    <article>
                        <h2 class="text-[#FF5F00] text-[11px] font-black tracking-[0.4em] uppercase mb-10 flex items-center gap-4">
                            <span class="w-8 h-[1px] bg-[#FF5F00]"></span> Philosophy
                        </h2>
                        <p class="text-2xl md:text-4xl leading-[1.4] text-white italic font-light font-serif">
                            {{ $restaurant->description_restaurant }}
                        </p>
                    </article>

                    <section>
                        <h2 class="text-[#FF5F00] text-[11px] font-black tracking-[0.4em] uppercase mb-16">Signature Menu</h2>
                        @if ($restaurant->menus && $restaurant->menus->plats->isNotEmpty())
                            <div class="space-y-12">
                                @foreach ($restaurant->menus->plats as $plat)
                                    <div class="group">
                                        <div class="flex justify-between items-end mb-2">
                                            <h4 class="text-lg font-bold text-white uppercase tracking-wider group-hover:text-[#FF5F00] transition-colors">
                                                {{ $plat->nom_plat }}
                                            </h4>
                                            <span class="text-[#FF5F00] font-black italic">{{ number_format($plat->prix_plat, 0) }} DH</span>
                                        </div>
                                        <div class="h-[1px] w-full bg-white/10"></div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </section>
                </div>

                <div class="lg:col-span-5 relative">
                    <div class="sticky top-24 bg-[#0A0A0A] border border-white/5 p-12 rounded-2xl shadow-2xl">
                        <form action="{{ route('client.reservations.store') }}" method="POST" class="space-y-12">
                            @csrf
                            <input type="hidden" name="restaurant_id" value="{{ $restaurant->id }}">

                            <div>
                                <label class="text-[9px] text-gray-500 uppercase tracking-widest mb-6 block font-black">01. Choisir Une Date</label>
                                <input type="date" name="date_reservation" x-model="selectedDate" @change="updateHours()"
                                    min="{{ date('Y-m-d') }}" required
                                    class="w-full bg-transparent border-0 border-b border-white/10 px-0 py-4 text-white focus:border-[#FF5F00] focus:ring-0 outline-none">
                            </div>

                            <div>
                                <label class="text-[9px] text-gray-500 uppercase tracking-widest mb-6 block font-black">02. Heure de Table</label>
                                <div class="relative">
                                    <select name="heure_reservation" x-model="selectedHour" required
                                        class="w-full bg-transparent border-0 border-b border-white/10 px-0 py-4 text-white focus:border-[#FF5F00] focus:ring-0 outline-none appearance-none cursor-pointer">
                                        <option value="" class="bg-[#0A0A0A]">SÉLECTIONNER</option>
                                        <template x-for="hour in availableHours" :key="hour">
                                            <option :value="hour" x-text="formatHour(hour)" class="bg-[#0A0A0A]"></option>
                                        </template>
                                    </select>
                                    <span class="absolute right-0 bottom-4 text-[#FF5F00] pointer-events-none">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7"/></svg>
                                    </span>
                                </div>
                            </div>

                            <button type="submit" :disabled="isClosed || !selectedDate || availableHours.length === 0"
                                class="w-full bg-white text-black font-black py-6 uppercase tracking-[0.5em] text-[10px] hover:bg-[#FF5F00] hover:text-white transition-all duration-700 disabled:opacity-5">
                                Réserver Maintenant
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>

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