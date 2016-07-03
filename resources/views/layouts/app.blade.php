<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        @if (!empty($titlePage ))
            {!! $titlePage !!}
        @else
            Ação paralela
        @endif
    </title>


    <link rel="stylesheet" href="{{ elixir('build/css/site.css') }}">
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>

    <link rel="shortcut icon" href="{!! asset("/build/build/images/ico/favicon.ico") !!}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
          href="{!! asset("/build/build/images/ico/apple-touch-icon-144-precomposed.png") !!}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
          href="{!! asset("/build/build/images/ico/apple-touch-icon-114-precomposed.png") !!}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72"
          href="{!! asset("/build/build/images/ico/apple-touch-icon-72-precomposed.png") !!}">
    <link rel="apple-touch-icon-precomposed"
          href="{!! asset("/build/build/images/ico/apple-touch-icon-57-precomposed.png") !!}">


    @yield('style')

</head>
<body id="app-layout" class="homepage">

<header id="header">

    @include('layouts.top')

    @include('layouts.menu')


</header><!--/header-->


@yield('content')




@include('layouts.footer')


<script src="{!!  elixir('build/js/site.js')  !!}"></script>


@yield('scripts')

</body>
</html>
