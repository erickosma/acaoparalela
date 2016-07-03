<table class="table table-responsive" id="userProfessionals-table">
    <thead>
        <th>Id</th>
        <th>User Id </th>
        <th>Endereco Id </th>
        <th>Data Nascimento</th>
        <th>Objetivos</th>
        <th>Horario </th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($userProfessionals as $userProfessional)
        <tr>
            <td>{!! $userProfessional->id !!}</td>
            <td>{!! $userProfessional->user_id  !!}</td>
            <td>{!! $userProfessional->endereco_id  !!}</td>
            <td>{!! $userProfessional->data_nascimento !!}</td>
            <td>{!! $userProfessional->objetivos !!}</td>
            <td>{!! $userProfessional->horario  !!}</td>
            <td>
                {!! Form::open(['route' => ['userProfessionals.destroy', $userProfessional->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('userProfessionals.show', [$userProfessional->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('userProfessionals.edit', [$userProfessional->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
