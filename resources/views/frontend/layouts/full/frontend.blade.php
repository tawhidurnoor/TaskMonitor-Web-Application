<!DOCTYPE html>
<html lang="en">

<head>

  @include('frontend.layouts.partial.meta')

  @include('frontend.layouts.partial.styles')

</head>


<body>

  @include('frontend.layouts.partial.header')

  @yield('body')

  @include('frontend.layouts.partial.footer')

  @include('frontend.layouts.partial.scripts')

</body>

</html>