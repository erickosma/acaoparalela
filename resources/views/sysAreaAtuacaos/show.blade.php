@extends('layouts.app')

@section('content')
    @include('sysAreaAtuacaos.show_fields')

    <div class="form-group">
           <a href="{!! route('sysAreaAtuacaos.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
