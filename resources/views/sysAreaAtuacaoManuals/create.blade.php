@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="pull-left">Create New sysAreaAtuacaoManual</h1>
        </div>
    </div>

    @include('core-templates::common.errors')

    <div class="row">
        {!! Form::open(['route' => 'sysAreaAtuacaoManuals.store']) !!}

            @include('sysAreaAtuacaoManuals.fields')

        {!! Form::close() !!}
    </div>
@endsection
