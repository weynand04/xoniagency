<x-layout :title="$title" :activePage="$activePage" :indexData="$indexData">
    @section('page')
        <main class="bg-main h-screen relative font-ubuntu flex items-center justify-start">
            <div class="absolute inset-0 bg-black bg-opacity-30 backdrop-blur-sm"></div>
            <div class="relative z-10 text-slate-100 pt-20 px-6 space-y-4">
                <h2 class="text-lg font-semibold uppercase">{{ $indexData->main_h2 }}</h2>
                <h1 class="text-5xl font-bold uppercase lg:text-7xl lg:max-w-2xl">{{ $indexData->main_h1 }}
                </h1>
                <p class="text-md font-medium text-base md:pr-80 ">{{ $indexData->main_p }}</p>
                <a href="{{ $indexData->main_button_link }}"
                    class="inline-block transition duration-300 bg-slate-100 text-sky-800 py-2 px-4 rounded-xl font-bold text-md uppercase  hover:bg-sky-800 hover:text-slate-100">
                    {{ $indexData->main_button_text }}
                </a>
            </div>
        </main>

        <section class="bg-white font-ubuntu">
            <div class="px-6 pt-20 pb-24 space-y-10 md:px-24">
                <div class="text-center text-gray-900 space-y-4">
                    <h2 class="text-4xl font-bold uppercase">{{ $indexData->sec2_h2 }}</h2>
                    <p class="text-sm opacity-60">{{ $indexData->sec2_p }}</p>
                </div>

                <div class="flex justify-center">
                    <div class="bg-white rounded-lg text-center grid grid-cols-1 gap-y-10 md:grid-cols-3 md:gap-x-6 ">
                        @foreach ($indexData->sec2_cards as $card)
                            <div class="space-y-4 border border-gray-900/50 p-6">
                                <div class="flex justify-center">
                                    <svg class="w-10 h-10 text-gray-900 mb-3" xmlns="http://www.w3.org/2000/svg"
                                        height="24px" viewBox="0 -960 960 960" width="24px" fill="#075985">
                                        <path
                                            d="M480-80q-26 0-47-12.5T400-126q-33 0-56.5-23.5T320-206v-142q-59-39-94.5-103T190-590q0-121 84.5-205.5T480-880q121 0 205.5 84.5T770-590q0 77-35.5 140T640-348v142q0 33-23.5 56.5T560-126q-12 21-33 33.5T480-80Zm-80-126h160v-36H400v36Zm0-76h160v-38H400v38Zm-8-118h58v-108l-88-88 42-42 76 76 76-76 42 42-88 88v108h58q54-26 88-76.5T690-590q0-88-61-149t-149-61q-88 0-149 61t-61 149q0 63 34 113.5t88 76.5Zm88-162Zm0-38Z" />
                                    </svg>
                                </div>
                                <h3 class="mb-2 text-xl font-semibold tracking-tight text-gray-900">
                                    {{ $card['title'] }}
                                </h3>
                                <p class="mb-3 font-normal text-gray-900 opacity-60">
                                    {{ $card['description'] }}
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-slate-200 font-ubuntu">
            <div class="py-20 px-4 grid grid-cols-1 gap-y-8 md:grid-cols-2 md:space-x-4 lg:px-20">
                <div class="relative overflow-hidden" style="padding-top: 56.25%;">
                    <iframe class="absolute top-0 left-0 w-full h-full"
                        src="{{ $indexData->sec3_video_link ?? 'https://www.youtube.com/embed/defaultVideo' }}"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>

                <div class="space-y-6 text-gray-900">
                    <h2 class="text-5xl font-medium">{{ $indexData->sec3_h2 }}</h2>
                    <p class="text-sm opacity-60">{{ $indexData->sec3_p }}</p>
                    <a href="{{ $indexData->sec3_button_link }}"
                        class="inline-block transition duration-300 bg-white text-sky-800 py-2 px-4 rounded-xl font-bold text-md uppercase hover:bg-sky-800 hover:text-white">
                        {{ $indexData->sec3_button_text }}
                    </a>
                </div>
            </div>
        </section>


        <section class="bg-white font-ubuntu">
            <div class="py-20 px-6 grid grid-cols-1 gap-y-8 lg:grid-cols-2 lg:items-center lg:gap-x-4 lg:px-20">
                <div class="space-y-6">
                    <h2 class="text-4xl font-semibold uppercase md:text-5xl">{{ $indexData->sec4_h2 }}</h2>
                    <p class="text-sm opacity-80">{{ $indexData->sec4_p }}</p>
                    <a href="{{ $indexData->sec4_button_link }}"
                        class="inline-block transition duration-300 bg-sky-800 text-white py-2 px-4 font-bold text-md uppercase hover:bg-white hover:text-sky-800 hover:ring hover:ring-sky-800">{{ $indexData->sec4_button_text }}</a>
                </div>

                <div class="grid grid-cols-1 gap-y-6 lg:grid-cols-2 lg:gap-x-6">
                    @foreach ($indexData->sec4_cards as $card)
                        <div class="space-y-4 border border-gray-900/50 p-6 text-center">
                            <div class="flex justify-center">
                                <img src="{{ asset('storage/' . $card['image']) }}" alt="{{ $card['title'] }}"
                                    class="w-10 h-10 mb-3">

                            </div>
                            <h3 class="mb-2 text-xl font-semibold tracking-tight text-gray-900">
                                {{ $card['title'] }}
                            </h3>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="relative bg-main bg-cover bg-center bg-fixed lg:h-auto font-ubuntu">
            <div class="absolute inset-0 bg-black opacity-60"></div>
            <div class="relative z-10 flex items-center justify-center h-full lg:h-auto">
                <div class="text-center max-w-7xl px-4 lg:px-8 lg:py-16">
                    <div class="mt-8 mb-8 grid grid-cols-1 gap-14 lg:grid-cols-4 lg:grid-rows-1 lg:gap-20">
                        @foreach ($indexData->sec5_cards as $card)
                            <div class="space-y-2">
                                <h2 class="text-6xl text-slate-100 font-semibold counter"
                                    data-target="{{ $card['count'] }}">0</h2>
                                <p class="text-slate-100 uppercase font-semibold whitespace-nowrap">{{ $card['h2'] }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-white font-ubuntu">
            <div class="py-20 px-6 space-y-6 lg:px-20">
                <div class="text-center space-y-6">
                    <h2 class="text-4xl font-bold md:text-5xl text-gray-900">{{ $indexData->sec6_h2 }}</h2>
                    <p class="text-sm text-gray-900 opacity-80">{{ $indexData->sec6_h2 }}</p>
                </div>

                <div class="grid grid-cols-1 text-center gap-y-6 lg:grid-cols-4 lg:gap-x-4">
                    @foreach ($indexData->sec6_cards as $card)
                        <div class="bg-white border border-gray-900/50 rounded-lg shadow">
                            <img class="rounded-t-lg" src="{{ asset('storage/' . $card['img']) }}" alt="" />
                            <div class="p-5">
                                <h3 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $card['h3'] }}</h3>
                                <p class="mb-3 font-normal text-gray-700">{{ $card['p'] }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="bg-white font-ubuntu">
            <div class="py-20 px-6 space-y-8 md:px-20">
                <div class="text-center">
                    <h2 class="text-4xl text-gray-900 font-bold md:text-5xl">{{ $indexData->sec7_h2 }}
                    </h2>
                </div>

                <div class="grid grid-cols-1 gap-y-6 md:grid-cols-2 md:gap-x-6">
                    @foreach ($indexData->sec7_cards as $card)
                        <figure
                            class="flex flex-col items-center justify-center p-8 text-center bg-white border border-gray-900 rounded-t-lg md:rounded-t-none md:rounded-ss-lg md:border-e">
                            <blockquote class="max-w-2xl mx-auto mb-4 text-gray-900 lg:mb-8">
                                <p class="my-4">"{{ $card['feedback'] }}""
                                </p>
                            </blockquote>
                            <figcaption class="flex flex-col items-center justify-center text-center">
                                <img class="rounded-full w-9 h-9 mb-2" src="{{ asset('storage/' . $card['profile']) }}"
                                    alt="profile picture">
                                <div class="font-medium">
                                    <div>{{ $card['name'] }}</div>
                                </div>
                            </figcaption>

                        </figure>
                    @endforeach
                </div>
            </div>
        </section>
    @endsection
</x-layout>
