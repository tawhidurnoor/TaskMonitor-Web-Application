<!DOCTYPE html>
<html lang="en">

<head>

    @include('frontend.layouts.partial.meta')

    @yield('title')

    @include('frontend.layouts.partial.styles')
</head>

<body>

    @include('frontend.layouts.partial.placeholder')

    @include('frontend.layouts.partial.navbar')

    @yield('body')

    @include('frontend.layouts.partial.footer')

    @include('frontend.layouts.partial.scripts')

</body>

</html>
