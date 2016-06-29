<table class="table table-responsive" id="sysAreaAtuacaoManuals-table">
    <thead>
        <th>Nome</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($sysAreaAtuacaoManuals as $sysAreaAtuacaoManual)
        <tr>
            <td>{!! $sysAreaAtuacaoManual->nome !!}</td>
            <td>
                {!! Form::open(['route' => ['sysAreaAtuacaoManuals.destroy', $sysAreaAtuacaoManual->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('sysAreaAtuacaoManuals.show', [$sysAreaAtuacaoManual->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('sysAreaAtuacaoManuals.edit', [$sysAreaAtuacaoManual->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
