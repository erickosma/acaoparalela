<table class="table table-responsive" id="telefones-table">
    <thead>
        <th>User Id</th>
        <th>Telefone</th>
        <th>Tipo</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($telefones as $telefone)
        <tr>
            <td>{!! $telefone->user_id !!}</td>
            <td>{!! $telefone->telefone !!}</td>
            <td>{!! $telefone->tipo !!}</td>
            <td>
                {!! Form::open(['route' => ['telefones.destroy', $telefone->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('telefones.show', [$telefone->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('telefones.edit', [$telefone->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
