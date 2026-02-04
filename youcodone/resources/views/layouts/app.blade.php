<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Youco\'Done') }}</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;900&display=swap" rel="stylesheet" />
        
        <script src="https://cdn.tailwindcss.com"></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            body { font-family: 'Inter', sans-serif; background-color: #0A0A0A; color: white; }
            .profile-card { background: #111111; border: 1px solid rgba(255, 255, 255, 0.05); }
            .orange-glow:focus {
                border-color: #FF5F00 !important;
                box-shadow: 0 0 15px rgba(255, 95, 0, 0.1) !important;
            }
            .avatar-ring { border: 3px solid #FF5F00; padding: 4px; }
            
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&display=swap');
        body { font-family: 'Inter', sans-serif; background-color: #050505; color: white; }
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .glass { background: rgba(255, 255, 255, 0.03); border: 1px solid rgba(255, 255, 255, 0.05); }
    
        </style>
    </head>
    <body class="font-sans antialiased bg-[#0A0A0A] text-white">
        <div class="min-h-screen">
            @include('layouts.navigation')

            @isset($header)
                <header class="bg-[#111111] border-b border-white/5">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>