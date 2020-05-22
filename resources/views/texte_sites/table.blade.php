<table class="table table-responsive" id="texteSites-table">
    <thead>
        <tr>
            <th>Section</th>
        <th>Code</th>
        <th>Texte</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($texteSites as $texteSite)
        <tr>
            <td>{!! $texteSite->section !!}</td>
            <td>{!! $texteSite->code !!}</td>
            <td>{!! $texteSite->texte !!}</td>
            <td>
                <div class='btn-group'>
                    <a href="{!! route('texteSites.show', [$texteSite->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('texteSites.edit', [$texteSite->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                </div>
                <div class='btn-group' style="display: none;">
                    {!! Form::open(['route' => ['texteSites.destroy', $texteSite->id], 'method' => 'delete']) !!}
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    {!! Form::close() !!}
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
