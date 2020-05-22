<table class="table table-responsive" id="testSites-table">
    <thead>
        <tr>
            <th>Section</th>
        <th>Code</th>
        <th>Texte</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($testSites as $testSite)
        <tr>
            <td>{!! $testSite->section !!}</td>
            <td>{!! $testSite->code !!}</td>
            <td>{!! $testSite->texte !!}</td>
            <td>
                {!! Form::open(['route' => ['testSites.destroy', $testSite->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('testSites.show', [$testSite->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('testSites.edit', [$testSite->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>