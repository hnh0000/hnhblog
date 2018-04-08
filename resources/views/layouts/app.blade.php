<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title','HnhBlog')</title>
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}?s=3" rel="stylesheet">
    @stack('styles')
</head>
<body>
    <div id="app" class="index-page">
        @include('layouts._header')
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
    @stack('scripts')

</body>
</html>
