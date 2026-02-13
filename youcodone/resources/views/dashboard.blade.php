<x-app-layout>
    <div class="bg-[#0a0a0a] min-h-screen pb-20 font-serif">
        
        <!-- Header -->
        <div class="border-b border-[#FF6B35]/10 py-12 bg-[#0a0a0a] relative overflow-hidden">
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-[#FF6B35]/5 via-transparent to-transparent"></div>
            <div class="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-[#FF6B35]/30 to-transparent"></div>
            
            <div class="max-w-7xl mx-auto px-6 relative z-10 flex flex-col md:flex-row justify-between items-start md:items-end gap-6">
                <div>
                    <span class="text-[#FF6B35] text-[10px] font-bold uppercase tracking-[0.4em] mb-3 block">Espace Restaurateur</span>
                    <h1 class="text-4xl md:text-5xl font-serif font-bold italic text-white">Mes Établissements.</h1>
                    <div class="flex items-center gap-3 mt-4">
                        <div class="h-px w-8 bg-[#FF6B35]/30"></div>
                        <p class="text-gray-500 text-xs uppercase tracking-widest font-sans">{{ $restaurants->count() }} restaurant(s)</p>
                    </div>
                </div>
                
                <a href="{{ route('restaurants.create') }}"
                    class="group inline-flex items-center gap-3 bg-[#FF6B35] text-black font-bold uppercase text-[11px] tracking-[0.2em] px-8 py-4 rounded-full hover:bg-white transition-all duration-500 shadow-lg shadow-[#FF6B35]/20">
                    <svg class="w-4 h-4 group-hover:rotate-90 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Ajouter un restaurant
                </a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="max-w-7xl mx-auto px-6 mt-16">
            @if($restaurants->isEmpty())
                <!-- Empty State -->
                <div class="flex flex-col items-center justify-center py-32 border border-dashed border-white/10 rounded-[3rem] bg-gradient-to-b from-white/[0.02] to-transparent">
                    <div class="w-24 h-24 bg-[#FF6B35]/5 border border-[#FF6B35]/20 rounded-full flex items-center justify-center mb-8">
                        <svg class="w-10 h-10 text-[#FF6B35]/40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-serif font-bold italic text-white mb-3">Aucun restaurant</h3>
                    <p class="text-gray-500 text-sm mb-8 font-sans">Commencez par ajouter votre premier établissement</p>
                    <a href="{{ route('restaurants.create') }}" class="inline-flex items-center gap-3 px-8 py-4 bg-[#FF6B35] text-black text-xs font-bold uppercase tracking-[0.2em] rounded-full hover:bg-white transition-all duration-300">
                        Créer un restaurant
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                </div>
            @else
                <!-- Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($restaurants as $restaurant)
                        <div class="group bg-[#111] border border-white/5 rounded-2xl overflow-hidden hover:border-[#FF6B35]/30 transition-all duration-700 shadow-2xl hover:shadow-[#FF6B35]/5 hover:-translate-y-2">

                            <!-- Image -->
                            <div class="relative h-56 overflow-hidden">
                                <img src="{{ asset('storage/' . $restaurant->photos[0]->url_photo) }}"
                                    class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-700 scale-105 group-hover:scale-100"
                                    alt="{{ $restaurant->nom_restaurant }}">
                                <div class="absolute inset-0 bg-gradient-to-t from-[#111] via-transparent to-transparent"></div>
                                
                                <!-- Type Badge -->
                                <div class="absolute top-4 left-4">
                                    <span class="px-3 py-1.5 bg-black/60 backdrop-blur-md border border-white/10 rounded-full text-[9px] font-bold text-[#FF6B35] uppercase tracking-wider">
                                        {{ $restaurant->typeCuisine->nom_type_cuisine }}
                                    </span>
                                </div>

                                <!-- Actions -->
                                <div class="absolute top-4 right-4 flex gap-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <a href="{{ route('restaurants.edit', $restaurant) }}"
                                        class="w-10 h-10 bg-black/60 backdrop-blur-md rounded-full flex items-center justify-center text-white border border-white/10 hover:bg-[#FF6B35] hover:text-black hover:border-[#FF6B35] transition-all duration-300"
                                        title="Modifier">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>
                                    @role('restaurateur')
                                        <button onclick="openDeleteModal({{ $restaurant->id }}, '{{ $restaurant->nom_restaurant }}')"
                                            class="w-10 h-10 bg-black/60 backdrop-blur-md rounded-full flex items-center justify-center text-white border border-white/10 hover:bg-red-500 hover:border-red-500 transition-all duration-300"
                                            title="Supprimer">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    @endrole
                                </div>
                            </div>

                            <!-- Content -->
                            <div class="p-6">
                                <h3 class="text-xl font-serif font-bold italic text-white mb-2 group-hover:text-[#FF6B35] transition-colors duration-300">
                                    {{ $restaurant->nom_restaurant }}
                                </h3>
                                
                                <div class="flex items-center gap-2 text-gray-500 text-xs mb-6 font-sans">
                                    <svg class="w-3 h-3 text-[#FF6B35]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    </svg>
                                    {{ $restaurant->adresse_restaurant }}
                                </div>

                                <!-- Stats -->
                                <div class="flex items-center justify-between py-4 border-t border-white/5">
                                    <div class="flex items-center gap-2">
                                        <div class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></div>
                                        <span class="text-[10px] text-gray-400 uppercase tracking-wider font-sans">Actif</span>
                                    </div>
                                    <span class="text-[#FF6B35] text-xs font-bold">0 réservations</span>
                                </div>

                                <!-- Action -->
                                <a href="{{ route('restaurants.show', $restaurant) }}"
                                    class="mt-4 w-full flex items-center justify-center gap-2 border border-white/10 py-3 rounded-xl text-[11px] font-bold uppercase tracking-[0.15em] text-white hover:bg-[#FF6B35] hover:border-[#FF6B35] hover:text-black transition-all duration-300 group/btn">
                                    Gérer
                                    <svg class="w-3 h-3 group-hover/btn:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>

                            <!-- Shine Effect -->
                            <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-700 pointer-events-none">
                                <div class="absolute inset-0 bg-gradient-to-tr from-transparent via-white/5 to-transparent translate-x-[-100%] group-hover:translate-x-[100%] transition-transform duration-1000"></div>
                            </div>
                        </div>

                        <!-- Delete Form -->
                        <form id="delete-form-{{ $restaurant->id }}"
                            action="{{ route('restaurants.destroy', $restaurant) }}"
                            method="POST" class="hidden">
                            @csrf
                            @method('DELETE')
                        </form>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

    <!-- Delete Modal -->
    <div id="deleteModal" class="fixed inset-0 bg-black/90 backdrop-blur-sm hidden items-center justify-center z-50 p-4">
        <div class="bg-[#111] border border-red-500/20 rounded-2xl p-8 max-w-md w-full relative overflow-hidden animate-fade-in">
            <!-- Top line -->
            <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-red-500 via-[#FF6B35] to-red-500"></div>
            
            <!-- Icon -->
            <div class="flex justify-center mb-6">
                <div class="w-16 h-16 rounded-full bg-red-500/10 border border-red-500/20 flex items-center justify-center">
                    <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>
            </div>

            <!-- Content -->
            <div class="text-center mb-8">
                <h3 class="text-2xl font-serif font-bold italic text-white mb-3">
                    Supprimer <span class="text-red-500">?</span>
                </h3>
                <p class="text-sm text-gray-400 mb-2 font-sans">Vous êtes sur le point de supprimer</p>
                <p class="text-lg font-bold text-[#FF6B35] uppercase tracking-wide font-serif" id="restaurantName"></p>
                <p class="text-xs text-gray-500 mt-4 font-sans">Cette action est irréversible.</p>
            </div>

            <!-- Buttons -->
            <div class="flex gap-3">
                <button onclick="closeDeleteModal()"
                    class="flex-1 bg-white/5 border border-white/10 text-white font-bold uppercase text-[11px] tracking-[0.2em] py-4 rounded-xl hover:bg-white/10 transition-all duration-300">
                    Annuler
                </button>
                <button onclick="confirmDelete()"
                    class="flex-1 bg-red-500 text-white font-bold uppercase text-[11px] tracking-[0.2em] py-4 rounded-xl hover:bg-red-600 transition-all duration-300 shadow-lg shadow-red-500/20">
                    Supprimer
                </button>
            </div>
        </div>
    </div>

    <!-- Styles -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700&family=Inter:wght@300;400;500;600&display=swap');
        
        .font-serif { font-family: 'Playfair Display', serif; }
        .font-sans { font-family: 'Inter', sans-serif; }

        @keyframes fade-in-up {
            from { opacity: 0; transform: translateY(20px) scale(0.95); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }

        .animate-fade-in { 
            animation: fade-in-up 0.4s cubic-bezier(0.16, 1, 0.3, 1) forwards; 
        }
    </style>

    <!-- Scripts -->
    <script>
        let currentRestaurantId = null;

        function openDeleteModal(restaurantId, restaurantName) {
            currentRestaurantId = restaurantId;
            document.getElementById('restaurantName').textContent = restaurantName;
            document.getElementById('deleteModal').classList.remove('hidden');
            document.getElementById('deleteModal').classList.add('flex');
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
            document.getElementById('deleteModal').classList.remove('flex');
            currentRestaurantId = null;
        }

        function confirmDelete() {
            if (currentRestaurantId) {
                document.getElementById('delete-form-' + currentRestaurantId).submit();
            }
        }

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') closeDeleteModal();
        });

        document.getElementById('deleteModal').addEventListener('click', function(e) {
            if (e.target === this) closeDeleteModal();
        });
    </script>
</x-app-layout>