<table class="table table-responsive" id="pageStatics-table">
    <thead>
        <tr>
            <th>View page</th>
            <th>Page key</th>
            <th>Title</th>
            <th>Link</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($pageStatics as $pageStatic)
        <tr>
            <td>
                <a href="{!! route('page', $pageStatic->code) !!}" style="color: #00d300;" target="_blank">
                    <i class="glyphicon glyphicon-eye-open"></i>
                </a>
            </td>
            <td>{!! $pageStatic->code !!}</td>
            <td>{!! $pageStatic->title !!}</td>
            <td>{!! route('page', $pageStatic->code) !!}</td>
            <td>
                {!! Form::open(['route' => ['pageStatics.destroy', $pageStatic->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('pageStatics.show', [$pageStatic->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('pageStatics.edit', [$pageStatic->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    @if(!$pageStatic->is_indispansable())
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    @endif
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
