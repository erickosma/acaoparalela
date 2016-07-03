<table class="table table-responsive" id="userConfigs-table">
    <thead>
        <th>User Id</th>
        <th>Endereco Confidencial</th>
        <th>Email Confidencial</th>
        <th>Telefone Confidencial</th>
        <th>Notificacao Confidencial</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($userConfigs as $userConfig)
        <tr>
            <td>{!! $userConfig->user_id !!}</td>
            <td>{!! $userConfig->endereco_confidencial !!}</td>
            <td>{!! $userConfig->email_confidencial !!}</td>
            <td>{!! $userConfig->telefone_confidencial !!}</td>
            <td>{!! $userConfig->notificacao_confidencial !!}</td>
            <td>
                {!! Form::open(['route' => ['userConfigs.destroy', $userConfig->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('userConfigs.show', [$userConfig->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('userConfigs.edit', [$userConfig->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
