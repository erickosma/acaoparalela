@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit SysAreaAtuacao</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($sysAreaAtuacao, ['route' => ['sysAreaAtuacaos.update', $sysAreaAtuacao->id], 'method' => 'patch']) !!}

            @include('gerados.sysAreaAtuacaos.fields')

            {!! Form::close() !!}
        </div>
@endsection
