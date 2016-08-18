@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="pull-left">Create New UserOng</h1>
        </div>
    </div>

    @include('core-templates::common.errors')

    <div class="row">
        <!-- 'route' => 'userOngs.store'-->
        {!! Form::open([]) !!}

            @include('profile.userOngs.fields')

        {!! Form::close() !!}
    </div>
@endsection
