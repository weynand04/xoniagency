<x-app-layout :kontakData="$kontakData" :title="$title">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard &raquo; Edit {{ $title }}
        </h2>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <form method="POST" action="{{ route('kontak.update') }}" class="space-y-6">
                            @csrf

                            {{-- FLASH MESSAGE --}}
                            @if (session('success'))
                                <div class="p-3 bg-green-100 text-green-700 border border-green-300 rounded">
                                    {{ session('success') }}
                                </div>
                            @endif

                            {{-- KONTAK --}}
                            <div class="border rounded-xl bg-gray-50 p-5 space-y-5 shadow-sm">

                                <h3 class="text-xl font-semibold">📞 Kontak</h3>

                                <div>
                                    <label class="block mb-1 font-medium">WhatsApp</label>
                                    <input type="text" name="whatsapp" class="w-full border p-3 rounded-lg"
                                        placeholder="0815-2155-0913"
                                        value="{{ old('whatsapp', $kontakData->whatsapp ?? '') }}">
                                </div>

                                <div>
                                    <label class="block mb-1 font-medium">Email</label>
                                    <input type="email" name="email" class="w-full border p-3 rounded-lg"
                                        placeholder="email@example.com"
                                        value="{{ old('email', $kontakData->email ?? '') }}">
                                </div>

                                <div>
                                    <label class="block mb-1 font-medium">Alamat</label>
                                    <textarea name="alamat" rows="3" class="w-full border p-3 rounded-lg"
                                        placeholder="Contoh: Jl. Kridasana No. 132 Kelurahan Pasiran">{{ old('alamat', $kontakData->alamat ?? '') }}</textarea>
                                </div>

                                <div>
                                    <label class="block mb-1 font-medium">Jam Kerja</label>
                                    <input type="text" name="jam_kerja" class="w-full border p-3 rounded-lg"
                                        placeholder="08:00 - 20:00 WIB"
                                        value="{{ old('jam_kerja', $kontakData->jam_kerja ?? '') }}">
                                </div>

                            </div>

                            {{-- BUTTON --}}
                            <div class="pt-2 text-right">
                                <button type="submit"
                                    class="bg-blue-600 text-white px-5 py-2.5 rounded-lg shadow hover:bg-blue-700 transition">
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
