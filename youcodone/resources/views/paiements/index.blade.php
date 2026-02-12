<x-app-layout>
    <div class="bg-[#050505] min-h-screen text-gray-200 font-serif pb-32">
        
        <!-- Header minimaliste -->
        <!-- رأس الصفحة بسيط كيحترم التصميم الأصلي -->
        <section class="relative h-[40vh] w-full overflow-hidden bg-black flex items-center border-b border-white/10">
            <div class="absolute inset-0 z-10 bg-gradient-to-b from-transparent to-[#050505]"></div>
            <div class="absolute inset-0 z-20 flex flex-col items-center justify-center text-center">
                <h1 class="text-5xl md:text-7xl font-black italic tracking-tighter text-white uppercase">
                    Règlement<span class="text-[#FF5F00]">.</span>
                </h1>
                <p class="text-[#FF5F00] text-[9px] font-black tracking-[1em] uppercase mt-4">Chapitre III — Transaction Sécurisée</p>
            </div>
        </section>

        <main class="max-w-4xl mx-auto px-6 mt-[-10vh] relative z-30">
            <div class="bg-white/[0.02] border border-white/10 p-8 md:p-16 rounded-sm backdrop-blur-xl shadow-2xl">
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-16">
                    
                    <!-- Détails de la commande -->
                    <!-- تفاصيل الطلب على اليسار -->
                    <div class="space-y-8">
                        <div>
                            <h2 class="text-[#FF5F00] text-[10px] font-black tracking-[0.5em] uppercase mb-6 flex items-center gap-4">
                                Votre Commande <span class="h-[1px] flex-1 bg-white/10"></span>
                            </h2>
                            <div class="space-y-4">
                                <div class="flex justify-between items-baseline">
                                    <span class="text-xl text-white italic">Réservation Table</span>
                                    <span class="text-[#FF5F00] font-black">200 <small>DH</small></span>
                                </div>
                                <p class="text-xs text-gray-500 italic leading-relaxed">
                                    Frais de garantie pour la séance du {{ $reservation->date_reservation ?? 'Date non définie' }} à {{ $reservation->heure_reservation ?? '00:00' }}.
                                </p>
                            </div>
                        </div>

                        <div class="pt-8 border-t border-white/5">
                            <div class="flex justify-between items-center">
                                <span class="text-[10px] uppercase tracking-[3px] text-gray-400">Total à payer</span>
                                <span class="text-4xl font-black text-white italic">200.00 <small class="text-sm text-[#FF5F00]">DH</small></span>
                            </div>
                        </div>
                    </div>

                    <!-- Formulaire de paiement -->
                    <div class="space-y-8 border-l border-white/5 pl-0 md:pl-12">
                        <h2 class="text-[#FF5F00] text-[10px] font-black tracking-[0.5em] uppercase mb-6">
                            Mode de Règlement
                        </h2>
                        
                        <form action="{{ route('paiement.checkout') }}" method="POST" class="space-y-10">
                            @csrf
                            @method('POST')
                            <input type="hidden" name="amount" value="200">

                            <div class="space-y-6">
                                <div class="flex items-center gap-4 p-4 border border-white/10 bg-white/5 rounded-sm">
                                    <div class="w-12 h-8 bg-gray-800 rounded flex items-center justify-center border border-white/10">
                                        <span class="text-[8px] tracking-widest text-gray-400 uppercase font-black">Visa</span>
                                    </div>
                                    <div class="w-12 h-8 bg-gray-800 rounded flex items-center justify-center border border-white/10">
                                        <span class="text-[8px] tracking-widest text-gray-400 uppercase font-black">MC</span>
                                    </div>
                                    <span class="text-[10px] text-gray-400 uppercase tracking-widest ml-auto italic">Cartes acceptées</span>
                                </div>
                            </div>

                            <button type="submit" 
                                class="w-full bg-[#FF5F00] text-black font-black py-6 uppercase tracking-[0.4em] text-[11px] hover:bg-white transition-all duration-500 shadow-[0_0_30px_rgba(255,95,0,0.2)]">
                                Finaliser le Paiement
                            </button>

                            <p class="text-[9px] text-center text-gray-600 uppercase tracking-widest leading-loose">
                                Cryptage SSL 256-bit <br> 
                                <span class="italic text-gray-700">Propulsé par Stripe International</span>
                            </p>
                        </form>
                    </div>

                </div>
            </div>

            <!-- Footer minimaliste -->
            <div class="mt-12 text-center">
                <a href="{{ url()->previous() }}" class="text-[10px] uppercase tracking-[3px] text-gray-600 hover:text-[#FF5F00] transition-colors">
                    ← Retour au registre
                </a>
            </div>
        </main>
    </div>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;0,900;1,400;1,700&display=swap');
        .font-serif { font-family: 'Playfair Display', serif; }
    </style>
</x-app-layout>