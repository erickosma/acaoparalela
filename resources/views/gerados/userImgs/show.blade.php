@extends('layouts.app')

@section('content')
    @include('gerados.userImgs.show_fields')

    <div class="form-group">
           <a href="{!! route('userImgs.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
