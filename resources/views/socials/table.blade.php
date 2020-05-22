<table class="table table-responsive" id="socials-table">
    <thead>
        <tr>
            <th>Name</th>
        <th>Link</th>
        <th>Image</th>
        <th>Update At</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($socials as $social)
        <tr>
            <td>{!! $social->name !!}</td>
            <td>{!! $social->link !!}</td>
            <td>{!! $social->afficher(150) !!}</td>
            <td>{!! $social->updated_at !!}</td>
            <td>
                {!! Form::open(['route' => ['socialmedia.destroy', $social->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('socialmedia.show', [$social->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('socialmedia.edit', [$social->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
