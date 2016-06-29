@extends('layouts.app')

@section('content')
    @include('telefones.show_fields')

    <div class="form-group">
           <a href="{!! route('telefones.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
