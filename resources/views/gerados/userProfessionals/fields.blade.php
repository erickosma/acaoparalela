<!-- Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id', 'Id:') !!}
    {!! Form::text('id', null, ['class' => 'form-control']) !!}
</div>

<!-- User Id  Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id ', 'User Id :') !!}
    {!! Form::text('user_id ', null, ['class' => 'form-control']) !!}
</div>

<!-- Endereco Id  Field -->
<div class="form-group col-sm-6">
    {!! Form::label('endereco_id ', 'Endereco Id :') !!}
    {!! Form::number('endereco_id ', null, ['class' => 'form-control']) !!}
</div>

<!-- Data Nascimento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('data_nascimento', 'Data Nascimento:') !!}
    {!! Form::date('data_nascimento', null, ['class' => 'form-control']) !!}
</div>

<!-- Objetivos Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('objetivos', 'Objetivos:') !!}
    {!! Form::textarea('objetivos', null, ['class' => 'form-control', 'rows' => '5']) !!}
</div>


<!-- Horario  Field -->
<div class="form-group col-sm-6">
    {!! Form::label('horario ', 'Horario :') !!}
    {!! Form::text('horario ', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('userProfessionals.index') !!}" class="btn btn-default">Cancel</a>
</div>
