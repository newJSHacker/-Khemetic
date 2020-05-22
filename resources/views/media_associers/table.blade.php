<table class="table table-responsive" id="mediaAssociers-table">
    <thead>
        <tr>
            <th>Original Media</th>
            <th>Name</th>
            <th>File</th>
            <th>Type</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($mediaAssociers as $mediaAssocier)
        <tr>
            <td>
                <a href="{!! route('media.show', $mediaAssocier->media->id) !!}" target="_blank">
                    {!! $mediaAssocier->media->name !!}
                </a>
            </td>
            <td>{!! $mediaAssocier->name !!}</td>
            <td>{!! $mediaAssocier->afficher(150) !!}</td>
            <td>{!! $mediaAssocier->type !!}</td>
            <td>
                {!! Form::open(['route' => ['associateMedia.destroy', $mediaAssocier->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('associateMedia.show', [$mediaAssocier->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('associateMedia.edit', [$mediaAssocier->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
