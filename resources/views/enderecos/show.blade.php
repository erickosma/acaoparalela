@extends('layouts.app')

@section('content')
    @include('enderecos.show_fields')

    <div class="form-group">
           <a href="{!! route('enderecos.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
