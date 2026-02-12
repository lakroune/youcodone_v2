<x-app-layout>
    <div class="bg-[#0a0a0a] min-h-screen text-[#e5e5e5] font-serif pb-32 selection:bg-[#FF6B35] selection:text-black">

        <!-- Header Section Style Cibo Gustoso -->
        <header class="py-20 border-b border-[#FF6B35]/10 text-center relative overflow-hidden">
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-[#FF6B35]/10 via-transparent to-transparent opacity-40"></div>
            <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-[#FF6B35] to-transparent opacity-30"></div>
            
            <div class="relative z-10 max-w-4xl mx-auto px-6">
                <span class="text-[#FF6B35] text-[11px] font-bold tracking-[0.5em] uppercase mb-6 block">
                    Espace Client
                </span>
                <h1 class="text-5xl md:text-7xl font-bold italic text-white uppercase leading-none mb-6">
                    Mes <span class="text-[#FF6B35]">Réservations</span>
                </h1>
                <div class="flex justify-center items-center gap-4 mb-8">
                    <div class="h-px w-12 bg-[#FF6B35]/30"></div>
                    <span class="text-[#FF6B35] text-lg">✦</span>
                    <div class="h-px w-12 bg-[#FF6B35]/30"></div>
                </div>
                <p class="text-gray-400 text-sm tracking-widest uppercase font-sans font-light">
                    Historique de vos expériences gastronomiques
                </p>
            </div>
        </header>

        <main class="max-w-7xl mx-auto px-6 mt-16">
            {{-- Notifications --}}
            @if(session('success'))
                <div class="mb-12 p-6 bg-[#FF6B35]/5 border border-[#FF6B35]/20 rounded-2xl text-[#FF6B35] text-sm font-medium tracking-wide text-center animate-pulse">
                    <span class="mr-2">✓</span>{{ session('success') }}
                </div>
            @endif

            @if ($reservations->isEmpty())
                <!-- État Vide Style Cibo -->
                <div class="text-center py-32 border border-dashed border-white/10 rounded-3xl bg-gradient-to-b from-white/[0.02] to-transparent">
                    <div class="mb-8 flex justify-center">
                        <div class="w-24 h-24 rounded-full border border-[#FF6B35]/20 flex items-center justify-center">
                            <svg class="w-10 h-10 text-[#FF6B35]/40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-2xl font-bold italic text-white mb-4">Aucune réservation</h3>
                    <p class="text-gray-500 text-sm uppercase tracking-widest mb-10 font-sans">Votre carnet d'expériences est vide</p>
                    <a href="{{ route('home') }}" class="inline-flex items-center gap-3 bg-[#FF6B35] text-black text-xs font-bold uppercase tracking-[0.2em] px-10 py-4 rounded-full hover:bg-white transition-all duration-500 shadow-lg shadow-[#FF6B35]/20">
                        Découvrir nos restaurants
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
                    </a>
                </div>
            @else
                <!-- Table Style Cibo Gustoso -->
                <div class="bg-[#111] border border-white/5 rounded-3xl overflow-hidden shadow-2xl">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="border-b border-white/5 bg-[#FF6B35]/5">
                                    <th class="px-8 py-6 text-[10px] font-bold uppercase tracking-[0.3em] text-[#FF6B35] font-sans">Restaurant</th>
                                    <th class="px-8 py-6 text-[10px] font-bold uppercase tracking-[0.3em] text-[#FF6B35] font-sans">Date & Heure</th>
                                    <th class="px-8 py-6 text-[10px] font-bold uppercase tracking-[0.3em] text-[#FF6B35] font-sans text-center">Statut</th>
                                    <th class="px-8 py-6 text-[10px] font-bold uppercase tracking-[0.3em] text-[#FF6B35] font-sans text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-white/5">
                                @foreach ($reservations as $reservation)
                                    <tr class="group hover:bg-white/[0.02] transition-all duration-500">
                                        {{-- Restaurant Info --}}
                                        <td class="px-8 py-8">
                                            <div class="flex items-center gap-5">
                                                <div class="relative">
                                                    <div class="w-20 h-20 rounded-2xl overflow-hidden border-2 border-white/5 group-hover:border-[#FF6B35]/50 transition-all duration-500 shadow-lg">
                                                        @php $photo = $reservation->restaurant->photos->first(); @endphp
                                                        <img src="{{ $photo ? asset('storage/' . $photo->url_photo) : 'https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?w=150&h=150&fit=crop' }}" 
                                                             class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-700 scale-110 group-hover:scale-100">
                                                    </div>
                                                    <div class="absolute -bottom-1 -right-1 w-6 h-6 bg-[#FF6B35] rounded-full flex items-center justify-center text-black text-xs font-bold">
                                                        ★
                                                    </div>
                                                </div>
                                                <div>
                                                    <h4 class="text-white text-xl font-bold italic mb-1 group-hover:text-[#FF6B35] transition-colors duration-300">
                                                        {{ $reservation->restaurant->nom_restaurant }}
                                                    </h4>
                                                    <div class="flex items-center gap-2 text-gray-500 text-xs uppercase tracking-wider font-sans">
                                                        <svg class="w-3 h-3 text-[#FF6B35]" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/></svg>
                                                        {{ $reservation->restaurant->adresse_restaurant }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                        {{-- Date & Time --}}
                                        <td class="px-8 py-8">
                                            <div class="space-y-2">
                                                <p class="text-white font-serif text-2xl italic">
                                                    {{ \Carbon\Carbon::parse($reservation->date_reservation)->translatedFormat('d MMMM Y') }}
                                                </p>
                                                <div class="inline-flex items-center gap-2 px-4 py-2 bg-[#FF6B35]/10 rounded-full border border-[#FF6B35]/20">
                                                    <svg class="w-3 h-3 text-[#FF6B35]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                                    <p class="text-[#FF6B35] text-xs font-bold uppercase tracking-wider">{{ $reservation->heure_reservation }}</p>
                                                </div>
                                            </div>
                                        </td>

                                        {{-- Status --}}
                                        <td class="px-8 py-8 text-center">
                                            @if ($reservation->paiement && $reservation->paiement->statut == 'completed')
                                                <div class="inline-flex items-center gap-2 px-5 py-3 rounded-full border border-green-500/30 bg-green-500/10">
                                                    <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span>
                                                    <span class="text-green-400 text-[10px] font-bold uppercase tracking-wider">Confirmée</span>
                                                </div>
                                            @elseif ($reservation->paiement && $reservation->paiement->statut == 'pending')
                                                <div class="inline-flex items-center gap-2 px-5 py-3 rounded-full border border-yellow-500/30 bg-yellow-500/10">
                                                    <span class="w-2 h-2 rounded-full bg-yellow-500"></span>
                                                    <span class="text-yellow-400 text-[10px] font-bold uppercase tracking-wider">En attente</span>
                                                </div>
                                            @else
                                                <div class="inline-flex items-center gap-2 px-5 py-3 rounded-full border border-gray-500/30 bg-gray-500/10">
                                                    <span class="w-2 h-2 rounded-full bg-gray-500"></span>
                                                    <span class="text-gray-400 text-[10px] font-bold uppercase tracking-wider">Non payée</span>
                                                </div>
                                            @endif
                                        </td>

                                        {{-- Actions --}}
                                        <td class="px-8 py-8 text-right">
                                            <div class="flex justify-end items-center gap-3">
                                                @role('client')
                                                    @if (!$reservation->paiement || $reservation->paiement->statut == 'pending')
                                                        <button onclick="openPaymentModal({{ $reservation->id }}, {{ $reservation->restaurant->prix_reservation ?? 0 }})"
                                                            class="group/btn relative px-6 py-3 bg-[#FF6B35] text-black text-[10px] font-bold uppercase tracking-wider rounded-xl hover:bg-white transition-all duration-300 shadow-lg shadow-[#FF6B35]/20 flex items-center gap-2">
                                                            <span>Payer</span>
                                                            <svg class="w-3 h-3 group-hover/btn:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                                                        </button>
                                                    @endif

                                                    <a href="{{ route('client.restaurant.show', $reservation->restaurant) }}" 
                                                       class="p-3 bg-white/5 hover:bg-[#FF6B35] hover:text-black text-gray-400 rounded-xl border border-white/10 transition-all duration-300"
                                                       title="Voir détails">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                                                    </a>

                                                    @if (!$reservation->paiement || $reservation->paiement->statut == 'pending')
                                                        <form action="{{ route('client.reservations.destroy', $reservation) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir annuler cette réservation ?')" class="inline">
                                                            @csrf @method('DELETE')
                                                            <button class="p-3 bg-red-500/5 hover:bg-red-500/20 text-red-400 hover:text-red-300 rounded-xl border border-red-500/10 transition-all duration-300" title="Annuler">
                                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                                                            </button>
                                                        </form>
                                                    @endif
                                                @endrole
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- Pagination Style Cibo --}}
                <div class="mt-16 flex justify-center">
                    <div class="bg-[#111] border border-white/5 px-6 py-3 rounded-2xl">
                        {{ $reservations->links() }}
                    </div>
                </div>
            @endif
        </main>
    </div>

    <!-- Modal Paiement Style Cibo Gustoso -->
    <div id="paymentModal" class="fixed inset-0 z-[100] hidden overflow-y-auto backdrop-blur-sm">
        <div class="fixed inset-0 bg-black/90 transition-opacity" onclick="closePaymentModal()"></div>
        <div class="flex min-h-full items-center justify-center p-6">
            <div class="relative transform overflow-hidden rounded-3xl bg-[#111] border border-[#FF6B35]/20 p-10 text-center shadow-2xl transition-all w-full max-w-md animate-fade-in-up">
                
                <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-[#FF6B35] to-transparent"></div>
                
                <div class="mb-10">
                    <div class="w-16 h-16 mx-auto mb-6 rounded-full bg-[#FF6B35]/10 border border-[#FF6B35]/20 flex items-center justify-center">
                        <svg class="w-8 h-8 text-[#FF6B35]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" /></svg>
                    </div>
                    <span class="text-[#FF6B35] text-[10px] font-bold tracking-[0.4em] uppercase block mb-3">Paiement Sécurisé</span>
                    <h3 class="text-3xl font-bold italic text-white">Finaliser votre <span class="text-[#FF6B35]">réservation</span></h3>
                </div>

                <div class="space-y-4 text-left">
                    <button onclick="processPayment('stripe')" class="group w-full p-6 bg-white/[0.03] border border-white/10 rounded-2xl hover:border-[#FF6B35]/50 hover:bg-[#FF6B35]/5 transition-all duration-500 flex items-center justify-between">
                        <div class="flex items-center gap-4">
                            <div class="p-3 bg-white/5 rounded-xl group-hover:bg-[#FF6B35] group-hover:text-black transition-all duration-300">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M13.976 9.15c-2.172-.113-2.5.721-2.5 1.478 0 1.054 1.15 1.755 2.5 2.155 1.35.4 3.033 1.054 3.033 2.946 0 1.892-1.741 3.268-4.148 3.268-2.406 0-3.924-1.127-3.924-1.127l.708-1.54s1.215.828 3.04.828c1.621 0 2.229-.654 2.229-1.39 0-.965-.98-1.503-2.229-1.93-1.249-.427-3.303-1.018-3.303-3.111 0-1.89 1.586-3.155 3.738-3.155 2.152 0 3.376.92 3.376.92l-.634 1.584s-.89-.773-2.285-.828z"/></svg>
                            </div>
                            <div>
                                <p class="text-white font-bold text-lg italic">Carte Bancaire</p>
                                <p class="text-[10px] text-gray-500 uppercase tracking-widest font-sans mt-1">Stripe Secure</p>
                            </div>
                        </div>
                        <svg class="w-5 h-5 text-gray-600 group-hover:text-[#FF6B35] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
                    </button>

                    <button onclick="processPayment('paypal')" class="group w-full p-6 bg-white/[0.03] border border-white/10 rounded-2xl hover:border-blue-500/50 hover:bg-blue-500/5 transition-all duration-500 flex items-center justify-between">
                        <div class="flex items-center gap-4">
                            <div class="p-3 bg-white/5 rounded-xl group-hover:bg-blue-600 group-hover:text-white transition-all duration-300">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M20.067 8.178c-.652 3.102-2.83 5.034-5.914 5.034h-1.312l-.93 4.418H9.37l1.397-6.626H13.6c1.685 0 2.87-.936 3.226-2.61.183-.864.04-1.63-.448-2.2-.416-.484-1.178-.714-2.22-.714H8.472L6.108 16.63H3.673l2.846-13.48h8.33c2.476 0 4.256.592 5.018 1.674.524.743.684 1.777.2 3.354z"/></svg>
                            </div>
                            <div>
                                <p class="text-white font-bold text-lg italic">PayPal</p>
                                <p class="text-[10px] text-gray-500 uppercase tracking-widest font-sans mt-1">Paiement Rapide</p>
                            </div>
                        </div>
                        <svg class="w-5 h-5 text-gray-600 group-hover:text-blue-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
                    </button>
                </div>

                <button onclick="closePaymentModal()" class="mt-8 text-[10px] text-gray-500 uppercase tracking-[0.3em] hover:text-[#FF6B35] transition-colors duration-300 font-sans border-b border-transparent hover:border-[#FF6B35] pb-1">
                    Annuler
                </button>
            </div>
        </div>
    </div>

    <script>
        let reservationIdToPay = null;

        function openPaymentModal(id, amount) {
            reservationIdToPay = id;
            const modal = document.getElementById('paymentModal');
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closePaymentModal() {
            const modal = document.getElementById('paymentModal');
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        function processPayment(gateway) {
            if (!reservationIdToPay) return;
            const baseUrl = gateway === 'stripe' ? '/client/paiement/stripe/' : '/client/paiement/paypal/';
            window.location.href = baseUrl + reservationIdToPay;
        }

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') closePaymentModal();
        });
    </script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&family=Inter:wght@300;400;500;600&display=swap');
        
        .font-serif { font-family: 'Playfair Display', serif; }
        .font-sans { font-family: 'Inter', sans-serif; }

        @keyframes fade-in-up {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .animate-fade-in-up { 
            animation: fade-in-up 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards; 
        }

        /* Pagination Custom Cibo */
        .pagination { display: flex; gap: 0.5rem; }
        .pagination svg { width: 1.2rem; height: 1.2rem; color: #666; }
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
            border-color: #FF6B35/30 !important;
        }
        .pagination .active span { 
            background: #FF6B35 !important; 
            color: black !important; 
            font-weight: 600; 
        }
        .pagination .disabled span { opacity: 0.3; }
    </style>
</x-app-layout>