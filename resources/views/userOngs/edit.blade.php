@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit UserOng</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($userOng, ['route' => ['userOngs.update', $userOng->id], 'method' => 'patch']) !!}

            @include('userOngs.fields')

            {!! Form::close() !!}
        </div>
@endsection
