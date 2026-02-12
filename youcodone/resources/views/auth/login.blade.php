<x-guest-layout>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700&family=Inter:wght@300;400;500;600&display=swap');
        
        .min-h-screen { background-color: #0a0a0a !important; }
        
        .image-side {
            background-image: url('https://images.unsplash.com/photo-1514362545857-3bc16c4c7d1b?q=80&w=1470&auto=format&fit=crop');
            background-size: cover;
            background-position: center;
        }

        .cibo-input:focus {
            border-color: #FF6B35 !important;
            box-shadow: 0 0 0 3px rgba(255, 107, 53, 0.1) !important;
            outline: none;
        }

        .font-serif { font-family: 'Playfair Display', serif; }
        .font-sans { font-family: 'Inter', sans-serif; }
    </style>

    <div class="fixed inset-0 flex items-stretch overflow-hidden">
        
        <!-- Image Side -->
        <div class="hidden lg:block lg:w-[55%] image-side relative">
            <div class="absolute inset-0 bg-gradient-to-r from-black/60 via-black/20 to-transparent"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent"></div>
            
            <!-- Logo -->
            <div class="absolute top-12 left-12 text-white z-10">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full border-2 border-[#FF6B35]/30 flex items-center justify-center">
                        <span class="text-[#FF6B35] font-serif italic text-xl font-bold">C</span>
                    </div>
                    <div>
                        <h1 class="text-xl font-serif font-bold italic tracking-tight">Cibo <span class="text-[#FF6B35]">Gustoso</span></h1>
                    </div>
                </div>
            </div>

            <!-- Quote -->
            <div class="absolute bottom-20 left-12 right-12 z-10">
                <p class="text-white/80 text-2xl font-serif italic leading-relaxed mb-4">
                    "La bonne cuisine est la base du véritable bonheur."
                </p>
                <div class="flex items-center gap-3">
                    <div class="h-px w-12 bg-[#FF6B35]/50"></div>
                    <span class="text-[#FF6B35] text-xs uppercase tracking-[0.3em] font-sans">Auguste Escoffier</span>
                </div>
            </div>
        </div>

        <!-- Form Side -->
        <div class="w-full lg:w-[45%] bg-[#0a0a0a] flex items-center justify-center p-8 relative">
            <!-- Subtle gradient -->
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-[#FF6B35]/5 via-transparent to-transparent pointer-events-none"></div>
            
            <div class="w-full max-w-[380px] relative z-10"> 
                
                <!-- Header -->
                <div class="mb-12 text-center lg:text-left">
                    <span class="text-[#FF6B35] text-[10px] font-bold uppercase tracking-[0.4em] mb-3 block">Espace Membre</span>
                    <h2 class="text-white text-4xl font-serif font-bold italic mb-3">Connexion.</h2>
                    <p class="text-gray-500 text-sm font-sans font-light">Accédez à votre espace gastronomique.</p>
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-6 p-4 bg-[#FF6B35]/10 border border-[#FF6B35]/20 rounded-xl text-[#FF6B35] text-xs font-bold text-center" :status="session('status')" />

                <!-- Form -->
                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <!-- Email -->
                    <div class="space-y-2">
                        <label for="email" class="text-[10px] text-gray-500 uppercase tracking-[0.2em] font-bold font-sans block">Email</label>
                        <div class="relative">
                            <input id="email" type="email" name="email" value="{{ old('email') }}" 
                                placeholder="votre@email.com" required autofocus
                                class="w-full bg-[#111] border border-white/10 rounded-xl px-4 py-4 pl-12 text-sm text-white placeholder:text-gray-600 cibo-input transition-all font-sans" />
                            <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                            </svg>
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-1 text-[10px] text-red-400 font-bold uppercase tracking-wider" />
                    </div>

                    <!-- Password -->
                    <div class="space-y-2">
                        <label for="password" class="text-[10px] text-gray-500 uppercase tracking-[0.2em] font-bold font-sans block">Mot de passe</label>
                        <div class="relative">
                            <input id="password" type="password" name="password" 
                                placeholder="••••••••" required autocomplete="current-password"
                                class="w-full bg-[#111] border border-white/10 rounded-xl px-4 py-4 pl-12 text-sm text-white placeholder:text-gray-600 cibo-input transition-all font-sans" />
                            <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-1 text-[10px] text-red-400 font-bold uppercase tracking-wider" />
                    </div>

                    <!-- Remember & Forgot -->
                    <div class="flex items-center justify-between">
                        <label for="remember_me" class="inline-flex items-center cursor-pointer group">
                            <input id="remember_me" type="checkbox" class="rounded border-white/10 bg-[#111] text-[#FF6B35] shadow-sm focus:ring-[#FF6B35] focus:ring-offset-0 w-4 h-4" name="remember">
                            <span class="ms-3 text-[11px] text-gray-500 group-hover:text-gray-300 transition-colors font-sans">Se souvenir de moi</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a class="text-[11px] text-[#FF6B35] hover:text-white font-medium transition-colors font-sans" href="{{ route('password.request') }}">
                                Mot de passe oublié ?
                            </a>
                        @endif
                    </div>

                    <!-- Submit -->
                    <button type="submit" 
                        class="w-full group relative bg-[#FF6B35] text-black font-bold py-4 rounded-xl uppercase tracking-[0.15em] text-[11px] hover:bg-white transition-all duration-500 shadow-lg shadow-[#FF6B35]/20 overflow-hidden">
                        <span class="relative z-10 flex items-center justify-center gap-3">
                            Se Connecter
                            <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </span>
                    </button>
                </form>

                <!-- Register Link -->
                <div class="mt-12 pt-8 border-t border-white/5 text-center">
                    <p class="text-sm text-gray-500 font-sans">
                        Pas encore membre ? 
                        <a href="{{ route('register') }}" class="text-white font-bold hover:text-[#FF6B35] transition-colors ml-1 border-b border-[#FF6B35]/30 hover:border-[#FF6B35] pb-0.5">
                            Créer un compte
                        </a>
                    </p>
                </div>
                
                <!-- Footer -->
                <div class="mt-12 text-center">
                    <p class="text-[10px] text-gray-600 uppercase tracking-[0.3em] font-sans">
                        © {{ date('Y') }} Cibo Gustoso
                    </p>
                </div>
                
            </div>
        </div>
    </div>
</x-guest-layout>