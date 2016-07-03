@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit userImg</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($userImg, ['route' => ['userImgs.update', $userImg->id], 'method' => 'patch']) !!}

            @include('gerados.userImgs.fields')

            {!! Form::close() !!}
        </div>
@endsection
