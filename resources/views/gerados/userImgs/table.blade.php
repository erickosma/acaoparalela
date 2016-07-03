<table class="table table-responsive" id="userImgs-table">
    <thead>
        <th>User Id</th>
        <th>Foto</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($userImgs as $userImg)
        <tr>
            <td>{!! $userImg->user_id !!}</td>
            <td>{!! $userImg->foto !!}</td>
            <td>
                {!! Form::open(['route' => ['userImgs.destroy', $userImg->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('userImgs.show', [$userImg->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('userImgs.edit', [$userImg->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
