<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.partials.meta')

    <title>{{ config('app.name', 'Laravel') }}</title>

   @include('layouts.partials.link')
</head>
<body>

    @yield('navbar')
    <div class="wrapper">
        @yield('content')
    </div>

    @include('layouts.partials.footer')
    @include('layouts.partials.script')
    @yield('script')
</body>
</html>
