<x-app-layout>
    <div class="bg-[#050505] min-h-screen text-gray-200 font-serif pb-32">
        
        <header class="py-20 border-b border-white/5 text-center relative overflow-hidden">
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-[#FF5F00]/5 via-transparent to-transparent"></div>
            
            <span class="text-[#FF5F00] text-[10px] font-black tracking-[0.6em] uppercase mb-4 block animate-fade-in">
                Espace Personnel
            </span>
            <h1 class="text-5xl md:text-7xl font-black italic tracking-tighter text-white uppercase">
                Mes <span class="text-[#FF5F00]">Invitations.</span>
            </h1>
            <div class="mt-8 flex justify-center items-center gap-4">
                <div class="h-[1px] w-12 bg-white/10"></div>
                <p class="text-xs text-gray-500 tracking-[3px] uppercase italic">Historique et Réservations</p>
                <div class="h-[1px] w-12 bg-white/10"></div>
            </div>
        </header>

        <main class="max-w-6xl mx-auto px-6 mt-20">
            @if($reservations->isEmpty())
                <div class="text-center py-40 border border-dashed border-white/10 rounded-[3rem]">
                    <p class="text-gray-600 uppercase tracking-[4px] text-xs italic mb-8">Votre registre est actuellement vide</p>
                    <a href="{{ route('home') }}" class="inline-flex items-center gap-4 text-[#FF5F00] text-[10px] font-black uppercase tracking-[3px] border border-[#FF5F00]/30 px-8 py-4 rounded-full hover:bg-[#FF5F00] hover:text-black transition-all">
                        Découvrir nos tables
                    </a>
                </div>
            @else
                <div class="bg-[#0A0A0A] border border-white/10 rounded-[2.5rem] overflow-hidden shadow-2xl">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b border-white/5 bg-white/[0.02]">
                                <th class="px-8 py-6 text-[10px] font-black uppercase tracking-widest text-[#FF5F00]">Établissement</th>
                                <th class="px-8 py-6 text-[10px] font-black uppercase tracking-widest text-[#FF5F00]">Date & Heure</th>
                                <th class="px-8 py-6 text-[10px] font-black uppercase tracking-widest text-[#FF5F00]">Statut</th>
                                <th class="px-8 py-6 text-[10px] font-black uppercase tracking-widest text-[#FF5F00] text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/5">
                            @foreach($reservations as $reservation)
                                <tr class="group hover:bg-white/[0.01] transition-colors">
                                    <td class="px-8 py-10">
                                        <div class="flex items-center gap-4">
                                            <div class="w-12 h-12 rounded-full overflow-hidden border border-white/10">
                                                <img src="{{ asset('storage/' . $reservation->restaurant->photos->first()->url_photo) }}" class="w-full h-full object-cover">
                                            </div>
                                            <div>
                                                <h4 class="text-white font-bold uppercase tracking-wider group-hover:text-[#FF5F00] transition-colors">
                                                    {{ $reservation->restaurant->nom_restaurant }}
                                                </h4>
                                                <p class="text-[10px] text-gray-500 uppercase tracking-widest">{{ $reservation->restaurant->adresse_restaurant }}</p>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-8 py-10">
                                        <div class="space-y-1">
                                            <p class="text-white font-serif italic text-lg">{{ \Carbon\Carbon::parse($reservation->date_reservation)->format('d M Y') }}</p>
                                            <p class="text-[10px] text-[#FF5F00] font-black uppercase tracking-widest">{{ $reservation->heure_reservation }}</p>
                                        </div>
                                    </td>

                                    <td class="px-8 py-10">
                                        @if($reservation->status == 'confirme')
                                            <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full border border-green-500/30 text-green-500 text-[9px] font-black uppercase tracking-widest bg-green-500/5">
                                                <span class="w-1.5 h-1.5 rounded-full bg-green-500 animate-pulse"></span> Confirmée
                                            </span>
                                        @elseif($reservation->status == 'en_attente')
                                            <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full border border-yellow-500/30 text-yellow-500 text-[9px] font-black uppercase tracking-widest bg-yellow-500/5">
                                                <span class="w-1.5 h-1.5 rounded-full bg-yellow-500"></span> En Attente
                                            </span>
                                        @else
                                            <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full border border-red-500/30 text-red-500 text-[9px] font-black uppercase tracking-widest bg-red-500/5">
                                                Annulée
                                            </span>
                                        @endif
                                    </td>

                                    <td class="px-8 py-10 text-right">
                                        <div class="flex justify-end gap-4">
                                            <a href="{{ route('restaurants.show', $reservation->restaurant) }}" class="p-3 bg-white/5 hover:bg-[#FF5F00] hover:text-black rounded-xl transition-all border border-white/5">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                            </a>

                                            @if($reservation->status != 'annule')
                                                <form action="{{ route('client.reservations.destroy', $reservation) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment annuler cette invitation ?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="p-3 bg-red-500/10 hover:bg-red-500 text-red-500 hover:text-white rounded-xl transition-all border border-red-500/20">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M6 18L18 6M6 6l12 12"/></svg>
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-12">
                    {{ $reservations->links() }}
                </div>
            @endif
        </main>
    </div>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,900;1,900&display=swap');
        .font-serif { font-family: 'Playfair Display', serif; }
        
        @keyframes fade-in {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in { animation: fade-in 1s ease-out; }
    </style>
</x-app-layout>