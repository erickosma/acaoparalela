<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Id Area Atuacao Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_area_atuacao', 'Id Area Atuacao:') !!}
    {!! Form::number('id_area_atuacao', null, ['class' => 'form-control']) !!}
</div>

<!-- bootstrap / Toggle Switch Manual Field -->
<div class="form-group col-sm-2">
    {!! Form::label('manual', 'Manual:') !!} <br>
    <label class="checkbox-inline">
     {!! Form::checkbox('manual', 1, true,  ['data-toggle' => 'toggle', 'data-size' => 'small', 'data-onstyle'=>'success', 'data-offstyle' => 'danger', 'data-on' => '<i class="fa fa-check"></i> ON' , 'data-off' => '<i class="fa fa-times"></i> Off']); !!}
        {{-- See docs for available options --}}
    </label>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('userAreaAtuacaos.index') !!}" class="btn btn-default">Cancel</a>
</div>
