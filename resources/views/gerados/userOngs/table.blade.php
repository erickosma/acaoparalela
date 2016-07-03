<table class="table table-responsive" id="userOngs-table">
    <thead>
        <th>User Id</th>
        <th>Endereco Id</th>
        <th>Nome Fantasia</th>
        <th>Razao Social</th>
        <th>Desc Ong</th>
        <th>Site</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($userOngs as $userOng)
        <tr>
            <td>{!! $userOng->user_id !!}</td>
            <td>{!! $userOng->endereco_id !!}</td>
            <td>{!! $userOng->nome_fantasia !!}</td>
            <td>{!! $userOng->razao_social !!}</td>
            <td>{!! $userOng->desc_ong !!}</td>
            <td>{!! $userOng->site !!}</td>
            <td>
                {!! Form::open(['route' => ['userOngs.destroy', $userOng->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('userOngs.show', [$userOng->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('userOngs.edit', [$userOng->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
