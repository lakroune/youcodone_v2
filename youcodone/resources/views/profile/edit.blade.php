<x-app-layout>


    <div class="min-h-screen flex items-center justify-center p-6 bg-[#0A0A0A] text-white">

        <div class="w-full max-w-5xl flex flex-col md:flex-row gap-12 items-center md:items-start">

            <div class="md:w-1/3 flex flex-col items-center">
                <div class="relative group">
                    <div
                        class="w-48 h-48 rounded-full overflow-hidden avatar-ring transition-transform duration-500 group-hover:rotate-3">
                        <img src="{{ Auth::user()->avatar ? asset('storage/' . Auth::user()->avatar) : 'https://ui-avatars.com/api/?name=' . Auth::user()->username . '&background=FF5F00&color=fff' }}"
                            class="w-full h-full object-cover rounded-full" alt="Avatar">
                    </div>

                    <form action="{{ route('profile.avatar.update') }}" method="POST" enctype="multipart/form-data"
                        id="avatarForm">
                        @csrf
                        @method('PUT')
                        <label
                            class="absolute bottom-4 right-4 bg-[#FF5F00] p-3 rounded-full cursor-pointer hover:scale-110 transition-all shadow-xl shadow-black">
                            @if (Auth::user()->avatar)
                                <img src="{{ asset('storage/' . Auth::user()->avatar) }}"
                                    class="w-full h-full object-cover rounded-full" alt=" Avatar" />
                            @else
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                    d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                    d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            @endif
                            <input type="file" name="avatar" class="hidden"
                                onchange="document.getElementById('avatarForm').submit()">
                        </label>
                    </form>
                </div>

                <div class="mt-8 text-center">
                    <h2 class="text-3xl font-black italic uppercase tracking-tighter text-glow">
                        {{ Auth::user()->username }}</h2>
                    <div class="mt-2">
                        <span
                            class="px-4 py-1 bg-[#FF5F00]/10 text-[#FF5F00] text-[10px] font-black uppercase tracking-[2px] rounded-full border border-[#FF5F00]/20">
                            {{ Auth::user()->role ?? 'Client' }}
                        </span>
                    </div>
                    <p class="text-gray-600 text-[10px] mt-6 font-bold tracking-[4px] uppercase italic">
                        Established {{ Auth::user()->created_at->format('Y') }}
                    </p>
                </div>
            </div>

            <div class="md:w-2/3 profile-card rounded-3xl p-10 shadow-2xl relative overflow-hidden">
                <div class="absolute -top-24 -right-24 w-48 h-48 bg-[#FF5F00]/5 rounded-full blur-3xl"></div>

                <h3 class="text-xl font-black uppercase tracking-[4px] mb-10 border-b border-white/5 pb-6">
                    Account Settings<span class="text-[#FF5F00]">.</span>
                </h3>

                <form action="{{ 'profile.update' }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    @csrf
                    @method('patch')

                    <div class="space-y-2">
                        <label class="text-[10px] text-gray-500 font-black uppercase tracking-[3px]">Nom</label>
                        <input type="text" name="nom" value="{{ old('nom', Auth::user()->nom) }}"
                            class="w-full bg-[#1A1A1A] border border-white/10 rounded-xl px-5 py-4 text-sm text-white outline-none orange-glow transition-all focus:bg-black">
                        <x-input-error class="mt-2" :messages="$errors->get('nom')" />
                    </div>

                    <div class="space-y-2">
                        <label class="text-[10px] text-gray-500 font-black uppercase tracking-[3px]">Prénom</label>
                        <input type="text" name="prenom" value="{{ old('prenom', Auth::user()->prenom) }}"
                            class="w-full bg-[#1A1A1A] border border-white/10 rounded-xl px-5 py-4 text-sm text-white outline-none orange-glow transition-all focus:bg-black">
                        <x-input-error class="mt-2" :messages="$errors->get('prenom')" />
                    </div>

                    <div class="space-y-2">
                        <label class="text-[10px] text-gray-500 font-black uppercase tracking-[3px]">Email
                            Address</label>
                        <input type="email" value="{{ Auth::user()->email }}" readonly
                            class="w-full bg-black/40 border border-white/5 rounded-xl px-5 py-4 text-sm text-gray-600 outline-none cursor-not-allowed italic">
                    </div>

                    <div class="space-y-2">
                        <label class="text-[10px] text-gray-500 font-black uppercase tracking-[3px]">Mobile
                            Phone</label>
                        <input type="text" name="phone" value="{{ old('phone', Auth::user()->phone) }}"
                            placeholder="+212 ..."
                            class="w-full bg-[#1A1A1A] border border-white/10 rounded-xl px-5 py-4 text-sm text-white outline-none orange-glow transition-all focus:bg-black">
                        <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                    </div>

                    <div class="space-y-2 md:col-span-2">
                        <label class="text-[10px] text-gray-500 font-black uppercase tracking-[3px]">Shipping
                            Address</label>
                        <input type="text" name="address" value="{{ old('address', Auth::user()->address) }}"
                            placeholder="Rue, Ville, Code Postal"
                            class="w-full bg-[#1A1A1A] border border-white/10 rounded-xl px-5 py-4 text-sm text-white outline-none orange-glow transition-all focus:bg-black">
                        <x-input-error class="mt-2" :messages="$errors->get('address')" />
                    </div>

                    <div class="md:col-span-2 flex items-center gap-3 py-4">
                        <div class="relative flex h-3 w-3">
                            <span
                                class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-3 w-3 bg-green-500"></span>
                        </div>
                        <span class="text-[10px] text-gray-500 uppercase font-black tracking-[2px]">Account Status:
                            <span class="text-white">{{ Auth::user()->status ?? 'Active' }}</span></span>
                    </div>

                    <div class="md:col-span-2 pt-6 flex flex-col sm:flex-row gap-4">
                        <button type="submit"
                            class="bg-[#FF5F00] hover:bg-[#E65600] text-white text-[11px] font-black px-10 py-5 rounded-xl uppercase tracking-[3px] transition-all transform active:scale-95 shadow-2xl shadow-[#FF5F00]/20">
                            Save Changes
                        </button>
                        @role('restaurateur')
                        <a href="{{ route('restaurateur.dashboard') }}"
                            class="inline-flex justify-center items-center bg-white/5 hover:bg-white/10 text-white text-[11px] font-black px-10 py-5 rounded-xl uppercase tracking-[3px] transition-all border border-white/5">
                            Cancel
                        </a>
                        @endrole
                        @role('client')
                        <a href="{{ route('home') }}"
                        class="inline-flex justify-center items-center bg-white/5 hover:bg-white/10 text-white text-[11px] font-black px-10 py-5 rounded-xl uppercase tracking-[3px] transition-all border border-white/5">
                            Cancel
                        </a>
                        @endrole

                        @if (session('status') === 'profile-updated')
                            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 3000)"
                                class="text-sm text-[#FF5F00] font-bold self-center animate-pulse">
                                ✓ Updated Successfully
                            </p>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
