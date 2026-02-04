<x-app-layout>
    <section class="mt-4 px-4">
        <div class="flex gap-4 overflow-x-auto no-scrollbar snap-x h-[400px]">
            <div class="min-w-[70%] md:min-w-[40%] snap-center rounded-[2rem] overflow-hidden border border-white/5">
                <img src="https://images.unsplash.com/photo-1514362545857-3bc16c4c7d1b?q=80&w=1470"
                    class="w-full h-full object-cover">
            </div>
            <div class="min-w-[70%] md:min-w-[40%] snap-center rounded-[2rem] overflow-hidden border border-white/5">
                <img src="https://images.unsplash.com/photo-1559339352-11d035aa65de?q=80&w=1474"
                    class="w-full h-full object-cover">
            </div>
            <div class="min-w-[70%] md:min-w-[40%] snap-center rounded-[2rem] overflow-hidden border border-white/5">
                <img src="https://images.unsplash.com/photo-1550966841-3ee32057f722?q=80&w=1471"
                    class="w-full h-full object-cover">
            </div>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-6 mt-12 grid grid-cols-1 lg:grid-cols-12 gap-12">

        <div class="lg:col-span-8 space-y-16">
            <div>
                <span class="text-[#FF5F00] text-[10px] font-black uppercase tracking-[4px]">Gastronomie
                    Italienne</span>
                <h2 class="text-6xl font-black uppercase italic tracking-tighter mt-2 mb-6">Le Petit Bistro<span
                        class="text-[#FF5F00]">.</span></h2>
                <p class="text-gray-400 text-sm leading-relaxed max-w-2xl">
                    Une expérience culinaire unique au cœur de la ville, alliant tradition et modernité. Nos chefs
                    travaillent des produits frais pour vous offrir le meilleur de la cuisine locale.
                </p>
            </div>

            <div>
                <h3 class="text-xl font-black uppercase italic mb-8 flex items-center gap-4">
                    Le Menu <div class="h-[1px] flex-1 bg-white/5"></div>
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-8">
                    <div class="flex justify-between items-end border-b border-white/5 pb-4 group">
                        <div>
                            <h4
                                class="text-white font-bold text-sm uppercase group-hover:text-[#FF5F00] transition-colors">
                                Pasta Carbonara Royale</h4>
                            <p class="text-gray-500 text-[10px] mt-1 italic">Crème fraîche, pancetta, jaune d'oeuf bio
                            </p>
                        </div>
                        <span class="text-[#FF5F00] font-black text-sm">120 DH</span>
                    </div>
                    <div class="flex justify-between items-end border-b border-white/5 pb-4 group">
                        <div>
                            <h4
                                class="text-white font-bold text-sm uppercase group-hover:text-[#FF5F00] transition-colors">
                                Pizza Truffe Noire</h4>
                            <p class="text-gray-500 text-[10px] mt-1 italic">Mozzarella di bufala, huile de truffe</p>
                        </div>
                        <span class="text-[#FF5F00] font-black text-sm">150 DH</span>
                    </div>
                    <div class="flex justify-between items-end border-b border-white/5 pb-4 group">
                        <div>
                            <h4
                                class="text-white font-bold text-sm uppercase group-hover:text-[#FF5F00] transition-colors">
                                Tiramisu Maison</h4>
                            <p class="text-gray-500 text-[10px] mt-1 italic">Café Arabica, Mascarpone crémeux</p>
                        </div>
                        <span class="text-[#FF5F00] font-black text-sm">65 DH</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="lg:col-span-4 space-y-8">
            <div class="glass p-8 rounded-[2rem]">
                <h4 class="text-xs font-black uppercase tracking-[2px] mb-6 text-[#FF5F00]">Horaires d'ouverture</h4>
                <div class="space-y-3 text-[11px] font-bold uppercase tracking-widest text-gray-400">
                    <div class="flex justify-between border-b border-white/5 pb-2"><span>Lundi</span> <span
                            class="text-white">12:00 - 23:00</span></div>
                    <div class="flex justify-between border-b border-white/5 pb-2"><span>Mardi</span> <span
                            class="text-white">12:00 - 23:00</span></div>
                    <div class="flex justify-between border-b border-white/5 pb-2"><span>Mercredi</span> <span
                            class="text-white">12:00 - 23:00</span></div>
                    <div class="flex justify-between border-b border-white/5 pb-2"><span>Jeudi</span> <span
                            class="text-white">12:00 - 23:00</span></div>
                    <div class="flex justify-between border-b border-white/5 pb-2 italic text-[#FF5F00]">
                        <span>Vendredi</span> <span class="text-[#FF5F00]">15:00 - 00:00</span>
                    </div>
                    <div class="flex justify-between border-b border-white/5 pb-2"><span>Samedi</span> <span
                            class="text-white">12:00 - 01:00</span></div>
                    <div class="flex justify-between"><span>Dimanche</span> <span class="text-red-500">Fermé</span>
                    </div>
                </div>
            </div>

            <button
                class="w-full bg-white text-black font-black py-5 rounded-2xl uppercase tracking-[3px] text-[11px] hover:bg-[#FF5F00] hover:text-white transition-all shadow-xl">
                Réserver une table
            </button>
        </div>

    </section>
</x-app-layout>
