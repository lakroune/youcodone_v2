<x-app-layout>
    <div class="bg-[#050505] min-h-screen text-gray-200 font-serif flex items-center justify-center">
        <div class="max-w-2xl w-full px-6 text-center">
            
            <div class="mb-12">
                <div class="w-24 h-24 border-2 border-red-900/30 rounded-full flex items-center justify-center mx-auto text-red-600">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </div>
            </div>

            <h1 class="text-5xl md:text-7xl font-black italic tracking-tighter text-white uppercase mb-4">
                Interrompu<span class="text-red-600">.</span>
            </h1>
            
            <p class="text-gray-600 text-[10px] font-black tracking-[0.8em] uppercase mb-12">La transaction n'a pu aboutir</p>

            <div class="bg-white/[0.02] border border-white/10 p-8 rounded-sm mb-12">
                <p class="text-lg italic text-gray-500 leading-relaxed">
                    Le processus de règlement a été suspendu. Votre réservation n'est pas encore finalisée.
                </p>
            </div>

            <div class="flex flex-col md:flex-row gap-6 justify-center">
                <a href="{{ url()->previous() }}" class="bg-[#FF5F00] text-black font-black px-10 py-5 uppercase tracking-[0.4em] text-[10px] hover:bg-white transition-all">
                    Réessayer le paiement
                </a>
                <a href="{{ route('client.reservations') }}" class="border border-white/10 text-gray-500 font-black px-10 py-5 uppercase tracking-[0.4em] text-[10px] hover:border-white hover:text-white transition-all">
                    Abandonner
                </a>
            </div>
        </div>
    </div>
</x-app-layout>