<table class="table table-responsive" id="downloads-table">
    <thead>
        <tr>
            <th>Title</th>
            <th>Subtitle</th>
            <th>Page</th>
            <th>Type of file</th>
            <th>get settings before dowdload</th>
            <th>Description</th>
            <th>Active</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($downloads as $download)
        <tr>
            <td style="font-size: 16px;"><b>{!! $download->title !!}</b></td>
            <td>{!! $download->subtitle !!}</td>
            @if($download->page == 1)
            <td style="color : blue; font-size: 16px;"><b>{!! $download->getPage() !!}</b></td>
            @else
            <td style="color : red; font-size: 20px;"><b>{!! $download->getPage() !!}</b></td>
            @endif
            <td>
                {!! $download->afficher(150) !!} &nbsp;&nbsp;&nbsp;
                <a href="{!! $download->getLink() !!}">
                    <i class="fa fa-download" style="color:blue;"></i>
                </a>
            </td>
            <td>
                @php
                    $color_check = $download->auth ? "#48de48" : "#a0a0a0";
                    $color_uncheck = !$download->auth ? "red" : "#a0a0a0";
                @endphp
                <a href="{!! route('downloads.active_auth', [$download->id, 0]) !!}">
                    <i class="fa fa-ban fa-2x" style="color:{!! $color_uncheck !!}"></i>
                </a>
                <a href="{!! route('downloads.active_auth', [$download->id, 1]) !!}">
                    <i class="fa fa-check fa-2x" style="color:{!! $color_check !!}"></i>
                </a>
            </td>
            <td>{!! $download->description !!}</td>
            <td>
                @php
                    $color_check = $download->active ? "#48de48" : "#a0a0a0";
                    $color_uncheck = !$download->active ? "red" : "#a0a0a0";
                @endphp
                <a href="{!! route('downloads.active', [$download->id, 0]) !!}">
                    <i class="fa fa-ban fa-2x" style="color:{!! $color_uncheck !!}"></i>
                </a>
                <a href="{!! route('downloads.active', [$download->id, 1]) !!}">
                    <i class="fa fa-check fa-2x" style="color:{!! $color_check !!}"></i>
                </a>
            </td>
            <td>
                {!! Form::open(['route' => ['downloads.destroy', $download->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('downloads.show', [$download->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('downloads.edit', [$download->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>