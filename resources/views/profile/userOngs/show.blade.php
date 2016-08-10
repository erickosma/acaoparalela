@extends('layouts.app')

@section('content')
    @include('gerados.userOngs.show_fields')

    <div class="form-group">
           <a href="{!! route('userOngs.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
