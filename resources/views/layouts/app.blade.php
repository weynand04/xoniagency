<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <script src="https://unpkg.com/alpinejs" defer></script>


        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            <livewire:layout.navigation />

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>



        {{-- Alpine helper --}}
        <script>
            function cardsEditor() {
                return {
                    cards: [],
                    init(initial) {
                        // Jika ada data lama/DB, pakai itu, kalau kosong, mulai 1 card kosong (opsional)
                        this.cards = Array.isArray(initial) && initial.length ? initial : [];
                    },
                    add() {
                        this.cards.push({
                            title: '',
                            description: ''
                        });
                    },
                    remove(i) {
                        this.cards.splice(i, 1);
                    }
                }
            }
        </script>
    </body>

</html>
