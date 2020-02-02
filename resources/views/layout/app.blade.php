<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <meta content="initial-scale=1, shrink-to-fit=no, width=device-width" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ mix('vendor/css/vendor.css') }}">
    <link rel="stylesheet" href="{{ mix('app/css/app.css') }}">

    @yield('style')

</head>
<body class="bg-light h-100" id="main">


    @if($isMobile)
        @include('layout.top-mobile-navbar')
    @else
    <header id="header">
        @include('layout.top-navbar')
    </header>
    @endif

    @yield('content')

    <div class="mb-5">&nbsp;</div>
    @if($isMobile)
        <header id="header">
            @include('layout.mobile-navbar')
        </header>
    @else
        @include('layout.footer')
    @endif


    <script src="{{ mix('vendor/js/vendor.js') }}"></script>
    <script src="{{ mix('app/js/app.js') }}"></script>
    @yield('script')
    <script type="text/javascript"></script>
</body>
</html>
