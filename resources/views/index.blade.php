<x-layout :title="$title" :activePage="$activePage">
    @section('page')
        <main class="bg-main h-screen relative font-ubuntu flex items-center justify-start">
            <div class="absolute inset-0 bg-black bg-opacity-30 backdrop-blur-sm"></div>
            <div class="relative z-10 text-slate-100 pt-20 px-6 space-y-4">
                <h2 class="text-lg font-semibold uppercase">Welcome To Xoni Agency</h2>
                <h1 class="text-5xl font-bold uppercase lg:text-7xl">Delivers More <br class="hidden md:block"> Than Expected
                </h1>
                <p class="text-md font-medium text-base md:pr-80 ">Lorem ipsum dolor sit amet consectetur, adipisicing
                    elit.
                    Tenetur <br class="hidden lg:block">
                    quaerat,
                    repellendus iure ipsa quasi
                    nesciunt.</p>
                <button
                    class="transition duration-300 bg-slate-100 text-sky-800 py-2 px-4 rounded-xl font-bold text-md uppercase hover:bg-sky-800 hover:text-slate-100">Start
                    Now</button>
            </div>
        </main>

        <section class="bg-white font-ubuntu">
            <div class="px-6 pt-20 pb-24 space-y-10 md:px-24">
                <div class="text-center text-gray-900 space-y-4">
                    <h1 class="text-4xl font-bold uppercase">We Are Creative Agency</h1>
                    <p class="text-sm opacity-60">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat alias
                        consectetur neque! Repudiandae doloremque aperiam sequi laborum impedit, incidunt obcaecati eos illo
                        sit modi labore, iure odio assumenda nesciunt voluptatem.</p>
                </div>

                <div class="flex justify-center">
                    <div class="bg-white rounded-lg text-center grid grid-cols-1 gap-y-10 md:grid-cols-3 md:gap-x-6 ">
                        <div class="space-y-4 border border-gray-900 p-6">
                            <div class="flex justify-center">
                                <svg class="w-10 h-10 text-gray-900 mb-3" xmlns="http://www.w3.org/2000/svg" height="24px"
                                    viewBox="0 -960 960 960" width="24px" fill="#075985">
                                    <path
                                        d="M480-80q-26 0-47-12.5T400-126q-33 0-56.5-23.5T320-206v-142q-59-39-94.5-103T190-590q0-121 84.5-205.5T480-880q121 0 205.5 84.5T770-590q0 77-35.5 140T640-348v142q0 33-23.5 56.5T560-126q-12 21-33 33.5T480-80Zm-80-126h160v-36H400v36Zm0-76h160v-38H400v38Zm-8-118h58v-108l-88-88 42-42 76 76 76-76 42 42-88 88v108h58q54-26 88-76.5T690-590q0-88-61-149t-149-61q-88 0-149 61t-61 149q0 63 34 113.5t88 76.5Zm88-162Zm0-38Z" />
                                </svg>
                            </div>
                            <h5 class="mb-2 text-xl font-semibold tracking-tight text-gray-900">CREATIVE WORKS
                            </h5>
                            <p class="mb-3 font-normal text-gray-900 opacity-60">curabitur ullamcorper ultricies nisi. Nam
                                eget dui.
                                Etiam
                                rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero</p>
                        </div>

                        <div class="space-y-4 border border-gray-900 p-6">
                            <div class="flex justify-center">
                                <svg class="w-10 h-10 text-gray-900 mb-3" xmlns="http://www.w3.org/2000/svg" height="24px"
                                    viewBox="0 -960 960 960" width="24px" fill="#075985">
                                    <path
                                        d="M120-120v-80l80-80v160h-80Zm160 0v-240l80-80v320h-80Zm160 0v-320l80 81v239h-80Zm160 0v-239l80-80v319h-80Zm160 0v-400l80-80v480h-80ZM120-327v-113l280-280 160 160 280-280v113L560-447 400-607 120-327Z" />
                                </svg>
                            </div>
                            <h5 class="mb-2 text-xl font-semibold tracking-tight text-gray-900">BUSINESS PROGRESS
                            </h5>
                            <p class="mb-3 font-normal text-gray-900 opacity-60">curabitur ullamcorper ultricies nisi. Nam
                                eget dui.
                                Etiam
                                rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero</p>
                        </div>

                        <div class="space-y-4 border border-gray-900 p-6">
                            <div class="flex justify-center">
                                <svg class="w-10 h-10 text-gray-900 mb-3" xmlns="http://www.w3.org/2000/svg" height="24px"
                                    viewBox="0 -960 960 960" width="24px" fill="#075985">
                                    <path
                                        d="M352-120H200q-33 0-56.5-23.5T120-200v-152q48 0 84-30.5t36-77.5q0-47-36-77.5T120-568v-152q0-33 23.5-56.5T200-800h160q0-42 29-71t71-29q42 0 71 29t29 71h160q33 0 56.5 23.5T800-720v160q42 0 71 29t29 71q0 42-29 71t-71 29v160q0 33-23.5 56.5T720-120H568q0-50-31.5-85T460-240q-45 0-76.5 35T352-120Zm-152-80h85q24-66 77-93t98-27q45 0 98 27t77 93h85v-240h80q8 0 14-6t6-14q0-8-6-14t-14-6h-80v-240H480v-80q0-8-6-14t-14-6q-8 0-14 6t-6 14v80H200v88q54 20 87 67t33 105q0 57-33 104t-87 68v88Zm260-260Z" />
                                </svg>
                            </div>
                            <h5 class="mb-2 text-xl font-semibold tracking-tight text-gray-900">EASY CUSTOMIZE

                            </h5>
                            <p class="mb-3 font-normal text-gray-900 opacity-60">curabitur ullamcorper ultricies nisi. Nam
                                eget dui.
                                Etiam
                                rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-slate-100 font-ubuntu">
            <div class="py-20 px-4 grid grid-cols-1 gap-y-8 md:grid-cols-2 md:space-x-4 lg:px-20">
                <div class="relative overflow-hidden" style="padding-top: 56.25%;">
                    <iframe class="absolute top-0 left-0 w-full h-full"
                        src="https://www.youtube.com/embed/rSTO0VrV38Y?si=Ix2f184YVrkpnKqI" title="YouTube video player"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>

                <div class="space-y-6">
                    <h1 class="text-5xl font-medium">WE HELP BRANDS TO CONNECT AND GROW ON LARGE</h1>
                    <p class="text-sm opacity-60">Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.
                        Phasellus viverra
                        nulla metus varius
                        laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper
                        ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus

                        Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus</p>
                    <button
                        class="transition duration-300 bg-white text-sky-800 py-2 px-4 rounded-xl font-bold text-md uppercase hover:bg-sky-800 hover:text-white">Start
                        Now</button>
                </div>
            </div>
        </section>
    @endsection
</x-layout>
