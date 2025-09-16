<x-layout :title="$title" :activePage="$activePage">
    @section('page')


        {{-- HERO SECTION --}}
        @if (!empty($heroData))
            <header class="bg-main font-ubuntu relative">
                <div class="absolute inset-0 bg-black/40"></div>
                <div class="relative pt-[16rem] pb-[7rem] pl-5 space-y-5 text-slate-100">
                    <h1 class="text-5xl font-bold uppercase md:text-7xl">{{ $heroData['title'] }}</h1>
                    <hr class="w-1/2 lg:w-1/3 border-2">
                </div>
            </header>
        @endif

        {{-- SKILLS SECTION --}}
        <div class="mb-20 mt-8 px-14">
            <h2 class="text-3xl font-bold text-gray-900 mb-10 text-center">Our Skills</h2>
            @if (!empty($skillsData))
                <div class="space-y-6 max-w-2xl mx-auto">
                    @foreach ($skillsData as $skill)
                        <div>
                            <div class="flex justify-between mb-2">
                                <span class="text-sm font-medium text-gray-800 uppercase">
                                    {{ $skill['name'] }}
                                </span>
                                <span class="text-sm font-semibold text-gray-600">
                                    {{ $skill['percentage'] }}%
                                </span>
                            </div>
                            <div class="w-full bg-gray-100 rounded-full h-3">
                                <div class="bg-sky-700 h-3 rounded-full transition-all duration-500"
                                    style="width: {{ $skill['percentage'] }}%"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-center text-gray-500">No skills data available.</p>
            @endif
        </div>

        {{-- COUNTERS SECTION --}}
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mt-16 px-14">
            @if (!empty($countersData))
                @foreach ($countersData as $counter)
                    <div
                        class="text-center bg-white border border-gray-100 p-6 rounded-xl shadow-md hover:shadow-xl transition duration-300">
                        <h3 class="text-4xl font-extrabold text-sky-800">{{ $counter['value'] }}</h3>
                        <p class="mt-2 text-gray-600 font-medium">{{ $counter['title'] }}</p>
                    </div>
                @endforeach
            @endif
        </div>

        {{-- PLANS SECTION --}}
        <div class="mt-24 px-14 pb-10">
            <h2 class="text-3xl font-bold mb-12 text-center text-gray-900">Our Plans</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @if (!empty($plansData))
                    @foreach ($plansData as $plan)
                        <div
                            class="border rounded-2xl shadow-md hover:shadow-2xl transition duration-300 bg-white p-8 flex flex-col">
                            <h3 class="text-2xl font-bold mb-4 text-gray-900">{{ $plan['name'] }}</h3>
                            <p class="text-4xl font-extrabold text-sky-800 mb-4">
                                Rp{{ $plan['price'] }}
                                <span class="text-base text-gray-500 font-medium">
                                    {{ $plan['duration'] }}
                                </span>
                            </p>
                            <ul class="space-y-3 text-gray-700 flex-1">
                                @foreach (explode("\r\n", $plan['features_text']) as $feature)
                                    @php
                                        [$text, $available] = explode(':', $feature);
                                    @endphp
                                    <li class="flex items-center">
                                        @if ($available == 1)
                                            <span class="text-green-500 font-bold mr-2">✔</span>
                                        @else
                                            <span class="text-red-500 font-bold mr-2">✘</span>
                                        @endif
                                        {{ $text }}
                                    </li>
                                @endforeach
                            </ul>
                            <a class="mt-6 w-full bg-sky-800 text-white py-3 rounded-xl font-semibold hover:bg-sky-700 transition inline-block text-center"
                                href="https://wa.me/6287736740162">
                                Start Now
                            </a>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>

    @endsection
</x-layout>
