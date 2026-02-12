<x-app-layout>
    <div class="bg-[#050505] min-h-screen text-gray-200 font-serif flex items-center justify-center">
        <div class="max-w-2xl w-full px-6 text-center">
            
            <!-- Icon Success Animé -->
            <div class="mb-12 relative inline-block">
                <div class="w-24 h-24 border-2 border-[#FF5F00] rounded-full flex items-center justify-center mx-auto">
                    <svg class="w-12 h-12 text-[#FF5F00]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <div class="absolute inset-0 border-2 border-[#FF5F00] rounded-full animate-ping opacity-20"></div>
            </div>

            <h1 class="text-5xl md:text-7xl font-black italic tracking-tighter text-white uppercase mb-4">
                Confirmé<span class="text-[#FF5F00]">.</span>
            </h1>
            
            <p class="text-[#FF5F00] text-[10px] font-black tracking-[0.8em] uppercase mb-12">Chapitre IV — Invitation Validée</p>

            <div class="bg-white/[0.02] border border-white/10 p-8 rounded-sm mb-12">
                <p class="text-xl leading-relaxed italic text-gray-400">
                    "Votre table est désormais gravée dans notre registre. Une correspondance de confirmation vous a été adressée."
                </p>
            </div>

            <a href="{{ route('') }}" class="inline-block border border-white/20 text-white font-black px-12 py-5 uppercase tracking-[0.5em] text-[10px] hover:bg-white hover:text-black transition-all duration-700">
                Retour à l'Accueil
            </a>
        </div>
    </div>
</x-app-layout>