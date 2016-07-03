@extends('layouts.app')

@section('content')
    @include('ajudas.show_fields')

    <div class="form-group">
           <a href="{!! route('ajudas.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
