<table class="table table-responsive" id="enderecos-table">
    <thead>
        <th>User Id</th>
        <th>Desc</th>
        <th>Complemento</th>
        <th>Bairro</th>
        <th>Cidade Id</th>
        <th>Pais Id</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($enderecos as $endereco)
        <tr>
            <td>{!! $endereco->user_id !!}</td>
            <td>{!! $endereco->desc !!}</td>
            <td>{!! $endereco->complemento !!}</td>
            <td>{!! $endereco->bairro !!}</td>
            <td>{!! $endereco->cidade_id !!}</td>
            <td>{!! $endereco->pais_id !!}</td>
            <td>
                {!! Form::open(['route' => ['enderecos.destroy', $endereco->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('enderecos.show', [$endereco->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('enderecos.edit', [$endereco->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
