<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Endereco Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('endereco_id', 'Endereco Id:') !!}
    {!! Form::number('endereco_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Nome Fantasia Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nome_fantasia', 'Nome Fantasia:') !!}
    {!! Form::text('nome_fantasia', null, ['class' => 'form-control']) !!}
</div>

<!-- Razao Social Field -->
<div class="form-group col-sm-6">
    {!! Form::label('razao_social', 'Razao Social:') !!}
    {!! Form::text('razao_social', null, ['class' => 'form-control']) !!}
</div>

<!-- Desc Ong Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('desc_ong', 'Desc Ong:') !!}
    {!! Form::textarea('desc_ong', null, ['class' => 'form-control', 'rows' => '5']) !!}
</div>


<!-- Site Field -->
<div class="form-group col-sm-6">
    {!! Form::label('site', 'Site:') !!}
    {!! Form::text('site', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('userOngs.index') !!}" class="btn btn-default">Cancel</a>
</div>
