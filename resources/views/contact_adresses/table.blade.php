<table class="table table-responsive" id="contactAdresses-table">
    <thead>
        <tr>
            <th>Email</th>
            <th>Phone</th>
            <th>Name</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($contactAdresses as $contactAdresse)
        <tr>
            <td>{!! $contactAdresse->email !!}</td>
            <td>{!! $contactAdresse->tel !!}</td>
            <td>{!! $contactAdresse->getFullName() !!}</td>
            <td>
                {!! Form::open(['route' => ['contactAdresses.destroy', $contactAdresse->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('contactAdresses.show', [$contactAdresse->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('contactAdresses.edit', [$contactAdresse->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>