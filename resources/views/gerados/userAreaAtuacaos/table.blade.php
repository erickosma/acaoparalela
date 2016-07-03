<table class="table table-responsive" id="userAreaAtuacaos-table">
    <thead>
        <th>User Id</th>
        <th>Id Area Atuacao</th>
        <th>Manual</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($userAreaAtuacaos as $userAreaAtuacao)
        <tr>
            <td>{!! $userAreaAtuacao->user_id !!}</td>
            <td>{!! $userAreaAtuacao->id_area_atuacao !!}</td>
            <td>{!! $userAreaAtuacao->manual !!}</td>
            <td>
                {!! Form::open(['route' => ['userAreaAtuacaos.destroy', $userAreaAtuacao->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('userAreaAtuacaos.show', [$userAreaAtuacao->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('userAreaAtuacaos.edit', [$userAreaAtuacao->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
