<x-app-layout>
    <div class="min-h-screen bg-[#050505] py-8 px-4 sm:px-6">

        <div class="max-w-5xl mx-auto mb-8">
            <h1 class="text-4xl font-black italic text-white uppercase tracking-tighter">
                PUBLIER VOTRE <span class="text-[#FF5F00]">OFFRE.</span>
            </h1>
            <div class="h-1 w-16 bg-[#FF5F00] mt-2"></div>
        </div>

        <form action="{{ route('restaurants.store') }}" method="POST" enctype="multipart/form-data"
            class="max-w-5xl mx-auto space-y-6">
            @csrf
            
            <div class="bg-[#0A0A0A] border border-white/5 p-6 rounded-[2rem] shadow-2xl">
                <h3 class="text-[#FF5F00] text-[10px] font-black uppercase tracking-[3px] mb-6 italic">01. Identité</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="space-y-1">
                        <label class="text-[9px] text-gray-500 font-black uppercase tracking-widest">Nom</label>
                        <input type="text" name="nom_resturant" required
                            class="w-full bg-[#111] border border-white/5 rounded-xl px-4 py-2.5 text-sm text-white outline-none focus:border-[#FF5F00] transition-all">
                    </div>
                    <div class="space-y-1">
                        <label class="text-[9px] text-gray-500 font-black uppercase tracking-widest">Cuisine</label>
                        <select name="cuisine_type" required
                            class="w-full bg-[#111] border border-white/5 rounded-xl px-4 py-2.5 text-sm text-white outline-none focus:border-[#FF5F00] transition-all">
                            <option value="" selected disabled>Choisir...</option>
                            <option value="francaise">Francaise</option>
                            <option value="italienne">Italienne</option>
                            <option value="asiatique">Asiatique</option>
                        </select>
                    </div>
                    <div class="space-y-1">
                        <label class="text-[9px] text-gray-500 font-black uppercase tracking-widest">Ville</label>
                        <input type="text" name="city" required
                            class="w-full bg-[#111] border border-white/5 rounded-xl px-4 py-2.5 text-sm text-white outline-none focus:border-[#FF5F00] transition-all">
                    </div>
                    <div class="space-y-1">
                        <label class="text-[9px] text-gray-500 font-black uppercase tracking-widest">Téléphone</label>
                        <input type="tel" name="telephone_restaurant" required
                            class="w-full bg-[#111] border border-white/5 rounded-xl px-4 py-2.5 text-sm text-white outline-none focus:border-[#FF5F00] transition-all">
                    </div>
                    <div class="space-y-1">
                        <label class="text-[9px] text-gray-500 font-black uppercase tracking-widest">Email</label>
                        <input type="email" name="email" required
                            class="w-full bg-[#111] border border-white/5 rounded-xl px-4 py-2.5 text-sm text-white outline-none focus:border-[#FF5F00] transition-all">
                    </div>
                    <div class="space-y-1">
                        <label class="text-[9px] text-gray-500 font-black uppercase tracking-widest">Capacité</label>
                        <input type="number" name="capacity" required
                            class="w-full bg-[#111] border border-white/5 rounded-xl px-4 py-2.5 text-sm text-white outline-none focus:border-[#FF5F00] transition-all">
                    </div>
                </div>
                <div class="mt-4 space-y-1">
                    <label class="text-[9px] text-gray-500 font-black uppercase tracking-widest">Description</label>
                    <textarea name="description" rows="2"
                        class="w-full bg-[#111] border border-white/5 rounded-xl px-4 py-2.5 text-sm text-white outline-none focus:border-[#FF5F00] transition-all resize-none"></textarea>
                </div>
            </div>

            <div class="bg-[#0A0A0A] border border-white/5 p-6 rounded-[2rem] shadow-2xl">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-[#FF5F00] text-[10px] font-black uppercase tracking-[3px] italic">02. Galerie</h3>
                    <button type="button" onclick="addImageInput()"
                        class="text-[9px] bg-[#FF5F00] text-white font-black px-4 py-1.5 rounded-lg hover:bg-white hover:text-black transition-all uppercase tracking-widest">
                        + Ajouter
                    </button>
                </div>
                <div id="images-container" class="grid grid-cols-3 md:grid-cols-6 gap-4">
                    <div class="relative h-32 group">
                        <label class="block w-full h-full border-2 border-dashed border-white/10 rounded-2xl cursor-pointer hover:border-[#FF5F00]/50 overflow-hidden bg-[#111] transition-all">
                            <input type="file" name="images[]" required class="hidden" onchange="handlePreview(this)">
                            <div class="preview-overlay flex flex-col items-center justify-center h-full">
                                <span class="text-[7px] text-gray-600 uppercase font-black">Principale</span>
                            </div>
                            <img class="hidden w-full h-full object-cover">
                        </label>
                    </div>
                </div>
            </div>

            <div class="pt-2">
                <button type="submit"
                    class="w-full bg-[#FF5F00] text-white font-black py-5 rounded-2xl uppercase tracking-[4px] text-xs shadow-xl hover:bg-[#ff6a14] transition-all">
                    Finaliser & Publier
                </button>
            </div>
        </form>
    </div>

    <script>
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

        function addImageInput() {
            const container = document.getElementById('images-container');
            const div = document.createElement('div');
            div.className = 'relative h-32 group animate-fade-in';
            div.innerHTML = `
                <label class="block w-full h-full border-2 border-dashed border-white/10 rounded-2xl cursor-pointer hover:border-[#FF5F00]/50 overflow-hidden bg-[#111] transition-all">
                    <input type="file" name="images[]" class="hidden" onchange="handlePreview(this)">
                    <div class="preview-overlay flex flex-col items-center justify-center h-full">
                        <span class="text-[7px] text-gray-600 uppercase font-black">Extra</span>
                    </div>
                    <img class="hidden w-full h-full object-cover">
                </label>
                <button type="button" onclick="this.parentElement.remove()" class="absolute -top-1 -right-1 bg-red-600 text-white rounded-full w-5 h-5 flex items-center justify-center text-[10px] font-bold z-20">×</button>
            `;
            container.appendChild(div);
        }
    </script>

    <style>
        .animate-fade-in { animation: fadeIn 0.3s ease-out; }
        @keyframes fadeIn { from { opacity: 0; transform: scale(0.95); } to { opacity: 1; transform: scale(1); } }
    </style>
</x-app-layout>