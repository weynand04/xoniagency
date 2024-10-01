<x-layout :title="$title" :activePage="$activePage">
    @section('page')
        <main class="bg-main h-screen relative font-ubuntu flex items-center justify-center">
            <div class="absolute inset-0 bg-black bg-opacity-30 backdrop-blur-sm"></div>
            <div class="relative z-10 text-slate-100 pt-20 px-6 space-y-4">
                <h2 class="text-lg font-semibold uppercase">Welcome To Xoni Agency</h2>
                <h1 class="text-5xl font-bold uppercase">Delivers More Than Expected</h1>
                <p class="text-md font-medium text-base">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tenetur
                    quaerat,
                    repellendus iure ipsa quasi
                    nesciunt.</p>
                <button
                    class="transition duration-300 bg-slate-100 text-sky-800 py-2 px-4 rounded-xl font-bold text-md uppercase hover:bg-sky-800 hover:text-slate-100">Start
                    Now</button>
            </div>
        </main>
    @endsection
</x-layout>
