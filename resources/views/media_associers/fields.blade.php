<!-- Media Id Field -->

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Fichier Field -->
<div class="form-group col-sm-6">
    <div class="form-group">
        @if(isset($mediaAssocier))
            {!! $mediaAssocier->afficher("90%") !!}
        @endif
        <br>
        {!! Form::label('fichier', 'Shose Reliated Media for '.(isset($media) ? $mediaAssocier->media->nom : '').':') !!}
        <input type="file" name="fichier" class="form-control" {!! !isset($media) ? 'required=""' : '' !!}>
    </div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('associateMedia.index') !!}" class="btn btn-default">Cancel</a>
</div>
