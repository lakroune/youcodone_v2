<x-app-layout>
    <div class="bg-[#050505] min-h-screen text-white font-serif">
        
        <section class="relative py-32 border-b border-white/5 overflow-hidden">
            <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-[#FF5F00]/5 blur-[120px] rounded-full -mr-64 -mt-64 pointer-events-none"></div>
            
            <div class="max-w-7xl mx-auto px-6 text-center relative z-10">
                <span class="text-[#FF5F00] font-black uppercase tracking-[8px] text-[10px] mb-6 block animate-fade-in">
                    L'Art de la Table à Safi
                </span>
                <h1 class="text-7xl md:text-9xl font-black italic uppercase tracking-tighter mb-10 leading-none">
                    Réservez <span class="text-[#FF5F00]">l'Excellence.</span>
                </h1>
                
                <form action="{{ route('home') }}" method="GET" class="max-w-4xl mx-auto relative group px-4">
                    <div class="relative flex items-center">
                        <input type="text" name="search" value="{{ request('search') }}" 
                               placeholder="Un restaurant, une cuisine, une envie..." 
                               class="w-full bg-white/[0.03] border-0 border-b-2 border-white/10 px-4 py-6 text-xl focus:border-[#FF5F00] focus:ring-0 transition-all outline-none placeholder:text-gray-600 italic">
                        <button type="submit" class="absolute right-4 text-[#FF5F00] hover:text-white transition-colors">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                        </button>
                    </div>
                </form>
            </div>
        </section>

        <div class="max-w-7xl mx-auto px-6 py-24">
            <div class="flex flex-col lg:flex-row gap-20">
                
                <aside class="w-full lg:w-72 space-y-16">
                    <div>
                        <h3 class="text-[11px] font-black uppercase tracking-[4px] text-[#FF5F00] mb-10 flex items-center gap-3">
                            <span class="w-6 h-[1px] bg-[#FF5F00]"></span> Catégories
                        </h3>
                        <div class="flex flex-col gap-4">
                            @foreach(['Marocaine', 'Italienne', 'Mer', 'Fast-Food', 'International'] as $tag)
                                <a href="?search={{ $tag }}" class="group flex items-center justify-between py-2 border-b border-white/5 hover:border-[#FF5F00] transition-all">
                                    <span class="text-sm uppercase tracking-widest text-gray-500 group-hover:text-white transition-colors">{{ $tag }}</span>
                                    <span class="text-[10px] text-[#FF5F00] opacity-0 group-hover:opacity-100 transition-opacity">→</span>
                                </a>
                            @endforeach
                        </div>
                    </div>

                    <div class="p-8 border border-white/5 rounded-2xl bg-white/[0.01]">
                        <p class="text-[10px] text-gray-600 uppercase tracking-widest leading-loose italic">
                            "La gastronomie est l'art d'utiliser la nourriture pour créer du bonheur."
                        </p>
                    </div>
                </aside>

                <main class="flex-1">
                    @if($restaurants->isEmpty())
                        <div class="text-center py-32 border border-dashed border-white/5 rounded-[3rem] bg-white/[0.01]">
                            <svg class="w-16 h-16 text-gray-800 mx-auto mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9.172 9.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            <p class="text-gray-500 uppercase font-black tracking-[4px] text-xs italic">Aucun établissement trouvé</p>
                        </div>
                    @else
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-20">
                            @foreach($restaurants as $restaurant)
                                <div class="group relative flex flex-col">
                                    <div class="relative aspect-[4/5] overflow-hidden rounded-[2.5rem] mb-8 shadow-2xl">
                                        @if($restaurant->photos->isNotEmpty())
                                            <img src="{{ asset('storage/' . $restaurant->photos->first()->url_photo) }}" 
                                                 class="w-full h-full object-cover grayscale group-hover:grayscale-0 group-hover:scale-110 transition-all duration-[1.5s] ease-out">
                                        @else
                                            <div class="w-full h-full bg-neutral-900 flex items-center justify-center">
                                                <span class="text-[10px] tracking-widest text-gray-700">NO IMAGE</span>
                                            </div>
                                        @endif
                                        
                                        <div class="absolute top-8 left-8">
                                            <span class="bg-white text-black text-[9px] font-black uppercase tracking-[3px] px-5 py-2 rounded-full">
                                                {{ $restaurant->adresse_restaurant }}
                                            </span>
                                        </div>

                                        <button class="absolute top-8 right-8 w-12 h-12 bg-black/20 backdrop-blur-md rounded-full flex items-center justify-center text-white hover:bg-[#FF5F00] transition-all border border-white/10 group-hover:scale-110">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                                        </button>

                                        <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-60"></div>
                                    </div>

                                    <div class="px-2 space-y-4">
                                        <div class="flex justify-between items-start">
                                            <div>
                                                <p class="text-[#FF5F00] text-[10px] font-black uppercase tracking-[4px] mb-2">
                                                    {{ $restaurant->typeCuisine->nom_type_cuisine ?? 'GASTRONOMIE' }}
                                                </p>
                                                <h3 class="text-3xl font-black uppercase italic tracking-tighter text-white group-hover:tracking-normal transition-all duration-500">
                                                    {{ $restaurant->nom_restaurant }}
                                                </h3>
                                            </div>
                                        </div>

                                        <p class="text-gray-500 text-sm font-serif italic line-clamp-2 leading-relaxed">
                                            {{ Str::limit($restaurant->description_restaurant, 100) }}
                                        </p>
                                        
                                        <div class="pt-4">
                                            <a href="{{ route('restaurants.show', $restaurant) }}" class="inline-flex items-center gap-6 group/btn">
                                                <span class="text-[10px] font-black uppercase tracking-[5px] text-white group-hover/btn:text-[#FF5F00] transition-colors">Explorer</span>
                                                <span class="h-[1px] w-12 bg-[#FF5F00] group-hover/btn:w-20 transition-all duration-500"></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        
                        <div class="mt-24 border-t border-white/5 pt-12">
                            {{ $restaurants->links() }}
                        </div>
                    @endif
                </main>
            </div>
        </div>
    </div>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,900;1,900&display=swap');
        .font-serif { font-family: 'Playfair Display', serif; }
        
        .pagination { @apply flex justify-center gap-4; }
        .page-item { @apply rounded-full; }

        @keyframes fade-in {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in { animation: fade-in 1.2s ease-out forwards; }
    </style>
</x-app-layout>