<x-app-layout :kontakData="$kontakData" :title="$title">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard &raquo; Edit {{ $title }}
        </h2>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <form method="POST" action="{{ route('layanan.update') }}">
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
                                <label class="block mb-1">Hero H1</label>
                                <input type="text" name="hero_h1" class="w-full border p-2 rounded"
                                    value="{{ old('hero_h1', $layananData->hero_h1) }}">
                            </div>

                            {{-- SECTION 1 --}}
                            <div class="border-b pb-4 mb-6">
                                <h3 class="text-lg font-bold mb-4">Section 1 - What We Offer</h3>

                                <div class="mb-4">
                                    <label class="block mb-1">Section 1 Heading</label>
                                    <input type="text" name="sec1_h2" class="w-full border p-2 rounded"
                                        value="{{ old('sec1_h2', $layananData->sec1_h2) }}">
                                </div>

                                {{-- CARDS --}}
                                <div x-data="cardsEditor()" x-init="init(@js(old('sec1_cards', $layananData->sec1_cards ?? [])))">

                                    <div class="flex justify-between items-center mb-3">
                                        <h4 class="font-semibold">Section 1 Cards</h4>
                                        <button type="button" @click="add({icon:'',title:'',description:''})"
                                            class="px-3 py-1.5 bg-blue-600 text-white rounded">+ Add Card</button>
                                    </div>

                                    <template x-if="cards.length === 0">
                                        <p class="text-sm text-gray-500">Belum ada card.</p>
                                    </template>

                                    <div class="space-y-4">
                                        <template x-for="(card,i) in cards" :key="i">
                                            <div class="p-4 border rounded space-y-3">
                                                <div class="flex justify-between">
                                                    <span class="font-semibold">Card <span x-text="i+1"></span></span>
                                                    <button type="button" @click="remove(i)"
                                                        class="text-red-600 hover:underline">Hapus</button>
                                                </div>

                                                <div>
                                                    <label class="block mb-1">Icon (SVG)</label>
                                                    <textarea class="w-full border p-2 rounded" :name="`sec1_cards[${i}][icon]`" x-model="card.icon"></textarea>
                                                </div>

                                                <div>
                                                    <label class="block mb-1">Title</label>
                                                    <input type="text" class="w-full border p-2 rounded"
                                                        :name="`sec1_cards[${i}][title]`" x-model="card.title">
                                                </div>

                                                <div>
                                                    <label class="block mb-1">Description</label>
                                                    <textarea class="w-full border p-2 rounded" :name="`sec1_cards[${i}][description]`" x-model="card.description"></textarea>
                                                </div>
                                            </div>
                                        </template>
                                    </div>
                                </div>
                            </div>

                            {{-- SECTION 2 --}}
                            <div class="border-b pb-4 mb-6">
                                <h3 class="text-lg font-bold mb-4">Section 2 - How We Plan Our Work</h3>

                                <div class="mb-4">
                                    <label class="block mb-1">Section 2 Heading</label>
                                    <input type="text" name="sec2_h2" class="w-full border p-2 rounded"
                                        value="{{ old('sec2_h2', $layananData->sec2_h2) }}">
                                </div>

                                <div class="mb-4">
                                    <label class="block mb-1">Section 2 Paragraph</label>
                                    <textarea name="sec2_p" class="w-full border p-2 rounded">{{ old('sec2_p', $layananData->sec2_p) }}</textarea>
                                </div>

                                {{-- STEPS --}}
                                <div x-data="cardsEditor()" x-init="init(@js(old('sec2_cards', $layananData->sec2_cards ?? [])))">

                                    <div class="flex justify-between items-center mb-3">
                                        <h4 class="font-semibold">Steps</h4>
                                        <button type="button" @click="add({step:'',title:'',description:''})"
                                            class="px-3 py-1.5 bg-blue-600 text-white rounded">+ Add Step</button>
                                    </div>

                                    <div class="space-y-4">
                                        <template x-for="(step,i) in cards" :key="i">
                                            <div class="p-4 border rounded space-y-3">
                                                <div class="grid grid-cols-3 gap-4">
                                                    <div>
                                                        <label class="block mb-1">Step</label>
                                                        <input type="text" class="w-full border p-2 rounded"
                                                            :name="`sec2_cards[${i}][step]`" x-model="step.step">
                                                    </div>
                                                    <div>
                                                        <label class="block mb-1">Title</label>
                                                        <input type="text" class="w-full border p-2 rounded"
                                                            :name="`sec2_cards[${i}][title]`" x-model="step.title">
                                                    </div>
                                                    <div>
                                                        <label class="block mb-1">Description</label>
                                                        <input type="text" class="w-full border p-2 rounded"
                                                            :name="`sec2_cards[${i}][description]`"
                                                            x-model="step.description">
                                                    </div>
                                                </div>
                                            </div>
                                        </template>
                                    </div>
                                </div>
                            </div>

                            {{-- SECTION 3 (SKILLS) --}}
                            <div>
                                <h3 class="text-lg font-bold mb-4">Section 3 - Skills</h3>

                                <div class="mb-4">
                                    <label class="block mb-1">Heading</label>
                                    <input type="text" name="sec3_h2" class="w-full border p-2 rounded"
                                        value="{{ old('sec3_h2', $layananData->sec3_h2) }}">
                                </div>

                                <div class="mb-4">
                                    <label class="block mb-1">Paragraph</label>
                                    <textarea name="sec3_p" class="w-full border p-2 rounded">{{ old('sec3_p', $layananData->sec3_p) }}</textarea>
                                </div>

                                <div x-data="cardsEditor()" x-init="init(@js(old('sec3_skills', $layananData->sec3_skills ?? [])))">

                                    <div class="flex justify-between items-center mb-3">
                                        <h4 class="font-semibold">Skills</h4>
                                        <button type="button" @click="add({name:'',percentage:''})"
                                            class="px-3 py-1.5 bg-blue-600 text-white rounded">+ Add Skill</button>
                                    </div>

                                    <div class="space-y-4">
                                        <template x-for="(skill,i) in cards" :key="i">
                                            <div class="p-4 border rounded grid grid-cols-2 gap-4">
                                                <div>
                                                    <label class="block mb-1">Skill Name</label>
                                                    <input type="text" class="w-full border p-2 rounded"
                                                        :name="`sec3_skills[${i}][name]`" x-model="skill.name">
                                                </div>
                                                <div>
                                                    <label class="block mb-1">Percentage</label>
                                                    <input type="number" class="w-full border p-2 rounded"
                                                        :name="`sec3_skills[${i}][percentage]`"
                                                        x-model="skill.percentage" min="0" max="100">
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
