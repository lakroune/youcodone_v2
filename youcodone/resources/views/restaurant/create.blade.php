<x-app-layout>
    <div class="min-h-screen bg-[#050505] py-12 px-4 sm:px-6">

        <div class="max-w-5xl mx-auto mb-12">
            <h1 class="text-5xl font-black italic text-white uppercase tracking-tighter">
                PUBLIER VOTRE <span class="text-[#FF5F00]">OFFRE.</span>
            </h1>
            <div class="h-1 w-20 bg-[#FF5F00] mt-4"></div>
        </div>

        <form action="{{ route('restaurants.store') }}" method="POST" enctype="multipart/form-data"
            class="max-w-5xl mx-auto space-y-10">
            @csrf

            <div class="bg-[#0A0A0A] border border-white/5 p-8 rounded-[2.5rem] shadow-2xl">
                <h3 class="text-[#FF5F00] text-xs font-black uppercase tracking-[4px] mb-10 italic">01. Identité du
                    Restaurant</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="space-y-2">
                        <label class="text-[10px] text-gray-500 font-black uppercase tracking-widest">Nom de
                            l'établissement</label>
                        <input type="text" name="nom_resturant" required
                            class="w-full bg-[#111] border border-white/5 rounded-2xl px-5 py-4 text-sm text-white outline-none focus:border-[#FF5F00] transition-all">
                    </div>
                    <div class="space-y-2">
                        <label class="text-[10px] text-gray-500 font-black uppercase tracking-widest">Type de
                            Cuisine</label>
                        <select name="cuisine_type" required
                            class="w-full bg-[#111] border border-white/5 rounded-2xl px-5 py-4 text-sm text-white outline-none focus:border-[#FF5F00] transition-all">
                            <option value="" selected disabled>-- Selectionner un type de cuisine --</option>
                            <option value="francaise">Francaise</option>
                            <option value="italienne">Italienne</option>
                            <option value="asiatique">Asiatique</option>
                            <option value="mexicaine">Mexicaine</option>
                            <option value="japonaise">Japonaise</option>
                            <option value="grecque">Grecque</option>
                            <option value="turque">Turque</option>
                            <option value="indienne">Indienne</option>
                        </select>
                    </div>
                    <div class="space-y-2">
                        <label class="text-[10px] text-gray-500 font-black uppercase tracking-widest">Ville /
                            Localisation</label>
                        <input type="text" name="city" required
                            class="w-full bg-[#111] border border-white/5 rounded-2xl px-5 py-4 text-sm text-white outline-none focus:border-[#FF5F00] transition-all">
                    </div>
                    <div class="space-y-2">
                        <label class="text-[10px] text-gray-500 font-black uppercase tracking-widest">Capacité
                            Maximale</label>
                        <input type="number" name="capacity" required placeholder="Nombre de tables"
                            class="w-full bg-[#111] border border-white/5 rounded-2xl px-5 py-4 text-sm text-white outline-none focus:border-[#FF5F00] transition-all">
                    </div>
                </div>
                <div class="mt-8 space-y-2">
                    <label class="text-[10px] text-gray-500 font-black uppercase tracking-widest">À propos
                        (Description)</label>
                    <textarea name="description" rows="4"
                        class="w-full bg-[#111] border border-white/5 rounded-2xl px-5 py-4 text-sm text-white outline-none focus:border-[#FF5F00] transition-all resize-none"></textarea>
                </div>
            </div>

            <div class="bg-[#0A0A0A] border border-white/5 p-8 rounded-[2.5rem] shadow-2xl">
                <h3 class="text-[#FF5F00] text-xs font-black uppercase tracking-[4px] mb-10 italic">02. Planning
                    d'ouverture</h3>
                <div class="space-y-6">
                    @foreach (['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'] as $day)
                        @php $d = strtolower($day); @endphp
                        <div class="grid grid-cols-1 md:grid-cols-12 items-center gap-6 pb-6 border-b border-white/5 last:border-0"
                            x-data="{ isClosed: false }">
                            <div class="md:col-span-3">
                                <span class="text-[11px] font-black uppercase tracking-widest"
                                    :class="isClosed ? 'text-red-500' : 'text-white'">{{ $day }}</span>
                            </div>
                            <div class="md:col-span-3 flex items-center gap-3">
                                <span class="text-[8px] text-gray-600 font-bold uppercase">De</span>
                                <input type="time" name="schedule[{{ $d }}][open]" :disabled="isClosed"
                                    class="w-full bg-black/40 border border-white/5 rounded-xl px-4 py-2 text-xs text-white focus:border-[#FF5F00] disabled:opacity-10 outline-none">
                            </div>
                            <div class="md:col-span-3 flex items-center gap-3">
                                <span class="text-[8px] text-gray-600 font-bold uppercase">À</span>
                                <input type="time" name="schedule[{{ $d }}][close]" :disabled="isClosed"
                                    class="w-full bg-black/40 border border-white/5 rounded-xl px-4 py-2 text-xs text-white focus:border-[#FF5F00] disabled:opacity-10 outline-none">
                            </div>
                            <div class="md:col-span-3 flex justify-end">
                                <label class="flex items-center gap-3 cursor-pointer group">
                                    <span
                                        class="text-[9px] font-black uppercase text-gray-500 group-hover:text-white transition-colors">Fermé</span>
                                    <input type="checkbox" name="schedule[{{ $d }}][closed]"
                                        x-model="isClosed"
                                        class="w-5 h-5 rounded border-white/10 bg-white/5 text-[#FF5F00] focus:ring-[#FF5F00]">
                                </label>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="bg-[#0A0A0A] border border-white/5 p-8 rounded-[2.5rem] shadow-2xl">
                <div class="flex justify-between items-center mb-10">
                    <h3 class="text-[#FF5F00] text-xs font-black uppercase tracking-[4px] italic">03. Menu & Spécialités
                    </h3>
                    <button type="button" onclick="addMenuRow()"
                        class="bg-white/5 border border-white/10 text-white text-[10px] font-black px-6 py-2 rounded-full hover:bg-[#FF5F00] transition-all uppercase tracking-widest">+
                        Ajouter un plat</button>
                </div>
                <div id="menu-container" class="space-y-4">
                    <div class="grid grid-cols-12 gap-4 items-center animate-fade-in">
                        <div class="col-span-8"><input type="text" name="menu[0][name]" placeholder="Nom du plat"
                                class="w-full bg-[#111] border border-white/5 rounded-xl px-5 py-4 text-xs text-white focus:border-[#FF5F00] outline-none">
                        </div>
                        <div class="col-span-3"><input type="number" name="menu[0][price]" placeholder="Prix (DH)"
                                class="w-full bg-[#111] border border-white/5 rounded-xl px-5 py-4 text-xs text-white focus:border-[#FF5F00] outline-none">
                        </div>
                        <div class="col-span-1"></div>
                    </div>
                </div>
            </div>

            <div class="bg-[#0A0A0A] border border-white/5 p-8 rounded-[2.5rem] shadow-2xl">
                <div class="flex justify-between items-center mb-10">
                    <h3 class="text-[#FF5F00] text-xs font-black uppercase tracking-[4px] italic">04. Galerie & Photos
                    </h3>
                    <button type="button" onclick="addImageInput()"
                        class="text-[10px] bg-white text-black font-black px-6 py-2 rounded-full hover:bg-[#FF5F00] hover:text-white transition-all uppercase tracking-widest">+
                        Ajouter Photo</button>
                </div>
                <div id="images-container" class="grid grid-cols-2 md:grid-cols-4 gap-6">
                    <div class="relative h-48 group">
                        <label
                            class="block w-full h-full border-2 border-dashed border-white/10 rounded-3xl cursor-pointer hover:border-[#FF5F00]/50 overflow-hidden bg-[#111] transition-all">
                            <input type="file" name="images[]" required class="hidden"
                                onchange="handlePreview(this)">
                            <div class="preview-overlay flex flex-col items-center justify-center h-full">
                                <svg class="w-8 h-8 text-gray-700 mb-2" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path d="M12 4v16m8-8H4" stroke-width="2" />
                                </svg>
                                <span class="text-[8px] text-gray-600 uppercase font-black tracking-widest">Main
                                    Photo</span>
                            </div>
                            <img class="hidden w-full h-full object-cover">
                        </label>
                    </div>
                </div>
            </div>

            <div class="pt-6">
                <button type="submit"
                    class="w-full bg-[#FF5F00] text-white font-black py-8 rounded-[2rem] uppercase tracking-[6px] text-sm shadow-2xl shadow-[#FF5F00]/20 hover:scale-[1.01] active:scale-95 transition-all">
                    Finaliser & Publier
                </button>
            </div>

        </form>
    </div>

    <script>
        // Preview Images
        function handlePreview(input) {
            const container = input.parentElement;
            const img = container.querySelector('img');
            const overlay = container.querySelector('.preview-overlay');

            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    img.src = e.target.result;
                    img.classList.remove('hidden');
                    overlay.classList.add('hidden');
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        // Add Menu Row
        let menuIdx = 1;

        function addMenuRow() {
            const container = document.getElementById('menu-container');
            const row = document.createElement('div');
            row.className = 'grid grid-cols-12 gap-4 items-center animate-fade-in';
            row.innerHTML = `
                <div class="col-span-8"><input type="text" name="menu[${menuIdx}][name]" placeholder="Nom du plat" class="w-full bg-[#111] border border-white/5 rounded-xl px-5 py-4 text-xs text-white focus:border-[#FF5F00] outline-none"></div>
                <div class="col-span-3"><input type="number" name="menu[${menuIdx}][price]" placeholder="Prix (DH)" class="w-full bg-[#111] border border-white/5 rounded-xl px-5 py-4 text-xs text-white focus:border-[#FF5F00] outline-none"></div>
                <div class="col-span-1"><button type="button" onclick="this.closest('.grid').remove()" class="text-red-500 font-black text-xl hover:scale-125 transition">×</button></div>
            `;
            container.appendChild(row);
            menuIdx++;
        }

        // Add Image Input
        function addImageInput() {
            const container = document.getElementById('images-container');
            const div = document.createElement('div');
            div.className = 'relative h-48 group animate-fade-in';
            div.innerHTML = `
                <label class="block w-full h-full border-2 border-dashed border-white/10 rounded-3xl cursor-pointer hover:border-[#FF5F00]/50 overflow-hidden bg-[#111] transition-all">
                    <input type="file" name="images[]" class="hidden" onchange="handlePreview(this)">
                    <div class="preview-overlay flex flex-col items-center justify-center h-full">
                        <svg class="w-8 h-8 text-gray-700 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4" stroke-width="2"/></svg>
                        <span class="text-[8px] text-gray-600 uppercase font-black tracking-widest">Extra Photo</span>
                    </div>
                    <img class="hidden w-full h-full object-cover">
                </label>
                <button type="button" onclick="this.parentElement.remove()" class="absolute -top-2 -right-2 bg-red-600 text-white rounded-full w-6 h-6 flex items-center justify-center text-xs font-bold z-20">×</button>
            `;
            container.appendChild(div);
        }
    </script>

    <style>
        .animate-fade-in {
            animation: fadeIn 0.4s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        input[type="time"]::-webkit-calendar-picker-indicator {
            filter: invert(1);
            cursor: pointer;
        }
    </style>
</x-app-layout>
