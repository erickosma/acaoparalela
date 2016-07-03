<table class="table table-responsive" id="ajudas-table">
    <thead>
        <th>Titulo</th>
        <th>Descricao</th>
        <th>Foto</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($ajudas as $ajuda)
        <tr>
            <td>{!! $ajuda->titulo !!}</td>
            <td>{!! $ajuda->descricao !!}</td>
            <td>{!! $ajuda->foto !!}</td>
            <td>
                {!! Form::open(['route' => ['ajudas.destroy', $ajuda->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('ajudas.show', [$ajuda->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('ajudas.edit', [$ajuda->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
