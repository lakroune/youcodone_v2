<x-app-layout>
    <div class="bg-[#0a0a0a] min-h-screen text-gray-200 font-serif pb-32">

        <!-- Hero Section -->
        <section class="relative h-[45vh] w-full overflow-hidden bg-black flex items-center justify-center border-b border-[#FF6B35]/10">
            <div class="absolute inset-0 z-10 bg-gradient-to-b from-transparent via-transparent to-[#0a0a0a]"></div>
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,_var(--tw-gradient-stops))] from-[#FF6B35]/10 via-transparent to-transparent opacity-50"></div>
            
            <div class="relative z-20 text-center px-6 animate-fade-in">
                <span class="text-[#FF6B35] text-[10px] font-bold uppercase tracking-[0.5em] mb-4 block">Transaction Sécurisée</span>
                <h1 class="text-5xl md:text-7xl font-serif font-bold italic text-white uppercase leading-none mb-6">
                    Règlement<span class="text-[#FF6B35]">.</span>
                </h1>
                <div class="flex items-center justify-center gap-4">
                    <div class="h-px w-12 bg-[#FF6B35]/30"></div>
                    <p class="text-gray-400 text-xs uppercase tracking-[0.3em] font-sans">Paiement sécurisé SSL</p>
                    <div class="h-px w-12 bg-[#FF6B35]/30"></div>
                </div>
            </div>
        </section>

        <!-- Main Content -->
        <main class="max-w-5xl mx-auto px-6 mt-[-8vh] relative z-30">
            <div class="bg-[#111] border border-white/10 rounded-3xl p-8 md:p-12 shadow-2xl relative overflow-hidden">
                <!-- Decorative elements -->
                <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-[#FF6B35]/30 to-transparent"></div>
                <div class="absolute top-0 right-0 w-64 h-64 bg-[#FF6B35]/5 rounded-bl-full pointer-events-none"></div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16">

                    <!-- Order Details -->
                    <div class="space-y-8">
                        <div>
                            <h2 class="text-[#FF6B35] text-[10px] font-bold uppercase tracking-[0.4em] mb-6 flex items-center gap-3">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                                Votre Réservation
                            </h2>
                            
                            <!-- Restaurant Info Card -->
                            <div class="bg-white/[0.03] border border-white/10 rounded-2xl p-6 mb-6">
                                <div class="flex items-start gap-4 mb-4">
                                    <div class="w-12 h-12 rounded-full bg-[#FF6B35]/10 border border-[#FF6B35]/20 flex items-center justify-center flex-shrink-0">
                                        <svg class="w-6 h-6 text-[#FF6B35]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-[10px] text-[#FF6B35] uppercase tracking-wider font-bold mb-1">Restaurant</p>
                                        <h3 class="text-xl font-serif font-bold italic text-white">{{ $info_paiement->restaurant->nom_restaurant ?? 'Restaurant' }}</h3>
                                    </div>
                                </div>
                                
                                <div class="space-y-3 pt-4 border-t border-white/5">
                                    <div class="flex items-center gap-3 text-sm text-gray-400">
                                        <svg class="w-4 h-4 text-[#FF6B35]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        <span class="font-sans">{{ $info_paiement->date_reservation ?? 'Date non définie' }}</span>
                                    </div>
                                    <div class="flex items-center gap-3 text-sm text-gray-400">
                                        <svg class="w-4 h-4 text-[#FF6B35]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span class="font-sans">{{ $info_paiement->heure_reservation ?? '00:00' }}</span>
                                    </div>
                                </div>
                            </div>

                            <p class="text-sm text-gray-500 leading-relaxed font-sans">
                                Cette avance garantit votre réservation et sera déduite de votre addition finale.
                            </p>
                        </div>

                        <!-- Price Breakdown -->
                        <div class="bg-[#FF6B35]/5 border border-[#FF6B35]/20 rounded-2xl p-6 relative overflow-hidden">
                            <div class="absolute top-0 right-0 w-32 h-32 bg-[#FF6B35]/10 rounded-bl-full pointer-events-none"></div>
                            
                            <div class="space-y-4">
                                <div class="flex justify-between items-center text-sm">
                                    <span class="text-gray-400 font-sans">Garantie de réservation</span>
                                    <span class="text-white font-bold">200.00 DH</span>
                                </div>
                                <div class="h-px bg-white/10"></div>
                                <div class="flex justify-between items-center">
                                    <span class="text-[#FF6B35] text-xs uppercase tracking-wider font-bold">Total à régler</span>
                                    <span class="text-4xl font-serif font-bold italic text-white">
                                        200<span class="text-lg text-[#FF6B35]">.00 DH</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Form -->
                    <div class="lg:border-l lg:border-white/10 lg:pl-12 space-y-8">
                        <h2 class="text-[#FF6B35] text-[10px] font-bold uppercase tracking-[0.4em] mb-6 flex items-center gap-3">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                            </svg>
                            Mode de Paiement
                        </h2>

                        <form action="{{ route('paiement.checkout') }}" method="POST" class="space-y-8">
                            @csrf
                            @method('POST')
                            <input type="hidden" name="montant" value="200">
                            <input type="hidden" name="reservation_id" value="{{ $info_paiement->id ?? '' }}">

                            <!-- Payment Methods -->
                            <div class="space-y-4">
                                <div class="group relative p-6 bg-white/[0.03] border border-white/10 rounded-2xl hover:border-[#FF6B35]/30 transition-all duration-500 cursor-pointer">
                                    <div class="flex items-center gap-4">
                                        <div class="w-12 h-12 rounded-xl bg-[#FF6B35]/10 border border-[#FF6B35]/20 flex items-center justify-center group-hover:bg-[#FF6B35] transition-all duration-300">
                                            <svg class="w-6 h-6 text-[#FF6B35] group-hover:text-black transition-colors" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M13.976 9.15c-2.172-.113-2.5.721-2.5 1.478 0 1.054 1.15 1.755 2.5 2.155 1.35.4 3.033 1.054 3.033 2.946 0 1.892-1.741 3.268-4.148 3.268-2.406 0-3.924-1.127-3.924-1.127l.708-1.54s1.215.828 3.04.828c1.621 0 2.229-.654 2.229-1.39 0-.965-.98-1.503-2.229-1.93-1.249-.427-3.303-1.018-3.303-3.111 0-1.89 1.586-3.155 3.738-3.155 2.152 0 3.376.92 3.376.92l-.634 1.584s-.89-.773-2.285-.828z"/>
                                            </svg>
                                        </div>
                                        <div class="flex-1">
                                            <p class="text-white font-bold text-sm mb-1">Carte Bancaire</p>
                                            <p class="text-gray-500 text-xs font-sans">Visa, Mastercard, American Express</p>
                                        </div>
                                        <div class="flex gap-2">
                                            <div class="w-8 h-5 bg-white/10 rounded flex items-center justify-center">
                                                <span class="text-[6px] text-gray-400 font-bold">VISA</span>
                                            </div>
                                            <div class="w-8 h-5 bg-white/10 rounded flex items-center justify-center">
                                                <span class="text-[6px] text-gray-400 font-bold">MC</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="absolute inset-0 border-2 border-[#FF6B35] rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none"></div>
                                </div>
                            </div>

                            <!-- Security Badge -->
                            <div class="flex items-center gap-3 p-4 bg-green-500/5 border border-green-500/20 rounded-xl">
                                <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                                <div>
                                    <p class="text-green-400 text-xs font-bold uppercase tracking-wider">Paiement sécurisé</p>
                                    <p class="text-gray-500 text-[10px] font-sans">Cryptage SSL 256-bit</p>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit"
                                class="w-full group relative bg-[#FF6B35] text-black font-bold py-5 rounded-xl uppercase tracking-[0.2em] text-[11px] hover:bg-white transition-all duration-500 shadow-lg shadow-[#FF6B35]/20 overflow-hidden">
                                <span class="relative z-10 flex items-center justify-center gap-3">
                                    Payer 200.00 DH
                                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                    </svg>
                                </span>
                            </button>

                            <p class="text-center text-[10px] text-gray-600 uppercase tracking-wider font-sans">
                                Propulsé par <span class="text-gray-400">Stripe</span>
                            </p>
                        </form>
                    </div>

                </div>
            </div>

            <!-- Back Link -->
            <div class="mt-12 text-center">
                <a href="{{ url()->previous() }}"
                    class="inline-flex items-center gap-3 text-[11px] uppercase tracking-[0.2em] text-gray-500 hover:text-[#FF6B35] transition-all duration-300 group">
                    <svg class="w-4 h-4 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Retour aux réservations
                </a>
            </div>
        </main>
    </div>

    <!-- Styles -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700&family=Inter:wght@300;400;500;600&display=swap');
        
        .font-serif { font-family: 'Playfair Display', serif; }
        .font-sans { font-family: 'Inter', sans-serif; }

        @keyframes fade-in-up {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .animate-fade-in { 
            animation: fade-in-up 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards; 
        }
    </style>
</x-app-layout>