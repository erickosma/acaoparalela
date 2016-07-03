@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit UserProfessional</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($userProfessional, ['route' => ['userProfessionals.update', $userProfessional->id], 'method' => 'patch']) !!}

            @include('gerados.userProfessionals.fields')

            {!! Form::close() !!}
        </div>
@endsection
