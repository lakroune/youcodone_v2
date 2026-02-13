<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Cibo Gustoso | L'Art de la Gastronomie</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        cibo: {
                            dark: '#0a0a0a',
                            orange: '#FF6B35',
                            'orange-light': '#FF8C5A',
                            'orange-dark': '#E55A2B',
                        }
                    },
                    fontFamily: {
                        serif: ['Playfair Display', 'serif'],
                        sans: ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #000;
        }

        .image-side {
            background-image: url('https://images.unsplash.com/photo-1514362545857-3bc16c4c7d1b?q=80&w=1470&auto=format&fit=crop');
            background-size: cover;
            background-position: center;
        }

        .text-glow-cibo {
            text-shadow: 0 0 30px rgba(255, 107, 53, 0.3);
        }

        .elegant-line {
            width: 60px;
            height: 2px;
            background: linear-gradient(90deg, #FF6B35, transparent);
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fadeInUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }

        .delay-100 { animation-delay: 0.1s; opacity: 0; }
        .delay-200 { animation-delay: 0.2s; opacity: 0; }
        .delay-300 { animation-delay: 0.3s; opacity: 0; }
        .delay-400 { animation-delay: 0.4s; opacity: 0; }

        /* Hover effects */
        .btn-primary {
            background: linear-gradient(135deg, #FF6B35 0%, #E55A2B 100%);
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 40px rgba(255, 107, 53, 0.3);
        }

        .btn-secondary {
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .btn-secondary:hover {
            background: rgba(255, 107, 53, 0.05);
            border-color: rgba(255, 107, 53, 0.3);
        }
    </style>
</head>

<body class="min-h-screen flex items-stretch overflow-hidden">

    <!-- Image Side -->
    <div class="hidden lg:block lg:w-[60%] image-side relative">
        <div class="absolute inset-0 bg-gradient-to-r from-black/60 via-black/20 to-transparent"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent"></div>
        
        <!-- Decorative elements -->
        <div class="absolute top-10 left-10">
            <div class="w-20 h-20 border border-white/10 rounded-full flex items-center justify-center">
                <span class="text-cibo-orange font-serif italic text-2xl">Y</span>
            </div>
        </div>

        <div class="absolute bottom-20 left-20 max-w-lg animate-fade-in">
            <p class="text-cibo-orange text-xs font-bold uppercase tracking-[0.4em] mb-4">Réservations Premium</p>
            <h1 class="text-white text-6xl xl:text-7xl font-serif font-bold italic leading-none text-glow-cibo mb-6">
                Réservez votre <br>
                <span class="text-cibo-orange">moment d'exception.</span>
            </h1>
            <p class="text-gray-400 text-sm font-light leading-relaxed max-w-md">
                Découvrez les meilleures tables sélectionnées pour vous, 
                et vivez une expérience gastronomique unique.
            </p>
            
            <!-- Decorative line -->
            <div class="flex items-center gap-4 mt-8">
                <div class="elegant-line"></div>
                <span class="text-white/30 text-xs uppercase tracking-widest">Est. 2024</span>
            </div>
        </div>
    </div>

    <!-- Content Side -->
    <div class="w-full lg:w-[40%] bg-[#0a0a0a] flex items-center justify-center p-8 lg:p-12 relative">
        <!-- Subtle gradient overlay -->
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-cibo-orange/5 via-transparent to-transparent pointer-events-none"></div>
        
        <div class="w-full max-w-[380px] relative z-10">

            <!-- Logo -->
            <div class="mb-16 animate-fade-in">
                <div class="flex items-center gap-3 mb-2">
                    <div class="w-10 h-10 rounded-full border-2 border-cibo-orange/30 flex items-center justify-center">
                        <span class="text-cibo-orange font-serif italic text-xl font-bold">Y</span>
                    </div>
                    <div>
                        <h2 class="text-white text-2xl font-serif font-bold italic tracking-tight">
                            Youcod <span class="text-cibo-orange">'one</span>
                        </h2>
                    </div>
                </div>
                <div class="elegant-line mt-4"></div>
            </div>

            <!-- Content -->
            <div class="space-y-8 animate-fade-in delay-100">
                <div class="space-y-3">
                    <h3 class="text-white text-2xl font-serif font-bold italic">
                        L'art de la table,<br>à portée de clic.
                    </h3>
                    <p class="text-gray-500 text-sm leading-relaxed font-light">
                        Que vous soyez amateur de fine cuisine ou restaurateur passionné, 
                        Cibo Gustoso sublime chaque moment gastronomique.
                    </p>
                </div>

                <!-- Features -->
                <div class="space-y-4 py-4 border-y border-white/5">
                    <div class="flex items-center gap-4 group">
                        <div class="w-8 h-8 rounded-full bg-cibo-orange/10 border border-cibo-orange/20 flex items-center justify-center group-hover:bg-cibo-orange/20 transition-colors">
                            <svg class="w-3 h-3 text-cibo-orange" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <p class="text-xs text-gray-400 font-medium uppercase tracking-widest group-hover:text-white transition-colors">Réservation instantanée</p>
                    </div>
                    
                    <div class="flex items-center gap-4 group">
                        <div class="w-8 h-8 rounded-full bg-cibo-orange/10 border border-cibo-orange/20 flex items-center justify-center group-hover:bg-cibo-orange/20 transition-colors">
                            <svg class="w-3 h-3 text-cibo-orange" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <p class="text-xs text-gray-400 font-medium uppercase tracking-widest group-hover:text-white transition-colors">Tables sélectionnées</p>
                    </div>
                    
                    <div class="flex items-center gap-4 group">
                        <div class="w-8 h-8 rounded-full bg-cibo-orange/10 border border-cibo-orange/20 flex items-center justify-center group-hover:bg-cibo-orange/20 transition-colors">
                            <svg class="w-3 h-3 text-cibo-orange" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <p class="text-xs text-gray-400 font-medium uppercase tracking-widest group-hover:text-white transition-colors">Expérience Premium</p>
                    </div>
                </div>

                <!-- Buttons -->
                <div class="space-y-3 pt-2 animate-fade-in delay-200">
                    @if (Route::has('login'))
                        @auth
                            @role('restaurateur')
                                <a href="{{ route('restaurateur.dashboard') }}" class="btn-primary flex justify-center w-full text-white text-[11px] font-bold py-4 rounded-xl uppercase tracking-[0.2em] shadow-lg">
                                    Mon Espace Restaurateur
                                </a>
                            @endrole
                            @role('client')
                                <a href="{{ route('home') }}" class="btn-primary flex justify-center w-full text-white text-[11px] font-bold py-4 rounded-xl uppercase tracking-[0.2em] shadow-lg">
                                    Découvrir les Tables
                                </a>
                            @endrole
                            @role('admin')
                                <a href="{{ route('admin.restaurants') }}" class="btn-primary flex justify-center w-full text-white text-[11px] font-bold py-4 rounded-xl uppercase tracking-[0.2em] shadow-lg">
                                    Administration
                                </a>
                            @endrole
                        @else
                            <a href="{{ route('login') }}" class="btn-primary flex justify-center w-full text-white text-[11px] font-bold py-4 rounded-xl uppercase tracking-[0.2em] shadow-lg">
                                Commencer l'expérience
                            </a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn-secondary flex justify-center w-full bg-transparent border border-white/10 text-white text-[11px] font-bold py-4 rounded-xl uppercase tracking-[0.2em]">
                                    Créer un compte
                                </a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>

            <!-- Footer -->
            <div class="mt-20 animate-fade-in delay-300">
                <div class="flex items-center gap-3 mb-3">
                    <div class="h-px flex-1 bg-white/5"></div>
                    <div class="flex gap-2">
                        <div class="w-1 h-1 rounded-full bg-cibo-orange"></div>
                        <div class="w-1 h-1 rounded-full bg-cibo-orange/50"></div>
                        <div class="w-1 h-1 rounded-full bg-cibo-orange/20"></div>
                    </div>
                    <div class="h-px flex-1 bg-white/5"></div>
                </div>
                <p class="text-[10px] text-gray-600 uppercase font-bold tracking-[0.3em] text-center">
                    © {{ date('Y') }} Cibo Gustoso — L'art de vivre
                </p>
            </div>

        </div>
    </div>

</body>

</html>