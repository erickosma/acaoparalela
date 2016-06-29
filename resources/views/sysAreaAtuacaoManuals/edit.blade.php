@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit sysAreaAtuacaoManual</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($sysAreaAtuacaoManual, ['route' => ['sysAreaAtuacaoManuals.update', $sysAreaAtuacaoManual->id], 'method' => 'patch']) !!}

            @include('sysAreaAtuacaoManuals.fields')

            {!! Form::close() !!}
        </div>
@endsection
