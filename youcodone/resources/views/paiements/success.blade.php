<x-app-layout>
    <div class="bg-[#0a0a0a] min-h-screen text-gray-200 font-serif flex items-center justify-center relative overflow-hidden">
        
        <!-- Background Effects -->
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,_var(--tw-gradient-stops))] from-[#FF6B35]/10 via-transparent to-transparent opacity-50"></div>
        <div class="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-[#FF6B35]/30 to-transparent"></div>
        <div class="absolute bottom-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-[#FF6B35]/30 to-transparent"></div>

        <div class="max-w-2xl w-full px-6 text-center relative z-10">
            
            <!-- Success Icon -->
            <div class="mb-12 relative inline-block animate-fade-in">
                <!-- Outer rings -->
                <div class="absolute inset-0 w-32 h-32 -m-4 border border-[#FF6B35]/20 rounded-full animate-pulse"></div>
                <div class="absolute inset-0 w-40 h-40 -m-8 border border-[#FF6B35]/10 rounded-full animate-pulse delay-75"></div>
                
                <!-- Main circle -->
                <div class="w-28 h-28 bg-[#FF6B35]/10 border-2 border-[#FF6B35] rounded-full flex items-center justify-center mx-auto relative overflow-hidden group">
                    <div class="absolute inset-0 bg-[#FF6B35] scale-0 group-hover:scale-100 transition-transform duration-500 rounded-full"></div>
                    <svg class="w-14 h-14 text-[#FF6B35] group-hover:text-black transition-colors duration-500 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                
                <!-- Animated check particles -->
                <div class="absolute top-0 left-1/2 w-1 h-1 bg-[#FF6B35] rounded-full animate-ping"></div>
                <div class="absolute bottom-0 left-1/2 w-1 h-1 bg-[#FF6B35] rounded-full animate-ping delay-100"></div>
            </div>

            <!-- Title -->
            <div class="space-y-4 mb-8 animate-fade-in delay-100">
                <span class="text-[#FF6B35] text-[11px] font-bold uppercase tracking-[0.5em] block">Réservation Confirmée</span>
                <h1 class="text-5xl md:text-7xl font-serif font-bold italic text-white uppercase leading-none">
                    Confirmé<span class="text-[#FF6B35]">.</span>
                </h1>
            </div>

            <!-- Decorative line -->
            <div class="flex items-center justify-center gap-4 mb-12 animate-fade-in delay-200">
                <div class="h-px w-16 bg-gradient-to-r from-transparent to-[#FF6B35]/50"></div>
                <div class="flex gap-2">
                    <div class="w-2 h-2 rounded-full bg-[#FF6B35]"></div>
                    <div class="w-2 h-2 rounded-full bg-[#FF6B35]/60"></div>
                    <div class="w-2 h-2 rounded-full bg-[#FF6B35]/30"></div>
                </div>
                <div class="h-px w-16 bg-gradient-to-l from-transparent to-[#FF6B35]/50"></div>
            </div>

            <!-- Quote Card -->
            <div class="bg-[#111] border border-white/10 rounded-2xl p-8 md:p-10 mb-12 relative overflow-hidden animate-fade-in delay-300">
                <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-[#FF6B35]/30 to-transparent"></div>
                <div class="absolute -top-4 -left-4 text-8xl text-[#FF6B35]/10 font-serif">"</div>
                
                <p class="text-xl md:text-2xl leading-relaxed font-serif italic text-gray-300 relative z-10">
                    Votre table est désormais réservée. <br>
                    <span class="text-[#FF6B35]">Un email de confirmation</span> vous a été envoyé.
                </p>
                
                <div class="absolute -bottom-4 -right-4 text-8xl text-[#FF6B35]/10 font-serif rotate-180">"</div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4 animate-fade-in delay-400">
                <a href="{{ route('client.reservations') }}" 
                   class="group inline-flex items-center gap-3 bg-[#FF6B35] text-black font-bold px-10 py-4 rounded-full uppercase tracking-[0.2em] text-[11px] hover:bg-white transition-all duration-500 shadow-lg shadow-[#FF6B35]/20">
                    Voir mes réservations
                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </a>
                
                <a href="{{ route('home') }}" 
                   class="inline-flex items-center gap-3 border border-white/20 text-white font-bold px-10 py-4 rounded-full uppercase tracking-[0.2em] text-[11px] hover:border-[#FF6B35]/50 hover:text-[#FF6B35] transition-all duration-300">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    Accueil
                </a>
            </div>

            <!-- Footer note -->
            <p class="mt-12 text-[10px] text-gray-600 uppercase tracking-[0.3em] font-sans animate-fade-in delay-500">
                Merci de votre confiance • Cibo Gustoso
            </p>
        </div>

        <!-- Corner decorations -->
        <div class="absolute top-8 left-8 w-16 h-16 border-l border-t border-[#FF6B35]/20"></div>
        <div class="absolute top-8 right-8 w-16 h-16 border-r border-t border-[#FF6B35]/20"></div>
        <div class="absolute bottom-8 left-8 w-16 h-16 border-l border-b border-[#FF6B35]/20"></div>
        <div class="absolute bottom-8 right-8 w-16 h-16 border-r border-b border-[#FF6B35]/20"></div>
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
        
        .delay-75 { animation-delay: 75ms; }
        .delay-100 { animation-delay: 100ms; }
        .delay-200 { animation-delay: 200ms; }
        .delay-300 { animation-delay: 300ms; }
        .delay-400 { animation-delay: 400ms; }
        .delay-500 { animation-delay: 500ms; }
    </style>
</x-app-layout>