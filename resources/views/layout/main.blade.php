<!DOCTYPE html>
<html lang="en">
    <head>
        @include('layout.partials.head')
    </head>
    <body class="d-flex flex-column min-vh-100">
        @include('layout.partials.nav')
        @yield('title')
        @yield('content')
        @include('layout.partials.footer')
        @include('layout.partials.footer-scripts')
    </body>
</html>