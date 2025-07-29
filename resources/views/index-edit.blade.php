<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard &raquo; Edit Index Page
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (session('success'))
                        <div class="text-green-600 mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('index.update') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="main_h1">Main H1</label>
                            <input type="text" name="main_h1" class="block w-full border"
                                value="{{ old('main_h1', $index->main_h1) }}">
                        </div>

                        <div class="mb-4">
                            <label for="main_p">Main Paragraph</label>
                            <textarea name="main_p" class="block w-full border">{{ old('main_p', $index->main_p) }}</textarea>
                        </div>

                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
                            Simpan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
