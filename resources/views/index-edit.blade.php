@props(['indexData', 'title'])

<x-app-layout :indexData="$indexData" :title="$title">
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight mb-6">
            ✏️ Dashboard » Edit {{ $title }}
        </h2>

        <div class="py-6">
            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white shadow-sm sm:rounded-xl p-6">

                    {{-- Notifikasi --}}
                    @if (session('success'))
                        <div class="mb-4 p-3 rounded bg-green-100 text-green-700 border border-green-300">
                            ✅ {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="mb-4 p-3 rounded bg-red-100 text-red-700 border border-red-300">
                            <strong>⚠️ Ada beberapa kesalahan:</strong>
                            <ul class="list-disc ml-5 mt-2">
                                @foreach ($errors->all() as $e)
                                    <li>{{ $e }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('index-update') }}" enctype="multipart/form-data"
                        class="space-y-6">
                        @csrf

                        <div x-data="{ openSection: 1 }" class="space-y-4">

                            {{-- SECTION 1 --}}
                            <div class="border rounded-xl p-5 bg-gray-50">
                                <button type="button" @click="openSection === 1 ? openSection = null : openSection = 1"
                                    class="flex justify-between items-center w-full text-left font-semibold text-gray-800 text-lg">
                                    <span>📍 Section 1 – Halaman Utama</span>
                                    <span x-text="openSection === 1 ? '−' : '+'"></span>
                                </button>

                                <div x-show="openSection === 1" x-transition class="mt-4 space-y-4">
                                    <p class="text-sm text-gray-500">Bagian utama di halaman depan. Ubah judul dan
                                        paragraf pembuka.</p>

                                    <div>
                                        <label class="block font-medium mb-1">Judul Utama (H1)</label>
                                        <input type="text" name="main_h1"
                                            class="w-full border p-2 rounded focus:ring-2 focus:ring-blue-400"
                                            value="{{ old('main_h1', $indexData->main_h1) }}">
                                    </div>

                                    <div>
                                        <label class="block font-medium mb-1">Subjudul (H2)</label>
                                        <input type="text" name="main_h2"
                                            class="w-full border p-2 rounded focus:ring-2 focus:ring-blue-400"
                                            value="{{ old('main_h2', $indexData->main_h2) }}">
                                    </div>

                                    <div>
                                        <label class="block font-medium mb-1">Paragraf Utama</label>
                                        <textarea name="main_p" rows="3" class="w-full border p-2 rounded focus:ring-2 focus:ring-blue-400">{{ old('main_p', $indexData->main_p) }}</textarea>
                                    </div>

                                    <div class="grid md:grid-cols-2 gap-4">
                                        <div>
                                            <label class="block font-medium mb-1">Teks Tombol</label>
                                            <input type="text" name="main_button_text"
                                                class="w-full border p-2 rounded focus:ring-2 focus:ring-blue-400"
                                                value="{{ old('main_button_text', $indexData->main_button_text) }}">
                                        </div>
                                        <div>
                                            <label class="block font-medium mb-1">Link Tombol</label>
                                            <input type="text" name="main_button_link"
                                                class="w-full border p-2 rounded focus:ring-2 focus:ring-blue-400"
                                                value="{{ old('main_button_link', $indexData->main_button_link) }}">
                                            <small class="text-gray-500">Contoh: /kontak atau https://...</small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- SECTION 2 --}}
                            <div class="border rounded-xl p-5 bg-gray-50">
                                <button type="button" @click="openSection === 2 ? openSection = null : openSection = 2"
                                    class="flex justify-between items-center w-full text-left font-semibold text-gray-800 text-lg">
                                    <span>📘 Section 2 – Tentang Kami</span>
                                    <span x-text="openSection === 2 ? '−' : '+'"></span>
                                </button>

                                <div x-show="openSection === 2" x-transition class="mt-4 space-y-4">
                                    <p class="text-sm text-gray-500">Bagian tentang perusahaan/organisasi kamu. Sertakan
                                        teks dan kartu deskripsi.</p>

                                    <div>
                                        <label class="block font-medium mb-1">Judul</label>
                                        <input type="text" name="sec2_h2"
                                            class="w-full border p-2 rounded focus:ring-2 focus:ring-blue-400"
                                            value="{{ old('sec2_h2', $indexData->sec2_h2) }}">
                                    </div>

                                    <div>
                                        <label class="block font-medium mb-1">Paragraf</label>
                                        <textarea name="sec2_p" rows="3" class="w-full border p-2 rounded focus:ring-2 focus:ring-blue-400">{{ old('sec2_p', $indexData->sec2_p) }}</textarea>
                                    </div>

                                    <div x-data="cardsEditor()" x-init="init(@js(old('sec2_cards', $indexData->sec2_cards ?? [])))">
                                        <div class="flex justify-between items-center mb-3">
                                            <h4 class="font-semibold">Kartu Deskripsi</h4>
                                            <button type="button" @click="add()"
                                                class="bg-blue-600 text-white text-sm px-3 py-1.5 rounded">+
                                                Tambah</button>
                                        </div>

                                        <template x-if="cards.length === 0">
                                            <p class="text-sm text-gray-500">Belum ada kartu. Klik “Tambah”.</p>
                                        </template>

                                        <div class="space-y-4">
                                            <template x-for="(card, i) in cards" :key="i">
                                                <div class="border rounded p-4 bg-white space-y-3">
                                                    <div class="flex justify-between items-center">
                                                        <div class="font-medium">Kartu <span x-text="i+1"></span>
                                                        </div>
                                                        <button type="button" @click="remove(i)"
                                                            class="text-red-600 hover:underline text-sm">Hapus</button>
                                                    </div>
                                                    <div class="grid md:grid-cols-2 gap-4">
                                                        <div>
                                                            <label class="block mb-1">Judul</label>
                                                            <input type="text" class="w-full border p-2 rounded"
                                                                :name="`sec2_cards[${i}][title]`" x-model="card.title">
                                                        </div>
                                                        <div>
                                                            <label class="block mb-1">Deskripsi</label>
                                                            <input type="text" class="w-full border p-2 rounded"
                                                                :name="`sec2_cards[${i}][description]`"
                                                                x-model="card.description">
                                                        </div>
                                                    </div>
                                                </div>
                                            </template>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            {{-- SECTION 3 --}}
                            <div class="border rounded-xl p-5 bg-gray-50">
                                <button type="button" @click="openSection === 3 ? openSection = null : openSection = 3"
                                    class="flex justify-between items-center w-full text-left font-semibold text-gray-800 text-lg">
                                    <span>🎥 Section 3 – Video & Teks</span>
                                    <span x-text="openSection === 3 ? '−' : '+'"></span>
                                </button>

                                <div x-show="openSection === 3" x-transition class="mt-4 space-y-4">
                                    <p class="text-sm text-gray-500">Bagian dengan video embed (YouTube) dan teks
                                        penjelas.</p>

                                    <div>
                                        <label class="block font-medium mb-1">Heading</label>
                                        <input type="text" name="sec3_h2" class="w-full border p-2 rounded"
                                            value="{{ old('sec3_h2', $indexData->sec3_h2) }}">
                                    </div>

                                    <div>
                                        <label class="block font-medium mb-1">Paragraf</label>
                                        <textarea name="sec3_p" rows="3" class="w-full border p-2 rounded">{{ old('sec3_p', $indexData->sec3_p) }}</textarea>
                                    </div>

                                    <div class="grid md:grid-cols-2 gap-4">
                                        <div>
                                            <label class="block font-medium mb-1">Teks Tombol</label>
                                            <input type="text" name="sec3_button_text"
                                                class="w-full border p-2 rounded"
                                                value="{{ old('sec3_button_text', $indexData->sec3_button_text) }}">
                                        </div>
                                        <div>
                                            <label class="block font-medium mb-1">Link Tombol</label>
                                            <input type="text" name="sec3_button_link"
                                                class="w-full border p-2 rounded"
                                                value="{{ old('sec3_button_link', $indexData->sec3_button_link) }}">
                                        </div>
                                    </div>

                                    <div>
                                        <label class="block font-medium mb-1">Link Video (YouTube Embed)</label>
                                        <input type="text" name="sec3_video_link"
                                            class="w-full border p-2 rounded"
                                            value="{{ old('sec3_video_link', $indexData->sec3_video_link) }}">
                                        <small class="text-gray-500">Contoh:
                                            https://www.youtube.com/watch?v=VIDEO_ID</small>
                                    </div>
                                </div>
                            </div>

                            {{-- SECTION 4 --}}
                            <div class="border rounded-xl p-5 bg-gray-50">
                                <button type="button"
                                    @click="openSection === 4 ? openSection = null : openSection = 4"
                                    class="flex justify-between items-center w-full text-left font-semibold text-gray-800 text-lg">
                                    <span>🖼️ Section 4 – Highlight / CTA</span>
                                    <span x-text="openSection === 4 ? '−' : '+'"></span>
                                </button>

                                <div x-show="openSection === 4" x-transition class="mt-4 space-y-4">
                                    <p class="text-sm text-gray-500">Bagian yang sering berisi gambar, teks dan tombol
                                        CTA.</p>

                                    <div>
                                        <label class="block font-medium mb-1">Judul</label>
                                        <input type="text" name="sec4_h2" class="w-full border p-2 rounded"
                                            value="{{ old('sec4_h2', $indexData->sec4_h2) }}">
                                    </div>

                                    <div>
                                        <label class="block font-medium mb-1">Paragraf</label>
                                        <textarea name="sec4_p" rows="3" class="w-full border p-2 rounded">{{ old('sec4_p', $indexData->sec4_p) }}</textarea>
                                    </div>

                                    <div class="grid md:grid-cols-2 gap-4">
                                        <div>
                                            <label class="block font-medium mb-1">Teks Tombol</label>
                                            <input type="text" name="sec4_button_text"
                                                class="w-full border p-2 rounded"
                                                value="{{ old('sec4_button_text', $indexData->sec4_button_text) }}">
                                        </div>
                                        <div>
                                            <label class="block font-medium mb-1">Link Tombol</label>
                                            <input type="text" name="sec4_button_link"
                                                class="w-full border p-2 rounded"
                                                value="{{ old('sec4_button_link', $indexData->sec4_button_link) }}">
                                        </div>
                                    </div>

                                    <div x-data="cardsEditor()" x-init="init(@js(old('sec4_cards', $indexData->sec4_cards ?? [])))">
                                        <div class="flex justify-between items-center mb-3">
                                            <h4 class="font-semibold">Kartu Gambar</h4>
                                            <button type="button" @click="add()"
                                                class="bg-blue-600 text-white text-sm px-3 py-1.5 rounded">+
                                                Tambah</button>
                                        </div>

                                        <template x-if="cards.length === 0">
                                            <p class="text-sm text-gray-500">Belum ada kartu. Klik “Tambah”.</p>
                                        </template>

                                        <div class="space-y-4">
                                            <template x-for="(card, i) in cards" :key="i">
                                                <div class="border rounded p-4 bg-white space-y-3">
                                                    <div class="flex justify-between items-center">
                                                        <div class="font-medium">Kartu <span x-text="i+1"></span>
                                                        </div>
                                                        <button type="button" @click="remove(i)"
                                                            class="text-red-600 hover:underline text-sm">Hapus</button>
                                                    </div>

                                                    <div class="grid md:grid-cols-2 gap-4">
                                                        <div>
                                                            <label class="block mb-1">Judul</label>
                                                            <input type="text" class="w-full border p-2 rounded"
                                                                :name="`sec4_cards[${i}][title]`" x-model="card.title">
                                                        </div>
                                                        <div>
                                                            <label class="block mb-1">Gambar (unggah)</label>
                                                            <input type="file" class="w-full border p-2 rounded"
                                                                :name="`sec4_cards[${i}][image]`">
                                                            <small class="text-gray-500">Biarkan kosong jika tidak
                                                                ingin mengganti gambar.</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </template>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            {{-- SECTION 5 --}}
                            <div class="border rounded-xl p-5 bg-gray-50">
                                <button type="button"
                                    @click="openSection === 5 ? openSection = null : openSection = 5"
                                    class="flex justify-between items-center w-full text-left font-semibold text-gray-800 text-lg">
                                    <span>🔢 Section 5 – Counter / Statistik</span>
                                    <span x-text="openSection === 5 ? '−' : '+'"></span>
                                </button>

                                <div x-show="openSection === 5" x-transition class="mt-4 space-y-4">
                                    <p class="text-sm text-gray-500">Kartu angka (misal: 100+ pelanggan, 24/7 support).
                                    </p>

                                    <div x-data="cardsEditor()" x-init="init(@js(old('sec5_cards', $indexData->sec5_cards ?? [])))">
                                        <div class="flex justify-between items-center mb-3">
                                            <h4 class="font-semibold">Kartu Counter</h4>
                                            <button type="button" @click="add({count:'',h2:''})"
                                                class="bg-blue-600 text-white text-sm px-3 py-1.5 rounded">+
                                                Tambah</button>
                                        </div>

                                        <template x-if="cards.length === 0">
                                            <p class="text-sm text-gray-500">Belum ada kartu.</p>
                                        </template>

                                        <div class="space-y-4">
                                            <template x-for="(card, i) in cards" :key="i">
                                                <div class="border rounded p-4 bg-white">
                                                    <div class="grid md:grid-cols-2 gap-4">
                                                        <div>
                                                            <label class="block mb-1">Angka (Count)</label>
                                                            <input type="text" class="w-full border p-2 rounded"
                                                                :name="`sec5_cards[${i}][count]`" x-model="card.count">
                                                        </div>
                                                        <div>
                                                            <label class="block mb-1">Judul</label>
                                                            <input type="text" class="w-full border p-2 rounded"
                                                                :name="`sec5_cards[${i}][h2]`" x-model="card.h2">
                                                        </div>
                                                    </div>
                                                    <div class="mt-2 text-right">
                                                        <button type="button" @click="remove(i)"
                                                            class="text-red-600 text-sm">Hapus</button>
                                                    </div>
                                                </div>
                                            </template>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            {{-- SECTION 6 --}}
                            <div class="border rounded-xl p-5 bg-gray-50">
                                <button type="button"
                                    @click="openSection === 6 ? openSection = null : openSection = 6"
                                    class="flex justify-between items-center w-full text-left font-semibold text-gray-800 text-lg">
                                    <span>📚 Section 6 – Fitur / Info Singkat</span>
                                    <span x-text="openSection === 6 ? '−' : '+'"></span>
                                </button>

                                <div x-show="openSection === 6" x-transition class="mt-4 space-y-4">
                                    <p class="text-sm text-gray-500">Bagian untuk daftar fitur singkat atau info
                                        lainnya.</p>

                                    <div>
                                        <label class="block mb-1 font-medium">Judul</label>
                                        <input type="text" name="sec6_h2" class="w-full border p-2 rounded"
                                            value="{{ old('sec6_h2', $indexData->sec6_h2) }}">
                                    </div>

                                    <div>
                                        <label class="block mb-1 font-medium">Paragraf</label>
                                        <textarea name="sec6_p" rows="2" class="w-full border p-2 rounded">{{ old('sec6_p', $indexData->sec6_p) }}</textarea>
                                    </div>

                                    <div x-data="cardsEditor()" x-init="init(@js(old('sec6_cards', $indexData->sec6_cards ?? [])))">
                                        <div class="flex justify-between items-center mb-3">
                                            <h4 class="font-semibold">Kartu Fitur</h4>
                                            <button type="button" @click="add({h3:'',p:'',img:''})"
                                                class="bg-blue-600 text-white text-sm px-3 py-1.5 rounded">+
                                                Tambah</button>
                                        </div>

                                        <div class="space-y-4">
                                            <template x-for="(card, i) in cards" :key="i">
                                                <div class="border rounded p-4 bg-white space-y-3">
                                                    <div class="grid md:grid-cols-3 gap-4">
                                                        <div>
                                                            <label class="block mb-1">Judul</label>
                                                            <input type="text" class="w-full border p-2 rounded"
                                                                :name="`sec6_cards[${i}][h3]`" x-model="card.h3">
                                                        </div>
                                                        <div>
                                                            <label class="block mb-1">Paragraf</label>
                                                            <input type="text" class="w-full border p-2 rounded"
                                                                :name="`sec6_cards[${i}][p]`" x-model="card.p">
                                                        </div>
                                                        <div>
                                                            <label class="block mb-1">Gambar (unggah)</label>
                                                            <input type="file" class="w-full border p-2 rounded"
                                                                :name="`sec6_cards[${i}][img]`">
                                                            <small class="text-gray-500">Opsional, kosongkan jika tidak
                                                                perlu.</small>
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
                                </div>
                            </div>

                            {{-- SECTION 7 --}}
                            <div class="border rounded-xl p-5 bg-gray-50">
                                <button type="button"
                                    @click="openSection === 7 ? openSection = null : openSection = 7"
                                    class="flex justify-between items-center w-full text-left font-semibold text-gray-800 text-lg">
                                    <span>💬 Section 7 – Testimoni</span>
                                    <span x-text="openSection === 7 ? '−' : '+'"></span>
                                </button>

                                <div x-show="openSection === 7" x-transition class="mt-4 space-y-4">
                                    <p class="text-sm text-gray-500">Masukkan feedback/testimoni pelanggan beserta nama
                                        dan foto (opsional).</p>

                                    <div>
                                        <label class="block mb-1 font-medium">Judul Section (opsional)</label>
                                        <input type="text" name="sec7_h2" class="w-full border p-2 rounded"
                                            value="{{ old('sec7_h2', $indexData->sec7_h2) }}">
                                    </div>

                                    <div x-data="cardsEditor()" x-init="init(@js(old('sec7_cards', $indexData->sec7_cards ?? [])))">
                                        <div class="flex justify-between items-center mb-3">
                                            <h4 class="font-semibold">Testimoni</h4>
                                            <button type="button" @click="add({feedback:'',profile:'',name:''})"
                                                class="bg-blue-600 text-white text-sm px-3 py-1.5 rounded">+
                                                Tambah</button>
                                        </div>

                                        <div class="space-y-4">
                                            <template x-for="(card, i) in cards" :key="i">
                                                <div class="border rounded p-4 bg-white space-y-3">
                                                    <div>
                                                        <label class="block mb-1">Feedback</label>
                                                        <textarea class="w-full border p-2 rounded" :name="`sec7_cards[${i}][feedback]`" x-model="card.feedback"></textarea>
                                                    </div>
                                                    <div class="grid md:grid-cols-2 gap-4">
                                                        <div>
                                                            <label class="block mb-1">Foto Profil (unggah)</label>
                                                            <input type="file" class="w-full border p-2 rounded"
                                                                :name="`sec7_cards[${i}][profile]`">
                                                        </div>
                                                        <div>
                                                            <label class="block mb-1">Nama</label>
                                                            <input type="text" class="w-full border p-2 rounded"
                                                                :name="`sec7_cards[${i}][name]`" x-model="card.name">
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

                                </div>
                            </div>

                        </div>

                        {{-- Floating Save Button --}}
                        <div class="fixed bottom-6 right-6 z-50">
                            <button type="submit"
                                class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-6 py-3 rounded-lg shadow-lg transition">
                                💾 Simpan Perubahan
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        {{-- Alpine component for repeaters --}}
        <script>
            function cardsEditor() {
                return {
                    cards: [],
                    init(initial = []) {
                        this.cards = Array.isArray(initial) ? JSON.parse(JSON.stringify(initial)) : [];
                    },
                    add(payload = {}) {
                        this.cards.push(JSON.parse(JSON.stringify(payload)));
                    },
                    remove(i) {
                        this.cards.splice(i, 1);
                    }
                }
            }
        </script>
    </x-slot>
</x-app-layout>
