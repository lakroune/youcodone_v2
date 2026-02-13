<x-guest-layout>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700&family=Inter:wght@300;400;500;600&display=swap');

        .min-h-screen {
            background-color: #0a0a0a !important;
        }

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
                    "La sécurité est le fondement de toute belle expérience."
                </p>
                <div class="flex items-center gap-3">
                    <div class="h-px w-12 bg-[#FF6B35]/50"></div>
                    <span class="text-[#FF6B35] text-xs uppercase tracking-[0.3em] font-sans">Cibo Gustoso</span>
                </div>
            </div>
        </div>

        <!-- Form Side -->
        <div class="w-full lg:w-[45%] bg-[#0a0a0a] flex items-center justify-center p-8 relative">
            <!-- Subtle gradient -->
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-[#FF6B35]/5 via-transparent to-transparent pointer-events-none"></div>
            
            <div class="w-full max-w-[400px] relative z-10">

                <!-- Header -->
                <div class="mb-10 text-center lg:text-left">
                    <span class="text-[#FF6B35] text-[10px] font-bold uppercase tracking-[0.4em] mb-3 block">Sécurité</span>
                    <h2 class="text-white text-4xl font-serif font-bold italic mb-3">Nouveau mot de passe.</h2>
                    <p class="text-gray-500 text-sm font-sans font-light">Créez un nouveau mot de passe sécurisé pour votre compte.</p>
                </div>

                <!-- Form -->
                <form method="POST" action="{{ route('password.store') }}" class="space-y-6">
                    @csrf

                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <!-- Email Address -->
                    <div class="space-y-2">
                        <label for="email" class="text-[10px] text-gray-500 uppercase tracking-[0.2em] font-bold font-sans block">Email</label>
                        <div class="relative">
                            <input id="email" type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus autocomplete="username"
                                class="w-full bg-[#111] border border-white/10 rounded-xl px-4 py-4 pl-12 text-sm text-white placeholder:text-gray-600 cibo-input transition-all font-sans" />
                            <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                            </svg>
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-1 text-[10px] text-red-400 font-bold uppercase tracking-wider" />
                    </div>

                    <!-- Password -->
                    <div class="space-y-2">
                        <label for="password" class="text-[10px] text-gray-500 uppercase tracking-[0.2em] font-bold font-sans block">Nouveau mot de passe</label>
                        <div class="relative">
                            <input id="password" type="password" name="password" required autocomplete="new-password" placeholder="••••••••"
                                class="w-full bg-[#111] border border-white/10 rounded-xl px-4 py-4 pl-12 text-sm text-white placeholder:text-gray-600 cibo-input transition-all font-sans" />
                            <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-1 text-[10px] text-red-400 font-bold uppercase tracking-wider" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="space-y-2">
                        <label for="password_confirmation" class="text-[10px] text-gray-500 uppercase tracking-[0.2em] font-bold font-sans block">Confirmation</label>
                        <div class="relative">
                            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="••••••••"
                                class="w-full bg-[#111] border border-white/10 rounded-xl px-4 py-4 pl-12 text-sm text-white placeholder:text-gray-600 cibo-input transition-all font-sans" />
                            <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-[10px] text-red-400 font-bold uppercase tracking-wider" />
                    </div>

                    <!-- Submit -->
                    <div class="pt-4">
                        <button type="submit"
                            class="w-full group relative bg-[#FF6B35] text-black font-bold py-4 rounded-xl uppercase tracking-[0.15em] text-[11px] hover:bg-white transition-all duration-500 shadow-lg shadow-[#FF6B35]/20 overflow-hidden">
                            <span class="relative z-10 flex items-center justify-center gap-3">
                                Réinitialiser le mot de passe
                                <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                </svg>
                            </span>
                        </button>
                    </div>
                </form>

                <!-- Back to Login -->
                <div class="mt-10 text-center lg:text-left border-t border-white/5 pt-8">
                    <p class="text-sm text-gray-500 font-sans">
                        Vous vous souvenez de votre mot de passe ?
                        <a href="{{ route('login') }}"
                            class="text-white font-bold hover:text-[#FF6B35] transition-colors ml-1 border-b border-[#FF6B35]/30 hover:border-[#FF6B35] pb-0.5">
                            Se connecter
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