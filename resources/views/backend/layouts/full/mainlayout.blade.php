<!doctype html>
<html class="no-js" lang="">

<head>
    @yield('head')

    @include('backend.layouts.partials.head')
</head>

<body>

    @include('backend.layouts.partials.header')

    @include('backend.layouts.partials.menu')

    <!-- Main Body -->
    @yield('body')
    <!-- Main Body Ends-->

    @include('backend.layouts.partials.footer')

    @include('backend.layouts.partials.scripts')

    @yield('scripts')

</body>

</html>