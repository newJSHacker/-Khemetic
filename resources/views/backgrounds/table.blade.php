<table class="table table-responsive" id="backgrounds-table">
    <thead>
        <tr>
            <th>Image</th>
            <th>Page</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($backgrounds as $background)
        <tr>
            <td>{!! $background->afficher(150) !!}</td>
            <td>{!! $background->getPage() !!}</td>
            <td>
                {!! Form::open(['route' => ['backgrounds.destroy', $background->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('backgrounds.show', [$background->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('backgrounds.edit', [$background->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
