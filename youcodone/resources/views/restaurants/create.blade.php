<x-app-layout>
    <div class="min-h-screen bg-[#050505] py-12 px-4" x-data="{ step: 1 }">

        <div class="max-w-4xl mx-auto mb-12">
            <div class="flex items-center justify-between px-2">
                <div class="flex flex-col items-center">
                    <div :class="step >= 1 ? 'bg-[#FF5F00] text-white' : 'bg-white/5 text-gray-500'"
                        class="w-10 h-10 rounded-full flex items-center justify-center font-black transition-all duration-500">
                        1</div>
                    <span class="text-[8px] font-black uppercase tracking-widest mt-2"
                        :class="step >= 1 ? 'text-[#FF5F00]' : 'text-gray-600'">Info</span>
                </div>
                <div class="flex-1 h-[2px] mx-4 transition-all duration-500"
                    :class="step >= 2 ? 'bg-[#FF5F00]' : 'bg-white/5'"></div>
                <div class="flex flex-col items-center">
                    <div :class="step >= 2 ? 'bg-[#FF5F00] text-white' : 'bg-white/5 text-gray-500'"
                        class="w-10 h-10 rounded-full flex items-center justify-center font-black transition-all duration-500">
                        2</div>
                    <span class="text-[8px] font-black uppercase tracking-widest mt-2"
                        :class="step >= 2 ? 'text-[#FF5F00]' : 'text-gray-600'">Planning</span>
                </div>
                <div class="flex-1 h-[2px] mx-4 transition-all duration-500"
                    :class="step >= 3 ? 'bg-[#FF5F00]' : 'bg-white/5'"></div>
                <div class="flex flex-col items-center">
                    <div :class="step >= 3 ? 'bg-[#FF5F00] text-white' : 'bg-white/5 text-gray-500'"
                        class="w-10 h-10 rounded-full flex items-center justify-center font-black transition-all duration-500">
                        3</div>
                    <span class="text-[8px] font-black uppercase tracking-widest mt-2"
                        :class="step >= 3 ? 'text-[#FF5F00]' : 'text-gray-600'">Galerie & Menu</span>
                </div>
            </div>
        </div>

        <form action="{{ route('restaurants.store') }}" method="POST" enctype="multipart/form-data"
            class="max-w-4xl mx-auto">
            @csrf

            <div x-show="step === 1" x-transition.opacity.duration.400ms class="space-y-6">
                <div class="bg-[#0A0A0A] border border-white/5 p-10 rounded-[2.5rem]">
                    <h3 class="text-white text-xl font-black italic uppercase mb-8">Informations de base<span
                            class="text-[#FF5F00]">.</span></h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="space-y-2">
                            <label class="text-[10px] text-gray-500 font-black uppercase tracking-[2px]">Nom du
                                Restaurant</label>
                            <input type="text" name="name"
                                class="w-full bg-[#111] border border-white/5 rounded-2xl px-5 py-4 text-white focus:border-[#FF5F00] transition-all outline-none">
                        </div>
                        <div class="space-y-2">
                            <label class="text-[10px] text-gray-500 font-black uppercase tracking-[2px]">Ville</label>
                            <input type="text" name="city"
                                class="w-full bg-[#111] border border-white/5 rounded-2xl px-5 py-4 text-white focus:border-[#FF5F00] transition-all outline-none">
                        </div>
                        <div class="space-y-2">
                            <label class="text-[10px] text-gray-500 font-black uppercase tracking-[2px]">Cuisine</label>
                            <input type="text" name="cuisine_type" placeholder="Ex: Mexicain"
                                class="w-full bg-[#111] border border-white/5 rounded-2xl px-5 py-4 text-white focus:border-[#FF5F00] transition-all outline-none">
                        </div>
                        <div class="space-y-2">
                            <label
                                class="text-[10px] text-gray-500 font-black uppercase tracking-[2px]">Capacité</label>
                            <input type="number" name="capacity"
                                class="w-full bg-[#111] border border-white/5 rounded-2xl px-5 py-4 text-white focus:border-[#FF5F00] transition-all outline-none">
                        </div>
                    </div>
                </div>
                <button type="button" @click="step = 2"
                    class="w-full bg-white text-black font-black py-6 rounded-3xl uppercase tracking-widest text-xs hover:bg-[#FF5F00] hover:text-white transition-all">Étape
                    Suivante →</button>
            </div>

            <div x-show="step === 2" x-transition.opacity.duration.400ms class="space-y-6">
                <div class="bg-[#0A0A0A] border border-white/5 p-10 rounded-[2.5rem]">
                    <h3 class="text-white text-xl font-black italic uppercase mb-8">Horaires de la semaine<span
                            class="text-[#FF5F00]">.</span></h3>
                    <div class="space-y-4">
                        @foreach (['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'] as $day)
                            <div class="grid grid-cols-12 items-center gap-4 py-2" x-data="{ closed: false }">
                                <div class="col-span-4 text-[11px] font-black uppercase text-gray-500"
                                    :class="closed ? 'line-through opacity-30' : ''">{{ $day }}</div>
                                <div class="col-span-3"><input type="time"
                                        name="schedule[{{ strtolower($day) }}][open]" :disabled="closed"
                                        class="w-full bg-black/40 border border-white/5 rounded-xl px-4 py-2 text-xs text-white">
                                </div>
                                <div class="col-span-3"><input type="time"
                                        name="schedule[{{ strtolower($day) }}][close]" :disabled="closed"
                                        class="w-full bg-black/40 border border-white/5 rounded-xl px-4 py-2 text-xs text-white">
                                </div>
                                <div class="col-span-2 flex justify-end">
                                    <input type="checkbox" @change="closed = !closed"
                                        class="rounded bg-white/5 border-white/10 text-[#FF5F00] focus:ring-[#FF5F00]">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="flex gap-4">
                    <button type="button" @click="step = 1"
                        class="w-1/3 bg-white/5 text-white font-black py-6 rounded-3xl uppercase tracking-widest text-[10px]">Retour</button>
                    <button type="button" @click="step = 3"
                        class="w-2/3 bg-white text-black font-black py-6 rounded-3xl uppercase tracking-widest text-[10px] hover:bg-[#FF5F00] hover:text-white transition-all">Étape
                        Suivante →</button>
                </div>
            </div>

            <div x-show="step === 3" x-transition.opacity.duration.400ms class="space-y-6">
                <div class="bg-[#0A0A0A] border border-white/5 p-10 rounded-[2.5rem]">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-white text-xl font-black italic uppercase">Galerie Photos<span
                                class="text-[#FF5F00]">.</span></h3>
                        <button type="button" onclick="addImageInput()"
                            class="text-[9px] bg-[#FF5F00] text-white px-4 py-2 rounded-full font-black uppercase tracking-widest">+
                            Photo</button>
                    </div>
                    <div id="images-container" class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <div class="relative h-32 group">
                            <label
                                class="block w-full h-full border-2 border-dashed border-white/10 rounded-2xl cursor-pointer hover:border-[#FF5F00]/50 overflow-hidden bg-[#111]">
                                <input type="file" name="images[]" class="hidden" onchange="previewImage(this)">
                                <img class="image-preview hidden w-full h-full object-cover">
                                <div
                                    class="preview-placeholder flex items-center justify-center h-full text-gray-600 text-[8px] font-black uppercase tracking-widest">
                                    Main Photo</div>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="bg-[#0A0A0A] border border-white/5 p-10 rounded-[2.5rem]">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-white text-xl font-black italic uppercase">Le Menu<span
                                class="text-[#FF5F00]">.</span></h3>
                        <button type="button" onclick="addMenuRow()"
                            class="text-[9px] bg-[#FF5F00] text-white px-4 py-2 rounded-full font-black uppercase tracking-widest">+
                            Plat</button>
                    </div>
                    <div id="menu-container" class="space-y-3">
                        <div class="flex gap-4">
                            <input type="text" name="menu[0][name]" placeholder="Plat"
                                class="flex-1 bg-[#111] border border-white/5 rounded-xl px-5 py-4 text-xs text-white">
                            <input type="number" name="menu[0][price]" placeholder="DH"
                                class="w-24 bg-[#111] border border-white/5 rounded-xl px-5 py-4 text-xs text-white">
                        </div>
                    </div>
                </div>

                <div class="flex gap-4">
                    <button type="button" @click="step = 2"
                        class="w-1/3 bg-white/5 text-white font-black py-6 rounded-3xl uppercase tracking-widest text-[10px]">Retour</button>
                    <button type="submit"
                        class="w-2/3 bg-[#FF5F00] text-white font-black py-6 rounded-3xl uppercase tracking-widest text-[10px] shadow-2xl shadow-[#FF5F00]/20">Finaliser
                        & Publier ✅</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        function previewImage(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const label = input.parentElement;
                    const img = label.querySelector('.image-preview');
                    const ph = label.querySelector('.preview-placeholder');
                    img.src = e.target.result;
                    img.classList.remove('hidden');
                    ph.classList.add('hidden');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        function addImageInput() {
            const container = document.getElementById('images-container');
            const div = document.createElement('div');
            div.className = 'relative h-32 group animate-fade-in';
            div.innerHTML = `
                <label class="block w-full h-full border-2 border-dashed border-white/10 rounded-2xl cursor-pointer hover:border-[#FF5F00]/50 overflow-hidden bg-[#111]">
                    <input type="file" name="images[]" class="hidden" onchange="previewImage(this)">
                    <img class="image-preview hidden w-full h-full object-cover">
                    <div class="preview-placeholder flex items-center justify-center h-full text-gray-600 text-[8px] font-black uppercase tracking-widest">+ Photo</div>
                </label>
                <button type="button" onclick="this.parentElement.remove()" class="absolute -top-1 -right-1 bg-red-600 text-white rounded-full w-4 h-4 text-[10px]">×</button>
            `;
            container.appendChild(div);
        }

        let menuIdx = 1;

        function addMenuRow() {
            const container = document.getElementById('menu-container');
            const div = document.createElement('div');
            div.className = 'flex gap-4 animate-fade-in';
            div.innerHTML = `
                <input type="text" name="menu[${menuIdx}][name]" placeholder="Plat" class="flex-1 bg-[#111] border border-white/5 rounded-xl px-5 py-4 text-xs text-white outline-none focus:border-[#FF5F00]">
                <input type="number" name="menu[${menuIdx}][price]" placeholder="DH" class="w-24 bg-[#111] border border-white/5 rounded-xl px-5 py-4 text-xs text-white outline-none focus:border-[#FF5F00]">
                <button type="button" onclick="this.parentElement.remove()" class="text-red-500 font-bold px-2">×</button>
            `;
            container.appendChild(div);
            menuIdx++;
        }
    </script>
</x-app-layout>
