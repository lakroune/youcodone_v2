<x-app-layout>
    <section class="mt-4 px-4">
        <div class="flex gap-4 overflow-x-auto no-scrollbar snap-x h-[400px]">
            @forelse ($restaurant->photos as $photo)
                <div class="min-w-[70%] md:min-w-[40%] snap-center rounded-[2rem] overflow-hidden border border-white/5">
                    <img src="{{ asset('storage/' . $photo->url_photo) }}" class="w-full h-full object-cover hover:scale-105 transition-transform duration-700" alt="{{ $restaurant->nom_restaurant }}">
                </div>
            @empty
                <div class="w-full bg-white/5 rounded-[2rem] flex items-center justify-center border border-dashed border-white/10">
                    <p class="text-gray-500 uppercase tracking-widest text-xs">Aucune photo disponible</p>
                </div>
            @endforelse
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-6 mt-12 grid grid-cols-1 lg:grid-cols-12 gap-12 mb-20" 
             x-data="reservationHandler()">
        
        <div class="lg:col-span-8 space-y-16">
            <div>
                <span class="text-[#FF5F00] text-[10px] font-black uppercase tracking-[4px]">{{ $restaurant->typeCuisine->nom_type_cuisine ?? 'Cuisine' }}</span>
                <h2 class="text-6xl font-black uppercase italic tracking-tighter mt-2 mb-6 text-white">{{ $restaurant->nom_restaurant }}<span class="text-[#FF5F00]">.</span></h2>
                <p class="text-gray-400 text-sm leading-relaxed max-w-2xl">{{ $restaurant->description_restaurant }}</p>
            </div>

            <div>
                <h3 class="text-xl font-black uppercase italic mb-8 flex items-center gap-4 text-white">Le Menu <div class="h-[1px] flex-1 bg-white/5"></div></h3>
                @forelse ($restaurant->menus->plats as $plat)
                    <div class="flex justify-between items-end border-b border-white/5 pb-4 mb-4 group">
                        <h4 class="text-white font-bold text-sm uppercase group-hover:text-[#FF5F00] transition-colors">{{ $plat->nom_plat }}</h4>
                        <span class="text-[#FF5F00] font-black text-sm ml-4">{{ number_format($plat->prix_plat, 0) }} DH</span>
                    </div>
                @empty
                    <p class="text-gray-500 text-xs italic">Menu non disponible.</p>
                @endforelse
            </div>
        </div>

        <div class="lg:col-span-4 space-y-8">
            @role('client')
            <div class="bg-white/5 border border-white/10 p-8 rounded-[2.5rem] backdrop-blur-md shadow-2xl">
                <h4 class="text-xs font-black uppercase tracking-[3px] mb-8 text-[#FF5F00] text-center">Réserver une visite</h4>
                
                <form action="{{ route('client.reservations.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <input type="hidden" name="restaurant_id" value="{{ $restaurant->id }}">

                    <div>
                        <label class="text-[10px] text-gray-500 uppercase tracking-widest mb-2 block ml-1">Date</label>
                        <input type="date" name="date_reservation" 
                               x-model="selectedDate"
                               @change="updateHours()"
                               min="{{ date('Y-m-d') }}" required
                               class="w-full bg-[#121212] border border-white/10 rounded-2xl px-5 py-4 text-sm text-white focus:border-[#FF5F00] outline-none">
                    </div>

                    <div>
                        <label class="text-[10px] text-gray-500 uppercase tracking-widest mb-2 block ml-1">Heure disponible</label>
                        <select name="heure_reservation" required
                                class="w-full bg-[#121212] border border-white/10 rounded-2xl px-5 py-4 text-sm text-white focus:border-[#FF5F00] outline-none appearance-none">
                            <option value="">Choisir l'heure</option>
                            <template x-for="hour in availableHours" :key="hour">
                                <option :value="hour" x-text="formatHour(hour)"></option>
                            </template>
                        </select>
                        
                        <p x-show="isClosed" class="text-red-500 text-[9px] mt-2 ml-1 italic">
                            Désolé, le restaurant est fermé ce jour-là.
                        </p>
                        <p x-show="!isClosed && availableHours.length > 0" class="text-[9px] text-gray-500 mt-2 ml-1 italic">
                            * Durée de réservation : 2 heures.
                        </p>
                    </div>

                    <button type="submit" :disabled="isClosed || availableHours.length === 0"
                            class="w-full bg-white text-black font-black py-5 rounded-2xl uppercase tracking-[3px] text-[11px] hover:bg-[#FF5F00] hover:text-white transition-all disabled:opacity-50 group flex items-center justify-center gap-2">
                        <span>Confirmer</span>
                    </button>
                </form>
            </div>
            @endrole

            <div class="bg-white/5 p-8 rounded-[2rem] border border-white/5">
                <h4 class="text-xs font-black uppercase tracking-[2px] mb-6 text-[#FF5F00]">Horaires</h4>
                <div class="space-y-3 text-[11px] font-bold uppercase tracking-widest text-gray-400">
                    @foreach (['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'] as $jour)
                        @php $h = $restaurant->horaires->firstWhere('jour', $jour); @endphp
                        <div class="flex justify-between border-b border-white/5 pb-2">
                            <span>{{ $jour }}</span>
                            <span class="text-white">{{ ($h && !$h->ferme) ? substr($h->heure_ouverture,0,5).' - '.substr($h->heure_fermeture,0,5) : 'Fermé' }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <script>
        function reservationHandler() {
            return {
                selectedDate: '',
                availableHours: [],
                isClosed: false,
                // نمرر البيانات من Laravel إلى JavaScript
                horaires: @json($restaurant->horaires),
                
                updateHours() {
                    if (!this.selectedDate) return;

                    const date = new Date(this.selectedDate);
                    const days = ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'];
                    const dayName = days[date.getDay()];

                    const config = this.horaires.find(h => h.jour === dayName);

                    if (!config || config.ferme) {
                        this.availableHours = [];
                        this.isClosed = true;
                        return;
                    }

                    this.isClosed = false;
                    const start = parseInt(config.heure_ouverture.split(':')[0]);
                    const end = parseInt(config.heure_fermeture.split(':')[0]);
                    
                    let hours = [];
                    // نقوم بإنشاء الساعات من وقت الفتح حتى (وقت القفل - 2) لضمان مدة الساعتين
                    for (let i = start; i <= (end - 2); i++) {
                        hours.push(i);
                    }
                    this.availableHours = hours;
                },

                formatHour(h) {
                    return h.toString().padStart(2, '0') + ':00';
                }
            }
        }
    </script>
</x-app-layout>