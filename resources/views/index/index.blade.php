@extends('layout.app')


@section('style')
    <link rel="stylesheet" href="{{ mix('app/css/home.css') }}">
@endsection

@section('script')
    <script src="{{ mix('app/js/home.js') }}"></script>

@endsection
@section('content')


    <div class="m-0 p-0">
        @include('index.search')
        @include('index.features')

    </div>
@endsection
