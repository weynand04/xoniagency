<x-app-layout :title="$title" :tentangData="$tentangData">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard &raquo; Edit {{ $title }}
        </h2>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <form method="POST" action="{{ route('tentang.update') }}">
                            @csrf

                            {{-- FLASH MESSAGE --}}
                            @if (session('success'))
                                <div class="p-3 mb-3 bg-green-100 text-green-700 rounded">
                                    {{ session('success') }}
                                </div>
                            @endif

                            {{-- HERO SECTION --}}
                            <div class="border-b pb-4 mb-6">
                                <h3 class="text-lg font-bold mb-4">Hero Section</h3>
                                <div class="mb-3">
                                    <label class="block mb-1">Judul</label>
                                    <input type="text" name="hero_title" class="w-full border p-2 rounded"
                                        value="{{ old('hero_title', $tentangData['hero_section']->value['title'] ?? '') }}">
                                </div>
                                <div class="mb-3">
                                    <label class="block mb-1">Deskripsi</label>
                                    <textarea name="hero_description" class="w-full border p-2 rounded">{{ old('hero_description', $tentangData['hero_section']->value['description'] ?? '') }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="block mb-1">Link Gambar</label>
                                    <input type="text" name="hero_image" class="w-full border p-2 rounded"
                                        value="{{ old('hero_image', $tentangData['hero_section']->value['image'] ?? '') }}">
                                </div>
                            </div>

                            {{-- SKILLS SECTION --}}
                            <div class="border-b pb-4 mb-6">
                                <h3 class="text-lg font-bold mb-4">Skills</h3>
                                <div x-data="cardsEditor()" x-init="init(@js(old('skills', $tentangData['skills']->value ?? [])))">
                                    <div class="flex justify-between items-center mb-3">
                                        <h4 class="font-semibold">Skill Items</h4>
                                        <button type="button" @click="add({name:'',percentage:''})"
                                            class="px-3 py-1.5 bg-blue-600 text-white rounded">+ Add Skill</button>
                                    </div>
                                    <div class="space-y-4">
                                        <template x-for="(skill,i) in cards" :key="i">
                                            <div class="p-4 border rounded grid grid-cols-2 gap-4">
                                                <div>
                                                    <label class="block mb-1">Skill Name</label>
                                                    <input type="text" class="w-full border p-2 rounded"
                                                        :name="`skills[${i}][name]`" x-model="skill.name">
                                                </div>
                                                <div>
                                                    <label class="block mb-1">Percentage</label>
                                                    <input type="number" class="w-full border p-2 rounded"
                                                        :name="`skills[${i}][percentage]`" x-model="skill.percentage"
                                                        min="0" max="100">
                                                </div>
                                            </div>
                                        </template>
                                    </div>
                                </div>
                            </div>

                            {{-- COUNTERS SECTION --}}
                            <div class="border-b pb-4 mb-6">
                                <h3 class="text-lg font-bold mb-4">Counters</h3>
                                <div x-data="cardsEditor()" x-init="init(@js(old('counters', $tentangData['counters']->value ?? [])))">
                                    <div class="flex justify-between items-center mb-3">
                                        <h4 class="font-semibold">Counter Items</h4>
                                        <button type="button" @click="add({title:'',value:''})"
                                            class="px-3 py-1.5 bg-blue-600 text-white rounded">+ Add Counter</button>
                                    </div>
                                    <div class="space-y-4">
                                        <template x-for="(counter,i) in cards" :key="i">
                                            <div class="p-4 border rounded grid grid-cols-2 gap-4">
                                                <div>
                                                    <label class="block mb-1">Title</label>
                                                    <input type="text" class="w-full border p-2 rounded"
                                                        :name="`counters[${i}][title]`" x-model="counter.title">
                                                </div>
                                                <div>
                                                    <label class="block mb-1">Value</label>
                                                    <input type="number" class="w-full border p-2 rounded"
                                                        :name="`counters[${i}][value]`" x-model="counter.value">
                                                </div>
                                            </div>
                                        </template>
                                    </div>
                                </div>
                            </div>

                            {{-- PRICING PLANS --}}
                            <div class="border-b pb-4 mb-6">
                                <h3 class="text-lg font-bold mb-4">Pricing Plans</h3>
                                <div x-data="cardsEditor()" x-init="init(@js(old('plans', $tentangData['plans']->value ?? [])))">
                                    <div class="flex justify-between items-center mb-3">
                                        <h4 class="font-semibold">Plan Items</h4>
                                        <button type="button" @click="add({name:'',price:'',duration:'',features:{}})"
                                            class="px-3 py-1.5 bg-blue-600 text-white rounded">+ Add Plan</button>
                                    </div>
                                    <div class="space-y-4">
                                        <template x-for="(plan,i) in cards" :key="i">
                                            <div class="p-4 border rounded space-y-3">
                                                <div>
                                                    <label class="block mb-1">Plan Name</label>
                                                    <input type="text" class="w-full border p-2 rounded"
                                                        :name="`plans[${i}][name]`" x-model="plan.name">
                                                </div>
                                                <div class="grid grid-cols-2 gap-4">
                                                    <div>
                                                        <label class="block mb-1">Price</label>
                                                        <input type="number" class="w-full border p-2 rounded"
                                                            :name="`plans[${i}][price]`" x-model="plan.price">
                                                    </div>
                                                    <div>
                                                        <label class="block mb-1">Duration</label>
                                                        <input type="text" class="w-full border p-2 rounded"
                                                            :name="`plans[${i}][duration]`" x-model="plan.duration">
                                                    </div>
                                                </div>
                                                <div>
                                                    <label class="block mb-1">Features (satu per baris)</label>
                                                    <textarea class="w-full border p-2 rounded" :name="`plans[${i}][features_text]`" x-model="plan.features_text"></textarea>
                                                    <p class="text-xs text-gray-500 mt-1">
                                                        Contoh:
                                                        <br>- Unlimited Projects:1
                                                        <br>- Priority Support:0
                                                        <br>- Free Hosting:1
                                                    </p>
                                                </div>
                                            </div>
                                        </template>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-6">
                                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
                                    Simpan Perubahan
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
