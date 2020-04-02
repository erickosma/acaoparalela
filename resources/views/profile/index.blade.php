@extends('layout.app')


@section('style')
    <link rel="stylesheet" href="{{ mix('app/css/home.css') }}">
@endsection

@section('script')
    <!--    <script src="{{ mix('app/js/home.js') }}"></script> -->

@endsection
@section('content')


    <div class="m-0 p-0">
        <section id="profile-page" class="mx-auto w-100 mt-3 bg-light justify-content-center mb-5">
            profile


            <a href="{{ route('logout') }}" id="logout">Sair</a>
        </section>
    </div>
    <div class="mb-5 p-0">
    </div>
@endsection

