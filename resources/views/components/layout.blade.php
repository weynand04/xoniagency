<!doctype html>
<html lang="en">

<x-head :title="$title"></x-head>

<body>
    <x-nav-bar :activePage="$activePage"></x-nav-bar>

    @yield('page')

    <x-end-body></x-end-body>

    <x-footer :activePage="$activePage"></x-footer>
</body>

</html>
