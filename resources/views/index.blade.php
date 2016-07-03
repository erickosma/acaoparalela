@extends('layouts.app')

@section('content')

    @include('index.carrocel')

    @include('index.features')

    @include('ajudas.recent')

    @include('servicos.index')

    @include('faqs.testimonials')

    @include('ongs.cadastradas')

    @include('faleconosco.contato')

@endsection
