
<!-- Media Id Field -->
<div class="form-group">
    {!! Form::label('media_id', 'Original Media:') !!}
    <p>{!! $mediaAssocier->media->name !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $mediaAssocier->name !!}</p>
</div>

<!-- Fichier Field -->
<div class="form-group">
    {!! Form::label('fichier', 'Fichier:') !!}
    <p>{!! $mediaAssocier->afficher("50%") !!}</p>
</div>

<!-- Type Field -->
<div class="form-group">
    {!! Form::label('type', 'Type:') !!}
    <p>{!! $mediaAssocier->type !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $mediaAssocier->created_at !!}</p>
</div>
