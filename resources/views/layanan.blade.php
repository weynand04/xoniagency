<x-layout :title="$title" :activePage="$activePage">
    @section('page')
        {{-- Hero --}}
        <header class="bg-main font-ubuntu relative">
            <div class="absolute inset-0 bg-black/40"></div>
            <div class="relative pt-[16rem] pb-[7rem] pl-5 space-y-5 text-slate-100">
                <h1 class="text-5xl font-bold uppercase md:text-7xl">{{ $page->hero_h1 }}</h1>
                <hr class="w-1/2 lg:w-1/3 border-2">
            </div>
        </header>

        {{-- Section 1 - What We Offer --}}
        <main class="bg-white font-ubuntu">
            <div class="py-20 px-8 lg:px-20 space-y-8">
                <div class="text-center">
                    <h1 class="text-4xl font-bold uppercase text-gray-900 lg:text-5xl">
                        {{ $page->sec1_h2 }}
                    </h1>
                </div>

                <div class="text-center grid grid-cols-1 gap-y-4 lg:grid-cols-3 lg:gap-x-4">
                    @foreach ($page->sec1_cards as $card)
                        <div class="p-6 bg-white border border-gray-200 rounded-lg shadow space-y-4">
                            <div class="flex items-center justify-center">
                                {!! $card['icon'] !!}
                            </div>
                            <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900">
                                {{ $card['title'] }}
                            </h5>
                            <p class="mb-3 font-normal text-gray-900/50 text-sm">
                                {{ $card['description'] }}
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
        </main>

        {{-- Section 2 - How We Plan Our Work --}}
        <section class="bg-slate-200 font-ubuntu">
            <div class="py-20 px-8 space-y-6 lg:px-20">
                <div class="text-center text-gray-900 space-y-4">
                    <h1 class="uppercase font-bold text-4xl lg:text-5xl">{{ $page->sec2_h2 }}</h1>
                    <p class="text-sm text-gray-900/50">{{ $page->sec2_p }}</p>
                </div>

                <div class="text-center grid grid-cols-1 gap-y-6 lg:grid-cols-3 lg:gap-x-6">
                    @foreach ($page->sec2_cards as $step)
                        <div class="p-10 bg-white border border-gray-200 rounded-lg shadow space-y-4">
                            <h5 class="mb-2 text-xl font-semibold tracking-tight text-gray-900">
                                {{ $step['step'] }}. {{ $step['title'] }}
                            </h5>
                            <p class="font-normal text-gray-900/50 text-sm">{{ $step['description'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- Section 3 - Skills --}}
        <section class="bg-white">
            <div class="grid grid-cols-1 py-20 px-6 space-y-6 md:grid-cols-2 md:gap-x-8 lg:px-20 items-center">
                <div class="space-y-4">
                    <h1 class="text-4xl font-bold md:text-5xl">{{ $page->sec3_h2 }}</h1>
                    <p>{{ $page->sec3_p }}</p>
                    <button
                        class="transition duration-300 bg-sky-800 text-white py-2 px-4 font-bold text-md uppercase hover:bg-white hover:text-sky-800 hover:ring hover:ring-sky-800">
                        Start Now
                    </button>
                </div>

                <div class="space-y-6">
                    @foreach ($page->sec3_skills as $skill)
                        <dl class="space-y-2">
                            <dt class="text-sm font-bold uppercase text-gray-900">{{ $skill['name'] }}</dt>
                            <dd class="flex items-center mb-3">
                                <div class="w-full bg-slate-100 h-1 me-2">
                                    <div class="bg-sky-800 h-1" style="width: {{ $skill['percentage'] }}%"></div>
                                </div>
                            </dd>
                        </dl>
                    @endforeach
                </div>
            </div>
        </section>
    @endsection
</x-layout>
