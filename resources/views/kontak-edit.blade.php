<x-app-layout :kontakData="$kontakData" :title="$title">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard &raquo; Edit {{ $title }}
        </h2>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <form method="POST" action="{{ route('kontak.update') }}">
                            @csrf

                            {{-- FLASH MESSAGE --}}
                            @if (session('success'))
                                <div class="p-3 mb-3 bg-green-100 text-green-700 rounded">
                                    {{ session('success') }}
                                </div>
                            @endif

                            {{-- SECTION KONTAK --}}
                            <div class="border-b pb-4 mb-6">
                                <h3 class="text-lg font-bold mb-4">Kontak</h3>

                                <div class="mb-4">
                                    <label class="block mb-1 font-medium">WhatsApp</label>
                                    <input type="text" name="whatsapp" class="w-full border p-2 rounded"
                                        placeholder="Contoh: 0815-2155-0913"
                                        value="{{ old('whatsapp', $kontakData->whatsapp ?? '') }}">
                                </div>

                                <div class="mb-4">
                                    <label class="block mb-1 font-medium">Email</label>
                                    <input type="email" name="email" class="w-full border p-2 rounded"
                                        placeholder="Contoh: email@example.com"
                                        value="{{ old('email', $kontakData->email ?? '') }}">
                                </div>

                                <div class="mb-4">
                                    <label class="block mb-1 font-medium">Alamat</label>
                                    <textarea name="alamat" class="w-full border p-2 rounded" rows="3"
                                        placeholder="Contoh: Jl. Kridasana No. 132 Kelurahan Pasiran">{{ old('alamat', $kontakData->alamat ?? '') }}</textarea>
                                </div>

                                <div class="mb-4">
                                    <label class="block mb-1 font-medium">Jam Kerja</label>
                                    <input type="text" name="jam_kerja" class="w-full border p-2 rounded"
                                        placeholder="Contoh: 08:00 - 20:00 WIB"
                                        value="{{ old('jam_kerja', $kontakData->jam_kerja ?? '') }}">
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
