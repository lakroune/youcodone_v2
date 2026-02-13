<x-guest-layout>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700&family=Inter:wght@300;400;500;600&display=swap');

        .min-h-screen {
            background-color: #0a0a0a !important;
        }

        .image-side {
            background-image: url('https://images.unsplash.com/photo-1559339352-11d035aa65de?q=80&w=1474&auto=format&fit=crop');
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

        /* Custom select styling */
        select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%23FF6B35'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'%3E%3C/path%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 1.2rem;
        }
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
                        <span class="text-[#FF6B35] font-serif italic text-xl font-bold">Y</span>
                    </div>
                    <div>
                        <h1 class="text-xl font-serif font-bold italic tracking-tight">YOUCO <span class="text-[#FF6B35]">DONE</span></h1>
                    </div>
                </div>
            </div>

            <!-- Quote -->
            <div class="absolute bottom-20 left-12 right-12 z-10">
                <p class="text-white/80 text-2xl font-serif italic leading-relaxed mb-4">
                    "La cuisine est l'art de transformer les moments en souvenirs."
                </p>
                <div class="flex items-center gap-3">
                    <div class="h-px w-12 bg-[#FF6B35]/50"></div>
                    <span class="text-[#FF6B35] text-xs uppercase tracking-[0.3em] font-sans">Cibo Gustoso</span>
                </div>
            </div>
        </div>

        <!-- Form Side -->
        <div class="w-full lg:w-[45%] bg-[#0a0a0a] flex items-center justify-center p-8 relative overflow-y-auto">
            <!-- Subtle gradient -->
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-[#FF6B35]/5 via-transparent to-transparent pointer-events-none"></div>
            
            <div class="w-full max-w-[400px] py-8 relative z-10">

                <!-- Header -->
                <div class="mb-10 text-center lg:text-left">
                    <span class="text-[#FF6B35] text-[10px] font-bold uppercase tracking-[0.4em] mb-3 block">Rejoignez-nous</span>
                    <h2 class="text-white text-4xl font-serif font-bold italic mb-3">Inscription.</h2>
                    <p class="text-gray-500 text-sm font-sans font-light">Créez votre compte et commencez l'aventure.</p>
                </div>

                <!-- Form -->
                <form method="POST" action="{{ route('register') }}" class="space-y-5">
                    @csrf

                    <!-- Name -->
                    <div class="space-y-2">
                        <label for="name" class="text-[10px] text-gray-500 uppercase tracking-[0.2em] font-bold font-sans block">Nom complet</label>
                        <div class="relative">
                            <input id="name" type="text" name="username" value="{{ old('name') }}"
                                placeholder="Jean Dupont" required autofocus
                                class="w-full bg-[#111] border border-white/10 rounded-xl px-4 py-4 pl-12 text-sm text-white placeholder:text-gray-600 cibo-input transition-all font-sans" />
                            <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <x-input-error :messages="$errors->get('name')" class="mt-1 text-[10px] text-red-400 font-bold uppercase tracking-wider" />
                    </div>

                    <!-- Email -->
                    <div class="space-y-2">
                        <label for="email" class="text-[10px] text-gray-500 uppercase tracking-[0.2em] font-bold font-sans block">Email</label>
                        <div class="relative">
                            <input id="email" type="email" name="email" value="{{ old('email') }}"
                                placeholder="jean@exemple.com" required
                                class="w-full bg-[#111] border border-white/10 rounded-xl px-4 py-4 pl-12 text-sm text-white placeholder:text-gray-600 cibo-input transition-all font-sans" />
                            <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                            </svg>
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-1 text-[10px] text-red-400 font-bold uppercase tracking-wider" />
                    </div>

                    <!-- Role Select -->
                    <div class="space-y-2">
                        <label for="role" class="text-[10px] text-gray-500 uppercase tracking-[0.2em] font-bold font-sans block">Vous êtes</label>
                        <div class="relative">
                            <select id="role" name="role" required
                                class="w-full bg-[#111] border border-white/10 rounded-xl px-4 py-4 pl-12 text-sm text-white cibo-input transition-all cursor-pointer font-sans appearance-none">
                                <option value="" disabled selected class="text-gray-600">Sélectionnez votre profil...</option>
                                <option value="client" class="bg-[#111]">je suis un client </option>
                                <option value="restaurateur" class="bg-[#111]">je suis un restaurateur </option>
                            </select>
                            <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <x-input-error :messages="$errors->get('role')" class="mt-1 text-[10px] text-red-400 font-bold uppercase tracking-wider" />
                    </div>

                    <!-- Password -->
                    <div class="space-y-2">
                        <label for="password" class="text-[10px] text-gray-500 uppercase tracking-[0.2em] font-bold font-sans block">Mot de passe</label>
                        <div class="relative">
                            <input id="password" type="password" name="password" placeholder="••••••••" required
                                autocomplete="new-password"
                                class="w-full bg-[#111] border border-white/10 rounded-xl px-4 py-4 pl-12 text-sm text-white placeholder:text-gray-600 cibo-input transition-all font-sans" />
                            <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-1 text-[10px] text-red-400 font-bold uppercase tracking-wider" />
                    </div>

                    <!-- Password Confirmation -->
                    <div class="space-y-2">
                        <label for="password_confirmation" class="text-[10px] text-gray-500 uppercase tracking-[0.2em] font-bold font-sans block">Confirmation</label>
                        <div class="relative">
                            <input id="password_confirmation" type="password" name="password_confirmation"
                                placeholder="••••••••" required
                                class="w-full bg-[#111] border border-white/10 rounded-xl px-4 py-4 pl-12 text-sm text-white placeholder:text-gray-600 cibo-input transition-all font-sans" />
                            <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>

                    <!-- Submit -->
                    <div class="pt-4">
                        <button type="submit"
                            class="w-full group relative bg-[#FF6B35] text-black font-bold py-4 rounded-xl uppercase tracking-[0.15em] text-[11px] hover:bg-white transition-all duration-500 shadow-lg shadow-[#FF6B35]/20 overflow-hidden">
                            <span class="relative z-10 flex items-center justify-center gap-3">
                                Créer mon compte
                                <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                </svg>
                            </span>
                        </button>
                    </div>
                </form>

                <!-- Login Link -->
                <div class="mt-10 text-center lg:text-left border-t border-white/5 pt-8">
                    <p class="text-sm text-gray-500 font-sans">
                        Déjà membre ?
                        <a href="{{ route('login') }}"
                            class="text-white font-bold hover:text-[#FF6B35] transition-colors ml-1 border-b border-[#FF6B35]/30 hover:border-[#FF6B35] pb-0.5">
                            Se connecter
                        </a>
                    </p>
                </div>

                <!-- Footer -->
                <div class="mt-12 text-center">
                    <p class="text-[10px] text-gray-600 uppercase tracking-[0.3em] font-sans">
                        © {{ date('Y') }} youcodone. Tous droits réservés.
                    </p>
                </div>

            </div>
        </div>
    </div>
</x-guest-layout>