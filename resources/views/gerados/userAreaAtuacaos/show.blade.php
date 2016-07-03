@extends('layouts.app')

@section('content')
    @include('gerados.userAreaAtuacaos.show_fields')

    <div class="form-group">
           <a href="{!! route('userAreaAtuacaos.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
