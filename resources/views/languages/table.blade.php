<table class="table table-responsive" id="languages-table">
    <thead>
        <tr>
            <th>Name</th>
        <th>Flag</th>
        <th>Abbr</th>
        <th>Script</th>
        <th>Native</th>
        <th>Active</th>
        <th>Default</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($languages as $language)
        <tr>
            <td>{!! $language->name !!}</td>
            <td>{!! $language->flag !!}</td>
            <td>{!! $language->abbr !!}</td>
            <td>{!! $language->script !!}</td>
            <td>{!! $language->native !!}</td>
            <td>{!! $language->active !!}</td>
            <td>{!! $language->default !!}</td>
            <td>
                {!! Form::open(['route' => ['languages.destroy', $language->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('languages.show', [$language->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('languages.edit', [$language->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>