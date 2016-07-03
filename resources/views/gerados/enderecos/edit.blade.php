@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit Endereco</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($endereco, ['route' => ['enderecos.update', $endereco->id], 'method' => 'patch']) !!}

            @include('gerados.enderecos.fields')

            {!! Form::close() !!}
        </div>
@endsection
