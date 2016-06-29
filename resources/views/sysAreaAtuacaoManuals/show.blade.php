@extends('layouts.app')

@section('content')
    @include('sysAreaAtuacaoManuals.show_fields')

    <div class="form-group">
           <a href="{!! route('sysAreaAtuacaoManuals.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
