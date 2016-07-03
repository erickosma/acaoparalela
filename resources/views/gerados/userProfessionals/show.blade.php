@extends('layouts.app')

@section('content')
    @include('gerados.userProfessionals.show_fields')

    <div class="form-group">
           <a href="{!! route('userProfessionals.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
