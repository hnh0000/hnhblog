<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', setting('title'))</title>
    <!-- Styles -->
    <link href="{{ mix('assets/css/app.css') }}" rel="stylesheet">
    {{--cdn--}}
    <link href="https://cdn.bootcss.com/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet">
    <link href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
    <link href="https://cdn.bootcss.com/font-awesome-animation/0.2.1/font-awesome-animation.css" rel="stylesheet">

    <meta name="keywords" content="@yield('keywords',setting('keywords'))"/>
    <meta name="description" content="@yield('description',setting('description'))"/>
    <link rel="icon" href="{{setting('logo')}}" type="image/x-icon"/>

    @stack('styles')
</head>
<body>
<div id="app" class="{{route_class()}}-page">
    @include('layouts._header')
    @yield('content')
    @include('layouts._footer')
</div>

<!-- Scripts -->
<script src="{{ mix('assets/js/app.js') }}"></script>
<script src="https://cdn.bootcss.com/sweetalert/1.1.3/sweetalert-dev.min.js"></script>
<script>
    $(function () { $("[data-toggle='tooltip']").tooltip(); });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

@stack('scripts')

</body>
</html>
