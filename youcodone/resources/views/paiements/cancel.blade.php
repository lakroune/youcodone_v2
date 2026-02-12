<x-app-layout>
    <div class="bg-[#0a0a0a] min-h-screen text-gray-200 font-serif flex items-center justify-center relative overflow-hidden">
        
        <!-- Background Effects -->
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,_var(--tw-gradient-stops))] from-red-500/5 via-transparent to-transparent opacity-50"></div>
        <div class="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-red-500/20 to-transparent"></div>
        <div class="absolute bottom-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-red-500/20 to-transparent"></div>

        <div class="max-w-2xl w-full px-6 text-center relative z-10">
            
            <!-- Error Icon -->
            <div class="mb-12 relative inline-block animate-fade-in">
                <!-- Animated rings -->
                <div class="absolute inset-0 w-32 h-32 -m-4 border border-red-500/10 rounded-full animate-pulse"></div>
                
                <!-- Main circle -->
                <div class="w-28 h-28 bg-red-500/5 border-2 border-red-500/30 rounded-full flex items-center justify-center mx-auto relative group hover:border-red-500 transition-colors duration-500">
                    <div class="absolute inset-0 bg-red-500/10 scale-0 group-hover:scale-100 transition-transform duration-500 rounded-full"></div>
                    <svg class="w-12 h-12 text-red-500 group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </div>
            </div>

            <!-- Title -->
            <div class="space-y-4 mb-8 animate-fade-in delay-100">
                <span class="text-red-400 text-[11px] font-bold uppercase tracking-[0.5em] block">Paiement Interrompu</span>
                <h1 class="text-5xl md:text-7xl font-serif font-bold italic text-white uppercase leading-none">
                    Interrompu<span class="text-red-500">.</span>
                </h1>
            </div>

            <!-- Decorative line -->
            <div class="flex items-center justify-center gap-4 mb-12 animate-fade-in delay-200">
                <div class="h-px w-16 bg-gradient-to-r from-transparent to-red-500/30"></div>
                <div class="flex gap-2">
                    <div class="w-2 h-2 rounded-full bg-red-500"></div>
                    <div class="w-2 h-2 rounded-full bg-red-500/60"></div>
                    <div class="w-2 h-2 rounded-full bg-red-500/30"></div>
                </div>
                <div class="h-px w-16 bg-gradient-to-l from-transparent to-red-500/30"></div>
            </div>

            <!-- Message Card -->
            <div class="bg-[#111] border border-white/10 rounded-2xl p-8 md:p-10 mb-12 relative overflow-hidden animate-fade-in delay-300">
                <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-red-500/20 to-transparent"></div>
                
                <div class="flex items-center justify-center gap-3 mb-4">
                    <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                    <span class="text-red-400 text-xs font-bold uppercase tracking-wider">Transaction non aboutie</span>
                </div>
                
                <p class="text-lg md:text-xl leading-relaxed font-serif italic text-gray-400">
                    Le processus de règlement a été interrompu. <br>
                    <span class="text-white">Votre réservation n'est pas finalisée.</span>
                </p>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4 animate-fade-in delay-400">
                <a href="{{ url()->previous() }}" 
                   class="group inline-flex items-center gap-3 bg-[#FF6B35] text-black font-bold px-10 py-4 rounded-full uppercase tracking-[0.2em] text-[11px] hover:bg-white transition-all duration-500 shadow-lg shadow-[#FF6B35]/20">
                    <svg class="w-4 h-4 group-hover:rotate-180 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                    </svg>
                    Réessayer le paiement
                </a>
                
                <a href="{{ route('client.reservations') }}" 
                   class="inline-flex items-center gap-3 border border-white/20 text-white font-bold px-10 py-4 rounded-full uppercase tracking-[0.2em] text-[11px] hover:border-red-500/50 hover:text-red-400 transition-all duration-300">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    Annuler
                </a>
            </div>

            <!-- Help Text -->
            <div class="mt-12 animate-fade-in delay-500">
                <p class="text-[10px] text-gray-600 uppercase tracking-[0.2em] font-sans mb-2">Besoin d'aide ?</p>
                <a href="mailto:support@cibogustoso.com" class="text-[11px] text-[#FF6B35] hover:text-white transition-colors font-sans">
                    support@cibogustoso.com
                </a>
            </div>
        </div>

        <!-- Corner decorations -->
        <div class="absolute top-8 left-8 w-16 h-16 border-l border-t border-red-500/10"></div>
        <div class="absolute top-8 right-8 w-16 h-16 border-r border-t border-red-500/10"></div>
        <div class="absolute bottom-8 left-8 w-16 h-16 border-l border-b border-red-500/10"></div>
        <div class="absolute bottom-8 right-8 w-16 h-16 border-r border-b border-red-500/10"></div>
    </div>

    <!-- Styles -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700&family=Inter:wght@300;400;500;600&display=swap');
        
        .font-serif { font-family: 'Playfair Display', serif; }
        .font-sans { font-family: 'Inter', sans-serif; }

        @keyframes fade-in-up {
            from { 
                opacity: 0; 
                transform: translateY(30px) scale(0.95); 
            }
            to { 
                opacity: 1; 
                transform: translateY(0) scale(1); 
            }
        }

        .animate-fade-in { 
            animation: fade-in-up 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards; 
            opacity: 0;
        }
        
        .delay-100 { animation-delay: 100ms; }
        .delay-200 { animation-delay: 200ms; }
        .delay-300 { animation-delay: 300ms; }
        .delay-400 { animation-delay: 400ms; }
        .delay-500 { animation-delay: 500ms; }
    </style>
</x-app-layout>