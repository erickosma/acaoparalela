<table class="table table-responsive" id="sysAreaAtuacaos-table">
    <thead>
        <th>Nome</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($sysAreaAtuacaos as $sysAreaAtuacao)
        <tr>
            <td>{!! $sysAreaAtuacao->nome !!}</td>
            <td>
                {!! Form::open(['route' => ['sysAreaAtuacaos.destroy', $sysAreaAtuacao->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('sysAreaAtuacaos.show', [$sysAreaAtuacao->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('sysAreaAtuacaos.edit', [$sysAreaAtuacao->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
