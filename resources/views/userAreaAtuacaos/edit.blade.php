@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit UserAreaAtuacao</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($userAreaAtuacao, ['route' => ['userAreaAtuacaos.update', $userAreaAtuacao->id], 'method' => 'patch']) !!}

            @include('userAreaAtuacaos.fields')

            {!! Form::close() !!}
        </div>
@endsection
