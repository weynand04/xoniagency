<x-app-layout :title="$title" :tentangData="$tentangData">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard &raquo; Edit {{ $title }}
        </h2>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <form method="POST" action="{{ route('tentang.update') }}" class="space-y-6">
                            @csrf

                            {{-- Flash Message --}}
                            @if (session('success'))
                                <div class="mb-4 p-3 rounded bg-green-100 text-green-700 border border-green-300">
                                    ✅ {{ session('success') }}
                                </div>
                            @endif

                            <div x-data="{ openSection: 1 }" class="space-y-5">

                                {{-- HERO SECTION --}}
                                <div class="border rounded-xl p-5 bg-gray-50">
                                    <button type="button"
                                        @click="openSection === 1 ? openSection = null : openSection = 1"
                                        class="flex justify-between items-center w-full text-left font-semibold text-gray-800 text-lg">
                                        <span>🏠 Hero Section</span>
                                        <span x-text="openSection === 1 ? '−' : '+'"></span>
                                    </button>

                                    <div x-show="openSection === 1" x-transition class="mt-4 space-y-4">

                                        <div>
                                            <label class="block font-medium mb-1">Judul</label>
                                            <input type="text" name="hero_title"
                                                class="w-full border p-2 rounded focus:ring-2 focus:ring-blue-400"
                                                value="{{ old('hero_title', $tentangData['hero_section']->value['title'] ?? '') }}">
                                        </div>

                                        <div>
                                            <label class="block font-medium mb-1">Deskripsi</label>
                                            <textarea name="hero_description" rows="3" class="w-full border p-2 rounded focus:ring-2 focus:ring-blue-400">{{ old('hero_description', $tentangData['hero_section']->value['description'] ?? '') }}</textarea>
                                        </div>

                                        <div>
                                            <label class="block font-medium mb-1">Link Gambar</label>
                                            <input type="text" name="hero_image"
                                                class="w-full border p-2 rounded focus:ring-2 focus:ring-blue-400"
                                                value="{{ old('hero_image', $tentangData['hero_section']->value['image'] ?? '') }}">
                                        </div>

                                    </div>
                                </div>

                                {{-- SKILLS SECTION --}}
                                <div class="border rounded-xl p-5 bg-gray-50" x-data="cardsEditor()"
                                    x-init="init(@js(old('skills', $tentangData['skills']->value ?? [])))">

                                    <button type="button"
                                        @click="openSection === 2 ? openSection = null : openSection = 2"
                                        class="flex justify-between items-center w-full text-left font-semibold text-gray-800 text-lg">
                                        <span>💡 Skills Section</span>
                                        <span x-text="openSection === 2 ? '−' : '+'"></span>
                                    </button>

                                    <div x-show="openSection === 2" x-transition class="mt-4 space-y-4">

                                        <div class="flex justify-between items-center mb-3">
                                            <h4 class="font-semibold">Daftar Skill</h4>
                                            <button type="button" @click="add({name:'',percentage:''})"
                                                class="bg-blue-600 text-white text-sm px-3 py-1.5 rounded">
                                                + Tambah Skill
                                            </button>
                                        </div>

                                        <template x-if="cards.length === 0">
                                            <p class="text-sm text-gray-500">Belum ada skill. Klik tambah.</p>
                                        </template>

                                        <template x-for="(skill,i) in cards" :key="i">
                                            <div class="border rounded-xl bg-white p-4 space-y-3">
                                                <div class="grid md:grid-cols-2 gap-4">
                                                    <div>
                                                        <label class="block font-medium mb-1">Nama Skill</label>
                                                        <input type="text" class="w-full border p-2 rounded"
                                                            :name="`skills[${i}][name]`" x-model="skill.name">
                                                    </div>
                                                    <div>
                                                        <label class="block font-medium mb-1">Persentase</label>
                                                        <input type="number" class="w-full border p-2 rounded"
                                                            :name="`skills[${i}][percentage]`"
                                                            x-model="skill.percentage" min="0" max="100">
                                                    </div>
                                                </div>
                                                <div class="text-right">
                                                    <button type="button" @click="remove(i)"
                                                        class="text-red-600 text-sm">Hapus</button>
                                                </div>
                                            </div>
                                        </template>

                                    </div>
                                </div>

                                {{-- COUNTERS SECTION --}}
                                <div class="border rounded-xl p-5 bg-gray-50" x-data="cardsEditor()"
                                    x-init="init(@js(old('counters', $tentangData['counters']->value ?? [])))">

                                    <button type="button"
                                        @click="openSection === 3 ? openSection = null : openSection = 3"
                                        class="flex justify-between items-center w-full text-left font-semibold text-gray-800 text-lg">
                                        <span>🔢 Counters</span>
                                        <span x-text="openSection === 3 ? '−' : '+'"></span>
                                    </button>

                                    <div x-show="openSection === 3" x-transition class="mt-4 space-y-4">

                                        <div class="flex justify-between items-center mb-3">
                                            <h4 class="font-semibold">Item Counter</h4>
                                            <button type="button" @click="add({title:'',value:''})"
                                                class="bg-blue-600 text-white text-sm px-3 py-1.5 rounded">
                                                + Tambah Counter
                                            </button>
                                        </div>

                                        <template x-for="(counter,i) in cards" :key="i">
                                            <div class="border rounded-xl p-4 bg-white space-y-3">
                                                <div class="grid md:grid-cols-2 gap-4">
                                                    <div>
                                                        <label class="block mb-1 font-medium">Judul</label>
                                                        <input type="text" class="w-full border p-2 rounded"
                                                            :name="`counters[${i}][title]`" x-model="counter.title">
                                                    </div>
                                                    <div>
                                                        <label class="block mb-1 font-medium">Nilai</label>
                                                        <input type="number" class="w-full border p-2 rounded"
                                                            :name="`counters[${i}][value]`" x-model="counter.value">
                                                    </div>
                                                </div>
                                                <div class="text-right">
                                                    <button type="button" @click="remove(i)"
                                                        class="text-red-600 text-sm">Hapus</button>
                                                </div>
                                            </div>
                                        </template>

                                    </div>
                                </div>

                                {{-- PRICING PLANS --}}
                                <div class="border rounded-xl p-5 bg-gray-50" x-data="cardsEditor()"
                                    x-init="init(@js(old('plans', $tentangData['plans']->value ?? [])))">

                                    <button type="button"
                                        @click="openSection === 4 ? openSection = null : openSection = 4"
                                        class="flex justify-between items-center w-full text-left font-semibold text-gray-800 text-lg">
                                        <span>💼 Pricing Plans</span>
                                        <span x-text="openSection === 4 ? '−' : '+'"></span>
                                    </button>

                                    <div x-show="openSection === 4" x-transition class="mt-4 space-y-4">

                                        <div class="flex justify-between items-center mb-3">
                                            <h4 class="font-semibold">Daftar Plan</h4>
                                            <button type="button"
                                                @click="add({name:'',price:'',duration:'',features:{}})"
                                                class="bg-blue-600 text-white text-sm px-3 py-1.5 rounded">
                                                + Tambah Plan
                                            </button>
                                        </div>

                                        <template x-for="(plan,i) in cards" :key="i">
                                            <div class="border rounded-xl p-4 bg-white space-y-3">

                                                <div>
                                                    <label class="block font-medium mb-1">Nama Paket</label>
                                                    <input type="text" class="w-full border p-2 rounded"
                                                        :name="`plans[${i}][name]`" x-model="plan.name">
                                                </div>

                                                <div class="grid md:grid-cols-2 gap-4">
                                                    <div>
                                                        <label class="block font-medium mb-1">Harga</label>
                                                        <input type="number" class="w-full border p-2 rounded"
                                                            :name="`plans[${i}][price]`" x-model="plan.price">
                                                    </div>
                                                    <div>
                                                        <label class="block font-medium mb-1">Durasi</label>
                                                        <input type="text" class="w-full border p-2 rounded"
                                                            :name="`plans[${i}][duration]`" x-model="plan.duration">
                                                    </div>
                                                </div>

                                                <div>
                                                    <label class="block font-medium mb-1">Fitur (1 per baris)</label>
                                                    <textarea class="w-full border p-2 rounded h-24" :name="`plans[${i}][features_text]`" x-model="plan.features_text"></textarea>
                                                    <small class="text-gray-500 text-xs">Format fitur:value (contoh:
                                                        Unlimited Projects:1)</small>
                                                </div>

                                                <div class="text-right">
                                                    <button type="button" @click="remove(i)"
                                                        class="text-red-600 text-sm">Hapus</button>
                                                </div>

                                            </div>
                                        </template>

                                    </div>
                                </div>

                            </div>

                            {{-- Save Button --}}
                            <div class="text-right">
                                <button type="submit"
                                    class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-6 py-3 rounded-lg shadow">
                                    💾 Simpan Perubahan
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>

<script>
    function cardsEditor() {
        return {
            cards: [],
            init(data) {
                // Convert data from backend into editable format
                this.cards = (data || []).map(plan => {
                    if (plan.features) {
                        // Ubah object features jadi text editable
                        plan.features_text = Object.entries(plan.features)
                            .map(([key, val]) => `${key}:${val ? 1 : 0}`)
                            .join('\n');
                    }
                    return plan;
                });
            },
            add(newItem) {
                this.cards.push(newItem);
            },
            remove(index) {
                this.cards.splice(index, 1);
            }
        }
    }
</script>
