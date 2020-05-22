
<!-- Categorie Id Field -->
<div class="form-group">
    {!! Form::label('categorie_id', 'Categorie :') !!}
    <p>{!! $media->categorie->nom !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Media name:') !!}
    <p>{!! $media->name !!}</p>
</div>

<!-- Fichier Field -->
<div class="form-group">
    {!! Form::label('fichier', 'Image preview:') !!}
    <p>{!! $media->afficherImage("20%") !!}</p>
</div>

<!-- Fichier Field -->
<div class="form-group">
    {!! Form::label('fichier', 'Original File:') !!}
    <p>{!! $media->afficher("50%") !!}</p>
</div>

<!-- Type Field -->
<div class="form-group">
    {!! Form::label('type', 'Type:') !!}
    <p>{!! $media->type !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $media->created_at !!}</p>
</div>

@php
    $mediaAssociers = $media->mediaAssociers;
@endphp

<!-- Image Field -->
<div class="form-group col-sm-12">
    <hr style="margin: 15px 0px; border-bottom: 1px solid #f7f4f4">
</div>



<table class="table table-responsive" id="mediaAssociers-table">
    <thead>
    <tr>
        <th>Name</th>
        <th>File</th>
        <th>Type</th>
        <th colspan="3">Action</th>
    </tr>
    </thead>
    <tbody>
    @if($mediaAssociers->count() > 0)
        @foreach($mediaAssociers as $mediaAssocier)
            <tr>
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

    @else

        <tr>
            <td colspan="6">
                No media associate to this one !!!
                <a href="{!! route('associateMedia.edit', [$mediaAssocier->id]) !!}" class='btn btn-default btn-xs'>
                    Add new associate media
                </a>
            </td>
        </tr>
    @endif
    </tbody>
</table>



