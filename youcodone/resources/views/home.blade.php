<x-app-layout>
    <!-- Hero Section -->
    <div class="relative bg-[#0a0a0a] py-32 border-b border-[#FF6B35]/10 overflow-hidden">
        <!-- Background Effects -->
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,_var(--tw-gradient-stops))] from-[#FF6B35]/5 via-transparent to-transparent opacity-50"></div>
        <div class="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-[#FF6B35]/30 to-transparent"></div>
        
        <div class="max-w-7xl mx-auto px-6 text-center relative z-10">
            <span class="text-[#FF6B35] text-[11px] font-bold uppercase tracking-[0.4em] mb-6 block animate-fade-in">
                Réservez votre moment
            </span>
            
            <h1 class="text-5xl md:text-7xl lg:text-8xl font-serif font-bold italic text-white mb-8 leading-none animate-fade-in delay-100">
                Trouvez votre <br>
                <span class="text-[#FF6B35]">table parfaite.</span>
            </h1>
            
            <p class="text-gray-400 text-sm max-w-md mx-auto mb-12 font-light animate-fade-in delay-200">
                Découvrez les meilleurs restaurants sélectionnés pour vous et réservez en quelques clics.
            </p>

            <!-- Search Form -->
            <form action="{{ route('home') }}" method="POST" class="max-w-2xl mx-auto animate-fade-in delay-300">
                @csrf
                @method('POST')
                <div class="relative group">
                    <div class="absolute inset-0 bg-[#FF6B35]/20 rounded-full blur-xl opacity-0 group-focus-within:opacity-100 transition-opacity duration-500"></div>
                    <input type="text" name="search" placeholder="Rechercher par ville, cuisine ou nom..."
                        class="relative w-full bg-[#111] border border-white/10 rounded-full text-white px-8 py-5 pl-14 text-sm outline-none focus:border-[#FF6B35] focus:ring-2 focus:ring-[#FF6B35]/20 transition-all placeholder:text-gray-600"
                        value="{{ request('search') }}">
                    <svg class="absolute left-6 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-500 group-focus-within:text-[#FF6B35] transition-colors" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    <button type="submit" 
                        class="absolute right-3 top-1/2 -translate-y-1/2 bg-[#FF6B35] text-black px-6 py-2.5 rounded-full text-xs font-bold uppercase tracking-wider hover:bg-white transition-all duration-300">
                        Chercher
                    </button>
                </div>
            </form>

            <!-- Quick Filters -->
            <div class="flex flex-wrap justify-center gap-3 mt-8 animate-fade-in delay-400">
                @foreach(['Italien', 'Français', 'Japonais', 'Marocain', 'Méditerranéen'] as $cuisine)
                    <a href="#" class="px-4 py-2 bg-white/5 border border-white/10 rounded-full text-[10px] text-gray-400 uppercase tracking-wider hover:border-[#FF6B35]/30 hover:text-[#FF6B35] transition-all duration-300">
                        {{ $cuisine }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Restaurants Grid -->
    <div class="max-w-7xl mx-auto px-6 py-24">
        @if ($restaurants->isEmpty())
            <!-- Empty State -->
            <div class="flex flex-col items-center justify-center py-32 border border-dashed border-white/10 rounded-[3rem] bg-gradient-to-b from-white/[0.02] to-transparent relative overflow-hidden">
                <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-[#FF6B35]/5 via-transparent to-transparent opacity-30"></div>
                
                <div class="w-24 h-24 bg-[#FF6B35]/5 border border-[#FF6B35]/20 rounded-full flex items-center justify-center mb-8">
                    <svg class="w-10 h-10 text-[#FF6B35]/40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                
                <h3 class="text-2xl font-serif font-bold italic text-white mb-3">Aucun résultat</h3>
                <p class="text-gray-500 text-sm mb-8">Essayez une autre recherche ou découvrez tous nos restaurants</p>
                
                <a href="{{ route('home') }}"
                    class="inline-flex items-center gap-3 px-8 py-4 bg-[#FF6B35] text-black text-xs font-bold uppercase tracking-[0.2em] rounded-full hover:bg-white transition-all duration-300 shadow-lg shadow-[#FF6B35]/20">
                    Voir tous les restaurants
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </a>
            </div>
        @else
            <!-- Section Header -->
            <div class="flex items-end justify-between mb-12">
                <div>
                    <span class="text-[#FF6B35] text-[10px] font-bold uppercase tracking-[0.3em] mb-2 block">Nos Sélections</span>
                    <h2 class="text-3xl font-serif font-bold italic text-white">Restaurants disponibles</h2>
                </div>
                <div class="hidden md:flex items-center gap-2 text-gray-500 text-xs">
                    <span>{{ $restaurants->count() }} établissements</span>
                    <div class="w-1 h-1 rounded-full bg-[#FF6B35]"></div>
                </div>
            </div>

            <!-- Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($restaurants as $restaurant)
                    <div class="group relative bg-[#111] border border-white/5 rounded-[2rem] overflow-hidden hover:border-[#FF6B35]/30 transition-all duration-700 shadow-2xl hover:shadow-[#FF6B35]/5 hover:-translate-y-2">

                        <!-- Image Container -->
                        <div class="relative h-80 overflow-hidden">
                            <img src="{{ asset('storage/' . $restaurant->photos[0]->url_photo) }}"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-[1.5s] ease-out"
                                alt="{{ $restaurant->nom_restaurant }}">
                            
                            <!-- Gradient Overlay -->
                            <div class="absolute inset-0 bg-gradient-to-t from-[#111] via-black/40 to-transparent opacity-90"></div>

                            <!-- Like Button -->
                            <form action="{{ route('home.like') }}" method="POST" class="absolute top-6 right-6">
                                @csrf
                                @method('POST')
                                <input type="hidden" name="restaurant_id" value="{{ $restaurant->id }}">
                                <button type="submit"
                                    class="w-12 h-12 bg-black/40 backdrop-blur-md rounded-full flex items-center justify-center text-white border border-white/10 hover:bg-[#FF6B35] hover:text-black hover:border-[#FF6B35] transition-all duration-300 group/btn">
                                    <svg class="w-5 h-5 group-hover/btn:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                    </svg>
                                </button>
                            </form>

                            <!-- Location Badge -->
                            <div class="absolute bottom-6 left-6 right-6">
                                <div class="flex items-center gap-2 text-white/90 text-xs mb-3">
                                    <svg class="w-4 h-4 text-[#FF6B35]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <span class="font-medium">{{ $restaurant->adresse_restaurant }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="p-8">
                            <!-- Cuisine Type -->
                            <div class="flex items-center gap-3 mb-4">
                                <span class="px-3 py-1 bg-[#FF6B35]/10 border border-[#FF6B35]/20 rounded-full text-[10px] font-bold text-[#FF6B35] uppercase tracking-wider">
                                    {{ $restaurant->typeCuisine->nom_type_cuisine }}
                                </span>
                                @if($restaurant->prix_reservation)
                                    <span class="text-gray-500 text-xs">{{ number_format($restaurant->prix_reservation, 0) }} DH</span>
                                @endif
                            </div>

                            <!-- Title -->
                            <h3 class="text-2xl font-serif font-bold italic text-white mb-4 group-hover:text-[#FF6B35] transition-colors duration-300 leading-tight">
                                {{ $restaurant->nom_restaurant }}
                            </h3>

                            <!-- Separator -->
                            <div class="flex items-center gap-3 mb-6">
                                <div class="h-px flex-1 bg-white/10"></div>
                                <div class="flex gap-1">
                                    <div class="w-1 h-1 rounded-full bg-[#FF6B35]"></div>
                                    <div class="w-1 h-1 rounded-full bg-[#FF6B35]/50"></div>
                                </div>
                                <div class="h-px flex-1 bg-white/10"></div>
                            </div>

                            <!-- Footer -->
                            <div class="flex items-center justify-between">
                                <a href="{{ route('client.restaurant.show', $restaurant) }}"
                                    class="group/link inline-flex items-center gap-3 text-[11px] font-bold uppercase tracking-[0.2em] text-white hover:text-[#FF6B35] transition-colors">
                                    Réserver
                                    <span class="w-8 h-[1px] bg-[#FF6B35] group-hover/link:w-12 transition-all duration-300"></span>
                                </a>
                                
                                <div class="flex items-center gap-2">
                                    <div class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></div>
                                    <span class="text-gray-500 text-[10px] uppercase tracking-wider">Disponible</span>
                                </div>
                            </div>
                        </div>

                        <!-- Hover Shine Effect -->
                        <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-700 pointer-events-none">
                            <div class="absolute inset-0 bg-gradient-to-tr from-transparent via-white/5 to-transparent translate-x-[-100%] group-hover:translate-x-[100%] transition-transform duration-1000"></div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            {{-- @if($restaurants->hasPages())
                <div class="mt-20 flex justify-center">
                    <div class="bg-[#111] border border-white/5 px-8 py-4 rounded-2xl">
                        {{ $restaurants->links() }}
                    </div>
                </div>
            @endif --}}
        @endif
    </div>

    <!-- Styles -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700&family=Inter:wght@300;400;500;600&display=swap');
        
        .font-serif { font-family: 'Playfair Display', serif; }
        .font-sans { font-family: 'Inter', sans-serif; }

        @keyframes fade-in-up {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .animate-fade-in { animation: fade-in-up 0.6s ease-out forwards; opacity: 0; }
        .delay-100 { animation-delay: 0.1s; }
        .delay-200 { animation-delay: 0.2s; }
        .delay-300 { animation-delay: 0.3s; }
        .delay-400 { animation-delay: 0.4s; }

        /* Pagination */
        .pagination { display: flex; gap: 0.5rem; align-items: center; }
        .pagination svg { width: 1.2rem; height: 1.2rem; color: #666; }
        .pagination span, .pagination a { 
            background: transparent !important; 
            color: #666 !important; 
            border: 1px solid transparent !important;
            padding: 0.5rem 1rem !important;
            border-radius: 0.5rem;
            font-size: 11px !important;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s;
        }
        .pagination a:hover {
            color: #FF6B35 !important;
            border-color: rgba(255, 107, 53, 0.3) !important;
        }
        .pagination .active span { 
            background: #FF6B35 !important; 
            color: black !important; 
            font-weight: 600; 
        }
    </style>
</x-app-layout>