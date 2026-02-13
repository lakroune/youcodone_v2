<x-app-layout>
    <div class="bg-[#0a0a0a] min-h-screen pb-20 font-serif">
        
        <!-- Header -->
        <div class="border-b border-[#FF6B35]/10 py-12 bg-[#0a0a0a] relative overflow-hidden">
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-[#FF6B35]/5 via-transparent to-transparent"></div>
            <div class="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-[#FF6B35]/30 to-transparent"></div>
            
            <div class="max-w-4xl mx-auto px-6 relative z-10">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
                    <div>
                        <span class="text-[#FF6B35] text-[10px] font-bold uppercase tracking-[0.4em] mb-3 block">Centre de Messages</span>
                        <h1 class="text-4xl md:text-5xl font-serif font-bold italic text-white">Notifications.</h1>
                        <div class="flex items-center gap-3 mt-4">
                            <div class="h-px w-8 bg-[#FF6B35]/30"></div>
                            <p class="text-gray-500 text-xs uppercase tracking-widest font-sans">
                                {{ $notifications->whereNull('read_at')->count() }} non lue(s)
                            </p>
                        </div>
                    </div>
                    
                    @if($notifications->whereNull('read_at')->count() > 0)
                        <form action="{{ route('notifications.readall') }}" method="POST">
                            @csrf
                            <button type="submit" class="group inline-flex items-center gap-3 border border-white/10 text-white font-bold uppercase text-[11px] tracking-[0.2em] px-6 py-3 rounded-full hover:bg-[#FF6B35] hover:border-[#FF6B35] hover:text-black transition-all duration-300">
                                <svg class="w-4 h-4 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Tout marquer comme lu
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="max-w-4xl mx-auto px-6 mt-12">
            @if($notifications->isEmpty())
                <!-- Empty State -->
                <div class="flex flex-col items-center justify-center py-32 border border-dashed border-white/10 rounded-[3rem] bg-gradient-to-b from-white/[0.02] to-transparent">
                    <div class="w-24 h-24 bg-[#FF6B35]/5 border border-[#FF6B35]/20 rounded-full flex items-center justify-center mb-8">
                        <svg class="w-10 h-10 text-[#FF6B35]/40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-serif font-bold italic text-white mb-3">Aucune notification</h3>
                    <p class="text-gray-500 text-sm font-sans">Votre centre de messages est vide</p>
                </div>
            @else
                <!-- Notifications List -->
                <div class="space-y-4">
                    @foreach($notifications as $notification)
                        <div class="group relative bg-[#111] border {{ $notification->read_at ? 'border-white/5' : 'border-[#FF6B35]/20 bg-[#FF6B35]/5' }} rounded-2xl p-6 transition-all duration-500 hover:border-[#FF6B35]/30 hover:-translate-y-1">
                            
                            <!-- Unread Indicator -->
                            @if(!$notification->read_at)
                                <div class="absolute left-0 top-1/2 -translate-y-1/2 w-1 h-12 bg-[#FF6B35] rounded-r-full"></div>
                            @endif

                            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                                <div class="flex items-start gap-4 flex-1">
                                    <!-- Icon -->
                                    <div class="w-12 h-12 rounded-full {{ $notification->read_at ? 'bg-white/5 border-white/10' : 'bg-[#FF6B35]/10 border-[#FF6B35]/20' }} border flex items-center justify-center flex-shrink-0">
                                        <svg class="w-5 h-5 {{ $notification->read_at ? 'text-gray-500' : 'text-[#FF6B35]' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>

                                    <!-- Content -->
                                    <div class="flex-1">
                                        <p class="font-serif font-bold text-lg text-white mb-1 group-hover:text-[#FF6B35] transition-colors">
                                            {{ $notification->data['message'] ?? 'Nouvelle réservation' }}
                                        </p>
                                        <div class="flex flex-wrap items-center gap-4 text-xs text-gray-500 font-sans">
                                            <span class="flex items-center gap-1.5">
                                                <svg class="w-3 h-3 text-[#FF6B35]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" />
                                                </svg>
                                                Ref: #{{ $notification->data['reservation_id'] ?? 'N/A' }}
                                            </span>
                                            <span class="flex items-center gap-1.5">
                                                <svg class="w-3 h-3 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                {{ $notification->created_at->diffForHumans() }}
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Actions -->
                                <div class="flex items-center gap-3">
                                    @if(!$notification->read_at)
                                        <form action="{{ route('notifications.read', $notification->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="group/btn flex items-center gap-2 bg-[#FF6B35] text-black font-bold uppercase text-[10px] tracking-wider px-4 py-2.5 rounded-xl hover:bg-white transition-all duration-300">
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                </svg>
                                                Marquer comme lu
                                            </button>
                                        </form>
                                    @else
                                        <span class="flex items-center gap-2 text-gray-600 text-[10px] uppercase tracking-wider font-sans">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                            </svg>
                                            Lu
                                        </span>
                                    @endif
                                    
                                    <form action="{{ route('notifications.destroy', $notification->id) }}" method="POST" onsubmit="return confirm('Supprimer cette notification ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 text-gray-600 hover:text-red-500 transition-colors" title="Supprimer">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                {{-- @if($notifications->hasPages())
                    <div class="mt-12 flex justify-center">
                        <div class="bg-[#111] border border-white/5 px-8 py-4 rounded-2xl">
                            {{ $notifications->links() }}
                        </div>
                    </div>
                @endif --}}
            @endif
        </div>
    </div>

    <!-- Styles -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700&family=Inter:wght@300;400;500;600&display=swap');
        
        .font-serif { font-family: 'Playfair Display', serif; }
        .font-sans { font-family: 'Inter', sans-serif; }

        .pagination { display: flex; gap: 0.5rem; align-items: center; }
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
            border-color: rgba(255, 107, 53, 0.3) !important;
        }
        .pagination .active span { 
            background: #FF6B35 !important; 
            color: black !important; 
            font-weight: 600; 
        }
    </style>
</x-app-layout>