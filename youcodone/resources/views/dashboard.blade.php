<x-app-layout>
    <div class="bg-black min-h-screen pb-20">
        <div class="border-b border-white/5 py-12 bg-[#050505]">
            <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row justify-between items-center gap-8">
                <div>
                    <p class="text-[#FF5F00] font-black uppercase tracking-[4px] text-[10px] mb-2">Espace Restaurateur</p>
                    <h1 class="text-4xl font-black italic uppercase text-white tracking-tighter">Tableau de <span class="text-[#FF5F00]">Bord.</span></h1>
                </div>
                
                <div class="flex gap-4">
                    <div class="bg-[#111] border border-white/5 p-6 rounded-2xl min-w-[160px]">
                        <p class="text-gray-500 text-[8px] font-black uppercase tracking-widest mb-1">Total Restaurants</p>
                        <p class="text-2xl font-black text-white italic">{{ $restaurants->count() }}</p>
                    </div>
                    <a href="{{ route('restaurants.create') }}" class="bg-[#FF5F00] hover:bg-white text-black font-black uppercase text-[10px] tracking-widest px-8 py-6 rounded-2xl transition-all flex items-center">
                        + Ajouter Restaurant
                    </a>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-6 mt-12">
            
            <h2 class="text-white text-[10px] font-black uppercase tracking-[4px] mb-8">Mes Établissements ({{ $restaurants->count() }})</h2>

            @if($restaurants->isEmpty())
                <div class="border border-dashed border-white/10 rounded-[3rem] py-32 text-center">
                    <p class="text-gray-600 font-black uppercase tracking-widest text-xs">Vous n'avez pas encore publié de restaurant.</p>
                </div>
            @else
                <div class="grid grid-cols-1 gap-6">
                    @foreach($restaurants as $restaurant)
                        <div class="bg-[#0A0A0A] border border-white/5 rounded-3xl p-8 flex flex-col md:flex-row items-center justify-between group hover:border-[#FF5F00]/30 transition-all shadow-2xl">
                            
                            <div class="flex items-center gap-8 w-full md:w-auto">
                                <div class="w-24 h-24 rounded-2xl overflow-hidden border border-white/10">
                                    <img src="{{ asset('storage/'.$restaurant->image) }}" class="w-full h-full object-cover">
                                </div>
                                
                                <div>
                                    <h3 class="text-xl font-black text-white uppercase italic tracking-tight">{{ $restaurant->name }}</h3>
                                    <p class="text-[9px] font-bold text-gray-500 uppercase tracking-[2px] mt-1">{{ $restaurant->city }} • {{ $restaurant->cuisine_type }}</p>
                                    <div class="flex gap-3 mt-4">
                                        <span class="text-[8px] font-black bg-white/5 text-gray-400 px-3 py-1 rounded-full uppercase tracking-widest border border-white/5 italic">
                                            {{ $restaurant->reservations_count }} Réservations
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-center gap-4 mt-8 md:mt-0 w-full md:w-auto justify-end">
                                <a href="{{ route('restaurants.edit', $restaurant) }}" class="p-4 bg-white/5 hover:bg-white hover:text-black rounded-xl text-white transition-all">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                </a>
                                
                                <form action="{{ route('restaurants.destroy', $restaurant) }}" method="POST" onsubmit="return confirm('Supprimer ce restaurant ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="p-4 bg-red-500/10 hover:bg-red-500 text-red-500 hover:text-white rounded-xl transition-all">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                    </button>
                                </form>

                                <a href="{{ route('restaurants.show', $restaurant) }}" class="ml-4 text-[10px] font-black uppercase tracking-widest text-[#FF5F00] hover:text-white transition-colors">
                                    Voir Détails →
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-app-layout>