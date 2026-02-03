<x-app-layout>
    <div class="relative bg-black py-20 border-b border-white/5">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h1 class="text-5xl md:text-7xl font-black italic uppercase tracking-tighter text-white mb-6">
                Trouvez votre <span class="text-[#FF5F00]">Table.</span>
            </h1>
            
            <form action="{{ route('home') }}" method="GET" class="max-w-3xl mx-auto mt-10">
                <div class="flex flex-col md:flex-row gap-4 p-2 bg-[#111] border border-white/10 rounded-2xl">
                    <input type="text" name="search" placeholder="Ville, Cuisine, Nom..." 
                           class="flex-1 bg-transparent border-none text-white focus:ring-0 px-6 py-4"
                           value="{{ request('search') }}">
                    <button type="submit" class="bg-[#FF5F00] text-white font-black uppercase tracking-widest px-10 py-4 rounded-xl hover:bg-white hover:text-black transition-all">
                        Rechercher
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-6 py-20">
        <div class="flex justify-between items-end mb-12">
            <div>
                <p class="text-[#FF5F00] font-black uppercase tracking-[4px] text-xs mb-2">Exploration</p>
                <h2 class="text-white text-3xl font-black uppercase italic">Restaurants Disponibles</h2>
            </div>
            <span class="text-gray-600 text-xs font-bold uppercase tracking-widest">{{ $restaurants->count() }} Résultats</span>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($restaurants as $restaurant)
                <div class="group bg-[#0A0A0A] border border-white/5 rounded-3xl overflow-hidden hover:border-[#FF5F00]/50 transition-all duration-500">
                    <div class="relative h-64 overflow-hidden">
                        <img src="{{ asset('storage/' . $restaurant->image) }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        
                        <button class="absolute top-6 right-6 p-3 bg-black/50 backdrop-blur-md rounded-full text-white hover:text-[#FF5F00] transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                        </button>

                        <div class="absolute bottom-4 left-6">
                            <span class="bg-[#FF5F00] text-white text-[8px] font-black uppercase tracking-widest px-3 py-1 rounded-full">
                                {{ $restaurant->cuisine_type }}
                            </span>
                        </div>
                    </div>

                    <div class="p-8">
                        <div class="flex justify-between items-start mb-4">
                            <h3 class="text-white text-xl font-black uppercase italic tracking-tight">{{ $restaurant->name }}</h3>
                            <span class="text-gray-500 text-[10px] font-bold uppercase tracking-widest">{{ $restaurant->city }}</span>
                        </div>
                        
                        <p class="text-gray-500 text-xs leading-relaxed mb-8 line-clamp-2">
                            {{ $restaurant->description }}
                        </p>

                        <div class="flex items-center justify-between pt-6 border-t border-white/5">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-[#FF5F00]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                <span class="text-white text-[10px] font-black uppercase tracking-widest">{{ $restaurant->opening_hours }}</span>
                            </div>
                            <a href=" " class="text-[10px] font-black uppercase tracking-widest text-[#FF5F00] hover:text-white transition-colors">
                                Détails →
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>