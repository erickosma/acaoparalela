@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit Telefone</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($telefone, ['route' => ['telefones.update', $telefone->id], 'method' => 'patch']) !!}

            @include('gerados.telefones.fields')

            {!! Form::close() !!}
        </div>
@endsection
