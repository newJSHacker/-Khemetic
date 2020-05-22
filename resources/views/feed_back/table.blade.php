<table class="table table-responsive" id="feedBack-table">
    <thead>
        <tr>
            <th>User</th>
        <th>Subjet</th>
        <th>Page</th>
        <th>Content</th>
        <th>Update At</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($feedBack as $feedBack)
        <tr>
            <td>{!! $feedBack->user->name !!}</td>
            <td>{!! $feedBack->subjet !!}</td>
            <td>{!! $feedBack->page !!}</td>
            <td>{!! $feedBack->content !!}</td>
            <td>{!! $feedBack->update_at !!}</td>
            <td>
                {!! Form::open(['route' => ['feedBack.destroy', $feedBack->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('feedBack.show', [$feedBack->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('feedBack.edit', [$feedBack->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
