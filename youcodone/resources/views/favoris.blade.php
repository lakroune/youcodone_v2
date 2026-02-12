<x-app-layout>
    <!-- Header Style Cibo -->
    <div class="relative bg-[#0a0a0a] py-24 border-b border-[#FF6B35]/10 overflow-hidden">
        <!-- Effet de lumière subtile -->
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-[#FF6B35]/5 via-transparent to-transparent"></div>
        <div class="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-[#FF6B35]/30 to-transparent"></div>
        
        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <div class="flex flex-col md:flex-row items-center justify-between gap-8">
                <div class="text-center md:text-left">
                    <span class="text-[#FF6B35] text-[10px] font-bold tracking-[0.4em] uppercase block mb-4">
                        Collection Privée
                    </span>
                    <h1 class="text-5xl md:text-7xl font-bold italic uppercase tracking-tight text-white leading-none">
                        Ma <span class="text-[#FF6B35]">Sélection</span>
                    </h1>
                    <div class="flex items-center gap-3 mt-6 justify-center md:justify-start">
                        <div class="h-px w-8 bg-[#FF6B35]/30"></div>
                        <p class="text-gray-400 text-xs uppercase tracking-[0.3em] font-sans font-light">
                            Vos expériences préférées
                        </p>
                        <div class="h-px w-8 bg-[#FF6B35]/30"></div>
                    </div>
                </div>

                <!-- Compteur Style Badge Premium -->
                <div class="flex items-center gap-4 bg-[#111] border border-white/5 px-8 py-4 rounded-2xl shadow-xl">
                    <div class="w-12 h-12 rounded-full bg-[#FF6B35]/10 border border-[#FF6B35]/20 flex items-center justify-center">
                        <span class="text-[#FF6B35] font-bold text-xl">{{ $restaurants->count() }}</span>
                    </div>
                    <div class="text-left">
                        <span class="text-white text-xs font-bold uppercase tracking-wider block">Favoris</span>
                        <span class="text-gray-500 text-[9px] uppercase tracking-widest">Enregistrés</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="max-w-7xl mx-auto px-6 py-20">
        @if ($restaurants->isEmpty())
            <!-- État Vide Style Cibo -->
            <div class="flex flex-col items-center justify-center py-32 border border-dashed border-white/10 rounded-[3rem] bg-gradient-to-b from-white/[0.02] to-transparent relative overflow-hidden">
                <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-[#FF6B35]/5 via-transparent to-transparent opacity-30"></div>
                
                <div class="w-24 h-24 bg-[#FF6B35]/5 border border-[#FF6B35]/20 rounded-full flex items-center justify-center mb-8 relative">
                    <svg class="w-10 h-10 text-[#FF6B35]/40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                </div>
                
                <h3 class="text-2xl font-bold italic text-white mb-3">Aucun favori</h3>
                <p class="text-gray-500 text-xs uppercase tracking-[0.3em] font-sans mb-10">Commencez votre collection gastronomique</p>
                
                <a href="{{ route('home') }}"
                    class="group inline-flex items-center gap-3 px-10 py-4 bg-[#FF6B35] text-black text-[11px] font-bold uppercase tracking-[0.2em] rounded-full hover:bg-white transition-all duration-500 shadow-lg shadow-[#FF6B35]/20">
                    Découvrir les restaurants
                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </a>
            </div>
        @else
            <!-- Grid Cards Style Cibo -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($restaurants as $restaurant)
                    <div class="group relative bg-[#111] border border-white/5 rounded-[2rem] overflow-hidden hover:border-[#FF6B35]/30 transition-all duration-700 shadow-2xl hover:shadow-[#FF6B35]/5 hover:-translate-y-2">

                        <!-- Image Section avec Overlay -->
                        <div class="relative h-72 overflow-hidden">
                            <img src="{{ asset('storage/' . $restaurant->photos[0]->url_photo) }}"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-[1.5s] ease-out"
                                alt="{{ $restaurant->nom_restaurant }}">

                            <!-- Gradient Overlay -->
                            <div class="absolute inset-0 bg-gradient-to-t from-[#111] via-black/40 to-transparent opacity-90"></div>
                            
                            <!-- Badge Type Cuisine -->
                            <div class="absolute top-6 left-6">
                                <span class="px-4 py-2 bg-black/60 backdrop-blur-md border border-white/10 rounded-full text-[9px] font-bold text-[#FF6B35] uppercase tracking-widest">
                                    {{ $restaurant->typeCuisine->nom_type_cuisine }}
                                </span>
                            </div>

                            <!-- Bouton Retirer des Favoris -->
                            <form action="{{ route('home.like') }}" method="POST" class="absolute top-6 right-6">
                                @csrf
                                <input type="hidden" name="restaurant_id" value="{{ $restaurant->id }}">
                                <button type="submit"
                                    class="w-12 h-12 bg-[#FF6B35] text-black rounded-full flex items-center justify-center shadow-xl hover:bg-white hover:scale-110 transition-all duration-300 group/btn"
                                    title="Retirer des favoris">
                                    <svg class="w-5 h-5 group-hover/btn:rotate-12 transition-transform" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.5 3c1.372 0 2.615.551 3.512 1.435.897-.884 2.14-1.435 3.512-1.435 2.786 0 5.25 2.322 5.25 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001z" />
                                    </svg>
                                </button>
                            </form>

                            <!-- Prix ou Note flottant -->
                            @if($restaurant->prix_reservation)
                                <div class="absolute bottom-6 right-6">
                                    <div class="px-4 py-2 bg-[#FF6B35] text-black rounded-xl text-xs font-bold">
                                        {{ number_format($restaurant->prix_reservation, 0) }} DH
                                    </div>
                                </div>
                            @endif
                        </div>

                        <!-- Content Section -->
                        <div class="p-8 relative">
                            <!-- Titre Restaurant -->
                            <h3 class="text-2xl font-bold italic text-white mb-3 group-hover:text-[#FF6B35] transition-colors duration-300 leading-tight">
                                {{ $restaurant->nom_restaurant }}
                            </h3>

                            <!-- Adresse -->
                            <div class="flex items-start gap-3 mb-6 text-gray-400 text-xs uppercase tracking-wider font-sans">
                                <svg class="w-4 h-4 text-[#FF6B35] mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <span class="leading-relaxed">{{ $restaurant->adresse_restaurant }}</span>
                            </div>

                            <!-- Séparateur avec style -->
                            <div class="flex items-center gap-4 mb-6">
                                <div class="h-px flex-1 bg-gradient-to-r from-transparent via-white/10 to-transparent"></div>
                                <div class="flex gap-1.5">
                                    <div class="w-1.5 h-1.5 rounded-full bg-[#FF6B35]"></div>
                                    <div class="w-1.5 h-1.5 rounded-full bg-[#FF6B35]/60"></div>
                                    <div class="w-1.5 h-1.5 rounded-full bg-[#FF6B35]/30"></div>
                                </div>
                                <div class="h-px flex-1 bg-gradient-to-r from-transparent via-white/10 to-transparent"></div>
                            </div>

                            <!-- Footer Card -->
                            <div class="flex items-center justify-between">
                                <a href="{{ route('client.restaurant.show', $restaurant) }}"
                                    class="group/link inline-flex items-center gap-2 text-[10px] font-bold uppercase tracking-[0.2em] text-white hover:text-[#FF6B35] transition-colors duration-300">
                                    Réserver
                                    <svg class="w-4 h-4 group-hover/link:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                    </svg>
                                </a>
                                
                                <!-- Indicateur visuel -->
                                <div class="w-8 h-8 rounded-full border border-white/10 flex items-center justify-center group-hover:border-[#FF6B35]/30 transition-colors">
                                    <svg class="w-3 h-3 text-gray-500 group-hover:text-[#FF6B35] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Effet de brillance au hover -->
                        <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-700 pointer-events-none">
                            <div class="absolute inset-0 bg-gradient-to-tr from-transparent via-white/5 to-transparent translate-x-[-100%] group-hover:translate-x-[100%] transition-transform duration-1000"></div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination si nécessaire -->
            {{-- @if($restaurants->hasPages())
                <div class="mt-20 flex justify-center">
                    <div class="bg-[#111] border border-white/5 px-8 py-4 rounded-2xl">
                        {{ $restaurants->links() }}
                    </div>
                </div>
            @endif --}}
        @endif
    </div>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&family=Inter:wght@300;400;500;600&display=swap');
        
        .font-serif { font-family: 'Playfair Display', serif; }
        .font-sans { font-family: 'Inter', sans-serif; }

        /* Animation d'entrée */
        @keyframes fade-in-up {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .grid > div {
            animation: fade-in-up 0.6s ease-out forwards;
            opacity: 0;
        }
        
        .grid > div:nth-child(1) { animation-delay: 0.1s; }
        .grid > div:nth-child(2) { animation-delay: 0.2s; }
        .grid > div:nth-child(3) { animation-delay: 0.3s; }
        .grid > div:nth-child(4) { animation-delay: 0.4s; }
        .grid > div:nth-child(5) { animation-delay: 0.5s; }
        .grid > div:nth-child(6) { animation-delay: 0.6s; }

        /* Pagination */
        .pagination { display: flex; gap: 0.5rem; align-items: center; }
        .pagination svg { width: 1rem; height: 1rem; color: #666; }
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