<table class="table table-responsive" id="calendars-table">
    <thead>
        <tr>
            <th>Title</th>
        <th>Description</th>
        <th>Day</th>
        <th>Created By</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($calendars as $calendar)
        <tr>
            <td>{!! $calendar->title !!}</td>
            <td>{!! $calendar->description !!}</td>
            <td>{!! $calendar->day !!}</td>
            <td>{!! $calendar->created_by !!}</td>
            <td>
                {!! Form::open(['route' => ['calendars.destroy', $calendar->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('calendars.show', [$calendar->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('calendars.edit', [$calendar->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>