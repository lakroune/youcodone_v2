<x-app-layout>
    <div class="bg-black min-h-screen pb-20">
        <div class="border-b border-white/10 py-10 bg-[#050505]">
            <div class="max-w-7xl mx-auto px-6 flex justify-between items-end">
                <div>
                    <p class="text-[#FF5F00] font-bold uppercase tracking-[3px] text-[10px] mb-2">Restaurateur Area</p>
                    <h1 class="text-4xl font-black uppercase text-white">Dashboard.</h1>
                </div>
                <a href="{{ route('restaurants.create') }}"
                    class="bg-[#FF5F00] text-black font-black uppercase text-[11px] tracking-tighter px-6 py-4 rounded-none hover:bg-white transition-all">
                    + Ajouter Restaurant
                </a>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-6 mt-12">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-0">
                @foreach ($restaurants as $restaurant)
                    <div
                        class="bg-[#0A0A0A] border border-white/10 aspect-square flex flex-col group relative overflow-hidden">

                        <div class="h-1/2 w-full bg-[#111] overflow-hidden">
                            <img src="{{ asset('storage/' . $restaurant->image) }}"
                                class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-500">
                        </div>

                        <div class="h-1/2 p-8 flex flex-col justify-between">
                            <div>
                                <h3 class="text-2xl font-black text-white uppercase italic leading-none mb-2">
                                    {{ $restaurant->name }}</h3>
                                <p class="text-[10px] text-gray-500 font-bold uppercase tracking-widest">
                                    {{ $restaurant->city }} — {{ $restaurant->cuisine_type }}</p>
                            </div>

                            <div class="flex flex-col gap-4">
                                <div class="flex justify-between items-end">
                                    <span
                                        class="text-[9px] font-black text-[#FF5F00] uppercase">{{ $restaurant->reservations_count }}
                                        Réservations</span>

                                    <div class="flex gap-2">
                                        <a href="{{ route('restaurants.edit', $restaurant) }}"
                                            class="text-white hover:text-[#FF5F00] transition-colors">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>
                                        <form action="{{ route('restaurants.destroy', $restaurant) }}" method="POST"
                                            onsubmit="return confirm('Supprimer ?')">
                                            @csrf @method('DELETE')
                                            <button class="text-gray-600 hover:text-red-500 transition-colors">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="1.5"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>

                                <a href="{{ route('restaurants.show', $restaurant) }}"
                                    class="w-full border border-white/10 py-3 text-center text-[10px] font-black uppercase text-white hover:bg-[#FF5F00] hover:border-[#FF5F00] hover:text-black transition-all">
                                    Voir Restaurant
                                </a>
                            </div>
                        </div>

                        <div
                            class="absolute inset-0 border-2 border-[#FF5F00] opacity-0 group-hover:opacity-100 pointer-events-none transition-opacity">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
