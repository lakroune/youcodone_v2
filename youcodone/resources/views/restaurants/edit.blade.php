<x-app-layout>
    <div class="min-h-screen bg-[#050505] py-12 px-4">
        <!-- Header -->
        <div class="max-w-7xl mx-auto mb-12 text-center">
            <h1 class="text-5xl font-black italic uppercase text-white mb-3">
                Modifier<span class="text-[#FF5F00]">.</span>
            </h1>
            <p class="text-gray-500 text-sm uppercase tracking-widest">{{ $restaurant->nom_restaurant }}</p>
        </div>

        <form action="{{ route('restaurants.update', $restaurant) }}" method="POST" enctype="multipart/form-data"
            class="max-w-7xl mx-auto">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                <!-- LEFT COLUMN -->
                <div class="space-y-6">

                    <!-- SECTION 1: Informations de base -->
                    <div class="bg-[#0A0A0A] border border-white/5 p-8 rounded-3xl">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-8 h-8 rounded-full bg-[#FF5F00] text-white flex items-center justify-center font-black text-sm">1</div>
                            <h3 class="text-white text-lg font-black italic uppercase">Informations<span class="text-[#FF5F00]">.</span></h3>
                        </div>

                        <div class="space-y-4">
                            <div class="space-y-2">
                                <label class="text-[9px] text-gray-500 font-black uppercase tracking-[2px]">Nom du Restaurant</label>
                                <input type="text" name="nom_restaurant" required value="{{ old('nom_restaurant', $restaurant->nom_restaurant) }}"
                                    class="w-full bg-[#111] border border-white/5 rounded-xl px-4 py-3 text-sm text-white focus:border-[#FF5F00] transition-all outline-none">
                            </div>

                            <div class="space-y-2">
                                <label class="text-[9px] text-gray-500 font-black uppercase tracking-[2px]">Ville</label>
                                <input type="text" name="adresse_restaurant" required value="{{ old('adresse_restaurant', $restaurant->adresse_restaurant) }}"
                                    class="w-full bg-[#111] border border-white/5 rounded-xl px-4 py-3 text-sm text-white focus:border-[#FF5F00] transition-all outline-none">
                            </div>

                            <div class="space-y-2">
                                <label class="text-[9px] text-gray-500 font-black uppercase tracking-[2px]">Type de Cuisine</label>
                                <select name="type_cuisine_id" required
                                    class="w-full bg-[#111] border border-white/5 rounded-xl px-4 py-3 text-sm text-white focus:border-[#FF5F00] transition-all outline-none">
                                    @foreach ($type_cuisines as $type)
                                        <option value="{{ $type->id }}" {{ (old('type_cuisine_id', $restaurant->type_cuisine_id) == $type->id) ? 'selected' : '' }}>
                                            {{ $type->nom_type_cuisine }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <div class="space-y-2">
                                    <label class="text-[9px] text-gray-500 font-black uppercase tracking-[2px]">Email</label>
                                    <input type="email" name="email_restaurant" required value="{{ old('email_restaurant', $restaurant->email_restaurant) }}"
                                        class="w-full bg-[#111] border border-white/5 rounded-xl px-4 py-3 text-sm text-white focus:border-[#FF5F00] transition-all outline-none">
                                </div>
                                <div class="space-y-2">
                                    <label class="text-[9px] text-gray-500 font-black uppercase tracking-[2px]">Téléphone</label>
                                    <input type="text" name="telephone_restaurant" required value="{{ old('telephone_restaurant', $restaurant->telephone_restaurant) }}"
                                        class="w-full bg-[#111] border border-white/5 rounded-xl px-4 py-3 text-sm text-white focus:border-[#FF5F00] transition-all outline-none">
                                </div>
                            </div>

                            <div class="space-y-2">
                                <label class="text-[9px] text-gray-500 font-black uppercase tracking-[2px]">Capacité</label>
                                <input type="number" name="capacity" required value="{{ old('capacity', $restaurant->capacite_restaurant) }}"
                                    class="w-full bg-[#111] border border-white/5 rounded-xl px-4 py-3 text-sm text-white focus:border-[#FF5F00] transition-all outline-none">
                            </div>

                            <div class="space-y-2">
                                <label class="text-[9px] text-gray-500 font-black uppercase tracking-[2px]">Description</label>
                                <textarea name="description_restaurant" rows="3" required
                                    class="w-full bg-[#111] border border-white/5 rounded-xl px-4 py-3 text-sm text-white focus:border-[#FF5F00] transition-all outline-none resize-none">{{ old('description_restaurant', $restaurant->description_restaurant) }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- SECTION 3: Galerie Photos (Edit) -->
                    <div class="bg-[#0A0A0A] border border-white/5 p-8 rounded-3xl">
                        <div class="flex items-center justify-between mb-6">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-[#FF5F00] text-white flex items-center justify-center font-black text-sm">3</div>
                                <h3 class="text-white text-lg font-black italic uppercase">Galerie<span class="text-[#FF5F00]">.</span></h3>
                            </div>
                            <button type="button" onclick="addImageInput()"
                                class="text-[8px] bg-[#FF5F00] text-white px-3 py-1.5 rounded-full font-black uppercase tracking-widest hover:bg-[#ff7a2e] transition-all">+ Photo</button>
                        </div>

                        <!-- Existing Photos -->
                        <div id="existing-images" class="grid grid-cols-3 gap-3 mb-4">
                            @foreach ($restaurant->photos as $photo)
                                <div class="relative h-28 group" id="photo-{{ $photo->id }}">
                                    <img src="{{ asset('storage/' . $photo->url_photo) }}" class="w-full h-full object-cover rounded-xl">
                                    <button type="button" onclick="markForDeletion({{ $photo->id }})"
                                        class="absolute -top-1 -right-1 bg-red-600 hover:bg-red-500 text-white rounded-full w-5 h-5 text-xs font-bold transition-all">×</button>
                                    <input type="hidden" name="delete_photos[]" value="{{ $photo->id }}" disabled id="delete-input-{{ $photo->id }}">
                                </div>
                            @endforeach
                        </div>

                        <!-- New Photos -->
                        <div id="images-container" class="grid grid-cols-3 gap-3">
                            <div class="relative h-28 group">
                                <label class="block w-full h-full border-2 border-dashed border-white/10 rounded-xl cursor-pointer hover:border-[#FF5F00]/50 overflow-hidden bg-[#111] transition-all">
                                    <input type="file" name="new_images[]" class="hidden" onchange="previewImage(this)" accept="image/*">
                                    <img class="image-preview hidden w-full h-full object-cover">
                                    <div class="preview-placeholder flex items-center justify-center h-full text-gray-600 text-[7px] font-black uppercase tracking-widest">+</div>
                                </label>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- RIGHT COLUMN -->
                <div class="space-y-6">

                    <!-- SECTION 2: Horaires -->
                    <div class="bg-[#0A0A0A] border border-white/5 p-8 rounded-3xl">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-8 h-8 rounded-full bg-[#FF5F00] text-white flex items-center justify-center font-black text-sm">2</div>
                            <h3 class="text-white text-lg font-black italic uppercase">Horaires<span class="text-[#FF5F00]">.</span></h3>
                        </div>

                        <div class="space-y-3">
                            @foreach (['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'] as $day)
                                @php
                                    $horaire = $restaurant->horaires->firstWhere('jour', $day);
                                    $isClosed = old('schedule.'.strtolower($day).'.ferme', $horaire ? $horaire->ferme : false);
                                @endphp
                                <div class="flex items-center gap-3" x-data="{ closed: {{ $isClosed ? 'true' : 'false' }} }">
                                    <div class="w-20 text-[9px] font-black uppercase text-gray-500" :class="closed ? 'line-through opacity-30' : ''">{{ $day }}</div>
                                    <input type="time" name="schedule[{{ strtolower($day) }}][open]" :disabled="closed"
                                        value="{{ old('schedule.'.strtolower($day).'.open', $horaire ? \Carbon\Carbon::parse($horaire->heure_ouverture)->format('H:i') : '09:00') }}"
                                        class="flex-1 bg-black/40 border border-white/5 rounded-lg px-3 py-2 text-[11px] text-white focus:border-[#FF5F00] outline-none">
                                    <input type="time" name="schedule[{{ strtolower($day) }}][close]" :disabled="closed"
                                        value="{{ old('schedule.'.strtolower($day).'.close', $horaire ? \Carbon\Carbon::parse($horaire->heure_fermeture)->format('H:i') : '22:00') }}"
                                        class="flex-1 bg-black/40 border border-white/5 rounded-lg px-3 py-2 text-[11px] text-white focus:border-[#FF5F00] outline-none">
                                    <input type="checkbox" name="schedule[{{ strtolower($day) }}][ferme]" value="1" 
                                        @change="closed = !closed" :checked="closed"
                                        class="rounded bg-white/5 border-white/10 text-[#FF5F00] focus:ring-[#FF5F00] w-4 h-4">
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- SECTION 4: Menu -->
                    <div class="bg-[#0A0A0A] border border-white/5 p-8 rounded-3xl">
                        <div class="flex items-center justify-between mb-6">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-[#FF5F00] text-white flex items-center justify-center font-black text-sm">4</div>
                                <h3 class="text-white text-lg font-black italic uppercase">Le Menu<span class="text-[#FF5F00]">.</span></h3>
                            </div>
                            <button type="button" onclick="addMenuRow()"
                                class="text-[8px] bg-[#FF5F00] text-white px-3 py-1.5 rounded-full font-black uppercase tracking-widest hover:bg-[#ff7a2e] transition-all">+ Plat</button>
                        </div>

                        <div id="menu-container" class="space-y-2">
                            @if($restaurant->menus && $restaurant->menus->plats)
                                @foreach($restaurant->menus->plats as $index => $plat)
                                    <div class="flex gap-3">
                                        <input type="hidden" name="menu[{{ $index }}][id]" value="{{ $plat->id }}">
                                        <input type="text" name="menu[{{ $index }}][nom_plat]" value="{{ old('menu.'.$index.'.nom_plat', $plat->nom_plat) }}" placeholder="Nom du plat"
                                            class="flex-1 bg-[#111] border border-white/5 rounded-lg px-4 py-2.5 text-xs text-white focus:border-[#FF5F00] outline-none transition-all">
                                        <input type="number" name="menu[{{ $index }}][prix_plat]" value="{{ old('menu.'.$index.'.prix_plat', $plat->prix_plat) }}" placeholder="Prix"
                                            class="w-20 bg-[#111] border border-white/5 rounded-lg px-3 py-2.5 text-xs text-white focus:border-[#FF5F00] outline-none transition-all">
                                        <button type="button" onclick="this.parentElement.remove()" 
                                            class="text-red-500 hover:text-red-400 font-bold px-2 transition-colors text-lg">×</button>
                                    </div>
                                @endforeach
                                @php $menuIdx = $restaurant->menus->plats->count(); @endphp
                            @else
                                <div class="flex gap-3">
                                    <input type="text" name="menu[0][nom_plat]" placeholder="Nom du plat"
                                        class="flex-1 bg-[#111] border border-white/5 rounded-lg px-4 py-2.5 text-xs text-white focus:border-[#FF5F00] outline-none transition-all">
                                    <input type="number" name="menu[0][prix_plat]" placeholder="Prix"
                                        class="w-20 bg-[#111] border border-white/5 rounded-lg px-3 py-2.5 text-xs text-white focus:border-[#FF5F00] outline-none transition-all">
                                </div>
                                @php $menuIdx = 1; @endphp
                            @endif
                        </div>
                    </div>

                </div>

            </div>

            <!-- Submit Buttons -->
            <div class="mt-6 flex gap-4">
                <button type="submit"
                    class="flex-1 bg-[#FF5F00] text-white font-black py-5 rounded-2xl uppercase tracking-widest text-xs shadow-2xl shadow-[#FF5F00]/20 hover:bg-[#ff7a2e] transition-all">
                    Mettre à jour ✓
                </button>
                <a href="{{ route('restaurants.show', $restaurant->id) }}"
                    class="px-8 bg-white/5 border border-white/10 text-white font-black py-5 rounded-2xl uppercase tracking-widest text-xs hover:border-[#FF5F00] transition-all flex items-center">
                    Annuler
                </a>
            </div>
        </form>
    </div>

    <script>
        let menuIdx = {{ $menuIdx }};

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
            div.className = 'relative h-28 group';
            div.innerHTML = `
                <label class="block w-full h-full border-2 border-dashed border-white/10 rounded-xl cursor-pointer hover:border-[#FF5F00]/50 overflow-hidden bg-[#111] transition-all">
                    <input type="file" name="new_images[]" class="hidden" onchange="previewImage(this)" accept="image/*">
                    <img class="image-preview hidden w-full h-full object-cover">
                    <div class="preview-placeholder flex items-center justify-center h-full text-gray-600 text-[7px] font-black uppercase tracking-widest">+</div>
                </label>
                <button type="button" onclick="this.parentElement.remove()" 
                    class="absolute -top-1 -right-1 bg-red-600 hover:bg-red-500 text-white rounded-full w-5 h-5 text-xs font-bold transition-all">×</button>
            `;
            container.appendChild(div);
        }

        function addMenuRow() {
            const container = document.getElementById('menu-container');
            const div = document.createElement('div');
            div.className = 'flex gap-3';
            div.innerHTML = `
                <input type="text" name="menu[${menuIdx}][nom_plat]" placeholder="Nom du plat" 
                    class="flex-1 bg-[#111] border border-white/5 rounded-lg px-4 py-2.5 text-xs text-white outline-none focus:border-[#FF5F00] transition-all">
                <input type="number" name="menu[${menuIdx}][prix_plat]" placeholder="Prix" 
                    class="w-20 bg-[#111] border border-white/5 rounded-lg px-3 py-2.5 text-xs text-white outline-none focus:border-[#FF5F00] transition-all">
                <button type="button" onclick="this.parentElement.remove()" 
                    class="text-red-500 hover:text-red-400 font-bold px-2 transition-colors text-lg">×</button>
            `;
            container.appendChild(div);
            menuIdx++;
        }

        function markForDeletion(photoId) {
            const photoDiv = document.getElementById('photo-' + photoId);
            const deleteInput = document.getElementById('delete-input-' + photoId);
            
            if (photoDiv.classList.contains('opacity-25')) {
                photoDiv.classList.remove('opacity-25');
                deleteInput.disabled = true;
            } else {
                photoDiv.classList.add('opacity-25');
                deleteInput.disabled = false;
            }
        }
    </script>
</x-app-layout>