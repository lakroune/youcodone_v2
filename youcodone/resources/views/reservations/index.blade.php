<x-app-layout>
    <div class="bg-[#050505] min-h-screen text-gray-200 font-serif pb-32">

        <!-- Header Section -->
        <header class="py-24 border-b border-white/5 text-center relative overflow-hidden">
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-[#FF5F00]/5 via-transparent to-transparent opacity-50"></div>
            
            <div class="relative z-10">
                <span class="text-[#FF5F00] text-[10px] font-black tracking-[0.7em] uppercase mb-6 block animate-fade-in opacity-80">
                    Portfolio Client
                </span>
                <h1 class="text-6xl md:text-8xl font-black italic tracking-tighter text-white uppercase leading-none">
                    Mes <span class="text-[#FF5F00]">Invitations.</span>
                </h1>
                <div class="mt-10 flex justify-center items-center gap-6">
                    <div class="h-[1px] w-16 bg-gradient-to-r from-transparent to-white/20"></div>
                    <p class="text-[10px] text-gray-500 tracking-[4px] uppercase italic font-sans">Registre des réservations & Expériences</p>
                    <div class="h-[1px] w-16 bg-gradient-to-l from-transparent to-white/20"></div>
                </div>
            </div>
        </header>

        <main class="max-w-6xl mx-auto px-6 mt-16">
            {{-- Notifications --}}
            @if(session('success'))
                <div class="mb-12 p-5 bg-green-500/5 border border-green-500/20 rounded-2xl text-green-400 text-[10px] font-black uppercase tracking-widest text-center animate-bounce-in">
                    {{ session('success') }}
                </div>
            @endif

            @if ($reservations->isEmpty())
                <div class="text-center py-48 border border-dashed border-white/10 rounded-[4rem] bg-white/[0.01]">
                    <div class="mb-8 flex justify-center">
                        <svg class="w-12 h-12 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <p class="text-gray-600 uppercase tracking-[5px] text-[10px] italic mb-10 font-sans">Aucun enregistrement trouvé dans votre historique</p>
                    <a href="{{ route('home') }}" class="inline-flex items-center gap-5 text-[#FF5F00] text-[10px] font-black uppercase tracking-[4px] border border-[#FF5F00]/30 px-10 py-5 rounded-full hover:bg-[#FF5F00] hover:text-black transition-all duration-500 shadow-xl shadow-[#FF5F00]/5">
                        Découvrir la carte
                    </a>
                </div>
            @else
                <div class="bg-[#0A0A0A]/40 backdrop-blur-xl border border-white/5 rounded-[3rem] overflow-hidden shadow-2xl relative">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b border-white/5 bg-white/[0.03]">
                                <th class="px-10 py-8 text-[9px] font-black uppercase tracking-[0.3em] text-[#FF5F00] opacity-70 font-sans">Lieu de réception</th>
                                <th class="px-10 py-8 text-[9px] font-black uppercase tracking-[0.3em] text-[#FF5F00] opacity-70 font-sans">Rendez-vous</th>
                                <th class="px-10 py-8 text-[9px] font-black uppercase tracking-[0.3em] text-[#FF5F00] opacity-70 font-sans text-center">Statut du Paiement</th>
                                <th class="px-10 py-8 text-[9px] font-black uppercase tracking-[0.3em] text-[#FF5F00] opacity-70 font-sans text-right">Option de gestion</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/5">
                            @foreach ($reservations as $reservation)
                                <tr class="group hover:bg-white/[0.02] transition-all duration-500">
                                    {{-- Restaurant Info --}}
                                    <td class="px-10 py-12">
                                        <div class="flex items-center gap-6">
                                            <div class="relative">
                                                <div class="w-16 h-16 rounded-2xl overflow-hidden border border-white/10 group-hover:border-[#FF5F00]/50 transition-colors">
                                                    @php $photo = $reservation->restaurant->photos->first(); @endphp
                                                    <img src="{{ $photo ? asset('storage/' . $photo->url_photo) : 'https://via.placeholder.com/150' }}" 
                                                         class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-700 scale-110 group-hover:scale-100">
                                                </div>
                                            </div>
                                            <div>
                                                <h4 class="text-white text-xl font-bold tracking-tight mb-1 group-hover:text-[#FF5F00] transition-colors">
                                                    {{ $reservation->restaurant->nom_restaurant }}
                                                </h4>
                                                <div class="flex items-center gap-2">
                                                    <span class="w-1 h-1 bg-[#FF5F00] rounded-full"></span>
                                                    <p class="text-[9px] text-gray-500 uppercase tracking-widest font-sans">{{ $reservation->restaurant->adresse_restaurant }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    {{-- Date & Time --}}
                                    <td class="px-10 py-12">
                                        <div class="space-y-2">
                                            <p class="text-white font-serif italic text-2xl lowercase tracking-tighter">
                                                {{ \Carbon\Carbon::parse($reservation->date_reservation)->translatedFormat('d F Y') }}
                                            </p>
                                            <div class="inline-block px-3 py-1 bg-white/5 rounded-md border border-white/5">
                                                <p class="text-[10px] text-[#FF5F00] font-black uppercase tracking-[3px]">{{ $reservation->heure_reservation }}</p>
                                            </div>
                                        </div>
                                    </td>

                                    {{-- Status --}}
                                    <td class="px-10 py-12 text-center">
                                        @if ($reservation->paiement->statut == 'completed')
                                            <div class="inline-flex items-center gap-3 px-6 py-2 rounded-full border border-green-500/20 bg-green-500/5 shadow-[0_0_15px_rgba(34,197,94,0.05)]">
                                                <span class="w-1.5 h-1.5 rounded-full bg-green-500 animate-pulse"></span>
                                                <span class="text-green-500 text-[8px] font-black uppercase tracking-[2px]">Confirmée & Archivée</span>
                                            </div>
                                        @elseif ($reservation->paiement->statut == 'pending')
                                            <div class="inline-flex items-center gap-3 px-6 py-2 rounded-full border border-yellow-500/20 bg-yellow-500/5 shadow-[0_0_15px_rgba(234,179,8,0.05)]">
                                                <span class="w-1.5 h-1.5 rounded-full bg-yellow-500"></span>
                                                <span class="text-yellow-500 text-[8px] font-black uppercase tracking-[2px]">En attente de fonds</span>
                                            </div>
                                        @endif
                                    </td>

                                    {{-- Actions --}}
                                    <td class="px-10 py-12 text-right">
                                        <div class="flex justify-end items-center gap-4">
                                            @role('client')
                                                @if (!$reservation->paiement->statut || $reservation->paiement->statut == 'pending')
                                                    <button onclick="openPaymentModal({{ $reservation->id }}, {{ $reservation->restaurant->prix_reservation ?? 0 }})"
                                                        class="group/btn relative px-6 py-3 bg-[#FF5F00] text-black text-[9px] font-black uppercase tracking-widest rounded-xl hover:bg-white transition-all duration-300 shadow-lg shadow-[#FF5F00]/10">
                                                        Régler
                                                    </button>
                                                @endif

                                                <a href="{{ route('client.restaurant.show', $reservation->restaurant) }}" 
                                                   class="p-4 bg-white/5 hover:bg-white/10 text-gray-400 hover:text-white rounded-xl border border-white/5 transition-all duration-300"
                                                   title="Détails">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                                                </a>

                                                @if (!$reservation->paiement->statut || $reservation->paiement->statut == 'pending')
                                                    <form action="{{ route('client.reservations.destroy', $reservation) }}" method="POST" onsubmit="return confirm('Voulez-vous révoquer cette invitation ?')">
                                                        @csrf @method('DELETE')
                                                        <button class="p-4 bg-red-500/5 hover:bg-red-500/20 text-red-500/50 hover:text-red-500 rounded-xl border border-red-500/10 transition-all duration-300">
                                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
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

                {{-- Pagination Custom --}}
                <div class="mt-16 flex justify-center">
                    <div class="bg-[#0A0A0A] border border-white/5 p-2 rounded-2xl">
                        {{ $reservations->links() }}
                    </div>
                </div>
            @endif
        </main>
    </div>

    <!-- [Paiement Modal & Scripts - نفس الكود السابق لكن بتنسيق Glassmorphism] -->
    <div id="paymentModal" class="fixed inset-0 z-[100] hidden overflow-y-auto">
        <div class="fixed inset-0 bg-black/95 backdrop-blur-sm transition-opacity" onclick="closePaymentModal()"></div>
        <div class="flex min-h-full items-center justify-center p-6">
            <div class="relative transform overflow-hidden rounded-[4rem] bg-[#0A0A0A] border border-white/10 p-12 text-center shadow-2xl transition-all w-full max-w-lg animate-fade-in-up">
                
                <div class="mb-12">
                    <span class="text-[#FF5F00] text-[9px] font-black tracking-[0.6em] uppercase block mb-4">Transaction Sécurisée</span>
                    <h3 class="text-4xl font-black italic text-white uppercase tracking-tighter">Choisissez votre <span class="text-[#FF5F00]">médium.</span></h3>
                </div>

                <div class="grid grid-cols-1 gap-5 text-left">
                    <button onclick="processPayment('stripe')" class="group p-8 bg-white/[0.02] border border-white/5 rounded-[2.5rem] hover:border-[#FF5F00]/30 transition-all duration-500 flex items-center justify-between">
                        <div class="flex items-center gap-6">
                            <div class="p-4 bg-white/5 rounded-2xl group-hover:bg-[#FF5F00] group-hover:text-black transition-all">
                                <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24"><path d="M13.976 9.15c-2.172-.113-2.5.721-2.5 1.478 0 1.054 1.15 1.755 2.5 2.155 1.35.4 3.033 1.054 3.033 2.946 0 1.892-1.741 3.268-4.148 3.268-2.406 0-3.924-1.127-3.924-1.127l.708-1.54s1.215.828 3.04.828c1.621 0 2.229-.654 2.229-1.39 0-.965-.98-1.503-2.229-1.93-1.249-.427-3.303-1.018-3.303-3.111 0-1.89 1.586-3.155 3.738-3.155 2.152 0 3.376.92 3.376.92l-.634 1.584s-.89-.773-2.285-.828z"/></svg>
                            </div>
                            <div>
                                <p class="text-white font-bold text-lg tracking-tight">Stripe Finance</p>
                                <p class="text-[9px] text-gray-500 uppercase tracking-widest mt-1 font-sans">Carte de Crédit / Débit</p>
                            </div>
                        </div>
                        <svg class="w-5 h-5 text-gray-800 group-hover:text-[#FF5F00] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
                    </button>

                    <button onclick="processPayment('paypal')" class="group p-8 bg-white/[0.02] border border-white/5 rounded-[2.5rem] hover:border-blue-500/30 transition-all duration-500 flex items-center justify-between">
                        <div class="flex items-center gap-6">
                            <div class="p-4 bg-white/5 rounded-2xl group-hover:bg-blue-600 group-hover:text-white transition-all">
                                <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24"><path d="M20.067 8.178c-.652 3.102-2.83 5.034-5.914 5.034h-1.312l-.93 4.418H9.37l1.397-6.626H13.6c1.685 0 2.87-.936 3.226-2.61.183-.864.04-1.63-.448-2.2-.416-.484-1.178-.714-2.22-.714H8.472L6.108 16.63H3.673l2.846-13.48h8.33c2.476 0 4.256.592 5.018 1.674.524.743.684 1.777.2 3.354z"/></svg>
                            </div>
                            <div>
                                <p class="text-white font-bold text-lg tracking-tight">PayPal Wallet</p>
                                <p class="text-[9px] text-gray-500 uppercase tracking-widest mt-1 font-sans">Paiement Instantané</p>
                            </div>
                        </div>
                        <svg class="w-5 h-5 text-gray-800 group-hover:text-blue-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
                    </button>
                </div>

                <button onclick="closePaymentModal()" class="mt-12 text-[9px] text-gray-600 uppercase tracking-[0.4em] hover:text-white transition-colors duration-300 font-sans">
                    Abandonner la session
                </button>
            </div>
        </div>
    </div>

    <script>
        let reservationIdToPay = null;

        function openPaymentModal(id) {
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

        // Close on ESC key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') closePaymentModal();
        });
    </script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;0,900;1,400;1,700;1,900&display=swap');
        
        .font-serif { font-family: 'Playfair Display', serif; }
        .font-sans { font-family: ui-sans-serif, system-ui, -apple-system, sans-serif; }

        @keyframes fade-in-up {
            from { opacity: 0; transform: translateY(30px) scale(0.95); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }

        .animate-fade-in-up { animation: fade-in-up 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards; }

        .pagination svg { width: 1.5rem; height: 1.5rem; }
        .pagination span, .pagination a { 
            background: transparent !important; 
            color: #4b5563 !important; 
            border: none !important;
            font-size: 10px !important;
            text-transform: uppercase;
            letter-spacing: 2px;
        }
        .pagination .active span { color: #FF5F00 !important; font-weight: 900; }
    </style>
</x-app-layout>