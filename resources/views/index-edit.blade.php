<x-app-layout :indexData="$indexData">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard &raquo; Edit Index Page
        </h2>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        @if (session('success'))
                            <div class="text-green-600 mb-4">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('index-update') }}" class="space-y-6">
                            @csrf

                            {{-- Flash message --}}
                            @if (session('success'))
                                <div class="p-3 bg-green-100 text-green-800 rounded">{{ session('success') }}</div>
                            @endif

                            {{-- Error summary --}}
                            @if ($errors->any())
                                <div class="p-3 bg-red-100 text-red-800 rounded">
                                    <ul class="list-disc ml-5">
                                        @foreach ($errors->all() as $e)
                                            <li>{{ $e }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            {{-- MAIN FIELDS --}}
                            <div class="mb-4">
                                <label class="block mb-1" for="main_h1">Main H1</label>
                                <input type="text" name="main_h1" id="main_h1"
                                    class="block w-full border p-2 rounded"
                                    value="{{ old('main_h1', $indexData->main_h1) }}">
                            </div>

                            <div class="mb-4">
                                <label class="block mb-1" for="main_h2">Main H2</label>
                                <input type="text" name="main_h2" id="main_h2"
                                    class="block w-full border p-2 rounded"
                                    value="{{ old('main_h2', $indexData->main_h2) }}">
                            </div>

                            <div class="mb-4">
                                <label class="block mb-1" for="main_p">Main Paragraph</label>
                                <textarea name="main_p" id="main_p" class="block w-full border p-2 rounded" rows="4">{{ old('main_p', $indexData->main_p) }}</textarea>
                            </div>

                            <div class="mb-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block mb-1" for="main_button_text">Main Button Text</label>
                                    <input type="text" name="main_button_text" id="main_button_text"
                                        class="block w-full border p-2 rounded"
                                        value="{{ old('main_button_text', $indexData->main_button_text) }}">
                                </div>
                                <div>
                                    <label class="block mb-1" for="main_button_link">Main Button Link</label>
                                    <input type="text" name="main_button_link" id="main_button_link"
                                        class="block w-full border p-2 rounded"
                                        value="{{ old('main_button_link', $indexData->main_button_link) }}">
                                </div>
                            </div>

                            {{-- SECTION 2 HEADINGS --}}
                            <div class="border-t pt-6">
                                <h3 class="font-semibold mb-3">Section 2</h3>

                                <div class="mb-4">
                                    <label class="block mb-1" for="sec2_h2">Section 2 H2</label>
                                    <input type="text" name="sec2_h2" id="sec2_h2"
                                        class="block w-full border p-2 rounded"
                                        value="{{ old('sec2_h2', $indexData->sec2_h2) }}">
                                </div>

                                <div class="mb-4">
                                    <label class="block mb-1" for="sec2_p">Section 2 Paragraph</label>
                                    <textarea name="sec2_p" id="sec2_p" class="block w-full border p-2 rounded" rows="3">{{ old('sec2_p', $indexData->sec2_p) }}</textarea>
                                </div>
                            </div>

                            {{-- SECTION 2 CARDS (REPEATER) --}}
                            <div x-data="cardsEditor()" x-init="init(@js(old('sec2_cards', $indexData->sec2_cards ?? [])))" class="border-t pt-6">
                                <div class="flex items-center justify-between mb-3">
                                    <h4 class="font-semibold">Section 2 Cards</h4>
                                    <button type="button" @click="add()"
                                        class="px-3 py-1.5 rounded bg-blue-600 text-white">+ Tambah Card</button>
                                </div>

                                <template x-if="cards.length === 0">
                                    <div class="text-sm text-gray-500 mb-3">Belum ada card. Klik “Tambah Card”.</div>
                                </template>

                                <div class="space-y-4">
                                    <template x-for="(card, i) in cards" :key="i">
                                        <div class="p-4 border rounded space-y-3">
                                            <div class="flex items-center justify-between">
                                                <div class="font-medium">Card <span x-text="i+1"></span></div>
                                                <button type="button" @click="remove(i)"
                                                    class="text-red-600 hover:underline">Hapus</button>
                                            </div>

                                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                                <div>
                                                    <label class="block mb-1">Title</label>
                                                    <input type="text" class="w-full border p-2 rounded"
                                                        :name="`sec2_cards[${i}][title]`" x-model="card.title">
                                                </div>
                                                <div>
                                                    <label class="block mb-1">Description</label>
                                                    <input type="text" class="w-full border p-2 rounded"
                                                        :name="`sec2_cards[${i}][description]`"
                                                        x-model="card.description">
                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                </div>

                                <h2 class="text-xl font-bold mt-8 mb-4">Section 3 (Video + Teks)</h2>

                                <div class="mb-4">
                                    <label for="sec3_h2">Heading</label>
                                    <input type="text" name="sec3_h2" class="block w-full border"
                                        value="{{ old('sec3_h2', $indexData->sec3_h2) }}">
                                </div>

                                <div class="mb-4">
                                    <label for="sec3_p">Paragraph</label>
                                    <textarea name="sec3_p" class="block w-full border">{{ old('sec3_p', $indexData->sec3_p) }}</textarea>
                                </div>

                                <div class="mb-4">
                                    <label for="sec3_button_text">Button Text</label>
                                    <input type="text" name="sec3_button_text" class="block w-full border"
                                        value="{{ old('sec3_button_text', $indexData->sec3_button_text) }}">
                                </div>

                                <div class="mb-4">
                                    <label for="sec3_button_link">Button Link</label>
                                    <input type="text" name="sec3_button_link" class="block w-full border"
                                        value="{{ old('sec3_button_link', $indexData->sec3_button_link) }}">
                                </div>

                                <div class="mb-4">
                                    <label for="sec3_video_link">Video Link (YouTube Embed)</label>
                                    <input type="text" name="sec3_video_link" class="block w-full border"
                                        value="{{ old('sec3_video_link', $indexData->sec3_video_link) }}">
                                </div>
                            </div>

                            {{-- SECTION 4 --}}
                            <div class="border-t pt-6">
                                <h3 class="font-semibold mb-3">Section 4</h3>

                                <div class="mb-4">
                                    <label class="block mb-1" for="sec4_h2">Section 4 H2</label>
                                    <input type="text" name="sec4_h2" id="sec4_h2"
                                        class="block w-full border p-2 rounded"
                                        value="{{ old('sec4_h2', $indexData->sec4_h2) }}">
                                </div>

                                <div class="mb-4">
                                    <label class="block mb-1" for="sec4_p">Section 4 Paragraph</label>
                                    <textarea name="sec4_p" id="sec4_p" class="block w-full border p-2 rounded" rows="3">{{ old('sec4_p', $indexData->sec4_p) }}</textarea>
                                </div>

                                <div class="mb-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block mb-1" for="sec4_button_text">Button Text</label>
                                        <input type="text" name="sec4_button_text" id="sec4_button_text"
                                            class="block w-full border p-2 rounded"
                                            value="{{ old('sec4_button_text', $indexData->sec4_button_text) }}">
                                    </div>
                                    <div>
                                        <label class="block mb-1" for="sec4_button_link">Button Link</label>
                                        <input type="text" name="sec4_button_link" id="sec4_button_link"
                                            class="block w-full border p-2 rounded"
                                            value="{{ old('sec4_button_link', $indexData->sec4_button_link) }}">
                                    </div>
                                </div>
                            </div>

                            {{-- SECTION 4 CARDS --}}
                            <div x-data="cardsEditor()" x-init="init(@js(old('sec4_cards', $indexData->sec4_cards ?? [])))" class="border-t pt-6">
                                <div class="flex items-center justify-between mb-3">
                                    <h4 class="font-semibold">Section 4 Cards</h4>
                                    <button type="button" @click="add()"
                                        class="px-3 py-1.5 rounded bg-blue-600 text-white">+ Tambah Card</button>
                                </div>

                                <template x-if="cards.length === 0">
                                    <div class="text-sm text-gray-500 mb-3">Belum ada card. Klik “Tambah Card”.</div>
                                </template>

                                <div class="space-y-4">
                                    <template x-for="(card, i) in cards" :key="i">
                                        <div class="p-4 border rounded space-y-3">
                                            <div class="flex items-center justify-between">
                                                <div class="font-medium">Card <span x-text="i+1"></span></div>
                                                <button type="button" @click="remove(i)"
                                                    class="text-red-600 hover:underline">Hapus</button>
                                            </div>

                                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                                <div>
                                                    <label class="block mb-1">Title</label>
                                                    <input type="text" class="w-full border p-2 rounded"
                                                        :name="`sec4_cards[${i}][title]`" x-model="card.title">
                                                </div>
                                                <div>
                                                    <label class="block mb-1">Image (path)</label>
                                                    <input type="text" class="w-full border p-2 rounded"
                                                        :name="`sec4_cards[${i}][image]`" x-model="card.image">
                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                            </div>


                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
                                Simpan
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>
