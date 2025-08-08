<!doctype html>
<html lang="id">

    <x-head :title="$title"></x-head>

    <body>
        <x-nav-bar :activePage="$activePage" :indexData="$indexData"></x-nav-bar>

        @yield('page')

        <x-end-body></x-end-body>

        <x-footer :activePage="$activePage"></x-footer>
    </body>

</html>
